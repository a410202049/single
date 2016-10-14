<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NavigationManage extends Home_Auth_Controller {
	
    public function __construct()  
    {  
        parent::__construct();  
    }
    
    public function index(){
    	$getArr = $this->input->get();
    	$where = "";
    	if($getArr['name']){
    		$where = " and nav_i18n.name like '%".$getArr['name']."%'";
    	}
    	if($getArr['type'] && $getArr['type'] !='-1'){
    		$where = " and nav.type = ".$getArr['type'];
    	}
    	$sql = "select nav.*,nav_i18n.* from ed_navigation as nav left join ed_navigation_i18n as nav_i18n on nav.id = nav_i18n.nav_id left join ed_site_enable_language as en_lang on nav_i18n.lang_id = en_lang.lang_id where  en_lang.is_default = '1' ".$where." order by sort asc";

    	$page['query'] = $sql;
    	$page['url'] = 'admin/NavigationManage/index/';
    	$aData = $this->page($page);
	    $arr['pager'] = $this->mypage_class;
	    $obj = $this;

    	foreach ($aData as $key => $value) {
    		$sql = "select nav_i18n.name as name from ed_navigation_i18n as nav_i18n left join ed_navigation as nav on nav.id = nav_i18n.nav_id where  nav_i18n.lang_id = ".$value['lang_id']." and nav.id = ".$value['pid'];
    		$cData = $this->db->query($sql)->row_array();
    		$cName = $value['pid'] == '0' ? lang('top_category') : $cData['name'];
    		$aData[$key]['p_name'] = $cName;
    	}


        foreach ($aData as $key => $data) {
            if($data['type'] =='1'){
                $btn = lang('navigation');
            }else if($data['type'] =='2'){
                $btn = lang('general_link');
            }else if($data['type'] =='3'){
                $btn = lang('catenary_outside');
            }
            $aData[$key]['sort'] = $data['sort'];
            $aData[$key]['parentid']= $data['pid'];
            $aData[$key]['type']= $btn;
        }


        $this->load->library('tree');
        $this->tree->icon = array('&nbsp;&nbsp;&nbsp;','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
        $this->tree->nbsp = '&nbsp;&nbsp;&nbsp;';
        $tdStr = "<tr>
                    <td>\$id</td>
                    <td>\$spacer\$name</td>
                    <td>\$url</td>
                    <td>\$p_name</td>
                    <td>\$sort</td>
                    <td>\$target</td>
                    <td>\$type</td>
                    <td><a href='javascript:void(0)' class='btn btn-sm btn-primary edit-btn' data-id='\$id' title='".lang('edit')."'><i class='fa fa-edit'></i></a> <a href='javascript:void(0)' class='btn btn-sm btn-danger delete-btn' data-id='\$id' title='".lang('delete')."'><i class='fa fa-trash'></td>
                </tr>";
        $this->tree->init($aData);
        $tr = $this->tree->get_tree(0, $tdStr);



    	$arr['getArr'] = $getArr;
    	$arr['pager'] = $this->mypage_class;
    	$arr['tr'] = $tr;
    	$arr['dataCount'] = count($aData);
        $this->twig->render('admin/NavigationManage/index.html',$arr);
    }

    /**
     * [editNavigation 添加导航]
     * @return [type] [description]
     */
    public function editNavigation(){
        $arr = $this->input->post();
        $nav_type = $arr['nav_type'];
        $target = $arr['target'];
        $sort = $arr['sort'];
        $pid = $arr['pid'] ? $arr['pid'] : '0';
        foreach ($this->enableLangs as $k => $v) {
            if(!$arr[$v['code']]['name']){
                $this->response_data('0',$v['language'].lang('Name_not_empty'));
            }
        }
        if(!$arr['url']){
            $this->response_data('0',lang('Url_not_empty'));
        }
        if(!$target){
            $this->response_data('0',lang('Please_select_open_type'));
        }

        if($arr['type'] == 'add'){
            $data_arr = array(
                'create_time'=>date('Y-m-d H:i:s', time()),
                'sort'=>$sort,
                'target'=>$target,
                'pid'=>$pid,
                'type'=>$nav_type,
                'url'=>$arr['url']
            );
            $this->db->insert('navigation',$data_arr);
            $nav_id = $this->db->insert_id();
            foreach ($this->enableLangs as $key => $value) {
                $dataArr = array(
                    'name'=>$arr[$value['code']]['name'],
                    'lang_code'=>$value['code'],
                    'lang_id'=>$value['lang_id'],
                    'nav_id'=>$nav_id
                );
                $this->db->insert('navigation_i18n',$dataArr);
            }
            create_site_log(array('action'=>'add','name'=>'Navigation','id'=>$nav_id));
            $this->response_data('1',lang('Navigation_add_success'));
        }else if($arr['type'] == 'edit'){
            $nid = $arr['nid'];
            $data_arr = array(
                'target'=>$target,
                'url'=>$url,
                'type'=>$nav_type,
                'pid'=>$pid,
                'sort'=>$sort,                
                'url'=>$arr['url']
            );
            $this->db->update('navigation',$data_arr,array('id'=>$nid));
            foreach ($this->enableLangs as $key => $value) {
                if($this->db->get_where('navigation_i18n',array('nav_id'=>$nid,'lang_code'=>$value['code']))->row_array()){
                    $dataArr = array(
                        'name'=>$arr[$value['code']]['name']
                    );
                    $this->db->update('navigation_i18n',$dataArr,array('nav_id'=>$nid,'lang_code'=>$value['code']));
                }else{
                    $data = array(
                        'name'=>$arr[$value['code']]['name'],
                        'lang_code'=>$value['code'],
                        'lang_id'=>$value['lang_id'],
                        'nav_id'=>$nid
                    );
                    $this->db->insert('navigation_i18n',$data);
                }
            }
            create_site_log(array('action'=>'edit','name'=>'Navigation','id'=>$nid));
            $this->response_data('1',lang('Edit_Success'));
        }
    }


    /**
     * [getNavigation 获取导航]
     */
    public function getNavigation(){
    	$arr = $this->input->post();
        $ret = $this->db->get_where('site_enable_language',array('is_default'=>'1'))->row_array();
    	if(!$arr['id']){
    		$sql = "select nav.id,nav_i18n.name as name from ed_navigation_i18n as nav_i18n left join ed_navigation as nav on nav.id = nav_i18n.nav_id where  nav_i18n.lang_id = ".$ret['lang_id'];

    		$data = $this->db->query($sql)->result_array();
    	}else{
    		$sql = "select nav.id,nav_i18n.name as name from ed_navigation_i18n as nav_i18n left join ed_navigation as nav on nav.id = nav_i18n.nav_id where  nav_i18n.lang_id = ".$ret['lang_id']." and nav.id !=".$arr['id'];
    		$data = $this->db->query($sql)->result_array();
    	}
    	$this->response_data('1',lang('Get_Success'),$data);
    }

    /**
     * [delNavigation 删除导航]
     */
    public function delNavigation(){
        $arr = $this->input->post();
        $nid = $arr['nid'];
        $this->db->delete('navigation',array('id'=>$nid));
        $this->db->delete('navigation_i18n',array('nav_id'=>$nid));
        create_site_log(array('action'=>'del','name'=>'Navigation','id'=>$nid));
        $this->response_data('1',lang('Del_Success'));
    }


    public function renderEditNavigation(){
        $nid = $this->input->get('nid');
        $navData = array();
        $pid = 'false';
        $where = "";
        if($nid){
            $navData = $this->db->get_where('navigation_i18n',array('nav_id'=>$nid))->result_array();
            $navData = array_combine(array_column($navData,'lang_code'),$navData);
            $navigation = $this->db->get_where('navigation',array('id'=>$nid))->row_array();
            $pid = $navigation['pid'];
            $where = " and nav.id != ".$nid;
        }
        $arr['navigation'] = $navigation;
        $arr['nid'] = $nid;
        $arr['pid'] = $pid;
        $arr['btn_type'] = $nid ? 'edit' : 'add';
        $arr['navData'] = $navData;
        $arr['e_langs'] = $this->e_langs;

        $sql = "select nav.id,i18n.name from ed_navigation_i18n as i18n left join ed_navigation as nav on i18n.nav_id = nav.id  where i18n.lang_id = (SELECT lang_id from ed_site_enable_language where is_default = 1)".$where;

        $arr['categorys'] = $this->db->query($sql)->result_array();
        $this->twig->render('admin/NavigationManage/renderEditNavigation.html',$arr);
    }

  
}
