<?php

	class jobs extends Controller {

	 	/** * Constructor */
	  	public function __construct() {
	    	parent::__construct();	
	    	if(!$this->session->gets('adminuser_id')){
	    		$this->redirect ('index');

	    	}
	    	$this->LoadHelper('ImageUpload');  
    		 
	  	}

	  	public function index() { 
		    try{
		      	$this->view->pagesList = $this->model->getAllPages();
		      	$this->set_logs($this->session->gets('adminuser_id'),'jobs','index','error_logs','jobs','ACTS');
      			$this->view->LoadView('manageJob', 'jobs');
		    }          
		    catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'jobs','index','error_logs',$e->getMessage(),'ERR');
		    }         
	  	}	  	

	  	public function editPage($page_id){
	  		try{	  
	  			$result = $this->model->getPageDetails($page_id); 
	  			 $this->view->pages = $result->pages;
				
	  			$this->set_logs($this->session->gets('adminuser_id'),'jobs','editjob'.$page_id,'error_logs','Edit job','ACTS');
	  			$this->view->LoadView('editJob', 'jobs');
		      	
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'jobs','editjob','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}

	  	public function addPage(){
	  		try{ 

	  			$this->set_logs($this->session->gets('adminuser_id'),'jobs','addJob','error_logs','Add jobs','ACTS');
		      	$this->view->LoadView('addJob', 'jobs');
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'jobs','updatePage','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}
	  	
	  
	  	public function createPage(){
	  		try{   
	  			   
	  			$result = $this->model->createPage($_POST);

		      	if($result) {
		        	$this->session->sets('success_msg','Added Successfully.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'jobs','createPage'.implode('~',$_POST),'error_logs','Add Pages','ACTS');
		        	
		      	} else {
		      		$this->session->sets('error_msg','Not Added.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'jobs','createPage'.implode('~', $_POST),'error_logs','Add Pages','ERR');
		        	
		      	}
		      	$this->redirect('jobs'); 
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'jobs','createPage','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}

	  	public function updatePage(){
    try {

	    $result = $this->model->updatePage($_POST);
       
        if ($result) {
            $this->session->sets('success_msg', 'Updated Successfully.');
            $this->set_logs($this->session->gets('adminuser_id'), 'jobs', 'editPage' . implode('~', $_POST), 'error_logs', 'Update Pages', 'ACTS');
        } else {
            $this->session->sets('error_msg', 'Not Updated.');
            $this->set_logs($this->session->gets('adminuser_id'), 'jobs', 'updatePage' . implode('~', $_POST), 'error_logs', 'Update Pages', 'ERR');
        }

        $this->redirect('jobs'); 
    } catch (Exception $e) {
        $this->set_logs($this->session->gets('adminuser_id'), 'jobs', 'updatePage', 'error_logs', $e->getMessage(), 'ERR');
    }  
}

	  	public function deletePage() {
	    	try{
	      		if(!empty($_POST)) {
	      		
	        		$result = $this->model->deletePage($_POST);
	        		
	        		if($result) {
		          		$this->session->sets('success_msg','jobs Deleted Successfully.');
		          		$this->set_logs($this->session->gets('adminuser_id'),'jobs','deletePage'.implode('~',$_POST),'error_logs','Delete Pages','ACTS');
			        } else {
			          	$this->session->sets('error_msg','jobs not Deleteddd.');
			          	$this->set_logs($this->session->gets('user_id'),'jobs','deletePage'.implode('~',$_POST),'error_logs','Page not Deleted','ACTS');    
		        	}                
		      	}else {
		        	$this->session->sets('error_msg','jobs not Deleted.');
		        	$this->set_logs($this->session->gets('user_id'),'jobs','deletePage'.implode('~',$_POST),'error_logs','Page not Deleted','ACTS');  
		      	}
	    	} catch(Exception $e)  {
	      		$data = implode('~',$_POST);
	      		$this->set_logs($this->session->gets('user_id'),'jobs','deletePage'.$data,'error_logs',$e->getMessage(),'ERR');
	    	}
	  	}

	  	
	  		public function editbanner(){
			    try {

	  			if(!empty($_FILES['banner_image']['name'])){
			        $filedir = FRONTUPLOADPATH."banners/";
			        $randName = rand(10101010, 9090909090);
			        $filename = $_FILES['banner_image']['name'];
			        $filename = explode(".",$filename);
			        $newName = $filename[0].'_' . $randName; 
			        $ext = substr($_FILES['banner_image']['name'], strrpos($_FILES['banner_image']['name'], '.') + 1);

			        $this->ImageUpload->File = $_FILES['banner_image'];
			      
			        $this->ImageUpload->method = 1;
			        $this->ImageUpload->SavePath = $filedir;
			        $this->ImageUpload->NewName = $newName;
			        $this->ImageUpload->OverWrite = true;
			        $err = $this->ImageUpload->UploadFile(); 
			        $_POST['banner_image'] = $newName.".".strtolower($ext);                  
			    }else {$_POST['banner_image'] = $_POST['banner_image_old'];}
								    

				    $result = $this->model->updatePage($_POST);
			       
			        if ($result) {
			            $this->session->sets('success_msg', 'Updated Successfully.');
			            $this->set_logs($this->session->gets('adminuser_id'), 'jobs', 'editPage' . implode('~', $_POST), 'error_logs', 'Update Pages', 'ACTS');
			        } else {
			            $this->session->sets('error_msg', 'Not Updated.');
			            $this->set_logs($this->session->gets('adminuser_id'), 'jobs', 'updatePage' . implode('~', $_POST), 'error_logs', 'Update Pages', 'ERR');
			        }

			        $this->redirect('jobs'); 
			    } catch (Exception $e) {
			        $this->set_logs($this->session->gets('adminuser_id'), 'jobs', 'updatePage', 'error_logs', $e->getMessage(), 'ERR');
			    }  
			}


	}