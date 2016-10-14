<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportManage extends Home_Auth_Controller {
	
    public function __construct()  
    {  
        parent::__construct();  
    }
    public function briefReport(){
        $this->twig->render('admin/ReportManage/briefReport.html');
    }
}
