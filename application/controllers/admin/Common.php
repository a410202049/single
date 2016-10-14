<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends Base_Controller {
	
    public function __construct()  
    {  
        parent::__construct();
        $this->config->load('twig');
        $twig_config = $this->config->item('twig');//后台模板引擎设置
        $this->load->library('Twig',$twig_config);
        
        $site_lang = isset($_COOKIE['site_lang']) ? $_COOKIE['site_lang'] : 'zh_cn';
        setcookie("site_lang", $site_lang, time() + 315360000, "/"); 
        $this->config->set_item('language', $site_lang);//设置语言
        $this->lang->load('user_menu');//加载语言包
        $this->twig->assign('site_lang',$site_lang);

    }
    
	/**
	 * 上传图片
	 */
	public function doUpload()
	{	
		$filepath = $this->input->get('filepath');
		if(!empty($filepath)){
			$filedir = '/upload/'.$filepath;
			$config['upload_path']  = '.'.$filedir;
	        if(!is_dir($config['upload_path'])){
	        	mkdir($config['upload_path'],0777,true);
	        }
		}else{
	    	$this->response_data('0','请填入 filepath');
		}

	    $config['allowed_types']    = 'gif|jpg|png';
	    $uid = $this->session->userdata('uid');
	    $config['file_name']  = $uid.'_'.time(); //文件名不使用原始名
	    $this->load->library('upload', $config);
	    if ( ! $this->upload->do_upload('file'))
	    {	
	        $this->response_data('error', strip_tags($this->upload->display_errors()));
	    }
	    else
	    {
	        $data =$this->upload->data();
	        $arr['file_name'] = 'upload/'.$filepath.'/'.$data['file_name'];
	        $is_cover = $this->input->get('is_cover');
	        if($is_cover){
		       	$this->load->library('image');
	            $this->image->load('.'.$filedir.'/'.$data['file_name'])->quality(0)->size(250, 160)->fixed_given_size(true)->save('.'.$filedir.'/'.$data['file_name']);
	        }

	        $this->response_data('1','上传成功',$arr);
	    }
	}

}
