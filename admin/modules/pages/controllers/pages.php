<?php

	class pages extends Controller {

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
      			$this->view->LoadView('managePages', 'pages');
		    }          
		    catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'pages','index','error_logs',$e->getMessage(),'ERR');
		    }         
	  	}	  	

	  	public function editPage($page_id){
	  		try{	  
	  			$result = $this->model->getPageDetails($page_id); 
	  			// var_dump($result);die();
	  			$this->view->pages = $result->pages;
				
	  			$this->set_logs($this->session->gets('adminuser_id'),'pages','editPage'.$page_id,'error_logs','Edit Pages','ACTS');
	  			$this->view->LoadView('editPage', 'pages');
		      	
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'pages','editPage','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}

	  	public function addPage(){
	  		try{ 
	  			$this->set_logs($this->session->gets('adminuser_id'),'pages','addPage','error_logs','Add Pages','ACTS');
		      	$this->view->LoadView('addPage', 'pages');
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'pages','updatePage','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}
	  	
	  	public function fileupload(){  
            if ($_FILES['file']['name']) { 
		        $filedir = FRONTUPLOADPATH."/pages";
		        $randName = rand(10101010, 9090909090);
		        $filename = $_FILES['file']['name'];
		        $filename = explode(".",$filename);
		        $newName = $filename[0].'_' . $randName; 
		        $ext = substr($_FILES['file']['name'], strrpos($_FILES['file']['name'], '.') + 1);
		        $this->ImageUpload->File = $_FILES['file'];
		        $this->ImageUpload->method = 1;
		        $this->ImageUpload->SavePath = $filedir;
		        $this->ImageUpload->NewName = $newName;
		        $this->ImageUpload->OverWrite = true;
		        $err = $this->ImageUpload->UploadFile(); 
		        $filename = $newName.".".strtolower($ext); 
		        echo FRONTUPLOADURL.'pages/'.$filename; //change this URL                 
		    } 
        
        }
	  	public function createPage(){
	  		try{ 
	  			  if(!empty($_FILES['banner_image']['name'])){
			        $filedir = FRONTUPLOADPATH."pages/";
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
			    }else $_POST['banner_image'] = '';  
	  			$result = $this->model->createPage($_POST);
		      	if($result) {
		        	$this->session->sets('success_msg','Added Successfully.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'pages','createPage'.implode('~',$_POST),'error_logs','Add Pages','ACTS');
		        	
		      	} else {
		      		$this->session->sets('error_msg','Not Added.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'pages','createPage'.implode('~', $_POST),'error_logs','Add Pages','ERR');
		        	// echo "1";
		      	}
		      	$this->redirect('pages'); 
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'pages','createPage','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}

	  	public function updatePage(){
	  		try{
	  			if(!empty($_FILES['banner_image']['name'])){
			        $filedir = FRONTUPLOADPATH."pages/";
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
			    }else $_POST['banner_image'] = $_POST['banner_image_old'];  
	  			 
	  			$result = $this->model->updatePage($_POST);
		      	if($result) {
		        	$this->session->sets('success_msg','Updated Successfully.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'pages','editPage'.implode('~',$_POST),'error_logs','Update Pages','ACTS');
		        	
		      	} else {
		      		$this->session->sets('error_msg','Not Updated.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'pages','updatePage'.implode('~', $_POST),'error_logs','Update Pages','ERR');
		        	// echo "1";
		      	}
		      	$this->redirect('pages'); 
		      	// $this->redirect('pages/editPage/'.$_POST['page_id']); 
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'pages','updatePage','error_logs',$e->getMessage(),'ERR');
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