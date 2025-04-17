<?php
/**
 * My view 
 * 
 * Manage controller access functionalities
 * 
 * PHP version 5
 * 
 * @author siriinnovations.com
 * @version 1.0
 * @license http://URL name 
 * 
 * @access public
 */
class myController {       
    public $val;    
    /**
     * constructor 
     * 
     */
      
    /**
     * getUserRoles
     */
    /*public function getUserRoles() {        
        $this->LoadModelNew('myView');
        $adminRoleId = $this->session->gets('user_role');
        $res = $this->myView->access($adminRoleId);
        $this->val = $res;       
    }  */ 
    /**
     * 
     * @param string $slug
     * @return boolean
     */
    public function access($slug, $access) {
      $permissions = explode(',', $this->val[$access]);        
      if(in_array($slug, $permissions)) {
        return true;
       } else {
        $this->session->sets('error_msg','No Privileges.');
        header('Location:'.SITEURL."noaccess");
        return false;
      }   
    }
    public function hasAccess($slug, $access) {
      $permissions = explode(',', $this->val[$access]);        
      if(in_array($slug, $permissions)) {
        return true;
       } else {        
        return false;
      }   
    }
    /**
     * by using this method page not found display this message
     */
    public function noAccess() {        
        die("<h1>Sorry you don't have administrative privilege to access this page</h1>");       
    }
    /**
     * By using this method get latest messages
     * 
     * @return array
     */
    public function getLatestMessages() {
        $result = $this->myView->getLatestMessages();
        return $result;
    }   
}
?>