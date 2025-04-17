<?php


	class login_model extends Model {

		public function __construct() {
		    parent::__construct();
		}

		public function loginSubmit($formValues) {
		    extract($formValues);
		    $formValues['user_name'] = $user_name;
		    $formValues['passwordEn'] = $this->PassHash($password);
		    $url = RESTURL."users/checklogin";  
		    //echo $url;var_dump(json_encode($formValues));die();
		    $res = $this->CallAPI("POST",$url, $formValues);
		    if($res->users->p_userid) {
		    	$url = RESTURL.'users/getuserdetails/'.$res->users->p_userid; 
      			$user_res =  $this->CallAPI("GET",$url); 
		      	$this->session->sets('adminuser_id', $res->users->p_userid);
		      	$this->session->sets('user_role', $res->users->p_role_id);
		      	$this->session->sets('user_name', $user_res->users->first_name.' '.$user_res->users->last_name);
		      	$this->session->sets('user_email', $user_res->users->user_email);
		      	if(isset($formValues['stay_signed'])) {        
		        	setcookie('digital_remember_user', $formValues['user_name'], strtotime( '+30 days' ), "/"); // 30 day
		        	setcookie('digital_remember_pass', base64_encode($formValues['password']), strtotime( '+30 days' ), "/"); // 30 day
		      	}
		      	$time = date('H:i');
		     	$this->session->sets('login_time', $time);
		      	return $res->users->p_role_id;
		    } else {
		      return false;
		    }
		  }    

	}