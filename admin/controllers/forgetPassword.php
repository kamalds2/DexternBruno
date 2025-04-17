<?php
/*
* This is index controler 
* PHP version 5
* @category   Forgetpassword
* @package    Forgetpassword
* Default controller 
*/
class Forgetpassword extends Controller {
  /*
  * Constructor
  */
  public function __construct() {
    parent::__construct();
    $this->LoadHelper('Email');
  }    
  /**
  * index()
  * loading login page
  * @access public
  */
  public function index() {
    $this->view->LoadView('forgetpassword');
  }    
  /** * checkEmail check email existing or not   */

  public function checkEmail() {
    $result = $this->model->checkEmail($_POST);
    if($result) {
      echo "true";           
    } else {
      echo "false";
    }
  }
   
  public function forgetPassword($details = NULL){
    if(!empty($details)){        
      $email = $details['0'];
      $token = $details['1'];
      $user_details = $this->model->getUsername($email);          
      $user_id=$user_details['user_id'];              
      $verifytoken = $this->model->verifyToken($user_id,$token);       
      $validtoken = $this->model->validToken($user_id,$token);            
      if($user_details['user_id']!='' && $verifytoken['token_id']!='') {                               
        $this->view->users_id = $user_id;                                   
        $this->view->user_email = $email;
        $this->view->user_token = $token;  
        $this->view->valid_token= $validtoken['valid_token'];
        $this->view->layout = 'forgotPassword'; 
        $this->view->LoadView('forgotPassword');                    
      } else{
        $this->view->layout = 'index';
        $this->view->LoadView('index');
      }                    
    } 
  }
  public function resetPassword() {
    try{            
      $result = $this->model->resetPassword($_POST);  
      if($result) {
        $this->session->sets('success_msg','Password Reset Successfully, Please Login Once again');
        $this->set_logs($_POST['users_id'],'forgetpassword','createPassword'.implode('~', $_POST),'error_logs','updatePassword','ACTS');
      } else {
        $this->session->sets('error_msg','Password is not reset.');
        $this->set_logs($_POST['users_id'],'forgetpassword','createPassword'.implode('~', $_POST),'error_logs','updatePassword not','ERR');
      }
      $this->redirect('forgetpassword/forgotPasswordSuccess/');      
    }catch (Exception $e) {
      $this->set_logs($_POST['users_id'],'Users','createPassword','error_logs',$e->getMessage(),'ERR');
    } 
  }

  public function forgotPasswordSuccess(){   
        $this->view->layout = 'forgotPasswordSuccess'; 
        $this->view->LoadView('forgotPasswordSuccess');
  }


}
/* End of file Forgetpassword.php */
/* Location: ./application/controllers/Forgetpassword.php */
?>