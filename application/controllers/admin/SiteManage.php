<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteManage extends Home_Auth_Controller {
	
    public function __construct()  
    {  
        parent::__construct();  
    }
    
    public function index(){
        $this->twig->render('admin/SiteManage/index.html');
    }

    public function dashboard(){
        $sys_info['ip'] = $_SERVER['SERVER_ADDR'];
        $sys_info['web_server'] = $_SERVER['SERVER_SOFTWARE'];
        $sys_info['gd'] = extension_loaded("gd") ? 'yes' : 'no';
        $sys_info['max_filesize'] = ini_get('upload_max_filesize');
        $sys_info['PHP_VERSION'] = PHP_VERSION;
        $info = $this->db->query("select VERSION() as mysql_version")->row_array();
        $sys_info['mysql_get_server_info'] = $info['mysql_version'];
        $sys_info['os'] = PHP_OS;
        // $sys_info['logs'] = $this->db->get('admin_log',5,0)->result_array();
        $this->twig->render('admin/SiteManage/dashboard.html',$sys_info);
    }    
}
