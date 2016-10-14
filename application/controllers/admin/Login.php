<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Base_Controller {
	
    public function __construct()  
    {  
        parent::__construct();
        $this->config->load('twig');
        $twig_config = $this->config->item('twig');//后台模板引擎设置
        $this->load->library('Twig',$twig_config);
    }
    
	public function index()
	{

        $this->load->model('User_model','user');
        $userData = $this->user->getUid($this->isLogin());
        if($userData['status']){
            redirect(base_url('admin/Index'));
        }
    	$this->twig->render(
    		'admin/Login/index.html',
    		array('error_flashdata'=>$this->session->flashdata('error'))
    	);
	}


	/**
	 * 登陆
	 */
	public function do_login(){
		if(!isset($_SESSION)){
			session_start();
		}
		// $code = $this->input->post('code');
		// if(strtoupper($code) != $_SESSION['code']){
		// 	$this->session->set_flashdata('error','验证码错误');//验证码错误
		// }
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$this->load->model('User_model','user');
		$userData = $this->user->getUser($email);

		if($userData['password'] != md5($password)) {
			$this->session->set_flashdata('error','用户名或密码错误');
		}else if($userData && !$userData['status']){
			$this->session->set_flashdata('error','该用户已经被禁用，请联系管理员');
		}

		if($this->session->flashdata('error')){
			redirect(base_url('admin/Login'));
		}
		$this->session->set_userdata('uid',$userData['id']);
		$this->db->update('user', array('last_login_time'=>date('Y-m-d H:i:s', time()),'last_login_ip'=>$this->input->ip_address()), array('id'=>$userData['id']));
		redirect(base_url('admin/Index'));

	}

	/**
	 * 验证码
	 */
	public function code(){
		$config = array(
			'width'	=>	80,
			'height'=>	35,
			'codeLen'=>	4,
			'fontSize'=>16
			);
		$this->load->library('code', $config);
		$this->code->show();
	}

	/**
	 * 退出登陆
	 */
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('admin/Login'));
	}


}
