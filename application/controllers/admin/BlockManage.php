<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BlockManage extends Home_Auth_Controller {
	
    public function __construct()  
    {  
        parent::__construct();  
    }
    
    public function index(){
    	$getArr = $this->input->get();
    	$where = "";
    	if($getArr['title']){
    		$where = " and b_i18n.title like '%".$getArr['title']."%'";
    	}

    	$sql = "select b.*,b_i18n.* from ed_block as b left join ed_block_i18n as b_i18n on b.id = b_i18n.block_id left join ed_site_enable_language as en_lang on b_i18n.lang_id = en_lang.lang_id where en_lang.is_default = '1' ".$where.' order by b.create_time desc';
    	$page['query'] = $sql;
    	$page['url'] = 'admin/BlockManage/index/';
    	$blockData = $this->page($page);
	    $arr['pager'] = $this->mypage_class;
	    $arr['dataCount'] = count($blockData);
	    $arr['blockData'] = $blockData;
	    $arr['getArr'] = $getArr;
        $this->twig->render('admin/BlockManage/index.html',$arr);
    }

    public function editBlock(){
    	$arr = $this->input->post();
    	$target = $arr['target'];
    	$url = $arr['url'];
    	$image_url = $arr['image_url'];
    	$identity_key = $arr['identity_key'];

        foreach ($this->enableLangs as $k => $v) {
            if(!$arr[$v['code']]['title']){
                $this->response_data('0',$v['language'].lang('Title_not_empty'));
            }
        }

        if(!preg_match('/^[_0-9a-z]{5,40}$/i',$identity_key)){
        	$this->response_data('0','Identity Key Format error');
        }

    	if($arr['type'] == 'add'){
    		$b_data = $this->db->get_where('block',array('identity_key'=>$identity_key))->row_array();
    		if($b_data){
    			$this->response_data('0','Identity Key Already exist');
    		}
	    	$block_arr = array(
	    		'create_time'=>date('Y-m-d H:i:s', time()),
	    		'sort'=>'50',
	    		'target'=>$target,
	    		'url'=>$url,
	    		'identity_key'=>$identity_key,
	    		'image_url'=>$image_url
	    	);
	    	$this->db->insert('block',$block_arr);
	    	$block_id = $this->db->insert_id();
	        foreach ($this->enableLangs as $key => $value) {
	            $dataArr = array(
	                'title'=>$arr[$value['code']]['title'],
	                'description'=>$arr[$value['code']]['description'],
	                'content'=>$arr[$value['code']]['content'],
	                'image_url'=>$arr[$value['code']]['image_url'],
	                'vice_image_url'=>$arr[$value['code']]['vice_image_url'],
	                'lang_code'=>$value['code'],
	                'lang_id'=>$value['lang_id'],
	                'block_id'=>$block_id
	            );
	            $this->db->insert('block_i18n',$dataArr);
	        }
	        create_site_log(array('action'=>'add','name'=>'block','id'=>$block_id));
	        $this->response_data('1',lang('Add_Success'));
    	}else if($arr['type'] == 'edit'){
    		$bid = $arr['bid'];
    		$b_data = $this->db->get_where('block',array('id !='=>$bid,'identity_key'=>$identity_key))->row_array();
    		if($b_data){
    			$this->response_data('0','Identity Key Already exist');
    		}
    		$block_arr = array(
	    		'target'=>$target,
	    		'url'=>$url,
	    		'image_url'=>$image_url,
	    		'identity_key'=>$identity_key
	    	);
	    	$this->db->update('block',$block_arr,array('id'=>$bid));
	        foreach ($this->enableLangs as $key => $value) {
	            $dataArr = array(
	                'title'=>$arr[$value['code']]['title'],
	                'description'=>$arr[$value['code']]['description'],
	                'content'=>$arr[$value['code']]['content'],
	                'image_url'=>$arr[$value['code']]['image_url'],
                	'vice_image_url'=>$arr[$value['code']]['vice_image_url']
	            );
	            if($this->db->get_where('block_i18n',array('block_id'=>$bid,'lang_code'=>$value['code']))->row_array()){
	            	$this->db->update('block_i18n',$dataArr,array('block_id'=>$bid,'lang_code'=>$value['code']));
	            }else{
		            $dataArr = array(
		                'title'=>$arr[$value['code']]['title'],
		                'description'=>$arr[$value['code']]['description'],
		                'content'=>$arr[$value['code']]['content'],
    	                'image_url'=>$arr[$value['code']]['image_url'],
	                	'vice_image_url'=>$arr[$value['code']]['vice_image_url'],
		                'lang_code'=>$value['code'],
		                'lang_id'=>$value['lang_id'],
		                'block_id'=>$bid
	            	);
	            	$this->db->insert('block_i18n',$dataArr);
	            }
	        }
	        create_site_log(array('action'=>'edit','name'=>'block','id'=>$bid));
	        $this->response_data('1',lang('Edit_Success'));
    	}
    }

    /**
     * [editBlockItem blockItem 添加编辑]
     * @return [type] [description]
     */
    public function editBlockItem(){
    	$arr = $this->input->post();
    	$bid = $arr['bid'];
    	
	   	foreach ($arr['item'] as $key => $value) {
			foreach ($this->enableLangs as $k => $v) {
	            if(!$value[$v['code']]['title']){
	            	$this->response_data('0',$v['language'].lang('Title_not_empty'),$key);
	            }
			}
	   	}

    	foreach ($arr['item'] as $key => $value) {
    		if($value['id']){
	    		$item_id = $value['id'];
	    		$block_item_arr = array(
		    		'target'=>$value['target'],
		    		'url'=>$value['url'],
		    		'image_url'=>$value['image_url'],
		    		'sort'=>$value['sort']
		    	);

		    	$this->db->update('block_item',$block_item_arr,array('id'=>$item_id));
		        foreach ($this->enableLangs as $k => $v) {
		            $dataArr = array(
		                'title'=>$value[$v['code']]['title'],
		                'description'=>$value[$v['code']]['description'],
		                'content'=>$value[$v['code']]['content'],
    	                'image_url'=>$value[$v['code']]['image_url'],
	                	'vice_image_url'=>$value[$v['code']]['vice_image_url']
		            );

		            if($this->db->get_where('block_item_i18n',array('block_item_id'=>$item_id,'lang_code'=>$v['code']))){
		            	$this->db->update('block_item_i18n',$dataArr,array('block_item_id'=>$item_id,'lang_code'=>$v['code']));
		            }else{
			            $dataArr = array(
			                'title'=>$value[$v['code']]['title'],
			                'description'=>$value[$v['code']]['description'],
			                'content'=>$value[$v['code']]['content'],
			                'lang_code'=>$v['code'],
			                'lang_id'=>$v['lang_id'],
			                'block_item_id'=>$item_id,
			                'block_id'=>$bid,
        	                'image_url'=>$value[$v['code']]['image_url'],
	                		'vice_image_url'=>$value[$v['code']]['vice_image_url']
			            );
		            	$this->db->insert('block_item_i18n',$dataArr);
		            }
		        }
            	create_site_log(array('action'=>'edit','name'=>'block_item','id'=>$item_id));
    		}else{

		    	$block_item_arr = array(
		    		'create_time'=>date('Y-m-d H:i:s', time()),
		    		'sort'=>$value['sort'],
		    		'target'=>$value['target'],
		    		'url'=>$value['url'],
		    		'image_url'=>$value['image_url'],
		    		'block_id'=>$bid
		    	);

		    	$this->db->insert('block_item',$block_item_arr);
		    	$block_item_id = $this->db->insert_id();
		        foreach ($this->enableLangs as $k => $v) {
		            $dataArr = array(
		                'title'=>$value[$v['code']]['title'],
		                'description'=>$value[$v['code']]['description'],
		                'content'=>$value[$v['code']]['content'],
		                'lang_code'=>$v['code'],
		                'lang_id'=>$v['lang_id'],
		                'block_item_id'=>$block_item_id,
		                'block_id'=>$bid,
    	                'image_url'=>$value[$v['code']]['image_url'],
	                	'vice_image_url'=>$value[$v['code']]['vice_image_url']
		            );

		            $this->db->insert('block_item_i18n',$dataArr);
		        }
		        create_site_log(array('action'=>'add','name'=>'block_item','id'=>$block_item_id));
    		}
    	}
    	$this->response_data('1',lang('Edit_Success'));
    }

    public function renderEditBlock(){
    	$bid = $this->input->get('bid');
    	if($bid){
    		$block = $this->db->get_where('block',array('id'=>$bid))->row_array();
    		$block_i18n = $this->db->get_where('block_i18n',array('block_id'=>$bid))->result_array();
    		$block_i18n = array_combine(array_column($block_i18n,'lang_code'),$block_i18n);
    		$arr['block'] = $block;
    		$arr['block_i18n'] = $block_i18n;
    	}

    	$arr['bid'] = $bid;
    	$arr['e_langs'] = $this->e_langs;
    	$arr['btn_type'] = $bid ? 'edit' : 'add';
    	$this->twig->render('admin/BlockManage/renderEditBlock.html',$arr);
    }
    public function renderEditItem(){
    	$bid = $this->input->get('bid');
    	$items = $this->db->order_by('sort', 'ASC')->get_where('block_item',array('block_id'=>$bid))->result_array();
    	foreach ($items as $key => $value) {
    		$itemid = $value['id'];
    		$item_i18n = $this->db->get_where('block_item_i18n',array('block_item_id'=>$itemid))->result_array();
    		$item_i18n = array_combine(array_column($item_i18n,'lang_code'),$item_i18n);
    		$items[$key]['item_i18n'] = $item_i18n;
    	}

    	if($bid){
    		$block = $this->db->get_where('block',array('id'=>$bid))->row_array();
    		$block_i18n = $this->db->get_where('block_i18n',array('block_id'=>$bid))->result_array();
    		$block_i18n = array_combine(array_column($block_i18n,'lang_code'),$block_i18n);
    		$arr['block'] = $block;
    		$arr['block_i18n'] = $block_i18n;
    	}
    	$arr['bid'] = $bid;
    	$arr['e_langs'] = $this->e_langs;
    	$arr['items'] = $items;
    	$this->twig->render('admin/BlockManage/renderEditItem.html',$arr);
    }
    public function delBlock(){
    	$arr = $this->input->post();
    	$bid = $arr['bid'];
    	$this->db->delete('block',array('id'=>$bid));
    	$this->db->delete('block_i18n',array('block_id'=>$bid));
    	$this->db->delete('block_item',array('block_id'=>$bid));
    	$this->db->delete('ed_block_item_i18n',array('block_id'=>$bid));
    	create_site_log(array('action'=>'del','name'=>'block','id'=>$bid));
    	$this->response_data('1',lang('Del_Success'));
    }

    public function delBlockItem(){
    	$arr = $this->input->post();
    	$item_id = $arr['item_id'];
    	$this->db->delete('block_item',array('id'=>$item_id));
    	$this->db->delete('ed_block_item_i18n',array('block_item_id'=>$item_id));
    	create_site_log(array('action'=>'del','name'=>'block item','id'=>$item_id));
    	$this->response_data('1',lang('Del_Success'));
    }
  
}
