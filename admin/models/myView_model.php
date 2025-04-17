<?php
/*
* PHP version 5
* @author siriinnovations.com
* @version 1.0
* @license http://URL name 
* @access public
*/ 
class myView_model extends Model {	
  public function __construct() { 
    parent::__construct();
  }	
  public function access($adminRoleId) {        
    $result = $this->db->find('SELECT * FROM '.DB_PREFIX.'privileges 
                              WHERE  role_id = :role_id', array(':role_id' => $adminRoleId));
    return $result;        
  }

  public function getUserDetails($user_id) {         
    $url = RESTURL."users/getuserdetails/".$user_id;   
    $res = $this->CallAPI("GET",$url); 
    return $res;
  }
  
    
}
?>