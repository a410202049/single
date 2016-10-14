<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleManage extends Home_Auth_Controller {
	
    public function __construct()  
    {  
        parent::__construct();  
    }
    
    public function index(){
    	$role_keywords = $this->input->get('role_keywords');
    	$where = "";
    	if($role_keywords){
    		$where = "and name like '%".$role_keywords."%'";
    	}
    	$sql = "select * from ed_auth_group where 1=1 ".$where;
    	$page['query'] = $sql;
    	$page['url'] = 'admin/RoleManage/index/';
    	$gData = $this->page($page);
    	$arr['gData'] = $gData;
	    $arr['pager'] = $this->mypage_class;
      $this->twig->render('admin/RoleManage/index.html',$arr);
    }

    /**
     * 添加分组
     */
    public function editRole(){
    	$arr = $this->input->post();
    	$type = $arr['type'];
   		$rolename = $arr['rolename'];
  		$description = $arr['description'];
      $rid = $arr['rid'];
  		if(!$rolename){
  			$this->response_data('0',lang('Role_Not_Empty'));
  		}
  		if(!$description){
  			$this->response_data('0',lang('Role_Description_Not_Empty'));
  		}
    	if($type == 'add'){
          if($this->db->get_where('auth_group', array('name'=>$rolename))->row_array()){
              $this->response_data('0',lang('User_Groups_Already_Exist'));
          }
          $this->db->insert('auth_group', array('name'=>$rolename,'description'=>$description,'status'=>'1','create_time'=>date('Y-m-d H:i:s', time())));
          create_site_log(array('action'=>'add','name'=>'role','id'=>$this->db->insert_id()));
          $this->response_data('1',lang('Add_Success'));
    	}else if($type == 'edit'){
          if($this->db->get_where('auth_group', array('id!='=>$rid,'name'=>$rolename))->row_array()){
              $this->response_data('0',lang('User_Groups_Already_Exist'));
          }
    		  $this->db->update('auth_group',array('name'=>$rolename,'description'=>$description),array('id'=>$rid));
          create_site_log(array('action'=>'edit','name'=>'role','id'=>$rid));
          $this->response_data('1',lang('Edit_Success'));
    	}
    }

    /**
     * [获取分组信息]
     * @return [type] [description]
     */
    public function getRoleInfo(){
      $rid = $this->input->post('rid');
      $data = $this->db->get_where('auth_group',array('id'=>$rid))->row_array();
      $this->response_data('1',lang('Get_Success'),$data);
    }


    /**
     * [siteEnable 禁用分组]
     * @return [type] [description]
     */
    public function roleEnable(){
        $rid = $this->input->post('rid');
        $data = $this->db->get_where('auth_group', array('id'=>$rid))->row_array();
        if($data['status'] == '1'){
            $this->db->update('auth_group', array('status'=>'0'), array('id'=>$rid));
            create_site_log(array('action'=>'disable','name'=>'role','id'=>$rid));
            $this->response_data('1',lang('disable_success'),'0');
        }else if($data['status']=='0'){
            $this->db->update('auth_group', array('status'=>'1'), array('id'=>$rid));
            create_site_log(array('action'=>'enable','name'=>'role','id'=>$rid));
            $this->response_data('1',lang('enable_success'),'1');
        }
    }


    /**
     * [getAuthList description]
     * @return [type] [description]
     */
    public function getAuthList(){
    	$rules = $this->db->select('id,language_label as text,pid as href')->order_by('sort','asc')->get('auth_rule')->result_array();
    	$arr = $this->input->post();
    	$rid = $arr['rid'];
    	$rData = $this->db->get_where('auth_group',array('id'=>$rid))->row_array();
    	if(!$rData){
    		$this->response_data('0',lang('Role_Does_Not_Exist'));
    	}
    	$arrs = explode(',', $rData['rules']);
        foreach ($rules as $key => $value) {
            $rules[$key]['state'] = in_array($value['id'], $arrs) ? (object)array('checked'=>true) : (object)array('checked'=>false);
        }

        $rules = $this->role_tree($rules);
        $this->response_data('1',lang('Get_Success'),$rules);
    }

    /**
     * [tree 递归分类]
     */
  	public function role_tree($table,$p_id='0') {
  	        $tree = array();
  	        foreach($table as $row){
  	        	$row['text'] = lang($row['text']);
  	            if($row['href']==$p_id){
  	                $tmp = $this->role_tree($table,$row['id']);
  	                if($tmp){
  	                    $row['nodes']=$tmp;
  	                }
  	                $tree[]=$row;                
  	            }
  	        }
  	        return $tree;        
    }

    public function editAuth(){
       $rid = $this->input->post('rid');
       $auths = $this->input->post('auths');
        if(empty($auths)){
            $this->response_data('0',lang('Permission_cannot_be_empty'));
        }
        $data['rules'] = implode(',', $auths);
        if($this->db->update('auth_group',$data,array('id'=>$rid))){
            create_site_log(array('action'=>'edit','name'=>'role auth','id'=>$rid));
            $this->response_data('1',lang('Edit_Success'));
        }else{
            $this->response_data('0',lang('Edit_Error'));
        }
    }    

}
