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
  class sliders extends Controller {
    /**
    * Constructor 
    */
    public function __construct() {

      parent::__construct();
   
$this->menus();
    }
     
    public function getsliders($id){
  
      try{  

       $this->view->sliders = $this->model->getAllSliders($id);
     
    
        $this->view->LoadView('slider');
      }        
      catch (Exception $e) {
        $this->set_logs($this->session->gets('user_id'),'services','serviceDisplay','error_logs',$e->getMessage(),'ERR');
      } 
    }

     
     
  }
?>