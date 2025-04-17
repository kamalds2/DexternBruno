<?php

	class services extends Controller {

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
		      	$this->set_logs($this->session->gets('adminuser_id'),'pages','index','error_logs','Pages','ACTS');
      			$this->view->LoadView('manageServices', 'services');
		    }          
		    catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'pages','index','error_logs',$e->getMessage(),'ERR');
		    }         
	  	}	
	  	public function homeServices() { 
		    try{
		      	$this->view->serviceList = $this->model->getAllServices();
		      	$this->set_logs($this->session->gets('adminuser_id'),'pages','index','error_logs','Pages','ACTS');
		      	if($this->view->serviceList->message == "Success"){
      			$this->editHomePage();}
      			else{$this->addHomePage();}
		    }          
		    catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'pages','index','error_logs',$e->getMessage(),'ERR');
		    }         
	  	}	  	



	  	public function editPage($page_id){
	  		try{	  
	  			$result = $this->model->getPageDetails($page_id); 
	  			 $this->view->pages = $result->pages;
				
	  			$this->set_logs($this->session->gets('adminuser_id'),'pages','editPage'.$page_id,'error_logs','Edit Pages','ACTS');
	  			$this->view->LoadView('editService', 'services');
		      	
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'pages','editPage','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}
	  	 public function editHomePage(){
	  		try{	  
	  			$this->view->pagesList = $this->model->getAllPages();
	  				$this->view->serviceList = $this->model->getAllServices();
				
	  			$this->set_logs($this->session->gets('adminuser_id'),'pages','editPage'.$page_id,'error_logs','Edit Pages','ACTS');
	  			$this->view->LoadView('editHomeService', 'services');
		      	
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'pages','editPage','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}

	  	public function addPage(){
	  		try{ 

	  			$this->set_logs($this->session->gets('adminuser_id'),'pages','addPage','error_logs','Add Pages','ACTS');
		      	$this->view->LoadView('addService', 'services');
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'pages','updatePage','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}
	  	
	  	public function addHomePage(){
	  		try{ 
	  			$this->view->pagesList = $this->model->getAllPages();

	  			$this->set_logs($this->session->gets('adminuser_id'),'pages','addPage','error_logs','Add Pages','ACTS');
		      	$this->view->LoadView('addHomeService', 'services');
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'pages','updatePage','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}
	  
	  	public function createPage(){
	  		try{   
	  			  if(!empty($_FILES['service_image']['name'])){
			        $filedir = FRONTUPLOADPATH."pages/";
			        $randName = rand(10101010, 9090909090);
			        $filename = $_FILES['service_image']['name'];
			        $filename = explode(".",$filename);
			        $newName = $filename[0].'_' . $randName; 
			        $ext = substr($_FILES['service_image']['name'], strrpos($_FILES['service_image']['name'], '.') + 1);
			        $this->ImageUpload->File = $_FILES['service_image'];
			        $this->ImageUpload->method = 1;
			        $this->ImageUpload->SavePath = $filedir;
			        $this->ImageUpload->NewName = $newName;
			        $this->ImageUpload->OverWrite = true;
			        $err = $this->ImageUpload->UploadFile(); 
			        $_POST['service_image'] = $newName.".".strtolower($ext);                  
			    }else $_POST['service_image'] = ''; 
	  			$result = $this->model->createPage($_POST);
		      	if($result) {
		        	$this->session->sets('success_msg','Added Successfully.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'pages','createPage'.implode('~',$_POST),'error_logs','Add Pages','ACTS');
		        	
		      	} else {
		      		$this->session->sets('error_msg','Not Added.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'pages','createPage'.implode('~', $_POST),'error_logs','Add Pages','ERR');
		        	// echo "1";
		      	}
		      	$this->redirect('services'); 
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'pages','createPage','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}


	  	public function createHomePage(){
	  		try{  

	  	$result = $this->model->createHomePage($_POST);
		      	if($result) {
		        	$this->session->sets('success_msg','Added Successfully.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'pages','createPage'.implode('~',$_POST),'error_logs','Add Pages','ACTS');
		        	
		      	} else {
		      		$this->session->sets('error_msg','Not Added.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'pages','createPage'.implode('~', $_POST),'error_logs','Add Pages','ERR');
		        	// echo "1";
		      	}
		      	$this->redirect('services/homeServices'); 
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'pages','createPage','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}

	  	public function updatePage(){
			    try {
			      
			        if (!empty($_FILES['service_image']['name'])) {
			            $filedir = FRONTUPLOADPATH . "pages/";
			            $randName = rand(10101010, 9090909090);
			            $filename = $_FILES['service_image']['name'];
			            $filename = explode(".", $filename);
			            $newName = $filename[0] . '_' . $randName; 
			            $ext = substr($_FILES['service_image']['name'], strrpos($_FILES['service_image']['name'], '.') + 1);
			            $this->ImageUpload->File = $_FILES['service_image'];
			            $this->ImageUpload->method = 1;
			            $this->ImageUpload->SavePath = $filedir;
			            $this->ImageUpload->NewName = $newName;
			            $this->ImageUpload->OverWrite = true;
			            $err = $this->ImageUpload->UploadFile(); 
			            $_POST['service_image'] = $newName . "." . strtolower($ext);                  
			        } else {
			           
			            $_POST['service_image'] = $_POST['service_image_old']; 
			        }

			        
			        $result = $this->model->updatePage($_POST);

			       
			        if ($result) {
			            $this->session->sets('success_msg', 'Updated Successfully.');
			            $this->set_logs($this->session->gets('adminuser_id'), 'pages', 'editPage' . implode('~', $_POST), 'error_logs', 'Update Pages', 'ACTS');
			        } else {
			            $this->session->sets('error_msg', 'Not Updated.');
			            $this->set_logs($this->session->gets('adminuser_id'), 'pages', 'updatePage' . implode('~', $_POST), 'error_logs', 'Update Pages', 'ERR');
			        }

			        $this->redirect('services'); 
			    } catch (Exception $e) {
			        $this->set_logs($this->session->gets('adminuser_id'), 'pages', 'updatePage', 'error_logs', $e->getMessage(), 'ERR');
			    }  
			}
			public function updateHomePage(){
				    try {
				    
					 $result = $this->model->updateHomePage($_POST);

				       
				        if ($result) {
				            $this->session->sets('success_msg', 'Updated Successfully.');
				            $this->set_logs($this->session->gets('adminuser_id'), 'pages', 'editPage' . implode('~', $_POST), 'error_logs', 'Update Pages', 'ACTS');
				        } else {
				            $this->session->sets('error_msg', 'Not Updated.');
				            $this->set_logs($this->session->gets('adminuser_id'), 'pages', 'updatePage' . implode('~', $_POST), 'error_logs', 'Update Pages', 'ERR');
				        }

				        $this->redirect('services/homeServices'); 
				    } catch (Exception $e) {
				        $this->set_logs($this->session->gets('adminuser_id'), 'pages', 'updatePage', 'error_logs', $e->getMessage(), 'ERR');
				    }  
				}

	  	public function deletePage() {
	    	try{
	      		if(!empty($_POST)) {
	        		$result = $this->model->deletePage($_POST);
	        		if($result) {
		          		$this->session->sets('success_msg','Page Deleted Successfully.');
		          		$this->set_logs($this->session->gets('adminuser_id'),'pages','deletePage'.implode('~',$_POST),'error_logs','Delete Pages','ACTS');
			        } else {
			          	$this->session->sets('error_msg','Pages not Deleted.');
			          	$this->set_logs($this->session->gets('user_id'),'pages','deletePage'.implode('~',$_POST),'error_logs','Page not Deleted','ACTS');    
		        	}                
		      	}else {
		        	$this->session->sets('error_msg','Pages not Deleted.');
		        	$this->set_logs($this->session->gets('user_id'),'pages','deletePage'.implode('~',$_POST),'error_logs','Page not Deleted','ACTS');  
		      	}
	    	} catch(Exception $e)  {
	      		$data = implode('~',$_POST);
	      		$this->set_logs($this->session->gets('user_id'),'pages','deletePage'.$data,'error_logs',$e->getMessage(),'ERR');
	    	}
	  	}

	}