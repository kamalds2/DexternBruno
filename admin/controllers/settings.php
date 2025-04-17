<?php 

	class settings extends Controller{

		public function __construct() {
    		parent::__construct();
	    	if(!$this->session->gets('adminuser_id')){
	    		$this->redirect ('index');
	    	}	 
	    	
 			$this->LoadHelper('ImageUpload');    		  
	  	}  
	  	
		public function index(){
			$this->view->settings = $this->model->getSiteSettings();
			// var_dump($this->view->settings);die();
			$this->view->LoadView('settings');
		}

		public function updateSettingsDetails(){
			try{

	  			if(!empty($_FILES['logo']['name'])){  
			        $filedir = FRONTUPLOADPATH."settings/";			         
			        $randName = rand(10101010, 9090909090);
			        $filename = $_FILES['logo']['name'];
			        $filename = explode(".",$filename);
			        $newName = $filename[0].'_' . $randName; 
			        $ext = substr($_FILES['logo']['name'], strrpos($_FILES['logo']['name'], '.') + 1);
			        $this->ImageUpload->File = $_FILES['logo'];
			        $this->ImageUpload->method = 1;
			        $this->ImageUpload->SavePath = $filedir;
			        $this->ImageUpload->NewName = $newName;
			        $this->ImageUpload->OverWrite = true;
			        $err = $this->ImageUpload->UploadFile();  			         
			        $_POST['logo'] = $newName.".".strtolower($ext);              
			    }else {
			    	$_POST['logo'] = $_POST['logo_old'] ;
			    } 
			    if(!empty($_FILES['fav_icon']['name'])){
			        $filedir = FRONTUPLOADPATH."settings/";
			        $randName = rand(10101010, 9090909090);
			        $filename = $_FILES['fav_icon']['name'];
			        $filename = explode(".",$filename);
			        $newName = $filename[0].'_' . $randName; 
			        $ext = substr($_FILES['fav_icon']['name'], strrpos($_FILES['fav_icon']['name'], '.') + 1);
			        $this->ImageUpload->File = $_FILES['fav_icon'];
			        $this->ImageUpload->method = 1;
			        $this->ImageUpload->SavePath = $filedir;
			        $this->ImageUpload->NewName = $newName;
			        $this->ImageUpload->OverWrite = true;
			        $err = $this->ImageUpload->UploadFile();  
			        $_POST['fav_icon'] = $newName.".".strtolower($ext);                  
			    }else {
			    	$_POST['fav_icon'] = $_POST['fav_icon_old'] ;
			    }
			    if(!empty($_FILES['footer_logo']['name'])){ 
			        $filedir = FRONTUPLOADPATH."settings/";
			        $randName = rand(10101010, 9090909090);
			        $filename = $_FILES['footer_logo']['name'];
			        $filename = explode(".",$filename);
			        $newName = $filename[0].'_' . $randName; 
			        $ext = substr($_FILES['footer_logo']['name'], strrpos($_FILES['footer_logo']['name'], '.') + 1);
			        $this->ImageUpload->File = $_FILES['footer_logo'];
			        $this->ImageUpload->method = 1;
			        $this->ImageUpload->SavePath = $filedir;
			        $this->ImageUpload->NewName = $newName;
			        $this->ImageUpload->OverWrite = true;
			        $err = $this->ImageUpload->UploadFile();  
			        // echo $err;die();
			        $_POST['footer_logo'] = $newName.".".strtolower($ext); 
			    }else {
			    	$_POST['footer_logo'] = $_POST['footer_logo_old'] ;
			    } 	
	  			$result = $this->model->updateSettingsDetails($_POST);
		      	if($result->status = "200") {
		        	$this->session->sets('success_msg','Updated Successfully.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'packages','updateSettingsDetails'.implode('~', $_POST),'error_logs','Package Updated','ACTS');
		      	} else {
		      		$this->session->sets('error_msg','Not Updated.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'packages','updateSettingsDetails'.implode('~', $_POST),'error_logs','Package Not Updated','ERR');
		        	// echo "1";
		      	}
		      	$this->redirect('settings'); 
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'packages','updateSettingsDetails','error_logs',$e->getMessage(),'ERR');
		    }  
		}
	}