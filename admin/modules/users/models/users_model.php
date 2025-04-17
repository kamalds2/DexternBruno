<?php


	class users_model extends Model {

		public function __construct() {
		    parent::__construct();
		}

		public function getAllUsers() {		     
		    $url = RESTURL."users/getusers";
		    $res = $this->CallAPI("GET",$url); 
		    return $res;
		}


		public function getUserDetails($user_id) {		     
		    $url = RESTURL."users/getuserdetails/".$user_id;   
		    $res = $this->CallAPI("GET",$url); 
		    return $res;
		}

		public function getRoles() {		     
		    $url = RESTURL."roles/getroles";  
		    $res = $this->CallAPI("GET",$url); 
		    return $res;
		}

		public function updateProfileDetails($data) {
		    $data['modified_date'] = date('Y-m-d H:i:s');
		    $data['modified_by'] = $this->session->gets('adminuser_id');
		    $url = RESTURL."users/updateprofiledetails"; 
		    // echo $url;var_dump(json_encode($data));die();
		    $res = $this->CallAPI("POST",$url,$data); 
		    return $res;
		}
		
		public function updateUser($data) {
		    $data['modified_date'] = date('Y-m-d H:i:s');
		    $data['modified_by'] = $this->session->gets('adminuser_id');
		    $url = RESTURL."users/edituser"; 
		    // echo $url;var_dump(json_encode($data));die();
		    $res = $this->CallAPI("POST",$url,$data); 
		    return $res;
		}

		public function createUser($data) {
		    $data['created_date'] = date('Y-m-d H:i:s');
		    $data['created_by'] = $this->session->gets('adminuser_id');
		    $url = RESTURL."users/adduser";  
		    $res = $this->CallAPI("POST",$url,$data); 
		    return $res;
		} 

		public function checkUserPassword($data){
			$data['ch_user_id'] = $this->session->gets('adminuser_id');  
		    $url = RESTURL."users/checkpassword";
		    // echo $url;var_dump(json_encode($data));die();
		    $result = $this->CallAPI("POST",$url, $data);
		    return $result;
		}

		public function updatePassword($data) {
		    // $data['ch_user_id']  = $this->session->gets('adminuser_id');     
		    $data['modified_date'] = date("Y-m-d H:i:s") ;
		    $data['modified_by'] = $this->session->gets('adminuser_id');
		    $url = RESTURL."users/updatepassword";  
		    $result = $this->CallAPI("POST",$url, $data);
		    return $result;
		}

		public function deleteUser($data){ 
			$data['user'] = $data['deletId'];
			$data['modified_date'] = date('Y-m-d H:i:s');
			$data['modified_by'] = $this->session->gets('adminuser_id');
			$url = RESTURL."users/deleteuser"; 
			// echo $url;var_dump(json_encode($data));die();
		    $result = $this->CallAPI("POST",$url, $data);
		    return $result;
		}

		public function checkEmail($data){
			 $url = RESTURL."users/checkemail"; 
		    $result = $this->CallAPI("POST",$url,$data);
		    return $result;
		}


		public function checkEditEmail($data){
			 $url = RESTURL."users/checkeditemail";
		    // echo $url;var_dump(json_encode($data));die();
		    $result = $this->CallAPI("POST",$url,$data);
		    return $result;
		}
















	}