<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-09-20 17:45:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'as en_lang WHERE en_lang.site_id = 44' at line 1 - Invalid query: DELETE  from ed_site_enable_language as en_lang WHERE en_lang.site_id = 44
ERROR - 2016-09-20 18:16:09 --> Severity: Error --> Call to undefined method Google_Service_Analytics_Columns::getRows() D:\phpStudy\WWW\eptonic\application\controllers\admin\Ga.php 41
ERROR - 2016-09-20 18:19:49 --> Severity: error --> Exception: Error calling GET https://www.googleapis.com/analytics/v3/data/ga?ids=ga%3A129940835&start-date=7daysAgo&end-date=today&metrics=ga%3AvisitorType: (400) Unknown metric(s): ga:visitorType D:\phpStudy\WWW\eptonic\application\third_party\google-api-php-client\src\Google\Http\REST.php 110
ERROR - 2016-09-20 18:19:49 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at D:\phpStudy\WWW\eptonic\application\helpers\common_helper.php:423) D:\phpStudy\WWW\eptonic\system\core\Common.php 568
ERROR - 2016-09-20 18:21:23 --> Severity: error --> Exception: Error calling GET https://www.googleapis.com/analytics/v3/data/ga?ids=ga%3A129940835&start-date=7daysAgo&end-date=today&metrics=ga%3AvisitorType: (400) Unknown metric(s): ga:visitorType D:\phpStudy\WWW\eptonic\application\third_party\google-api-php-client\src\Google\Http\REST.php 110
ERROR - 2016-09-20 18:21:23 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at D:\phpStudy\WWW\eptonic\application\helpers\common_helper.php:423) D:\phpStudy\WWW\eptonic\system\core\Common.php 568
ERROR - 2016-09-20 18:22:17 --> Severity: error --> Exception: Error calling GET https://www.googleapis.com/analytics/v3/data/ga?ids=ga%3A129940835&start-date=7daysAgo&end-date=today&metrics=ga%3AvisitorType: (400) Unknown metric(s): ga:visitorType D:\phpStudy\WWW\eptonic\application\third_party\google-api-php-client\src\Google\Http\REST.php 110
ERROR - 2016-09-20 18:24:10 --> Severity: error --> Exception: Error calling GET https://www.googleapis.com/analytics/v3/data/ga?ids=ga%3A129940835&start-date=7daysAgo&end-date=today&metrics=ga%3AvisitCount: (400) Unknown metric(s): ga:visitCount D:\phpStudy\WWW\eptonic\application\third_party\google-api-php-client\src\Google\Http\REST.php 110
ERROR - 2016-09-20 18:24:10 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at D:\phpStudy\WWW\eptonic\application\helpers\common_helper.php:423) D:\phpStudy\WWW\eptonic\system\core\Common.php 568