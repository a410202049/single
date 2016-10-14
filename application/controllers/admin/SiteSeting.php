<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteSeting extends Home_Auth_Controller {
	
    public function __construct()  
    {  
        parent::__construct();  
    }
    
    public function index(){
        $langs = $this->db->get('support_language')->result_array();
        $enable_langs = $this->enableLangs;
        $default = "";
        foreach ($enable_langs as $key => $value) {
            if($value['is_default']=='1'){
                $default = $value['id'];
            }
        }
        foreach ($langs as $lk => $lv) {
            foreach ($enable_langs as $ek => $ev) {
                if($lv['id'] == $ev['lang_id']){
                    $langs[$lk]['enable'] = '1';
                }
            }
        }
        $arr['e_langs'] = $this->e_langs;
        $arr['langs'] = $langs;
        $arr['default'] = $default;
        $arr['enable_langs'] = $enable_langs;
        $siteData = $this->db->get('site_i18n')->result_array();
        $site = $this->db->get('site')->row_array();
        $new_array = array_combine(array_column($siteData,'lang_code'),$siteData);
        $arr['siteData'] = $new_array;
        $arr['site'] = $site;
        $this->twig->render('admin/SiteSeting/index.html',$arr);
    }

    public function setingLang(){
        $arr = $this->input->post();
        if(!$arr['lang']){
            $this->response_data('0',lang('Please_choose_a_language'));
        }
        if(!$arr['defaultLang']){
            $this->response_data('0',lang('Please_set_a_default_value'));
        }
        $this->db->query('truncate table ed_site_enable_language');
        // $this->db->delete('site_enable_language');
        // exit;
        foreach ($arr['lang'] as $key => $value) {
            $default = $value == $arr['defaultLang'] ? '1' : '0';
            $this->db->insert('site_enable_language',array('lang_id'=>$value,'is_default'=>$default));
        }
        create_site_log(array('action'=>'set','name'=>'lang'));
        $this->response_data('1',lang('Set_success'));
    }

    /**
     * [saveSeting description]
     * @return [type] [description]
     */
    public function saveSeting(){
        $arr = $this->input->post();
        $multi_lang_type = $arr['multi_lang_type'];
        $cdn = $arr['site_cdn'];
        $cdn_url = $arr['cdn_url'];
        $site_domain = $arr['site_domain'];
        if($multi_lang_type == '1'){
            $data = array(
                'site_domain' => $site_domain,
                'multi_lang_type' => $multi_lang_type,
                'cdn' => $cdn
            );
            if($cdn =='1'){
                $data['cdn_url'] = $cdn_url;
            }
        }else{
            $data = array(
                'multi_lang_type' => $multi_lang_type,
                'cdn' => $cdn
            ); 
            if($cdn =='1'){
                $data['cdn_url'] = $cdn_url;
            }
        }
        $this->db->update('site',$data);

        foreach ($this->enableLangs as $key => $value) {
            $dataArr = array(
                'site_name'=>$arr[$value['code']]['sitename'],
                'description'=>$arr[$value['code']]['description'],
                'email' =>$arr[$value['code']]['email'],
                'phone' =>$arr[$value['code']]['phone'],
                'address' =>$arr[$value['code']]['address']
            );
            if($multi_lang_type == '2'){
                if (!preg_match("/\b(([\w-]+:\/\/?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|\/)))/",$arr[$value['code']]['domain'])) {
                    $this->response_data('0',lang('Domain_name_format_is_not_correct'));
                }
                $dataArr['domain'] = $arr[$value['code']]['domain'];
            }

            $data = $this->db->get_where('site_i18n',array('lang_code'=>$value['code']))->row_array();
            if($data){
                $this->db->update('site_i18n',$dataArr,array('lang_code'=>$data['lang_code']));
            }else{
                $dataArr['lang_code'] = $value['code'];
                $this->db->insert('site_i18n',$dataArr);
            }
        }
        create_site_log(array('action'=>'save','name'=>'seting'));
        $this->response_data('1',lang('Set_success'));
    }

    /**
     * [getLang 获取支持的语言列表]
     * @return [type] [description]
     */
    public function getLanguage(){
        if(IS_AJAX){
            $data = $this->db->get('support_language')->result_array();
            $this->response_data('1','站点添加成功',$data);
        }
    }
  
}
