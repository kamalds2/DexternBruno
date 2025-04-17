<?php


	class jobs_model extends Model {

		public function __construct() {
		    parent::__construct();
		}

		public function getJobDetails() {		     
		    $url = RESTURL."travelbunny/getalljobs"; 
      $res = $this->CallAPI("GET",$url);
      return $res;
		}
 	public function getJobDetailss($data) {		     
		    $url = RESTURL."travelbunny/getJobDetails";
		 
      $res = $this->CallAPI("POST",$url,$data);
      return $res;
		}






	}