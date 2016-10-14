<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @name 错误跳转公共方法
     * @param string $message 错误提示信息
     * @param number $time 跳转时间
     * @param string $url 跳转的URL
     */
    public function error($message,$url = FALSE,$time = 3)
    {
        if( !$url ) {
            $data['url'] = 'javascript:history.back(-1);';
        } else {
            $data['url'] = $url;
        }
        $data['message'] = $message;
        $data['time'] = $time;
        die($this->load->view('public/error',$data,true));
    }

    /**
     * @name 成功跳转公共方法
     * @param string $message 成功提示信息
     * @param number $time 跳转时间
     * @param string $url 跳转的URL
     */
    public function success($message,$url = FALSE,$time = 3)
    {
        if( !$url ) {
            $data['url'] = 'javascript:history.back(-1);';
        } else {
            $data['url'] = $url;
        }
        $data['message'] = $message;
        $data['time'] = $time;
        die($this->load->view('public/success',$data,true));
    }

    /**
     * 判断管理员是否登录
     */
    public function isLogin()
    {
        return $this->session->userdata('uid');
    }

    /**
     * [getUid 根据uid获取用户信息]
     */
    public function getUid($uid){
        $data = $this->db->get_where('user', array('id'=>$uid))->row_array();
        return $data;
    }


    /**
     * ajax返回
     */
    function response_data($status,$message = "",$data = array()){
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        $array= array(
            'status' =>$status,
            'message' => $message,
            'data' =>$data
        );
        echo json_encode($array);
        exit;
    }

    /**
     * [tree 递归分类]
     */
    public function tree($table,$pid='0',$pidName = 'pid',$childName = 'child') {
        $tree = array();
        foreach($table as $row){
            if($row[$pidName]==$pid){
                $tmp = $this->tree($table,$row['id'],$pidName,$childName);
                if($tmp){
                    $row[$childName]=$tmp;
                }
                $tree[]=$row;                
            }
        }
        return $tree;        
    }

    /**
     * 分页函数
     */
    function page($array){
        $perpage = isset($array['perpage']) ? $array['perpage'] : '15';
        $part = isset($array['part']) ? $array['part'] : '2';
        $url = isset($array['url']) ? $array['url'] : '';
        $seg = isset($array['seg']) ? $array['seg'] : '4';
        $tableName = isset($array['tableName']) ? $array['tableName'] : '';
        $where = isset($array['where']) ? $array['where'] : '1=1';
        $page_config['perpage']=$perpage;   //每页条数
        $page_config['part']=$part;//当前页前后链接数量
        $page_config['url']=$url;//url
        $page_config['pre_page']='<span aria-hidden="true">«</span>';
        $page_config['next_page']='<span aria-hidden="true">»</span>';//url
        $page_config['seg']=$seg;//参数取 index.php之后的段数，默认为3，即index.php/control/function/18 这种形式
        $page_config['nowindex']=$this->uri->segment($page_config['seg']) ? $this->uri->segment($page_config['seg']):1;//当前页
        $this->load->library('mypage_class');
        if(isset($array['query'])){
            $query = $this->db->query($array['query']);
            $page_config['total'] = count($query->result_array());
        }else{
            $page_config['total'] = $this->db->where($where)->count_all_results($tableName);
        }
        $this->mypage_class->initialize($page_config);
        $this->db->limit($page_config['perpage'],$page_config['perpage'] * ($page_config['nowindex'] - 1));
        if(isset($array['query'])){
            $data = $this->db->query($array['query'].' LIMIT '.$page_config['perpage'] * ($page_config['nowindex'] - 1).','.$page_config['perpage'])->result_array();
        }else{
            $data = $this->db->order_by('id','desc')->get_where($tableName,$where)->result_array();
        }
        return $data;
    }

}

class Auth_Controller extends Base_Controller{
    public $uid;
    public function __construct()
    {
        parent::__construct();
        $this->config->load('twig');
        $twig_config = $this->config->item('twig');//后台模板引擎设置
        $this->load->library('Twig',$twig_config);
        $this->uid = $this->isLogin();
        if(!$this->uid){
            redirect('admin/Login');
        }
        $user = $this->getUid($this->uid);
        if($user && !$user['status']){
            if(IS_AJAX){
                $this->response_data('0','该账号被禁用');
            }else{
                $this->error('账号被禁用，不能操作',base_url('admin/Login/index'));
            }
        }

        $this->twig->assign('user',$user);
    }
}

class Home_Base_Auth_Controller extends Base_Controller{
    public $uid;
    public function __construct(){
        parent::__construct();
        $this->config->load('twig');
        $twig_config = $this->config->item('twig');//后台模板引擎设置
        $this->load->library('Twig',$twig_config);
        $this->uid = $this->isLogin();
        if(!$this->uid){
            redirect('Admin/Login');
        }


        $sql = "SELECT u.id,u.realname,u.email,u.status,g.name,g.id as rid FROM ed_user as u LEFT JOIN ed_auth_group_access as a on a.uid = u.id LEFT JOIN ed_auth_group as g on a.group_id = g.id where u.id =".$this->uid;
        $user = $this->db->query($sql)->row_array();
        $this->user = $user;

        if($user && !$user['status']){
            if(IS_AJAX){
                $this->response_data('0','该账号被禁用');
            }else{
                $this->error('账号被禁用，不能操作',base_url('admin/Login/index'));
            }
        }

        $this->load->library('auth');
        $site_lang = isset($_COOKIE['site_lang']) ? $_COOKIE['site_lang'] : 'zh_cn';
        setcookie("site_lang", $site_lang, time() + 315360000, "/");
        $this->config->set_item('language', $site_lang);//设置语言
        $this->lang->load('user_menu');//加载语言包
        $this->lang->load('msg');//加载语言包
        $this->twig->assign('user',$user);
        $this->twig->assign('site_lang',$site_lang);

    }

}




class Home_Auth_Controller extends Home_Base_Auth_Controller{
    public function __construct()
    {
        parent::__construct();

        $where = array('is_show'=>'1');
        $rules = $this->db->order_by('sort', 'asc')->get_where('auth_rule',$where)->result_array();
        foreach ($rules as $key => $value) {
            if(!$this->auth->check($value['method'], $this->uid) && $this->uid !=1 && $this->groupid !=1){
                unset($rules[$key]);
            }
        }
        $data = $this->tree($rules,'0','pid','sub');
        $this->groupid = $this->auth->getGroups($this->uid)[0]['group_id'];



        $enable_langs = $this->db->query("select l.*,s.language,s.code from ed_site_enable_language as l left join ed_support_language as s on l.lang_id = s.id")->result_array();


        $flag=array();
        $e_langs = $enable_langs;
        foreach($e_langs as $en){
            $flag[]=$en["is_default"];
        }
        array_multisort($flag, SORT_DESC, $e_langs);
        $this->e_langs = $e_langs;
        $this->enableLangs = $enable_langs;
        $this->twig->assign('enableLangs',$enable_langs);
        $this->twig->assign('siteData',$siteData);
        $this->twig->assign('dataMenu',$data);

        $not_check = array('Index/index','BlockManage/renderEditItem','BlockManage/renderEditBlock','ArticleManage/renderEditArticle');
        //当前操作的请求                 模块名/方法名
        if(in_array($this->router->fetch_class().'/'.$this->router->fetch_method(), $not_check)){
            return true;
        }
        if(!$this->auth->check($this->router->fetch_class().'/'.$this->router->fetch_method(),$this->uid) && $this->uid !=1 && $this->groupid !=1){
            if(IS_AJAX){
                $this->response_data('error','没有权限');
            }else{
                $this->error('没有权限','/admin/index');
            }
        }


    }

}


class Home_Base_Controller extends Base_Controller{
    public $pidArr;
    public function __construct()
    {
        parent::__construct();
        $http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
        $domain = $http_type.$_SERVER['HTTP_HOST'];
        // if($domain == $this->config->item('base_url')){
        //     redirect('admin');
        // }

        $data = $this->db->get('site')->row_array();
        if($data['site_status']=='0'){
            $this->error('系统已经禁用此站点');
        }
        if($data['site_status']=='2'){
            $this->error('管理员已经禁用此站点');
        }
        $twig_config = array(
            'extension'=> '.twig',
            'template_dir'=> "./templates/",
            'cache_dir'=> './templates/cache/',
            'debug'=>true,
            'auto_reload'=>true
        );

        $this->config->load('twig');
        $this->load->library('Twig',$twig_config);

        if($data['multi_lang_type'] == '1'){
            $lang = $this->db->query("select * from ed_site_enable_language as l left join ed_support_language as s on l.lang_id = s.id where l.is_default = 1")->row_array();
            $site_lang = isset($_COOKIE['language']) ? $_COOKIE['language'] : $lang['code'];
        }else{
            $multi = $this->db->get_where('site_i18n',array('domain'=>$domain))->row_array();
            if(!$multi){
                $this->error('站点不存在');
            }
            $site_lang = $multi['lang_code'];
        }

        $this->session->set_userdata('domain',$domain);
        setcookie("language", $site_lang, time() + 315360000, "/");
        $this->config->set_item('language', $site_lang);//设置语言
        $this->lang->lang_load('site');//加载语言包

        $pageType = $this->uri->segment(1);
        $url = $pageType ? $pageType : 'index';
        $nav = $this->db->get_where('navigation',array('url'=>$url))->row_array();
        $navs = $this->db->select('*,case url when "" then "javascript:void(0);" else url end as url')->from('navigation as nav')->join('navigation_i18n as i18n', 'nav.id = i18n.nav_id')->order_by('nav.sort', 'asc')->where(array('nav.type'=>'1','i18n.lang_code'=>$site_lang))->get()->result_array();

        if($url != 'article' && $url !='ajaxpage'){
            if(!$nav){
                show_404();
            }
            $navsActive = $this->getPid($nav['id'],$navs);
            if($navsActive){            
                foreach ($navs as $key => $value) {
                    foreach ($navsActive as $k => $v) {
                        if($value['id'] ==$v['id']){
                            $navs[$key]['active'] = "true";
                            break;
                        }
                        $navs[$key]['active'] = "false";

                    }
                }
            }
            $this->nav = $nav;
        }
        $navs = tree($navs);
        $this->twig->assign('navs',$navs);
    }

    /**
     * [getPid 获取子分类的所有父级分类]
     */
    function getPid($cat_id,$arr){
        static $list;
        foreach($arr as $v){
            if($v['id'] == $cat_id){
                $list[] =$v;
                $this->getPid($v['pid'],$arr);
            }
        }
        return $list;
    }





}
