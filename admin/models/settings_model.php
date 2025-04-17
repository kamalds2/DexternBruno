<?php


	class settings_model extends Model {

		public function __construct() {
		    parent::__construct();
		}

		public function getSiteSettings() {		     
		    $url = RESTURL."users/getsitesettings";   
		    $res = $this->CallAPI("GET",$url);
		    return $res;
		}     

        public function updateSettingsDetails($data){
        	$data['modified_date'] = date('Y-m-d H:i:s');
		    $data['modified_by'] = $this->session->gets('adminuser_id');
		    $url = RESTURL."users/updatesettingsdetails"; 
		    // echo $url;var_dump(json_encode($data));die();
		    $res = $this->CallAPI("POST",$url,$data); 
		    return $res;
        }




	}