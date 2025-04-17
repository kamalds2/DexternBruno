<?php


	class jobs_model extends Model {

		public function __construct() {
		    parent::__construct();
		}

		public function getAllPages() {		     
		    $url = RESTURL."jobs/getalljobs";  
		    $res = $this->CallAPI("GET",$url);
		    return $res;
		}

		public function getPageDetails($page_id) {		     
		    $url = RESTURL."jobs/getjobdetails/".$page_id; 
		    $res = $this->CallAPI("GET",$url); 

		 		    return $res;
		}
		

		public function createPage($data) {
		   
		    $url = RESTURL."jobs/addjob"; 
		    // echo $url;var_dump(json_encode($data));die();
		    $res = $this->CallAPI("POST",$url,$data); 
		    return $res;
		}

		public function updatePage($data) {
		   
		    $url = RESTURL."jobs/updatejob";   
		    // echo $url;var_dump(json_encode($data));die();
		    $res = $this->CallAPI("POST",$url,$data); 
		    return $res;
		}

		public function deletePage($data) {
			$url = RESTURL."jobs/deletejob";  
			 
		    $res = $this->CallAPI("POST",$url,$data); 
		    return $res;
		}









	}