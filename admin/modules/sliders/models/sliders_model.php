<?php


	class sliders_model extends Model {

		public function __construct() {
		    parent::__construct();
		}

		public function getAllSliders() {		     
		    $url = RESTURL."sliders/getallsliders";  
		    $res = $this->CallAPI("GET",$url); 
		    return $res;
		} 

		public function getSliderDetails($slider_id) {		     
		    $url = RESTURL."sliders/getsliderdetails/".$slider_id; 
		    $res = $this->CallAPI("GET",$url); 
		    return $res;
		}

		public function createSlider($data) {
		   
		    $url = RESTURL."sliders/addslider"; 
		    // echo $url;var_dump(json_encode($data));die();
		    $res = $this->CallAPI("POST",$url,$data); 
		    return $res;
		}

		public function updateSlider($data) {
		
		    $url = RESTURL."sliders/updateslider"; 
		    // echo $url;var_dump(json_encode($data));die();
		    $res = $this->CallAPI("POST",$url,$data); 
		    return $res;
		}

		public function deleteSlider($data) { 
		   
		    $url = RESTURL."sliders/deleteslider";  
		    // echo $url;var_dump(json_encode($data));die();
		    $res = $this->CallAPI("POST",$url,$data); 
		    return $res;
		}










	}