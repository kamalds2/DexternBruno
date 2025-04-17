<?php


	class dashboard_model extends Model {

		public function __construct() {
		    parent::__construct();
		}

	   

		public function getDashboardPages() {		     
		    $url = RESTURL."dashboard/getdashboardpages";   
		    $res = $this->CallAPI("GET",$url);
		    return $res;
		}

		public function getDashboardSliders() {		     
		    $url = RESTURL."dashboard/getdashboardsliders";   
		    $res = $this->CallAPI("GET",$url);
		    return $res;
		}

		public function getDashboardCount() {		     
		    $url = RESTURL."dashboard/getdashboardcount"; 

		    $res = $this->CallAPI("GET",$url);
		    
		    return $res;
		}






	}