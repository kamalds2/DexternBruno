<?php

	class sliders extends Controller {

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
		      	$this->view->slidersList = $this->model->getAllSliders();
		      	$this->set_logs($this->session->gets('adminuser_id'),'sliders','index','error_logs','Sliders','ACTS');
      			$this->view->LoadView('manageSliders', 'sliders');
		    }          
		    catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'sliders','index','error_logs',$e->getMessage(),'ERR');
		    }         
	  	}	  	


	  	public function addSlider(){
	  		try{ 
	  			$this->set_logs($this->session->gets('adminuser_id'),'sliders','addSlider','error_logs','Add Slider','ACTS');
		      	$this->view->LoadView('addSlider', 'sliders');
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'sliders','addSlider','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}

	  	public function createSlider(){
	  		try{ 
	  			if(!empty($_FILES['slider_image']['name'])){
			        $filedir = FRONTUPLOADPATH."sliders/";
			        $randName = rand(10101010, 9090909090);
			        $filename = $_FILES['slider_image']['name'];
			        $filename = explode(".",$filename);
			        $newName = $filename[0].'_' . $randName; 
			        $ext = substr($_FILES['slider_image']['name'], strrpos($_FILES['slider_image']['name'], '.') + 1);
			        $this->ImageUpload->File = $_FILES['slider_image'];
			        $this->ImageUpload->method = 1;
			        $this->ImageUpload->SavePath = $filedir;
			        $this->ImageUpload->NewName = $newName;
			        $this->ImageUpload->OverWrite = true;
			        $err = $this->ImageUpload->UploadFile(); 
			        $_POST['slider_image'] = $newName.".".strtolower($ext);                  
			    }else $_POST['slider_image'] = ''; 
	  			$result = $this->model->createSlider($_POST);
		      	if($result) {
		        	$this->session->sets('success_msg','Added Successfully.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'sliders','addSlider'.implode('~', $_POST),'error_logs','Sliders-add','ACTS');
		        	
		      	} else {
		      		$this->session->sets('error_msg','Not Added.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'sliders','createSlider'.implode('~', $_POST),'error_logs','Sliders not Added','ERR');
		        	// echo "1";
		      	}
		      	$this->redirect('sliders'); 
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'sliders','createSlider','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}

	  	public function editSlider($slider_id){
	  		try{ 
	  			$result = $this->model->getSliderDetails($slider_id);
	  			$this->view->sliders = $result->sliders;  
	  			$this->set_logs($this->session->gets('adminuser_id'),'sliders','editSlider'.$slider_id,'error_logs','Edit Slider','ACTS');
	  			$this->view->LoadView('editSlider', 'sliders');
		      	
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'sliders','editSlider','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}
	  	
	  	public function updateSlider(){
	  		try{
	  			if(!empty($_FILES['slider_image']['name'])){
	          	 	$filedir = FRONTUPLOADPATH."sliders/";
			        $randName = rand(10101010, 9090909090);
			        $filename = $_FILES['slider_image']['name'];
			        $filename = explode(".",$filename);
			        $newName = $filename[0].'_' . $randName; 
			        $ext = substr($_FILES['slider_image']['name'], strrpos($_FILES['slider_image']['name'], '.') + 1);
			        $this->ImageUpload->File = $_FILES['slider_image'];
			        $this->ImageUpload->method = 1;
			        $this->ImageUpload->SavePath = $filedir;
			        $this->ImageUpload->NewName = $newName;
			        $this->ImageUpload->OverWrite = true;
			        $err = $this->ImageUpload->UploadFile(); 
			        $slider_image = $newName.".".strtolower($ext); 
	          		$_POST['slider_image'] = $slider_image;
		      	}else{
		        	$_POST['slider_image'] = $_POST['slider_image_old'];
		      	} 
	  			$result = $this->model->updateSlider($_POST);
		      	if($result) {
		        	$this->session->sets('success_msg','Updated Successfully.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'sliders','updateSlider'.implode('~', $_POST),'error_logs','Slider Updated','ACTS');
		      	} else {
		      		$this->session->sets('error_msg','Not Updated.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'sliders','updateSlider'.implode('~', $_POST),'error_logs','Slider Not Updated','ERR');
		        	// echo "1";
		      	}
		      	$this->redirect('sliders'); 
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'sliders','updateSlider','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}

	  	public function deleteSlider() {
	    	try{
	      		if(!empty($_POST)) {
	        		$result = $this->model->deleteSlider($_POST);
	        		if($result) {
		          		$this->session->sets('success_msg','Slider Deleted Successfully.');
		          		$this->set_logs($this->session->gets('adminuser_id'),'sliders','deleteSlider'.implode('~', $_POST),'error_logs','Delete SLider','ACTS');
			        } else {
			          	$this->set_logs($this->session->gets('user_id'),'sliders','deleteSlider','error_logs','Slider not Deleted','ACTS');    
			          	$this->session->sets('error_msg','Sliders not Deleted.');
		        	}                
		      	}else {
		        	$this->session->sets('error_msg','Sliders not Deleted.');
		      	}
	    	} catch(Exception $e)  {
	      		$data = implode('~',$_POST);
	      		$this->set_logs($this->session->gets('user_id'),'sliders','deleteSlider'.$data,'error_logs',$e->getMessage(),'ERR');
	    	}
	  	}

	}