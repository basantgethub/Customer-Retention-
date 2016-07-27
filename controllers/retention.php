<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Retention extends CI_Controller {
	public function __construct(){
			parent::__construct();
	}
	
	function retention_detail(){
		$data = array();
		$data['event1'] =  Array (
            '0' => Array
                (
                    'date' => '2016-07-25',
                    'count' => '3',
                ),

            '1' => Array
                (
                    'date' => '2016-07-26',
                    'count' => '1'
                ), );
	
		$data['event2'] = Array  (
            '0' => Array
                (
                    'date' => '2016-07-25',
                    'count' => '4',
                ),

            '1' => Array
                (
                    'date' => '2016-07-26',
                    'count' => '1',
                )

        );
		
		$this->load->view('retention_view', $data); 
		
	}
	
	/*function retention(){
            $params['brandID'] = $this->selfUID;
            $this->load->model("notifications/m_campaigns");
            $data['campaignOptions'] = $this->m_campaigns->fetch($params);
            
            $this->load->model("notifications/m_partners");
            $data['partnerOptions'] = $this->m_partners->fetch($params);
            
            $this->load->model("notifications_mo/m_user_events");
            $data['eventOption'] = $this->m_user_events->uniqueKeys($params,'event_name');
           //print_r( $data['eventOption']);die;
            $params['startTime'] = (!empty($_REQUEST['fromDate'])) ? $_REQUEST['fromDate']: date( 'Y-m-d', strtotime("-7 days",time()) );
            $params['endTime'] = (!empty($_REQUEST['toDate']))? $_REQUEST['toDate']: '';
            $_REQUEST['fromDate'] = $params['startTime'];
            $_REQUEST['event1'] = (!empty($data['eventOption'][0])) ? $data['eventOption'][0] : '';
          
            $params['caID'] = (!empty($_REQUEST['caID']))? $_REQUEST['caID']: '';
            $params['paID'] = (!empty($_REQUEST['paID']))? $_REQUEST['paID']: '';
            if(!empty($_REQUEST['event1'])){
                $params['event_name'] = $_REQUEST['event1'];
                $data['event1'] = $this->m_user_events->graphData($params);
                
                $params['caID'] = '';
                $params['paID'] = '';
                $params['endTime']= date("Y-m-d", strtotime($params['endTime']."+7 days"));
                $params['event_name'] = (!empty($_REQUEST['event2'])) ? $_REQUEST['event2'] : '';
                $data['event2'] = $this->m_user_events->graphData($params);
            }
            //print_r($data);die;
            $response['html'] = $this->_loadView('retailer/analytics/retention',$data,TRUE);
            $this->_sendResponse($response);
        }*/
}	
	