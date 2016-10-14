<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArticleManage extends Home_Auth_Controller {
    
    public function __construct()  
    {  
        parent::__construct();  
    }
    
    public function index(){
        $getArr = $this->input->get();
        $where = "";
        if($getArr['title']){
            $where = " and i18n.title like '%".$getArr['title']."%'";
        }
        if($getArr['cid'] && $getArr['cid'] !='-1'){
         $where = " and cate.id = ".$getArr['cid'];
        }
        $sql = "select art.id as artid ,art.cate_id as art_cate_id,art.create_time as art_create_time,art.release_time as art_release_time,i18n.*,cate.*,cate_i18n.* from ed_article as art left join ed_article_i18n as i18n on art.id = i18n.article_id left join ed_article_category as cate on art.cate_id = cate.id left join ed_article_category_i18n as cate_i18n on cate.id = cate_i18n.cate_id left join ed_site_enable_language as en_lang on cate_i18n.lang_id = en_lang.lang_id where art.is_del = 0 and en_lang.is_default = '1' and i18n.lang_id = en_lang.lang_id  and  1=1 ".$where." order by art.create_time desc";

        $cate = "select cate.*,i18n.* from ed_article_category as cate left join ed_article_category_i18n as i18n on cate.id = i18n.cate_id left join ed_site_enable_language as en_lang on i18n.lang_id = en_lang.lang_id where en_lang.is_default = '1'  ".' order by cate.create_time desc';
        $cates = $this->db->query($cate)->result_array();

        $page['query'] = $sql;
        $page['url'] = 'admin/ArticleManage/index/';
        $aData = $this->page($page);
        $arr['pager'] = $this->mypage_class;
        $arr['getArr'] = $getArr;
        $arr['pager'] = $this->mypage_class;
        $arr['aData'] = $aData;
        $arr['cates'] = $cates;
        $arr['dataCount'] = count($aData);
        $this->twig->render('admin/ArticleManage/index.html',$arr);

    }

    public function articleCategory(){

        $getArr = $this->input->get();
        $where = "";
        if($getArr['title']){
            $where = " and i18n.name like '%".$getArr['title']."%'";
        }

        $sql = "select * from ed_article_category as cate left join ed_article_category_i18n as i18n on cate.id = i18n.cate_id where 1=1 ".$where." order by cate.create_time desc";

        $page['query'] = $sql;
        $page['url'] = 'admin/ArticleManage/articleCategory/';
        $aData = $this->page($page);
        $arr['pager'] = $this->mypage_class;
        $obj = $this;
        $aData = array_filter($aData, function($v) use($obj) {
            $ret = $obj->db->get_where('site_enable_language',array('is_default'=>'1'))->row_array();
            return $v['lang_id'] == $ret['lang_id'];
        });

        foreach ($aData as $key => $value) {
            $sql = "select i18n.name as name from ed_article_category_i18n as i18n left join ed_article_category as cate on cate.id = i18n.cate_id where  i18n.lang_id = ".$value['lang_id']." and cate.id = ".$value['pid'];
            $cData = $this->db->query($sql)->row_array();
            $cName = $value['pid'] == '0' ? lang('top_category') : $cData['name'];
            $aData[$key]['p_name'] = $cName;
        }

        $arr['getArr'] = $getArr;
        $arr['pager'] = $this->mypage_class;
        $arr['aData'] = $aData;
        $arr['dataCount'] = count($aData);
        $this->twig->render('admin/ArticleManage/articleCategory.html',$arr);
    }

    public function renderEditArticleCategory(){

        $cid = $this->input->get('cid');
        $cateData = array();
        $pid = 'false';
        $where = "";
        if($cid){
            $cateData = $this->db->get_where('article_category_i18n',array('cate_id'=>$cid))->result_array();
            $cateData = array_combine(array_column($cateData,'lang_code'),$cateData);
            $cate = $this->db->get_where('article_category',array('id'=>$cid))->row_array();
            $pid = $cate['pid'];
            $where = " and cate.id != ".$cid;
        }
        $arr['cate'] = $cate;
        $arr['cid'] = $cid;
        $arr['pid'] = $pid;
        $arr['btn_type'] = $cid ? 'edit' : 'add';
        $arr['cateData'] = $cateData;

        $sql = "select cate.id,cate.identity_key,i18n.name from ed_article_category_i18n as i18n left join ed_article_category as cate on i18n.cate_id = cate.id  where 1=1 and i18n.lang_id = (SELECT lang_id from ed_site_enable_language where  is_default = 1)".$where;

        $arr['categorys'] = $this->db->query($sql)->result_array();
        // print_r($cateData);exit;
        $arr['e_langs'] = $this->e_langs;
        $this->twig->render('admin/ArticleManage/renderEditArticleCategory.html',$arr);
    }

    public function editArticleCategory(){
       $arr = $this->input->post();
        $pid = $arr['pid'] ? $arr['pid'] : '0';
        $identity_key = $arr['identity_key'];
        $publish = $arr['publish'];
        if(!preg_match('/^[_0-9a-z]{5,40}$/i',$identity_key)){
            $this->response_data('0','Identity Key Format error');
        }
        foreach ($this->enableLangs as $k => $v) {
            if(!$arr[$v['code']]['name']){
                $this->response_data('0',$v['language'].lang('Category_Name_Cannot_Be_Empty'));
            }
        }
        if($arr['type'] == 'add'){
            $c_data = $this->db->get_where('article_category',array('identity_key'=>$identity_key))->row_array();
            if($c_data){
                $this->response_data('0','Identity Key Already exist');
            }
            $data_arr = array(
                'create_time'=>date('Y-m-d H:i:s', time()),
                'sort'=>'50',
                'pid'=>$pid,
                'identity_key'=>$identity_key
            );
            $this->db->insert('article_category',$data_arr);
            $cid = $this->db->insert_id();
            foreach ($this->enableLangs as $key => $value) {
                $dataArr = array(
                    'name'=>$arr[$value['code']]['name'],
                    'description'=>$arr[$value['code']]['description'],
                    'lang_code'=>$value['code'],
                    'lang_id'=>$value['lang_id'],
                    'cate_id'=>$cid
                );
                $this->db->insert('article_category_i18n',$dataArr);
            }
            create_site_log(array('action'=>'add','name'=>'category','id'=>$cid));
            $this->response_data('1',lang('Article_Categories_Add_Success'));
        }else if($arr['type'] == 'edit'){
            $cid = $arr['cid'];
            $b_data = $this->db->get_where('article_category',array('id !='=>$cid,'identity_key'=>$identity_key))->row_array();
            if($b_data){
                $this->response_data('0','Identity Key Already exist');
            }
            $data_arr = array(
                'pid'=>$pid,
                'identity_key'=>$identity_key
            );
            $this->db->update('article_category',$data_arr,array('id'=>$cid));
            foreach ($this->enableLangs as $key => $value) {
                if($this->db->get_where('article_category_i18n',array('cate_id'=>$cid,'lang_code'=>$value['code']))->row_array()){
                    $dataArr = array(
                        'name'=>$arr[$value['code']]['name'],
                        'description'=>$arr[$value['code']]['description']
                    );
                    $this->db->update('article_category_i18n',$dataArr,array('cate_id'=>$cid,'lang_code'=>$value['code']));
                }else{
                    $data = array(
                        'name'=>$arr[$value['code']]['name'],
                        'description'=>$arr[$value['code']]['description'],
                        'lang_code'=>$value['code'],
                        'lang_id'=>$value['lang_id'],
                        'cate_id'=>$cid
                    );
                    $this->db->insert('article_category_i18n',$data);
                }
            }
            create_site_log(array('action'=>'edit','name'=>'category','id'=>$cid));
            $this->response_data('1',lang('Edit_Success'));
        }
    }

    public function getCategoryInfo(){
        $arr = $this->input->post();
        $cid = $arr['cid'];
        $data = $this->db->get_where('article_category',array('id'=>$cid))->row_array();
        $this->response_data('1','获取成功',$data);
    }

    public function delCategory(){
        $arr = $this->input->post();
        $cid = $arr['cid'];
        if($this->db->get_where('article_category',array('pid'=>$cid))->row_array()){
            $this->response_data('0',lang('Sub_Not_Del'));
        }
        $this->db->delete('article_category',array('id'=>$cid));
        $this->db->delete('article_category_i18n',array('cate_id'=>$cid));
        create_site_log(array('action'=>'delete','name'=>'category','id'=>$cid));
        $this->response_data('1',lang('Del_category_success'));

    }

    public function renderEditArticle(){
        $aid = $this->input->get('aid');
        $articleData = array();
        $cateid = 'false';
        if($aid){
            $sql = "select * from ed_article as art left join ed_article_i18n as i18n on art.id = i18n.article_id where art.id=".$aid;
            $articleData = $this->db->query($sql)->result_array();
            $release_time = $articleData[0]['release_time'];
            $articleData = array_combine(array_column($articleData,'lang_code'),$articleData);
            $article = $this->db->get_where('article',array('id'=>$aid,'is_del'=>'0'))->row_array();
            $cateid = $article['cate_id'];
            $arr['article'] = $article;
        }
        $common_url = $this->config->item('common_url');
        foreach ($articleData as $key => $value) {
            $articleData[$key]['content'] = str_replace('src="', 'src="'.$common_url, $value['content']);
        }
        $arr['aid'] = $aid;
        $arr['cateid'] = $cateid;
        $arr['btn_type'] = $aid ? 'edit' : 'add';
        $arr['articleData'] = $articleData;
        $arr['e_langs'] = $this->e_langs;
        $arr['release_time'] = $release_time;

        $sql = "select cate.id,i18n.name from ed_article_category_i18n as i18n left join ed_article_category as cate on i18n.cate_id = cate.id  where i18n.lang_id = (SELECT lang_id from ed_site_enable_language where is_default = 1)";

        $arr['categorys'] = $this->db->query($sql)->result_array();
        $this->twig->render('admin/ArticleManage/renderEditArticle.html',$arr);
    }

    public function editArticle(){
        $arr = $this->input->post();
        $cid = $arr['cid'];
        $publish = $arr['publish'];
        $imageurl = $arr['image_url'];
        $publisher = $arr['publisher'];
        if(!$cid){
            $this->response_data('0',lang('Please_select_a_category'));
        }
        $common_url = $this->config->item('common_url');

        if($arr['type'] =='add'){
            foreach ($this->enableLangs as $k => $v) {
                if(!$arr[$v['code']]['title']){
                    $this->response_data('0',$v['language'].lang('Title_not_empty'));
                }
                if(!$arr[$v['code']]['description']){
                    $this->response_data('0',$v['language'].lang('Description_not_empty'));
                }
                if($arr[$v['code']]['content'] =='<p><br></p>'){
                    $this->response_data('0',$v['language'].lang('Content_not_empty'));
                }
            }
                

            $this->db->insert('article',array('cate_id' =>$cid,'sort'=>'50','update_time'=>date('Y-m-d H:i:s', time()),'create_time'=>date('Y-m-d H:i:s', time()),'release_time'=>$publish,'publisher'=>$publisher,'image_url'=>$imageurl,'is_del'=>'0'));
            $aid = $this->db->insert_id();
            foreach ($this->enableLangs as $key => $value) {
                $dataArr = array(
                    'title'=>$arr[$value['code']]['title'],
                    'description'=>$arr[$value['code']]['description'],
                    'content' => str_replace('src="'.$common_url,'src="', $arr[$value['code']]['content']),
                    'backup_one' =>$arr[$value['code']]['backup_one'],
                    'backup_two' =>$arr[$value['code']]['backup_two'],
                    'lang_code'=>$value['code'],
                    'lang_id'=>$value['lang_id'],
                    'article_id'=>$aid
                );
                $this->db->insert('article_i18n',$dataArr);
            }
            create_site_log(array('action'=>'add','name'=>'article','id'=>$aid));
            $this->response_data('1',lang('Add_Success'));
        }else if($arr['type'] =='edit'){
            foreach ($this->enableLangs as $k => $v) {
                if(!$arr[$v['code']]['title']){
                    $this->response_data('0',$v['language'].lang('Title_not_empty'));
                }
                if(!$arr[$v['code']]['description']){
                    $this->response_data('0',$v['language'].lang('Description_not_empty'));
                }
                if($arr[$v['code']]['content'] =='<p><br></p>'){
                    $this->response_data('0',$v['language'].lang('Content_not_empty'));
                }
            }
            $aid = $arr['aid'];
            $this->db->update('article',array('cate_id'=>$cid,'release_time'=>$publish,'publisher'=>$publisher,'image_url'=>$imageurl,'update_time'=>date('Y-m-d H:i:s', time())),array('id'=>$aid));
            foreach ($this->enableLangs as $key => $value) {
                if($this->db->get_where('article_i18n',array('article_id'=>$aid,'lang_code'=>$value['code']))->row_array()){
                    $dataArr = array(
                        'title'=>$arr[$value['code']]['title'],
                        'description'=>$arr[$value['code']]['description'],
                        'content' =>str_replace('src="'.$common_url,'src="', $arr[$value['code']]['content']),
                        'backup_one' =>$arr[$value['code']]['backup_one'],
                        'backup_two' =>$arr[$value['code']]['backup_two']
                    );
                    $this->db->update('article_i18n',$dataArr,array('article_id'=>$aid,'lang_code'=>$value['code']));
                }else{
                    $dataArr = array(
                        'title'=>$arr[$value['code']]['title'],
                        'description'=>$arr[$value['code']]['description'],
                        'content' =>$arr[$value['code']]['content'],
                        'lang_code'=>$value['code'],
                        'lang_id'=>$value['lang_id'],
                        'article_id'=>$aid,
                        'backup_one' =>$arr[$value['code']]['backup_one'],
                        'backup_two' =>$arr[$value['code']]['backup_two']
                    );
                    $this->db->insert('article_i18n',$dataArr);
                }
            
            }
            create_site_log(array('action'=>'edit','name'=>'article','id'=>$aid));
            $this->response_data('1',lang('Edit_Success'));
        }
    }

    public function delArticle(){
        $arr = $this->input->post();
        $aid = $arr['aid'];
        $this->db->update('article',array('is_del'=>'1'),array('id'=>$aid));
        create_site_log(array('action'=>'delete','name'=>'article','id'=>$aid));
        $this->response_data('1',lang('Del_Success'));
    }

}
