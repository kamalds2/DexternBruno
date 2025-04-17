<?php
/*
* To change this template, choose Tools | Templates
* and open the template in the editor.
*/
class Forgetpassword_model extends Model {
  /*
  * construct
  */
  public function __construct() {
    parent::__construct();
  }  
   
  public function checkEmail($data){
    $result = $this->db->findAll('SELECT email FROM '.DB_PREFIX.'users WHERE user_email = "'.$data['email'].'" ');
    return $result;
  }  
   
  public function getUserDetails($email){
    return $this->db->find("SELECT * FROM ".DB_PREFIX."users WHERE user_email = '".$email."' ");
  }  
   
  public function updateForgotPassword($value,$userId){
    return $this->db->query("UPDATE ".DB_PREFIX."users  SET user_password = AES_ENCRYPT('".$value['password']."','".PASSKEY."') WHERE user_id = $userId");
  }


  public function getUsername($email) {
    $sql = "SELECT * FROM tbl_users WHERE user_email='".$email."'";    
    return $this->db->find($sql);    
  } 

  public function verifyToken($user_id,$token) {
    $sql = "SELECT * FROM tbl_forgottoken WHERE user_id='".$user_id."' and token='".$token."' ";    
    return $this->db->find($sql);    
  } 
  public function validToken($user_id,$token) {
    $today =  date('Y-m-d');
    $sql = "SELECT count(token_id) as valid_token FROM tbl_forgottoken WHERE user_id='".$user_id."' and token='".$token."' and date(created_date)='".$today."' and status='0'";   
    return $this->db->find($sql);    
  } 
  public function resetPassword($data) {
    $data['ch_user_id'] = $data['users_id'];
    $data['pass_key'] = PASSKEY;
    $data['modified_by'] = $data['users_id'];
    $data['modified_date'] = date('Y-m-d H:i:s');
    $url = RESTURL."users/updatepassword";
    $result = $this->CallAPI("POST",$url, $data);
    if($result){
      $dataIn = array();
      $dataIn['status'] = 1; 
      $where = array();
      $where['user_id'] = $data['users_id']; 
      $where['token'] = $data['user_token']; 
      $tokens=$data['user_token'];       
      $result1 =$this->db->update('tbl_forgottoken', $dataIn, "token = '$tokens'");    
    }
    return $result1;
  }
  
}
?>