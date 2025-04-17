<?php


	class services_model extends Model {

		public function __construct() {
		    parent::__construct();
		}

		public function getPageDetails() {		     
		    $url = RESTURL."travelbunny/gethomepagedetails"; 
      $res = $this->CallAPI("GET",$url);
      return $res;
		}

		public function getPageDetail($meta_title) {		     
		   $url = RESTURL . "travelbunny/getpagedetails/" . $meta_title; 
		$res = $this->CallAPI("GET", $url);

      return $res;
		}





	}