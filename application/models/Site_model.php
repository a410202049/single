<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 平台站点模型
 */
class Site_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

	/**
	 * 添加站点
	 */
	public function insert($data,$site_admin,$site_lang){
		$data['create_time'] = date('Y-m-d H:i:s',time());
		$this->db->insert('site',$data);
		$siteid = $this->db->insert_id();//站点id
		$this->db->insert('auth_group',array('name'=>'Administrators','status'=>'1','is_super'=>'1','site_id'=>$siteid,'create_time'=>date('Y-m-d H:i:s',time())));
		$groupid =  $this->db->insert_id();
		if($site_admin){		
			foreach ($site_admin as $key => $uid) {
				$this->db->insert('uid_siteid_relation',array('uid'=>$uid,'site_id'=>$siteid));
				//创建站点的时候，默认创建一个超级管理员组
				$this->db->insert('auth_group_access',array('uid'=>$uid,'group_id'=>$groupid,'site_id'=>$siteid));
			}
		}

		foreach ($site_lang as $k => $lang) {
			$is_default = $k == '0' ? '1' : '0';//设置第一个语言为默认
			$this->db->insert('site_enable_language',array('lang_id'=>$lang,'site_id'=>$siteid,'is_default'=>$is_default));
			$s_lang= $this->db->get_where('support_language',array('id'=>$lang))->row_array();
			$lang_code = $s_lang['code'];
			$this->db->insert('site_i18n',array('site_id'=>$siteid,'lang_id'=>$lang,'lang_code'=>$lang_code,'site_name'=>'site name','description'=>'custom description','keywords'=>'custom keywords'));
		}
		recurse_copy('./sites/default','./sites/'.$siteid);
		create_platform_log(array('action'=>'create','name'=>'site','id'=>$siteid));
		return $siteid;
	}

	/**
	 * 编辑站点
	 */
	public function update($data,$site_admin,$site_lang){
		$siteid = $data['site_id'];
		unset($data['site_id']);
		$this->db->update('site',$data,array('id'=>$siteid));
		$this->db->delete('site_enable_language',array('site_id'=>$siteid));
		$group = $this->db->get_where('auth_group',array('site_id'=>$siteid))->row_array();
		$groupid = $group['id'];
		$this->db->query("delete r,g from ed_uid_siteid_relation as r left join ed_user as u on r.uid = u.id left join ed_auth_group_access as g on g.uid = r.uid where u.user_type = 2 and r.site_id = ".$siteid." and g.group_id = ".$groupid);
		if($site_admin){
			foreach ($site_admin as $key => $uid) {
				$this->db->insert('uid_siteid_relation',array('uid'=>$uid,'site_id'=>$siteid));
				$this->db->insert('auth_group_access',array('uid'=>$uid,'group_id'=>$groupid,'site_id'=>$siteid));
			}
		}
		foreach ($site_lang as $k => $lang) {
			$is_default = $k == '0' ? '1' : '0';
			$this->db->insert('site_enable_language',array('lang_id'=>$lang,'site_id'=>$siteid,'is_default'=>$is_default));
			//激活语言为英语并设置为默认语言
			$s_lang= $this->db->get_where('support_language',array('id'=>$lang))->row_array();
			$lang_code = $s_lang['code'];
			if(!$this->db->get_where('site_i18n',array('site_id'=>$siteid,'lang_id'=>$lang))->row_array()){
				$this->db->insert('site_i18n',array('site_id'=>$siteid,'lang_id'=>$lang,'lang_code'=>$lang_code,'site_name'=>'site name','description'=>'custom description','keywords'=>'custom keywords'));
			}
		}
		create_platform_log(array('action'=>'update','name'=>'site','id'=>$siteid));
		return $this->db->affected_rows();
	}


	/**
	 * 删除站点
	 */
	public function delete($siteid){
		if($siteid){	
			$this->db->update('site',array('is_del'=>'1'),array('id'=>$siteid));
			create_platform_log(array('action'=>'delete','name'=>'site','id'=>$siteid));
		}
	}

	
}