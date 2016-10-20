<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function getUid($uid){
	$ci = &get_instance();
    $data = $ci->db->get_where('user', array('id'=>$uid))->row_array();
    return $data;
}

/**
 * [create_site_log 站点日志]
 */
function create_site_log($action = array()) {

	$ci = &get_instance();
	$uid = $ci->session->userdata('uid');
    $create_time = date('Y-m-d H:i:s', time());
    $ip = $ci->input->ip_address();
    $arr['create_time'] = $create_time;
    $arr['user_id'] = $uid;
    $user = getUid($uid);
    $id = $action['id'] ? ' id by '.$action['id'] : ' ';
    $arr['action'] = $user['email']." ".$create_time." ".$action['action']." ".$action['name'].$id;
    $arr['ip'] = $ip;
    $ci->db->insert('site_log', $arr);
}


function recurse_copy($src,$dst) {  // 原目录，复制到的目录
    $dir = opendir($src);
    @mkdir($dst);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) ) {
                recurse_copy($src . '/' . $file,$dst . '/' . $file);
            }
            else {
                copy($src . '/' . $file,$dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

function deldir($dir) {
	//先删除目录下的文件：
	$dh=opendir($dir);
	while ($file=readdir($dh)) {
		if($file!="." && $file!="..") {
		  $fullpath=$dir."/".$file;
			  if(!is_dir($fullpath)) {
			      unlink($fullpath);
			  } else {
			      deldir($fullpath);
			  }
		}
	}
	closedir($dh);
	//删除当前文件夹：
	if(rmdir($dir)) {
		return true;
	} else {
		return false;
	}
}

function replace_empty($arr){
	$jsonStr = str_replace("\"\"", "\"-\"",json_encode($arr));
	$jsonStr = str_replace("null", "\"-\"",$jsonStr);
	return json_decode($jsonStr);
}


function get_block($identity_key){
	$ci = &get_instance();
	$lang = get_defult_lang();
	$ret = array();
	$data = $ci->db->select('*,case url when "" then "javascript:void(0);" else url end as url')->from('block')->join('block_i18n as i18n', 'block.id = i18n.block_id')->where(array('block.identity_key'=>$identity_key,'i18n.lang_code'=>$lang))->get()->row_array();
	$data['child'] = $ci->db->select('*,case url when "" then "javascript:void(0);" else url end as url')->from('block_item as item')->join('block_item_i18n as i18n', 'item.id = i18n.block_item_id')->where(array('item.block_id'=>$data['id'],'i18n.lang_code'=>$lang))->order_by("sort","ASC")->get()->result_array();
	return $data;
}


/**
* [tree 递归分类]
*/
function tree($table,$p_id='0') {
    $tree = array();
    foreach($table as $row){
        if($row['pid']==$p_id){
            $tmp = tree($table,$row['id']);
            if($tmp){
                $row['child']=$tmp;
            }
            $tree[]=$row;
        }
    }
    return $tree;
}


/**
 * [array_sort 二维数组字段排序]
 * @param  array  $array [description]
 * @param  [type] $field [description]
 * @param  string $type  [description]
 * @return [type]        [description]
 */
function array_sort($array = array(),$field = "",$type = 'desc'){
    $flag=array();
    foreach($array as $key => $arr){
		$flag[$key]=$arr[$field];
    }
    $type == 'desc' ? array_multisort($flag, SORT_DESC, $array) : array_multisort($flag, SORT_ASC, $array);
    return $array;
}

function static_url($url){
	$http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
    $domain = $http_type.$_SERVER['HTTP_HOST'];
	$ci = &get_instance();
	if($site['cdn']=='1'){
		return 'http://'.$site['cdn_url'].'/'.$url;
	}else{
		return $domain.'/'.$url;
	}
}

function common_url($url){
	$ci = &get_instance();
	$domain = $ci->config->item('common_url');
	if(!$url){
		return '';
	}
	return $domain.'/'.$url;
}

function dump($arr){
	echo "<pre>";
	print_r( $arr);
	echo "</pre>";
}

/**
 * [sendEmail 发送邮件]
 */
function sendEmail($to,$title,$content){
	$ci = &get_instance();
	$ci->config->load('email');
	$config = $ci->config->item('email');
	require APPPATH.'third_party/PHPMailer/PHPMailerAutoload.php';
	$mail = new PHPMailer(); //实例化
	$mail->IsSMTP(); // 启用SMTP
	$mail->Host=$config['MAIL_HOST']; //smtp服务器的名称（这里以QQ邮箱为例）
	$mail->SMTPAuth = $config['MAIL_SMTPAUTH']; //启用smtp认证
	$mail->Username = $config['MAIL_USERNAME']; //你的邮箱名
	$mail->Password = $config['MAIL_PASSWORD'] ; //邮箱密码
	$mail->From = $config['MAIL_FROM']; //发件人地址（也就是你的邮箱地址）
	$mail->FromName = $config['MAIL_FROMNAME']; //发件人姓名
	$mail->AddAddress($to,"尊敬的客户");
	$mail->WordWrap = 50; //设置每行字符长度
	$mail->IsHTML($config['MAIL_ISHTML']); // 是否HTML格式邮件
	$mail->CharSet=$config['MAIL_CHARSET']; //设置邮件编码
	$mail->Subject =$title; //邮件主题
	$mail->Body = $content; //邮件内容
	$mail->AltBody = "邮件不支持html，无法正常显示"; //邮件正文不支持HTML的备用显示
	$mail->Send();
}


function generate_password($length = 6){
    // 密码字符集，可任意添加你需要的字符
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    // !@#$%^&*()-_ []{}<>~`+=,.;:/?|
    $password = '';
    for ( $i = 0; $i < $length; $i++ )
    {
        // 这里提供两种字符获取方式
        // 第一种是使用 substr 截取$chars中的任意一位字符；
        // 第二种是取字符数组 $chars 的任意元素
        // $password .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        $password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
    }
    return $password;
}

function select_email_tpl($to,$tpl_name,$variable = array()){
	$ci = &get_instance();
	$tpl = $ci->db->get_where('email_tpl',array('tpl_name'=>$tpl_name))->row_array();
	// $tpl = "Thank you for joining in {{user.password}} Eptonic Easexport! Your password is : {{user.username}} Sincerely {{email}}";
	if(!$ci){
		$ci->error('模板不存在');
	}
	$keys = array();
	$values = array();
	foreach ($variable as $key => $value) {
		if(!is_array($value)){
			$str = "{{".$key."}}";
			$keys[] = $str;
			$values[] = $value;
		}else{
			foreach ($value as $k => $v) {
				$str = "{{".$key.'.'.$k."}}";
				$keys[] = $str;
				$values[] = $v;
			}
		}
	}

	$title = str_replace($keys, $values,$tpl['title']);
	$content = str_replace($keys, $values,$tpl['content']);
	$str = '<style>.eptonic-email{font-family:verdana,"Helvetica Neue",Helvetica,Arial,"Microsoft Yahei","Hiragino Sans GB","Heiti SC","WenQuanYi Micro Hei",sans-serif;width: auto;border:0px solid #0687e0;max-width: 800px;margin: 0 auto;background: ;overflow: hidden;}.eptonic-header{height: auto;width: 100%;border-bottom: 2px solid #BB2121;padding: 10px;margin-bottom: 30px;}.eptonic-header img{width: 25%;}.eptonic-email p,pre,h1,h2,h3,h4,h5{padding: 0 50px;max-width: 700px;}.eptonic-email a{color:#0687e0;text-decoration: none!important;}.eptonic-email .eptonic-footer{margin:50px auto;width:100%;border-top: 1px solid #ccc;padding: 10px;text-align: right;font-size: 12px;}.eptonic-email .eptonic-footer p{padding: 0;max-width: 750px;}.eptonic-email table{margin:10px auto;font-size: 14px;max-width: 780px;}.eptonic-email table tr{margin-top:-1px ;}.eptonic-email table tbody tr:nth-child(odd){background-color: #f5f5f5;}.eptonic-email table tr td,th{padding: 5px;margin: 0;border:1px solid #ccc;outline: none;}</style>';
	$str.='<div class="eptonic-email">';
	$str.='<div class="eptonic-header"><a href="http://www.eptonic.com/" title="Eptonic DSP"><img alt="" src="http://cdn.cn.eptonic.com/public/admin/img/logo.png" /></a></div>';
	$str.=$content;
	$str.='<div class="eptonic-footer"><p>&copy;Copyright 2016&nbsp;<a href="http://www.eptonic.com">Eptonic</a>. All Rights Reserved.</p></div></div>';
	sendEmail($to,$title,$str);
}













