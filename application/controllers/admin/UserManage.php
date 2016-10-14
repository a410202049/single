<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserManage extends Home_Auth_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
    	$attArr = $this->input->get();
    	$where = "";
    	if($attArr['account']){
    		$where.= ' and u.realname like "%'.$attArr['account'].'%" or u.email like "%'.$attArr['account'].'%" ';
    	}
    	if($attArr['roleType'] !="" && $attArr['roleType'] !='-1'){
    		$where.= ' and g.id='.$attArr['roleType'];
    	}
    	if($attArr['status'] !="" && $attArr['status'] !='-1'){
    		$where.= ' and u.status='.$attArr['status'];
    	}

		$sql = "SELECT u.id,u.realname,u.email,u.status,g.name from ed_user as u  LEFT JOIN ed_auth_group_access as a on a.uid = u.id LEFT JOIN ed_auth_group as g on g.id = a.group_id  where a.uid = a.uid ".$where;

    	$page['query'] = $sql;
    	$page['url'] = 'admin/UserManage/index/';
    	$users = $this->page($page);
    	$arr['users'] = $users;
	    $arr['pager'] = $this->mypage_class;
	    $arr['roles'] = $this->db->get('auth_group')->result_array();
	    $arr['getArr'] = $attArr;
        $this->twig->render('admin/UserManage/index.html',$arr);
    }

    public function getUserRoles(){
    	$roles = $this->db->get('auth_group')->result_array();
    	$this->response_data('1',lang('Get_Success'),$roles);
    }

    /**
     * [addUser 添加用户]
     */
    public function editUser(){
    	$arr = $this->input->post();
    	if(empty($arr['realname'])){
          $this->response_data('0',lang('Real_name_cannot_be_empty'));
        }
        $pattern="/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i";
        if(!preg_match($pattern,$arr['email'])){
          $this->response_data('0',lang('Mailbox_format_is_not_correct'));
        }

        $result['group_id'] = $this->input->post('user_role'); //用户组ID
        if(!$result['group_id']){
           $this->response_data('0',lang('Please_choose_a_role'));
        }

        if($arr['type'] == 'add'){
	        $data['realname'] = $this->input->post('realname');
	        $data['email'] = $this->input->post('email');
            $pass = generate_password();
            $password = md5($pass);//此处邮件发送密码
            $data['password'] = $password;
	        $data['username'] = $this->input->post('realname');
	        $data['last_login_time'] = date('Y-m-d H:i:s', time());      //创建时间
	        $data['last_login_ip'] = '0.0.0.0';
	        $where['email'] = $this->input->post('email');
	        $ret = $this->db->get_where('user', $where)->row_array();
	        if(!empty($ret)){
	            $this->response_data('0',lang('User_name_already_exists'));
	        }
	        //添加用户
	        $this->db->insert('user', $data);
	        $result['uid'] = $this->db->insert_id();
	        create_site_log(array('action'=>'add','name'=>'user','id'=>$result['uid']));
            if($result['uid']){
	            if($this->db->insert('auth_group_access', $result)){
                    select_email_tpl($data['email'],'welcome_email',array('new_password'=>$pass,'user'=>array('realname'=>$data['realname'])));
	                $this->response_data('1',lang('Add_Success'));
	            }
	        }else{
	            $this->response_data('0',lang('Add_Error'));
	        }
        }else if($arr['type']=='edit'){

        	$uid = $this->input->post('uid');
            $user= $this->getUid($uid);
	        $realname = $this->input->post('realname');
	        $password = $this->input->post('password');
	        $group_id = $this->input->post('user_role');
            $userdata = array(
                'realname'=>$realname
            );
            if($password){
              $userdata['password'] = md5($password);
            }
            

            $this->db->update('auth_group_access',array('group_id'=>$group_id), array('uid'=>$uid));
            $this->db->update('user',$userdata, array('id'=>$uid));
            create_site_log(array('action'=>'edit','name'=>'user','id'=>$uid));
            select_email_tpl($user['email'],'modify_password',array('password_modifyTime'=>date('Y-m-d H:i:s', time()),'user'=>array('realname'=>$realname,'email'=>$user['email'])));
            $this->response_data('1',lang('Edit_Success'));
        }

    }

    public function getUserInfo(){
    	$arr = $this->input->post();
    	$uid = $arr['uid'];
    	$sql = "SELECT u.id,u.realname,u.email,u.status,g.name,g.id as rid FROM ed_user as u LEFT JOIN ed_auth_group_access as a on a.uid = u.id LEFT JOIN ed_auth_group as g on a.group_id = g.id where u.id =".$uid;
    	$data = $this->db->query($sql)->row_array();
    	$this->response_data('1',lang('Get_Success'),$data);
    }


    /**
     * [userEnable 用户的禁用启用操作]
     * @return [type] [description]
     */
    public function userEnable(){
      if(IS_AJAX){
        $uid = $this->input->post('uid');
        $data = $this->db->get_where('user', array('id'=>$uid))->row_array();
            if($data['status']){
                $this->db->update('user', array('status'=>0), array('id'=>$uid));
                create_site_log(array('action'=>'disable','name'=>'user','id'=>$uid));
                $this->response_data('1',lang('disable_success'),'0');
            }else{
                $this->db->update('user', array('status'=>1), array('id'=>$uid));
                create_site_log(array('action'=>'enable','name'=>'user','id'=>$uid));
                $this->response_data('1',lang('enable_success'),'1');
            }
      }
    }

    /**
     * 修改密码
     */
    public function userProfile(){
      $arr = $this->input->post();
      if(IS_AJAX){
        switch ($arr['type']) {
            case '1'://真实名字
                $realname = $this->input->post('realname');
                $this->db->update('user',array('realname'=>$realname),array('id'=>$this->uid));
                $this->response_data('1',lang('Edit_Success'));
                break;
            case '2'://修改密码
                $oldpassword = $this->input->post('oldpassword');
                $password = $this->input->post('password');
                $confirm_password = $this->input->post('confirmpassword');

                $userData = $this->db->get_where('user',array('id'=>$this->uid))->row_array();
                if(md5($oldpassword)!=$userData['password']){
                    $this->response_data('0',lang('Old_password_error'));
                }
                if($password != $confirm_password){
                    $this->response_data('0',lang('Passwords_are_not_consistent'));
                }
                if(md5($password)==$userData['password']){
                    $this->response_data('0',lang('The_new_password_cannot_be_the_same_as_the_old_one'));
                }
                $this->db->update('user',array('password'=>md5($password)),array('id'=>$this->uid));

                $user= $this->getUid($this->uid);
                select_email_tpl($user['email'],'modify_password',array('password_modifyTime'=>date('Y-m-d H:i:s', time()),'user'=>array('realname'=>$user['realname'],'email'=>$user['email'])));
                $this->response_data('1',lang('Edit_Success'));
                break;
        }
      }else{
          $arr['user'] = $this->user;
          $this->twig->render('admin/UserManage/userProfile.html',$arr);
      }
    }





}
