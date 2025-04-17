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
  class services extends Controller {
    /**
    * Constructor 
    */
    public function __construct() {

      parent::__construct();
   
$this->menus();
    }
     
    public function index(){
  
      try{  
       $this->view->pages = $this->model->getPageDetail('services'); 
       

         $this->view->servicess  = $this->model->getPageDetails(); 
       
    
        $this->view->LoadView('services');
      }        
      catch (Exception $e) {
        $this->set_logs($this->session->gets('user_id'),'services','serviceDisplay','error_logs',$e->getMessage(),'ERR');
      } 
    }

     
     
  }
?>