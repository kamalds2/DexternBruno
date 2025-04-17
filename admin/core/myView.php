<?php
/**
* My view
* Manage the my header functionalities
* PHP version 5
* @author siriinnovations.com
* @version 1.0
* @license http://URL name 
* @access public
*/
class myView extends Controller {       
  public $val;  
  public function __construct() {
    parent::__construct();
  } 
  public function getUserRoles() {        
    $this->LoadModelNew('myView');
    $adminRoleId = $this->session->gets('user_role');
    $res = $this->myView->access($adminRoleId);
    $this->val = $res;        
  } 
  public function access($slug, $access) {        
    $permissions = explode(',', $this->val[$access]);
    if(in_array($slug, $permissions)) {
      return true;
    } else {
      return false;
    }       
  } 
  public function noAccess() {        
    die("<h1>Sorry you don't have administrative privilege to access this page</h1>");
  }
  public function getUserDetails() { 
    $user_id = $this->session->gets('adminuser_id');  
    $result = $this->myView->getUserDetails($user_id);      
    return $result;
  }   
  
   
}
?>