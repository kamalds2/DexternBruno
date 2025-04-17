<?php


	class pages_model extends Model {

		public function __construct() {
		    parent::__construct();
		}

		public function getPageDetails($meta_title) {		     
		   $url = RESTURL . "travelbunny/getpagedetails/" . $meta_title; 
		$res = $this->CallAPI("GET", $url);

      return $res;
		}
 






	}