

	<?php


	class pages_model extends Model {

		public function __construct() {
		    parent::__construct();
		}

		public function getAllPages() {		     
		    $url = RESTURL."pages/getallpages";  
		    $res = $this->CallAPI("GET",$url);
		    return $res;
		}

		public function getPageDetails($page_id) {		     
		    $url = RESTURL."pages/getpagedetails/".$page_id; 
		    $res = $this->CallAPI("GET",$url); 

		 		    return $res;
		}

		public function createPage($data) {
		   
		    $url = RESTURL."pages/addpage"; 
		    // echo $url;var_dump(json_encode($data));die();
		    $res = $this->CallAPI("POST",$url,$data); 
		    return $res;
		}

		public function updatePage($data) {
		   
		    $url = RESTURL."pages/updatepage";   
		    // echo $url;var_dump(json_encode($data));die();
		    $res = $this->CallAPI("POST",$url,$data); 
		 
		    return $res;
		}

		public function deletePage($data) {
			$url = RESTURL."pages/deletepage";   
		    $res = $this->CallAPI("POST",$url,$data); 
		    return $res;
		}









	}