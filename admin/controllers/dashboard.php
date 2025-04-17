<?php 

	class dashboard extends Controller{

		public function __construct() {
    		parent::__construct();
	    	if(!$this->session->gets('adminuser_id')){
	    		$this->redirect ('index');
	    	}
	     		  
	  	}  
	  	
		public function index(){
		
			$this->view->pages = $this->model->getDashboardPages();
			$this->view->sliders = $this->model->getDashboardSliders(); 
			
			$this->view->dashboardCnt = $this->model->getDashboardCount(); 
			$this->view->LoadView('dashboard');
		}
	}