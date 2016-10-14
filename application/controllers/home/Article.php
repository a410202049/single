<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends Home_Base_Controller {

    public function __construct()  
    {  
        parent::__construct();  
    }
	
	public function article($id)
	{	
		if(!$this->db->get_where('article',array('id'=>$id,'is_del'=>'0'))->row_array()){
			$this->error('文章不存在');
		}
		$lang = get_defult_lang();
		$article = $this->db->select('*')->from('article as a')->join('article_i18n as i18n', 'a.id = i18n.article_id')->where(array('a.id'=>$id,'i18n.lang_code'=>$lang,'a.is_del'=>'0'))->get()->row_array();
		$common_url = $this->config->item('common_url');
		$article['content'] = str_replace('src="', 'src="'.$common_url.'/sites/'.'/', $article['content']);
		$arr['article'] = $article;
		$ids = $this->db->query('SELECT id FROM ed_article where is_del = 0 ORDER BY release_time desc ,id desc')->result_array();
		$ids = array_column($ids, 'id');
		$index = array_search($article['id'],$ids);
		$previd = $ids[$index-1];
		$nextid = $ids[$index+1];
		$prev = $this->db->select('*')->where(array('id'=>$previd))->get('article')->row_array();
		$next = $this->db->select('*')->where(array('id'=>$nextid))->get('article')->row_array();
		$arr['article']['prev'] = $prev;
		$arr['article']['next'] = $next;
		$category = $this->db->select('*')->from('ed_article_category_i18n as cate')->where(array('cate_id'=>$article['cate_id'],'lang_code'=>$lang))->get()->row_array();
		$arr['article']['category'] = $category;
		$this->twig->render('article.html',$arr);
	}

	public function ajaxPage(){
		$cid = $this->input->post('cid');
		$pageSize = $this->input->post('pageSize');
		$pageNum = $this->input->post('pageNum') ? $this->input->post('pageNum') : '1';
		$lang = get_defult_lang();
		$pageSize = $pageSize ? $pageSize : '10';
		$cid = $cid ? $cid : '';
		$arr = array();

		$sql = "SELECT a.id as art_id,a.sort as art_sort,a.cate_id as art_cate_id,a.update_time as art_update_time,a.release_time as art_release_time,a.create_time as art_create_time,art_i18n.lang_code as art_lang_code,art_i18n.title as art_title,art_i18n.description as art_description,art_i18n.backup_one as art_backup_one,art_i18n.content as art_content,a.image_url as art_cover_img,art_i18n.lang_id as art_lang_id,art_cate.pid as cate_pid,art_cate_i18n.name as cate_name,art_cate_i18n.description as cate_description from ed_article as a LEFT JOIN ed_article_i18n as art_i18n on a.id = art_i18n.article_id LEFT JOIN ed_article_category as art_cate on art_cate.id = a.cate_id LEFT JOIN ed_article_category_i18n as art_cate_i18n on art_cate_i18n.cate_id = art_cate.id where art_cate.id = '".$cid."' and art_i18n.lang_code = '".$lang."' and art_cate_i18n.lang_code = '".$lang."' and a.is_del = 0 ORDER BY a.update_time desc ";

		if($cid){
			if($pageSize){
				$data = $this->db->query($sql)->result_array();
				$count = count($data);
				$totalpage=ceil( $count / $pageSize);//总页数	
				$this->db->limit($pageSize,$pageSize * ($pageNum - 1));
				$articles = $this->db->query($sql)->result_array();
				$arr['totalpage'] = $totalpage;
				$arr['articles'] = $articles;
			}
		}else{
			$sql = "SELECT a.id as art_id,a.sort as art_sort,a.cate_id as art_cate_id,a.update_time as art_update_time,a.release_time as art_release_time,a.create_time as art_create_time,art_i18n.lang_code as art_lang_code,art_i18n.title as art_title,art_i18n.description as art_description,art_i18n.backup_one as art_backup_one,art_i18n.content as art_content,a.image_url as art_cover_img,art_i18n.lang_id as art_lang_id,art_cate.pid as cate_pid,art_cate_i18n.name as cate_name,art_cate_i18n.description as cate_description from ed_article as a LEFT JOIN ed_article_i18n as art_i18n on a.id = art_i18n.article_id LEFT JOIN ed_article_category as art_cate on art_cate.id = a.cate_id LEFT JOIN ed_article_category_i18n as art_cate_i18n on art_cate_i18n.cate_id = art_cate.id where art_i18n.lang_code = '".$lang."' and art_cate_i18n.lang_code = '".$lang."' and a.is_del = 0 ORDER BY a.update_time desc ";
			if($pageSize){
				$data = $this->db->query($sql)->result_array();
				$count = count($data);
				$totalpage=ceil( $count / $pageSize);//总页数	
				$this->db->limit($pageSize,$pageSize * ($pageNum - 1));
				$articles = $this->db->query($sql)->result_array();
				$arr['totalpage'] = $totalpage;
				$arr['articles'] = $articles;
			}
		}

		$this->response_data('1','1',$arr);
	}
}
