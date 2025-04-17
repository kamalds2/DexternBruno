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
class index extends Controller {
  /**
  * Constructor 
  */
  public function __construct() {
    parent::__construct();
    $this->menus();
  }
  /**
  * Login page 
  */
  public function index() { 
    try{
  
      $this->view->testimonial = $this->model->getTestimonial('background');
  
      
    $this->view->sliders = $this->model->getAllSliders();

                  
      
      $this->view->LoadView('index');
    }        
    catch (Exception $e) {
      $this->set_logs($this->session->gets('user_id'),'index','index','error_logs',$e->getMessage(),'ERR');
    } 
  }

   
}
?>