<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'third_party/google-api-php-client/src/Google/autoload.php';

class Ga extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->client = new Google_Client();
        $this->client->setAccessType('offline');
        $this->client->setApplicationName("Analytics");
        $this->analytics = new Google_Service_Analytics($this->client);

        $service_account_email = 'kerrygao@graphic-centaur-143906.iam.gserviceaccount.com';
        $key_file_location = APPPATH . 'third_party/google-api-php-client/49545968dab9.p12';

        $key = file_get_contents($key_file_location);
        $cred = new Google_Auth_AssertionCredentials(
            $service_account_email,
            array(Google_Service_Analytics::ANALYTICS_READONLY),
            $key
        );

        $this->client->setAssertionCredentials($cred);
        if ($this->client->getAuth()->isAccessTokenExpired()) {
            $this->client->getAuth()->refreshTokenWithAssertion($cred);
        }

        // $viewId = $this->getFirstProfileId($this->analytics);
        // echo $viewId;
        // exit;
        // if(!isset($_SESSION['access_token']) && !$_SESSION['access_token']){
        //   $redirect_uri = base_url('admin/Oauth/oauth2callback');
        //   $_SESSION['HTTP_REFERER'] = current_url();
        //   header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));exit;
        // }else{   
        //   $this->client->setAuthConfigFile(APPPATH.'third_party/google-api-php-client/client_secrets.json');
        //   $this->client->addScope(Google_Service_Analytics::ANALYTICS);
        //   $this->client->setAccessToken($_SESSION['access_token']);
        //   $this->analytics = new Google_Service_Analytics($this->client);
        // }

    }

    public function index()
    {
        // $viewId = $this->getFirstProfileId($this->analytics);//获取第一个视图
        // print_r($viewId);exit;
        // $properties = $analytics->management_webproperties
        //     ->listManagementWebproperties('~all');//获取媒体资源列表
        // $profiles = $this->analytics->management_profiles
        //     ->listManagementProfiles('84294090', '~all');//获取视图列表
        // printProfiles($profiles);exit;
        $results = $this->analytics->metadata_columns->listMetadataColumns('ga');//获取列资源
        printReportInfo($results);
        printAttributes($results);
        printColumns($results);
        exit;
        // // $this->load->library('mypage_class');
        $dateRange = new Google_Service_AnalyticsReporting_DateRange();
        $dateRange->setStartDate("2015-06-15");
        $dateRange->setEndDate("2016-09-22");
        $screenviews = new Google_Service_AnalyticsReporting_Metric();
        $screenviews->setExpression("ga:screenviews");
        $screenviews->setAlias("screenviews");
        $visits = new Google_Service_AnalyticsReporting_Metric();
        $visits->setExpression("ga:visits");
        $visits->setAlias("visits");

        $request = new Google_Service_AnalyticsReporting_ReportRequest();
        $request->setViewId("129940835");
        $request->setDateRanges($dateRange);
        $request->setMetrics(array($screenviews, $visits));
        $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
        $body->setReportRequests(array($request));
        $re = new Google_Service_AnalyticsReporting($this->client);
        $ret = $re->reports->batchGet($body);
        print_r($ret);

    }

    // public function getChart(){
    // $optParams = array(
    //     'dimensions' => 'ga:month',
    //     // 'sort' => '-ga:sessions,ga:source',
    //     // 'filters' => 'ga:medium==organic',
    //     'max-results' => '25');

    // $ret = $this->analytics->data_ga->get(
    //     'ga:129940835',
    //     '2016-05-01',
    //     '2016-09-23',
    //     'ga:sessions',
    //     $optParams);
    // print(printDataTable($ret));
    // }

    public function getChart()
    {
        $range = $this->input->post('range');
        // $range = '2016-09-18/2016-09-26';
        if ($range == '/') {
            $this->response_data('0', 'Parameters cannot be empty');
        }
        $ranges = explode("/", $range);
        $dimensions_post = $this->input->post('dimensions');
        $metrics_post = $this->input->post('metrics');
        // $dimensions_post = array('day');
        // $metrics_post = array('sessions');
        $orderType = $this->input->post('orderType');
        $fieldName = $this->input->post('fieldName');
        $sortOrder = $this->input->post('sortOrder');
        switch ($sortOrder) {
            case 'desc':
                $s_order = 'DESCENDING';
                break;
            case 'asc':
                $s_order = 'ASCENDING';
                break;  
            default:
                $s_order = 'SORT_ORDER_UNSPECIFIED';
                break;
        }



        $metrics = array();
        $dimensions = array();
        if ($metrics_post) {
            foreach ($metrics_post as $k => $v) {
                $metrics[$v] = 'ga:' . $v;
            }
        }
        if ($dimensions_post) {
            foreach ($dimensions_post as $j => $l) {
                $dimensions[$l] = 'ga:' . $l;
            }
        }

        // print_r($dimensions);exit();
        $dateRange = new Google_Service_AnalyticsReporting_DateRange();
        $dateRange->setStartDate($ranges[0]);
        $dateRange->setEndDate($ranges[1]);
        $metricsArr = array();
        $dimensionsArr = array();

        foreach ($metrics as $key => $metric) {
            $keyname = $key;
            $keyname = new Google_Service_AnalyticsReporting_Metric();
            $keyname->setExpression($metric);
            $keyname->setAlias($key);
            $metricsArr[] = $keyname;
        }

        foreach ($dimensions as $dk => $dimension) {
            $keyname = $dk;
            $keyname = new Google_Service_AnalyticsReporting_Dimension();
            $keyname->setName($dimension);
            $dimensionsArr[] = $keyname;
        }

        // Create the Ordering.
        if($orderType && $fieldName){
            $ordering = new Google_Service_AnalyticsReporting_OrderBy();
            $ordering->setOrderType($orderType);
            $ordering->setFieldName('ga:'.$fieldName);
            $ordering->setSortOrder($s_order);
        }


        $request = new Google_Service_AnalyticsReporting_ReportRequest();
        $viewId = $this->getFirstProfileId($this->analytics);//获取第一个视图
        $request->setIncludeEmptyRows(true);
        $request->setViewId($viewId);
        $request->setDateRanges($dateRange);
        $request->setMetrics($metricsArr);
        $request->setDimensions($dimensionsArr);
        if(isset($ordering)) {
            $request->setOrderBys($ordering);
        }

        $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
        $body->setReportRequests(array($request));
        $reporting = new Google_Service_AnalyticsReporting($this->client);
        $ret = $reporting->reports->batchGet($body);
        $result = getChart($ret);
        $this->response_data('1', 'success', $result);
    }

    public function insertPropertie()
    {
        try {
            $property = new Google_Service_Analytics_Webproperty();
            $property->setName('Example Store');
            $this->analytics->management_webproperties->insert('84294090', $property);
        } catch (apiServiceException $e) {
            print 'There was an Analytics API service error '
                . $e->getCode() . ':' . $e->getMessage();
        } catch (apiException $e) {
            print 'There was a general API error '
                . $e->getCode() . ':' . $e->getMessage();
        }

    }


    public function getMetrics()
    {
        $range = $this->input->post('range');
        if ($range == '/') {
            $this->response_data('0', 'Parameters cannot be empty');
        }
        $ranges = explode("/", $range);
        $metrics_post = $this->input->post('metrics');
        $metrics = array();
        if ($metrics_post) {
            foreach ($metrics_post as $k => $v) {
                $metrics[$v] = 'ga:' . $v;
            }
        }
        $dateRange = new Google_Service_AnalyticsReporting_DateRange();
        $dateRange->setStartDate($ranges[0]);
        $dateRange->setEndDate($ranges[1]);
        $metricsArr = array();
        foreach ($metrics as $key => $metric) {
            $keyname = $key;
            $keyname = new Google_Service_AnalyticsReporting_Metric();
            $keyname->setExpression($metric);
            $keyname->setAlias($key);
            $metricsArr[] = $keyname;
        }
        $request = new Google_Service_AnalyticsReporting_ReportRequest();
        $viewId = $this->getFirstProfileId($this->analytics);//获取第一个视图
        $request->setViewId($viewId);
        $request->setDateRanges($dateRange);
        $request->setMetrics($metricsArr);
        $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
        $body->setReportRequests(array($request));
        $reporting = new Google_Service_AnalyticsReporting($this->client);
        $ret = $reporting->reports->batchGet($body);
        $result = printResults($ret);
        $this->response_data('1', 'success', $result);
    }


    private function getFirstProfileId(&$analytics)
    {
        // Get the user's first view (profile) ID.

        // Get the list of accounts for the authorized user.
        $accounts = $analytics->management_accounts->listManagementAccounts();
        if (count($accounts->getItems()) > 0) {
            $items = $accounts->getItems();
            $firstAccountId = $items[0]->getId();

            // Get the list of properties for the authorized user.
            $properties = $analytics->management_webproperties
                ->listManagementWebproperties($firstAccountId);

            if (count($properties->getItems()) > 0) {
                $items = $properties->getItems();
                $firstPropertyId = $items[0]->getId();

                // Get the list of views (profiles) for the authorized user.
                $profiles = $analytics->management_profiles
                    ->listManagementProfiles($firstAccountId, $firstPropertyId);

                if (count($profiles->getItems()) > 0) {
                    $items = $profiles->getItems();

                    // Return the first view (profile) ID.
                    return $items[0]->getId();

                } else {
                    throw new Exception('No views (profiles) found for this user.');
                }
            } else {
                throw new Exception('No properties found for this user.');
            }
        } else {
            throw new Exception('No accounts found for this user.');
        }
    }


}
