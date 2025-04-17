<?php

 	class testimonials extends Controller{

 		public function __construct(){
 			parent::__construct();
 			if(!$this->session->gets('adminuser_id')){
 				$this->redirect('index');
 			}

 			$this->LoadHelper('VedioUpload');
 		}


 		public function index(){
 			try{  

 				$this->view->testimonialsList = $this->model->getAllTestimonials();


 				$this->set_logs($this->session->gets('adminuser_id'),'testimonials','index','error_logs','Testimonials','ACTS');
 				$this->view->LoadView('manageTestimonials','testimonials');
 			}catch(Exception $e){
 				$this->set_logs($this->session->gets('adminuser_id'),'testimonials','index','error_logs',$e->getMessage(),'ERR');
 			}
 		}

 		public function addTestimonial(){
 			try{ 
	  		$this->set_logs($this->session->gets('adminuser_id'),'testimonials','addTestimonial','error_logs','Add Testimonials','ACTS');
		     $this->view->LoadView('addTestimonial', 'testimonials');
  		}
  		catch (Exception $e) {
	      $this->set_logs($this->session->gets('adminuser_id'),'testimonials','addTestimonial','error_logs',$e->getMessage(),'ERR');
	    }  
 		}

 		public function videoDetailsVerification(){
	    $video_url = $_POST['video_url'];
	    $y = explode('=',$video_url);
	    $url = $y[0];
	    if($url=='https://www.youtube.com/watch?v'){
	      echo "true";

	    }
	    else {
	      echo "false";
	    }
  	}

 		public function addTestimonialDetails(){
    try {
        // Handle video upload

        if (!empty($_FILES['testimonial_name']['name'])) {
            $this->VedioUpload->File = $_FILES['testimonial_name'];
            $this->VedioUpload->SavePath = FRONTUPLOADPATH."testimonials/";
           $this->VedioUpload->NewName = $this->VedioUpload->File['name'];


            $uploadErrors = $this->VedioUpload->UploadFile();

            if (!empty($uploadErrors)) {

                $errorMessage = implode(', ', $uploadErrors);
                $this->session->sets('error_msg', $errorMessage);
                $this->redirect('testimonials');
                return;
            } else {

                $uploadedVideoName = $this->VedioUpload->NewName . '.' . pathinfo($this->VedioUpload->File['name'], PATHINFO_EXTENSION);
                $_POST['testimonial_name'] = $uploadedVideoName;
            }
        } else {
            $_POST['testimonial_name'] = ''; 
        }
      
		        $result = $this->model->addTestimonialDetails($_POST);
		        if ($result) {
		            $this->session->sets('success_msg', 'Added Successfully.');
		            $this->set_logs($this->session->gets('adminuser_id'), 'testimonials', 'addTestimonial' . implode('~', $_POST), 'error_logs', 'Testimonials-add', 'ACTS');
		        } else {
		            $this->session->sets('error_msg', 'Not Added.');
		            $this->set_logs($this->session->gets('adminuser_id'), 'testimonials', 'addTestimonialDetails' . implode('~', $_POST), 'error_logs', 'Testimonials not Added', 'ERR');
		        }
		        $this->redirect('testimonials');
		    } catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'), 'testimonials', 'addTestimonialDetails', 'error_logs', $e->getMessage(), 'ERR');
		    }
		}

	  public function editTestimonial($testimonial_id){
	  		try{ 
	  			$result = $this->model->getTestimonialDetails($testimonial_id);
	  			$this->view->testimonials = $result->testimonials;  
	  			$this->set_logs($this->session->gets('adminuser_id'),'testimonials','editTestimonial'.$testimonial_id,'error_logs','Edit Testimonial','ACTS');
	  			$this->view->LoadView('editTestimonial', 'testimonials');
		      	
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'testimonials','editTestimonial','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}

	  	

	  	
	  	public function updateTestimonialDetails(){
	  		try{	  			


	  			if (!empty($_FILES['testimonial_name']['name'])) {
            $this->VedioUpload->File = $_FILES['testimonial_name'];
            $this->VedioUpload->SavePath = FRONTUPLOADPATH."testimonials/";
            $this->VedioUpload->NewName = $this->VedioUpload->File['name'];
            $uploadErrors = $this->VedioUpload->UploadFile();

			            if (!empty($uploadErrors)) {
			                $errorMessage = implode(', ', $uploadErrors);
			                $this->session->sets('error_msg', $errorMessage);
			                $this->redirect('testimonials');
			                return;
			            } else {
			                $uploadedVideoName = $this->VedioUpload->NewName . '.' . pathinfo($this->VedioUpload->File['name'], PATHINFO_EXTENSION);
			                $_POST['testimonial_name'] = $uploadedVideoName;
					            }
		        } else {
		        	
		            $_POST['testimonial_name'] = $_POST['testimonial_name_old']; 
		        }
				
		        
	  			$result = $this->model->updateTestimonialDetails($_POST);
		      	if($result) {
		        	$this->session->sets('success_msg','Updated Successfully.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'testimonials','updateTestimonialDetails'.implode('~', $_POST),'error_logs','Testimonial Updated','ACTS');
		      	} else {
		      		$this->session->sets('error_msg','Not Updated.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'testimonials','updateTestimonialDetails'.implode('~', $_POST),'error_logs','Testimonial Not Updated','ERR');
		        	// echo "1";
		      	}
		      	$this->redirect('testimonials'); 
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'testimonials','updateTestimonialDetails','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}

	  	public function deleteTestimonial() {
	    	try{
	      		if(!empty($_POST)) {
	        		$result = $this->model->deleteTestimonial($_POST);
	        		if($result) {
		          		$this->session->sets('success_msg','Testimonial Deleted Successfully.');
		          		$this->set_logs($this->session->gets('adminuser_id'),'testimonials','deleteTestimonial'.implode('~', $_POST),'error_logs','Delete SLider','ACTS');
			        } else {
			          	$this->set_logs($this->session->gets('user_id'),'testimonials','deleteTestimonial','error_logs','Testimonial not Deleted','ACTS');    
			          	$this->session->sets('error_msg','Testimonials not Deleted.');
		        	}                
		      	}else {
		        	$this->session->sets('error_msg','Testimonials not Deleted.');
		      	}
	    	} catch(Exception $e)  {
	      		$data = implode('~',$_POST);
	      		$this->set_logs($this->session->gets('user_id'),'testimonials','deleteTestimonial'.$data,'error_logs',$e->getMessage(),'ERR');
	    	}
	  	}

















 	}