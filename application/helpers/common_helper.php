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


function get_link($obj) {
	$ci = &get_instance();
	$ret = json_decode($obj,true);
	$type = $ret['type'] ? $ret['type'] : '1';
	$lang = get_defult_lang();
	if($type == '1'){
		$navData = $ci->db->select('*,case url when "" then "javascript:void(0);" else url end as url')->from('navigation as nav')->join('navigation_i18n as i18n', 'nav.id = i18n.nav_id')->order_by('nav.sort', 'asc')->where(array('nav.type'=>$type,'i18n.lang_code'=>$lang))->get()->result_array();
		$navData = tree($navData);
	}else if($type == '2'){
		$navid = $ret['id'];
		$navData =  $ci->db->select('*,case url when "" then "javascript:void(0);" else url end as url')->from('navigation as nav')->join('navigation_i18n as i18n', 'nav.id = i18n.nav_id')->order_by('nav.sort', 'asc')->where(array('i18n.lang_code'=>$lang,'nav.id'=>$navid))->get()->row_array();
	}
	return $navData;
}

function get_site_info(){
	$ci = &get_instance();
	$lang = get_defult_lang();
	$siteData = $ci->db->query('select s.*,i18n.* from ed_site as s ,ed_site_i18n as i18n where i18n.lang_code = "'.$lang.'"')->row_array();
    $langs = $ci->db->query("select l.*,s.language,s.code from ed_site_enable_language as l left join ed_support_language as s on l.lang_id = s.id ")->result_array();
    $siteData['current_lang'] = $lang;
    $siteData['langs'] = $langs;
    $domains = $ci->db->get_where('site_i18n')->result_array();
    $domains = array_combine(array_column($domains,'lang_code'),$domains);
    $siteData['domains'] = $domains;
	return $siteData;
}

function get_block_item_num($blockid){
	$ci = &get_instance();
	$block_item = $ci->db->get_where('block_item',array('block_id'=>$blockid))->result_array();
	return count($block_item);
}

function get_block(){
	$ci = &get_instance();
	$lang = get_defult_lang();
	$ret = array();
	$arr = func_get_args();
	foreach ($arr as $key => $value) {
		$data = $ci->db->select('*,case url when "" then "javascript:void(0);" else url end as url')->from('block')->join('block_i18n as i18n', 'block.id = i18n.block_id')->where(array('block.identity_key'=>$value,'i18n.lang_code'=>$lang))->get()->row_array();
		$data['child'] = $ci->db->select('*,case url when "" then "javascript:void(0);" else url end as url')->from('block_item as item')->join('block_item_i18n as i18n', 'item.id = i18n.block_item_id')->where(array('item.block_id'=>$data['id'],'i18n.lang_code'=>$lang))->order_by("sort","ASC")->get()->result_array();
		$ret[$key] = $data;
	}
	return $ret;
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


function get_defult_lang(){
	$ci = &get_instance();
	$data = $ci->db->get('site')->row_array();
	if($data['multi_lang_type'] == '1'){
		$lang = $ci->db->query("select * from ed_site_enable_language as l left join ed_support_language as s on l.lang_id = s.id where l.is_default = 1")->row_array();
		$site_lang = isset($_COOKIE['language']) ? $_COOKIE['language'] : $lang['code'];
	}else{
		$domain = $ci->session->userdata('domain');
		$multi = $ci->db->get_where('site_i18n',array('domain'=>$domain))->row_array();
		$site_lang = $multi['lang_code'];
	}
	return $site_lang;
}

function get_article_list($obj = "{}"){
	$ret = json_decode($obj,true);
	$ci = &get_instance();
	$lang = get_defult_lang();
	$amount = $ret['amount'] ? $ret['amount'] : '';
	$pageSize = $ret['pageSize'] ? $ret['pageSize'] : '';
	$cid = $ret['cid'] ? $ret['cid'] : '';
	$identityKey = $ret['identityKey'] ? $ret['identityKey'] : '';
	
	$aids = $ret['aid'];
	$arr = array();

	$sql = "SELECT a.id as art_id,a.sort as art_sort,a.cate_id as art_cate_id,a.update_time as art_update_time,a.release_time as art_release_time,a.create_time as art_create_time,art_i18n.lang_code as art_lang_code,art_i18n.title as art_title,art_i18n.description as art_description,art_i18n.backup_one as art_backup_one,art_i18n.content as art_content,a.image_url as art_cover_img,art_i18n.lang_id as art_lang_id,art_cate.pid as cate_pid,art_cate_i18n.name as cate_name,art_cate_i18n.description as cate_description from ed_article as a LEFT JOIN ed_article_i18n as art_i18n on a.id = art_i18n.article_id LEFT JOIN ed_article_category as art_cate on art_cate.id = a.cate_id LEFT JOIN ed_article_category_i18n as art_cate_i18n on art_cate_i18n.cate_id = art_cate.id where art_cate.id = '".$cid."' and art_i18n.lang_code = '".$lang."' and art_cate_i18n.lang_code = '".$lang."' and a.is_del = 0 ORDER BY a.release_time desc,a.update_time desc ";

	if($aids){
		foreach ($aids as $key => $value) {
			$sql = "SELECT a.id as art_id,a.sort as art_sort,a.cate_id as art_cate_id,a.update_time as art_update_time,a.release_time as art_release_time,a.create_time as art_create_time,art_i18n.lang_code as art_lang_code,art_i18n.title as art_title,art_i18n.description as art_description,art_i18n.backup_one as art_backup_one,art_i18n.content as art_content,a.image_url as art_cover_img,art_i18n.lang_id as art_lang_id,art_cate.pid as cate_pid,art_cate_i18n.name as cate_name,art_cate_i18n.description as cate_description from ed_article as a LEFT JOIN ed_article_i18n as art_i18n on a.id = art_i18n.article_id LEFT JOIN ed_article_category as art_cate on art_cate.id = a.cate_id LEFT JOIN ed_article_category_i18n as art_cate_i18n on art_cate_i18n.cate_id = art_cate.id where a.id = '".$value."' and art_i18n.lang_code = '".$lang."' and art_cate_i18n.lang_code = '".$lang."' and a.is_del = 0 ";
			$article = $ci->db->query($sql)->row_array();
			$articles[$key] = $article;
		}
		$name = 'update_time';
		usort($articles, function ($a, $b) use(&$name){
			return strtotime($a[$name]) - strtotime($b[$name]);
		});
		$arr['articles'] = $articles;
	}else if($cid){
		if($amount && $pageSize){
			$data = $ci->db->query($sql)->result_array();
			$count = $amount  > count($data) ? count($data) : $amount;
			$totalpage=ceil( $count / $pageSize);//总页数
			$sql= $sql."limit ".$pageSize;
			$articles = $ci->db->query($sql)->result_array();
			$arr['totalpage'] = $totalpage;
			$arr['articles'] = $articles;
		}else if($amount){
			$sql= $sql."limit ".$amount;
			$articles = $ci->db->query($sql)->result_array();
			$arr['articles'] = $articles;
		}else if($pageSize){
			$data = $ci->db->query($sql)->result_array();
			$count = count($data);
			$totalpage=ceil( $count / $pageSize);//总页数
			$sql= $sql."limit ".$pageSize;
			$articles = $ci->db->query($sql)->result_array();
			$arr['totalpage'] = $totalpage;
			$arr['articles'] = $articles;
		}
	}else if($identityKey){
		$sql = "SELECT a.id as art_id,a.sort as art_sort,a.cate_id as art_cate_id,a.update_time as art_update_time,a.release_time as art_release_time,a.create_time as art_create_time,art_i18n.lang_code as art_lang_code,art_i18n.title as art_title,art_i18n.description as art_description,art_i18n.backup_one as art_backup_one,art_i18n.content as art_content,a.image_url as art_cover_img,art_i18n.lang_id as art_lang_id,art_cate.pid as cate_pid,art_cate_i18n.name as cate_name,art_cate_i18n.description as cate_description from ed_article as a LEFT JOIN ed_article_i18n as art_i18n on a.id = art_i18n.article_id LEFT JOIN ed_article_category as art_cate on art_cate.id = a.cate_id LEFT JOIN ed_article_category_i18n as art_cate_i18n on art_cate_i18n.cate_id = art_cate.id where art_cate.identity_key = '".$identityKey."' and art_i18n.lang_code = '".$lang."' and art_cate_i18n.lang_code = '".$lang."' and a.is_del = 0 ORDER BY a.release_time desc,a.update_time desc ";
		if($amount && $pageSize){
			$data = $ci->db->query($sql)->result_array();
			$count = $amount  > count($data) ? count($data) : $amount;
			$totalpage=ceil( $count / $pageSize);//总页数
			$sql= $sql."limit ".$pageSize;
			$articles = $ci->db->query($sql)->result_array();
			$arr['totalpage'] = $totalpage;
			$arr['articles'] = $articles;
		}else if($amount){
			$sql= $sql."limit ".$amount;
			$articles = $ci->db->query($sql)->result_array();
			$arr['articles'] = $articles;
		}else if($pageSize){
			$data = $ci->db->query($sql)->result_array();
			$count = count($data);
			$totalpage=ceil( $count / $pageSize);//总页数
			$sql= $sql."limit ".$pageSize;
			$articles = $ci->db->query($sql)->result_array();
			$arr['totalpage'] = $totalpage;
			$arr['articles'] = $articles;
		}
	}else{
		$sql = "SELECT a.id as art_id,a.sort as art_sort,a.cate_id as art_cate_id,a.update_time as art_update_time,a.release_time as art_release_time,a.create_time as art_create_time,art_i18n.lang_code as art_lang_code,art_i18n.title as art_title,art_i18n.description as art_description,art_i18n.backup_one as art_backup_one,art_i18n.content as art_content,a.image_url as art_cover_img,art_i18n.lang_id as art_lang_id,art_cate.pid as cate_pid,art_cate_i18n.name as cate_name,art_cate_i18n.description as cate_description from ed_article as a LEFT JOIN ed_article_i18n as art_i18n on a.id = art_i18n.article_id LEFT JOIN ed_article_category as art_cate on art_cate.id = a.cate_id LEFT JOIN ed_article_category_i18n as art_cate_i18n on art_cate_i18n.cate_id = art_cate.id where art_i18n.lang_code = '".$lang."' and art_cate_i18n.lang_code = '".$lang."' and a.is_del = 0 ORDER BY a.release_time desc,a.update_time desc ";
		if($amount && $pageSize){
			$data = $ci->db->query($sql)->result_array();
			$count = $amount  > count($data) ? count($data) : $amount;
			$totalpage=ceil( $count / $pageSize);//总页数
			$sql= $sql."limit ".$pageSize;
			$articles = $ci->db->query($sql)->result_array();
			$arr['totalpage'] = $totalpage;
			$arr['articles'] = $articles;
		}else if($amount){
			$sql= $sql."limit ".$amount;
			$articles = $ci->db->query($sql)->result_array();
			$arr['articles'] = $articles;
		}else if($pageSize){
			$data = $ci->db->query($sql)->result_array();
			$count = count($data);
			$totalpage=ceil( $count / $pageSize);//总页数
			$sql= $sql."limit ".$pageSize;
			$articles = $ci->db->query($sql)->result_array();
			$arr['totalpage'] = $totalpage;
			$arr['articles'] = $articles;
		}
	}

	return $arr;
}

function get_article($id){
	$ci = &get_instance();
	$temp = $ci->db->get_where('article',array('id'=>$id,'is_del'=>'0'))->row_array();
	if(!$temp){
		$ci->error('文章不存在');
	}
	$lang = get_defult_lang();
	$article = $ci->db->select('*')->from('article as a')->join('article_i18n as i18n', 'a.id = i18n.article_id')->where(array('a.id'=>$id,'i18n.lang_code'=>$lang,'a.is_del'=>'0'))->get()->row_array();
	$arr['article'] = $article;
	$prev = $ci->db->select('*')->order_by('id','asc')->where(array('is_del'=>0,'release_time >'=>$article['release_time']))->get('article')->row_array();
	$next = $ci->db->select('*')->order_by('id','desc')->where(array('is_del'=>0,'release_time <'=>$article['release_time']))->get('article')->row_array();
	$arr['article']['prev'] = $prev;
	$arr['article']['next'] = $next;
	$category = $ci->db->select('*')->from('ed_article_category_i18n as cate')->where(array('cate_id'=>$article['cate_id'],'lang_code'=>$lang))->get()->row_array();
	$arr['article']['category'] = $category;
	return $arr;
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

//打印报表信息
function printReportInfo(&$results) {
  $html = '<h2>Report Info</h2>';
  $html .= <<<HTML
		<pre>
		Kind                  = {$results->getKind()}
		Etag                  = {$results->getEtag()}
		Total Results         = {$results->getTotalResults()}
		</pre>
HTML;
  print $html;
}

//打印属性
function printAttributes(&$results) {
  $html = '<h2>Attribute Names</h2><ul>';
  $attributes = $results->getAttributeNames();
  foreach ($attributes as $attribute) {
    $html .= '<li>'. $attribute . '</li>';
  }
  $html .= '</ul>';
  print $html;
}

//打印列名
function printColumns(&$results) {
  $columns = $results->getItems();
  if (count($columns) > 0) {
    $html = '<h2>Columns</h2>';
    foreach ($columns as $column) {
      $html .= '<h3>' . $column->getId() . '</h3>';
      $column_attributes = $column->getAttributes();
      foreach ($column_attributes as $name=>$value) {
        $html .= <<<HTML
<pre>
{$name}: {$value}
</pre>
HTML;
      }
    }
  } else {
    $html = '<p>No Results Found.</p>';
  }
  print $html;
}

//打印视图列表
function printProfiles($profiles){
	foreach ($profiles->getItems() as $profile) {
$html = <<<HTML
<pre>
Account id                      = {$profile->getAccountId()}
Property id                     = {$profile->getWebPropertyId()}
View (Profile) id               = {$profile->getId()}
View (Profile) name             = {$profile->getName()}
View (Profile) type             = {$profile->getType()}
Default page                    = {$profile->getDefaultPage()}
Exclude query parameters        = {$profile->getExcludeQueryParameters()}
Site search category parameters = {$profile->getSiteSearchCategoryParameters()}
Currency                        = {$profile->getCurrency()}
Timezone                        = {$profile->getTimezone()}
Created                         = {$profile->getCreated()}
Updated                         = {$profile->getUpdated()}
eCommerce tracking              = {$profile->getECommerceTracking()}
Enhanced eCommerce Tracking     = {$profile->getEnhancedECommerceTracking()}
</pre>
HTML;
	  print $html;
	}
}


function printResults(&$reports) {
  $arr = array();
  for ( $reportIndex = 0; $reportIndex < count( $reports ); $reportIndex++ ) {
    $report = $reports[ $reportIndex ];
    $header = $report->getColumnHeader();
    $dimensionHeaders = $header->getDimensions();
    $metricHeaders = $header->getMetricHeader()->getMetricHeaderEntries();
    $rows = $report->getData()->getRows();
    for ( $rowIndex = 0; $rowIndex < count($rows); $rowIndex++) {
      $row = $rows[ $rowIndex ];
      $dimensions = $row->getDimensions();
      $metrics = $row->getMetrics();
      $values = $metrics[0];

      for ($j = 0; $j < count( $metricHeaders ); $j++) {
        $entry = $metricHeaders[$j];
        $value = $values->getValues()[$j];
        $arr[$j]['type'] = $entry->getType();
        $arr[$j]['name'] = $entry->getName();
        $arr[$j]['value'] = $value;
      }

    }
  }
  return $arr;
}


function getChart(&$reports) {
	$arr = array();
	$row_array = array();
	$rowkey = array();
	for ( $reportIndex = 0; $reportIndex < count( $reports ); $reportIndex++ ) {
		$report = $reports[ $reportIndex ];
		$header = $report->getColumnHeader();
		$dimensionHeaders = $header->getDimensions();
		$metricHeaders = $header->getMetricHeader()->getMetricHeaderEntries();
		$rows = $report->getData()->getRows();

		for ( $rowIndex = 0; $rowIndex < count($rows); $rowIndex++) {
		  $row = $rows[ $rowIndex ];
		  $dimensions = $row->getDimensions();
		  $metrics = $row->getMetrics();
		  for ($i = 0; $i < count($dimensionHeaders) && $i < count($dimensions); $i++) {
		    $row_array[$rowIndex][$i]['name'] = explode(":",$dimensionHeaders[$i])[1];
		    $row_array[$rowIndex][$i]['displayname'] = $dimensions[$i];
		  }

		  for ($j = 0; $j < count( $metricHeaders ) && $j < count( $metrics ); $j++) {
		    $entry = $metricHeaders[$j];
		    $values = $metrics[$j];
		    for ( $valueIndex = 0; $valueIndex < count( $values->getValues() ); $valueIndex++ ) {
		      $value = $values->getValues()[ $valueIndex ];
		      $metricdata = $metricHeaders[$valueIndex];
		      $metric[$rowIndex][$valueIndex]['name'] = $metricdata->getName();
		      $metric[$rowIndex][$valueIndex]['value'] = $value;
		    }
		  }
		}

		for ( $rowIndex = 0; $rowIndex < count($rows); $rowIndex++) {
			$arr[$rowIndex]['rowKey'] = $row_array[$rowIndex];
			$arr[$rowIndex]['row'] = $metric[$rowIndex];
		}
	}
	// $arr['dimens'] = $row_array;
	// $arr['metric'] = $metric;
	return $arr;
}


function printDataTable(&$results) {
  if (count($results->getRows()) > 0) {
    $table .= '<table>';

    // Print headers.
    $table .= '<tr>';

    foreach ($results->getColumnHeaders() as $header) {
      $table .= '<th>' . $header->name . '</th>';
    }
    $table .= '</tr>';

    // Print table rows.
    print_r($results);
    exit;
    foreach ($results->getRows() as $row) {
      $table .= '<tr>';
        foreach ($row as $cell) {
          $table .= '<td>'
                 . htmlspecialchars($cell, ENT_NOQUOTES)
                 . '</td>';
        }
      $table .= '</tr>';
    }
    $table .= '</table>';

  } else {
    $table .= '<p>No Results Found.</p>';
  }
  return $table;
}


