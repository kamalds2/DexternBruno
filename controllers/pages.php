<?php
/**
 * Index
 * This is main default controller 
 * PHP version 5
 * @author siriinnovations.com
 * @version 1.0
 * @license http://URL name 
 * @access public
 */
  class pages extends Controller {
    /**
    * Constructor 
    */
    public function __construct() {
      parent::__construct();
        $this->menus();
    }
     
    public function pagedetails($meta_title){
  
      try{  

       $this->view->pages = $this->model->getPageDetails($meta_title); 
      
        $this->view->LoadView($meta_title);
      }        
      catch (Exception $e) {
        $this->set_logs($this->session->gets('user_id'),'pages','pageDisplay','error_logs',$e->getMessage(),'ERR');
      } 
    }

     
     
  }
?>