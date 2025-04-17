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
  class apply_jobs extends Controller {
    /**
    * Constructor 
    */
    public function __construct() {
      parent::__construct();
          $this->menus();
    }
     
    public function index() { 
        
        $this->view->LoadView('apply-jobs');
      }        
      

     
  }
?>