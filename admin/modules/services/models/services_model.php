<?php


	class services_model extends Model {

		public function __construct() {
		    parent::__construct();
		}

		public function getAllPages() {		     
		    $url = RESTURL."services/getallservices";  
		    $res = $this->CallAPI("GET",$url);
		    return $res;
		}

		public function getAllServices() {		     
		    $url = RESTURL."services/getallhomeservices";  
		    $res = $this->CallAPI("GET",$url);
		    return $res;
		}

		public function getPageDetails($page_id) {		     
		    $url = RESTURL."services/getservicedetails/".$page_id; 
		    $res = $this->CallAPI("GET",$url); 
		    return $res;
		}

		public function createPage($data) {
		
		    $url = RESTURL."services/addservice"; 
		    // echo $url;var_dump(json_encode($data));die();
		    $res = $this->CallAPI("POST",$url,$data); 
		    return $res;
		}

		public function createHomePage($data) {
		
		    $url = RESTURL."services/addHomeservice"; 
		    // echo $url;var_dump(json_encode($data));die();
		    $res = $this->CallAPI("POST",$url,$data); 
		    return $res;
		}

		public function updatePage($data) {
		 
		    $url = RESTURL."services/updateservice";   
		    // echo $url;var_dump(json_encode($data));die();
		    $res = $this->CallAPI("POST",$url,$data); 
		    return $res;
		}

		public function updateHomePage($data) {
		 
		    $url = RESTURL."services/updateHomeservice";   
		    // echo $url;var_dump(json_encode($data));die();
		    $res = $this->CallAPI("POST",$url,$data); 
		    return $res;
		}

		public function deletePage($data) {
		
		    $url = RESTURL."services/deleteservice";   
		    $res = $this->CallAPI("POST",$url,$data); 
		    return $res;
		}
	









	}