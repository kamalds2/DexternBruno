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
  class jobs extends Controller {
    /**
    * Constructor 
    */
    public function __construct() {
      parent::__construct();
          $this->menus();
    }
     
    public function index(){
  
      try{  



       $this->view->jobs = $this->model->getJobDetails(); 
        
    
        $this->view->LoadView('open-positions');
      }        
      catch (Exception $e) {
        $this->set_logs($this->session->gets('user_id'),'services','serviceDisplay','error_logs',$e->getMessage(),'ERR');
      } 
    }
  public function getJobs(){
  
      try{  
               $json_input = file_get_contents("php://input");

        $data = json_decode($json_input);
        
    
       
         
       $result = $this->model->getJobDetailss($data); 

          echo json_encode($result->res) ;
        
      }        
      catch (Exception $e) {
        $this->set_logs($this->session->gets('user_id'),'services','serviceDisplay','error_logs',$e->getMessage(),'ERR');
      } 
    }


     
     
  }
?>