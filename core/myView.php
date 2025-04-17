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
  /*public function getUserRoles() {        
    $this->LoadModelNew('myView');
     $adminRoleId = $this->session->gets('user_role');
     $res = $this->myView->access($adminRoleId);
    $this->val = $res;        
  } */
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
  
  public function getMenuDetails(){
    $this->LoadModelNew('myView');
    $result = $this->myView->getMenuDetails();   
    $menus = $result->res;
    $result = $this->myView->getPageDetails($menus, 0);
    return $result;
  }

  public function getSettingsData(){
    $this->LoadModelNew('myView');
    $result = $this->myView->getSettingsData();
    $footer_data = $result->res;   
    return $footer_data;
  }

  public function getFooterMenuDetails(){
    $this->LoadModelNew('myView');
    $result = $this->myView->getMenuDetails();   
    $menus = $result->res;
    $result = $this->myView->getPageDetails($menus, 0);
    return $result;
  }

}
?>