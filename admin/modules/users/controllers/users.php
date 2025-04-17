<?php 
	
	class users extends Controller {
		/** * Constructor */
	  	public function __construct() {
	    	parent::__construct();	
	    	if(!$this->session->gets('adminuser_id')){
	    		$this->redirect ('index');
	    	}    
	  	}

	  	public function index() {
		    try{
		      	$this->view->usersList = $this->model->getAllUsers();
		      	$this->set_logs($this->session->gets('adminuser_id'),'users','index','error_logs','users','ACTS');
      			$this->view->LoadView('manageUsers', 'users');
		    }          
		    catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'users','index','error_logs',$e->getMessage(),'ERR');
		    }         
	  	}

	  	public function addUser(){
	  		try{ 
	  			$roles = $this->model->getRoles(); 
	  			$this->set_logs($this->session->gets('adminuser_id'),'users','addUser','error_logs','Admin user-add','ACTS');
	  			$this->view->rolesList = $roles->roles; 
		      $this->view->LoadView('addUser', 'users');
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'users','addUser','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}

	  	public function createUser(){
	  		try{ 
	  			$result = $this->model->createUser($_POST);
		      	if($result) {
		        	$this->session->sets('success_msg','Added Successfully.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'users','createUser'.implode('~', $_POST),'error_logs','Admin User  created','ERR');
		        	
		      	} else {
		      		$this->session->sets('error_msg','Not Added.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'users','createUser'.implode('~', $_POST),'error_logs','Admin User not created','ERR');
		        	// echo "1";
		      	}
		      	$this->redirect('users'); 
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'users','createUser','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}

	  	public function editUser($user_id){
	  		try{	  
	  			$result = $this->model->getUserDetails($user_id); 
	  			$this->view->users = $result->users;
	  			$roles = $this->model->getRoles(); 
	  			$this->view->rolesList = $roles->roles; 
	  			$this->set_logs($this->session->gets('adminuser_id'),'users','editUser'.implode('~', $_POST),'error_logs','Admin user - add','ACTS');
	  			$this->view->LoadView('editUser', 'users');
		      	 
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'users','editUser','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}

	  	public function updateUser(){
	  		try{  
	  			$result = $this->model->updateUser($_POST); 
		      	if($result->status == 200) {
		        	$this->session->sets('success_msg','Updated Successfully.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'users','updateUser'.implode('~', $_POST),'error_logs','Admin user-updated','ACTS');
		        	
		      	} else {
		      		$this->session->sets('error_msg','Not Updated.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'users','updateUser'.implode('~', $_POST),'error_logs','Admin User not updated','ERR');
		        	// echo "1";
		      	}
		      	$this->redirect('users'); 
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'users','updateUser','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}

	  	public function myProfile() {
		    try{   
		    	$user_id = $this->session->gets('adminuser_id');   
		      	$this->view->profileDetails = $this->model->getUserDetails($user_id); 
		      	$roles = $this->model->getRoles(); 
	  			$this->view->rolesList = $roles->roles; 
	  			$this->set_logs($this->session->gets('adminuser_id'),'users','myProfile'.implode('~', $_POST),'error_logs','Profile Edit','ACTS'); 
		      	$this->view->LoadView('myProfile','users');
		    }catch (Exception $e) {
		      $this->set_logs($this->session->gets('adminuser_id'),'Users','myProfile','error_logs',$e->getMessage(),'ERR');
		    } 
		}

		public function updateProfileDetails(){ 
	  		try{ 
	  			$result = $this->model->updateProfileDetails($_POST); 
		      	if($result->status == 200) {
		        	$this->session->sets('success_msg','Updated Successfully.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'users','updateProfileDetails'.implode('~', $_POST),'error_logs',' Profile updated','ACTS');
		        	
		      	} else {
		      		$this->session->sets('error_msg','Not Updated.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'users','updateUser'.implode('~', $_POST),'error_logs','Profile not Updated','ERR');
		        	// echo "1";
		      	}
		      	// $this->redirect('users/myProfile'); 
		      	$this->redirect('login'); 
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'users','updateUser','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}

	  	public function changePassword(){
	  		try{
	  			$this->set_logs($this->session->gets('adminuser_id'),'users','changePassword'.implode('~', $_POST),'error_logs',' change Password','ACTS');
	  			$this->view->LoadView('changePassword','users');
	  		}catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'users','changePassword','error_logs',$e->getMessage(),'ERR');
		    }  
	  	} 

	  	public function checkUserPassword(){
	  		try{  
	  			$result = $this->model->checkUserPassword($_POST); 
	  			if ($result->check > 0) echo json_encode(true);
		      	else echo json_encode(false); exit();
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'users','checkUserPassword','error_logs',$e->getMessage(),'ERR');
		    } 
	  	}

	  	public function updatePassword() {
		    try{            
		    // var_dump($_POST);die(); 
		      	$result = $this->model->updatePassword($_POST); 
		      	if($result->status == "200") {
		        	$this->session->sets('success_msg','Password Changed Successfully.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'users','updatePassword'.implode('~', $_POST),'error_logs','Update Password','ACTS');
		      	} 
		       	else {
		        	$this->session->sets('error_msg','Password is not changed.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'users','updatePassword'.implode('~', $_POST),'error_logs','Update Password not changed','ERR');
		      	}
		      	$this->redirect('users/changePassword');
		    }catch (Exception $e) {
		      $this->set_logs($this->session->gets('adminuser_id'),'Users','updatePassword','error_logs',$e->getMessage(),'ERR');
		    } 
		}

		public function deleteUser(){
			try{
				$result = $this->model->deleteUser($_POST); 

		      	if($result->status == "200") {
		        	$this->session->sets('success_msg','Deleted Successfully.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'users','deleteUser'.implode('~', $_POST),'error_logs','Update Password','ACTS');
		        	echo '1';
		      	} 
		       	else {
		        	$this->session->sets('error_msg','User not Deleted.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'users','deleteUser'.implode('~', $_POST),'error_logs','User not Deleted','ERR');
		        	echo '0';
		      	} 
			}catch (Exception $e) {
		      $this->set_logs($this->session->gets('adminuser_id'),'users','deleteUser','error_logs',$e->getMessage(),'ERR');
		    } 
		}


		public function checkEmail() {
		    try{
		      	$result = $this->model->checkEmail($_POST); 
		      	if ($result->check > 0) echo json_encode(false);
		      	else echo json_encode(true);
		    }catch (Exception $e) {
		      $this->set_logs($this->session->gets('adminuser_id'),'users','checkEmail'.implode('~', $_POST),'error_logs',$e->getMessage(),'ERR');
		    }
		}  


		public function checkEditEmail() {
		    try{
		      	$result = $this->model->checkEditEmail($_POST); 
		      	if ($result->check > 0) echo json_encode(false);
		      	else echo json_encode(true);
		    }catch (Exception $e) {
		      $this->set_logs($this->session->gets('adminuser_id'),'users','checkEditEmail'.implode('~', $_POST),'error_logs',$e->getMessage(),'ERR');
		    }
		}  








	}







?>