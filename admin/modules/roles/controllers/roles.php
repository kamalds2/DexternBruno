<?php
	
	class roles extends Controller {
		/** * Constructor */
	  	public function __construct() {
	    	parent::__construct();	
	    	if(!$this->session->gets('adminuser_id')){
	    		$this->redirect ('index');
	    	}    
	  	}

	  	public function index() { 
		    try{
		      	$this->view->rolesList = $this->model->getAllRoles();
		      	$this->set_logs($this->session->gets('adminuser_id'),'roles','index','error_logs','Roles','ACTS');
      			$this->view->LoadView('manageRoles', 'roles');
		    }          
		    catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'roles','index','error_logs',$e->getMessage(),'ERR');
		    }         
	  	}

	  	public function addRole(){
	  		try{ 
	  			$roles = $this->model->getRoles(); 
	  			$this->view->rolesList = $roles->roles; 
	  			$this->set_logs($this->session->gets('adminuser_id'),'roles','addRole','error_logs','Roles','ACTS');
		      	$this->view->LoadView('addRole', 'roles');
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'roles','addRole','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}

	  	public function addRoleDetails(){
	  		try{ 
	  			$result = $this->model->addRoleDetails($_POST);
		      	if($result) {
		        	$this->session->sets('success_msg','Added Successfully.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'roles','addRoleDetails'.implode('~', $_POST),'error_logs','Admin Role not Added','ACTS');
		      	} else {
		      		$this->session->sets('error_msg','Not Added.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'roles','addRoleDetails'.implode('~', $_POST),'error_logs','Admin Role not Added','ERR');
		        	// echo "1";
		      	}
		      	$this->redirect('roles'); 
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'roles','createRole','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}


		public function checkRoleName() {
		    try{
		      	$result = $this->model->checkRoleName($_POST);
		      	
		      	if ($result > 0) echo json_encode(false);
		      	else echo json_encode(true);
		    }catch (Exception $e) {
		      $this->set_logs($this->session->gets('adminuser_id'),'roles','checkRoleName'.implode('~', $_POST),'error_logs',$e->getMessage(),'ERR');
		    }
		}  


	  	public function editRole($role_id){
	  		try{	  
	  			$result = $this->model->getRoleDetails($role_id); 
	  			$this->view->roles = $result->roles;
	  			$roles = $this->model->getRoles(); 
	  			$this->view->rolesList = $roles->roles; 
	  			$this->set_logs($this->session->gets('adminuser_id'),'roles','editRole'.$role_id,'error_logs','Adminrole-edit','ACTS');
	  			$this->view->LoadView('editRole', 'roles');
		      	 
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'roles','editRole','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}

	  	public function updateRole(){
	  		try{   
	  			$result = $this->model->updateRole($_POST); 
		      	if($result->status == 200) {
		        	$this->session->sets('success_msg','Updated Successfully.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'roles','updateRole'.implode('~', $_POST),'error_logs','Admin role updated','ACTS');
		        	
		      	} else {
		      		$this->session->sets('error_msg','Not Updated.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'roles','updateRole'.implode('~', $_POST),'error_logs','Admin Role not updated','ERR');
		        	// echo "1";
		      	}
		      	$this->redirect('roles'); 
	  		}
	  		catch (Exception $e) {
		        $this->set_logs($this->session->gets('adminuser_id'),'roles','updateRole','error_logs',$e->getMessage(),'ERR');
		    }  
	  	}

	  	public function privileges($role_id) {
		    try{

		      	$modulesList = $this->model->getModules();
		      	$this->view->privilegesList = $this->model->getPrivileges($role_id);  
		      	$this->view->role_id = $role_id;
		      	$modules = array();
		      	foreach ($modulesList->modules as $key => $value) {
		        	$modules[$value->parent_id][] = $value;
		      	}
		      	
		      	$this->view->modulesList = $modules;  
		      	$this->set_logs($this->session->gets('adminuser_id'),'roles','privileges'.$role_id,'error_logs','Role Privileges','ACTS');
		      	$this->view->LoadView('managePrivileges', 'roles');
		    }catch (Exception $e) {
		      $this->set_logs($this->session->gets('adminuser_id'),'roles','index','error_logs',$e->getMessage(),'ERR');
		    }
		}

		public function accessPages() {
		    try{ 
		      	$res = $this->model->accessPages($_POST); 
		      	if($res) {
		        	echo ($_POST['status'] == 'y') ? '1': '0';
		        	$this->session->sets('success_msg','Updated Successfully.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'roles','accessPages','error_logs','Adminrole-Access','ACTS');
		      	}
		      	else {
		      		$this->session->sets('error_msg','Not Updated.');
		        	$this->set_logs($this->session->gets('adminuser_id'),'roles','accessPages','error_logs','Admin Role not access','ERR');       
		      	}   exit();   
		    }catch (Exception $e) {
		      	$this->set_logs($this->session->gets('adminuser_id'),'roles','accessPages','error_logs',$e->getMessage(),'ERR');
		    }
		}









	}







?>