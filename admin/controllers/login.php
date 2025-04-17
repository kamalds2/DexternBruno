<?php

	class login extends Controller {

	 	/** * Constructor  */
	  	public function __construct() {
	    	parent::__construct();	    
	  	}

	  	public function index() {
   		 	try{
      		$this->redirect('index'); 
	    	}catch (Exception $e) {
	      		$this->set_logs(0,'login','index','error_logs',$e->getMessage(),'ERR');
	    	}        
	  	}

	  /*** Login page  ***/

	  	public function loginSubmit() { 
		    try{
		      	if(isset($_POST['submmit'])) {  
			        $res = $this->model->loginSubmit($_POST);
			        if($res) {
			          	$this->set_logs($this->session->gets('adminuser_id'),'login','loginSubmit'.implode('~', $_POST),'error_logs','Login','ACTS');
			          	$this->redirect('dashboard');
				          // $roles = explode(',', $res);
				          // if(!in_array('5', $roles)) {
				          //   $this->redirect('dashboard');
				          // }
			        } else {
			          	$this->session->sets('error_msg', 'Invalid Login Details.');
			          	$this->set_logs(0,'login','loginSubmit'.implode('~', $_POST),'error_logs','Login','ERR');
			          	$this->redirect('index');
			        }
		      	} else {
			        $this->set_logs(0,'login','loginSubmit'.implode('~', $_POST),'error_logs','Login','ERR');
			        $this->redirect('index');
		      	}
		    }          
		    catch (Exception $e) {
		        $this->set_logs(0,'login','loginSubmit_'.implode('~', $_POST),'error_logs',$e->getMessage(),'ERR');
		    }         
	  	}

	  	public function logout(){
	  		try{
      			if(array_key_exists('adminuser_id',$_SESSION)){
			        $this->session->destroy();
			        $this->redirect('login');
	      		} else {
	        		$this->redirect('login');  
	      		}
    		} catch (Exception $e) {
      			$this->set_logs(0,'login','logout','error_logs',$e->getMessage(),'ERR');
    		}   
  		}  
	}