<?php


	class roles_model extends Model {

		public function __construct() {
		    parent::__construct();
		}

		public function getAllRoles() {		     
		    $url = RESTURL."roles/getroles";  
		    $res = $this->CallAPI("GET",$url); 
		    return $res;
		}


		public function getRoleDetails($role_id) {		     
		    $url = RESTURL."roles/getroledetails/".$role_id;  
		    $res = $this->CallAPI("GET",$url); 
		    return $res;
		}

		public function getRoles() {		     
		    $url = RESTURL."roles/getroles";  
		    $res = $this->CallAPI("GET",$url); 
		    return $res;
		}

		public function updateRole($data) {
		    $data['modified_date'] = date('Y-m-d H:i:s');
		    $data['modified_by'] = $this->session->gets('adminuser_id');
		    $url = RESTURL."roles/editrole"; 
		    // echo $url;			var_dump(json_encode($data));die();
		    $res = $this->CallAPI("POST",$url,$data); 
		    return $res;
		}

		public function addRoleDetails($data) {
		    $data['created_date'] = date('Y-m-d H:i:s');
		    $data['created_by'] = $this->session->gets('adminuser_id');
		    $url = RESTURL."roles/addrole"; 
		    // echo $url;var_dump(json_encode($data));die();
		    $res = $this->CallAPI("POST",$url,$data); 
		    return $res;
		}

		public function getModules() {		     
		    $url = RESTURL."roles/getmodules";  
		    $res = $this->CallAPI("GET",$url); 
		    return $res;
		}


		public function getPrivileges($role_id) {		     
		    $url = RESTURL."roles/getprivileges/".$role_id;  
		    $res = $this->CallAPI("GET",$url); 
		    return $res;
		}

		public function checkRoleName($data) {
		    $url = RESTURL."roles/checkrolename";
		    // echo $url;var_dump(json_encode($data));die();
		    $result = $this->CallAPI("POST",$url,$data);
		    return $result;
		}

		public function accessPages($data) {
		    extract($data); 
		    $values = array(); 
		    $values['role_id'] = $role_id;
		    $values['module_id'] = $module_id;
		    $values['privilege_name'] = $privilege_name;    
		    $values['status'] = $status; 
		    $values['created_date'] = date("Y-m-d H:i:s");
		    $values['created_by'] = $this->session->gets('adminuser_id'); 
		    $url = RESTURL."roles/accesspages";  
		    // echo $url;var_dump(json_encode($values));die();
		    $result = $this->CallAPI("POST",$url,$values);
		    return $result;  
  		}

 















	}