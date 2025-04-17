<?php
namespace App\Domain\Users;
use PDO;
/** 
* Repository.
*/
class UsersRepository
{ 
  /**
   * @var PDO The database connection
   */
  private $connection;
  /**  
   * Constructor.
   *
   * @param PDO $connection The database connection
   */
  public function __construct(PDO $connection)
  { 
    $this->connection = $connection;
  }
  /**
   * Get Users Roles rows.
   *
   * @return array 
   */ 
  
  public function checkLogin($data){ 
    try{
      extract($data);
      $sql = "CALL `check_login` ('".$user_name."','".$passwordEn."',@p2,@p3,@p4,@p5)";  
      $stmt = $this->connection->prepare($sql);  
      $stmt->execute();
      $users = $this->connection->query("SELECT @p2 AS `p_result`, @p3 AS `p_userid`, @p4 AS `p_role_id`, @p5 AS 'p_customer_id'")->fetch(PDO::FETCH_OBJ);
       // var_dump($users);die();
      if($users) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'users' => $users
        ); 
      }else{
        $status = array(
         'status' =>"204",
         'message' =>"Provided Password Wrong"
        );
      }
       return $status;exit;
    }catch(PDOException $e) {
      $status = array(
        'status' => "500",
        'message' => $e->getMessage()
      );
      return $status;
    }
  }

  public function getUsers($data){
    try{
      extract($data);       
      $sql = "SELECT user_id, first_name,last_name, user_email, user_status, role_id,getRole(role_id) as role_name, first_name, last_name  FROM ".DB_PREFIX."users  WHERE user_status != '9'  ORDER BY created_date DESC";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $users = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($users)){
        $status = array(
          "status" => "200",
          "message" => "Success",
          "users" => $users,
        );
      }else{
        $status = array(
          "status" => "204",
          "message" => "No Data"
        );
      }
      return $status;
    }catch(PDOException $e) {
      $status = array(
              'status' => "500",
              'message' => $e->getMessage()
          );
      return $status;
    }
  } 
   
  public function addUser($data){
    try{
      extract($data);
      $customer_id = 0;
      $passwordEn = $this->PassHash($user_password);
      if(!isset($user_photo)){
        $user_photo = '';
      }
      $sql = "CALL `add_user`(:role_id, :first_name, :last_name,:login_id, :user_password, :user_email, :user_status, :user_photo, :created_date, :created_by,:customer_id,@result, @user_id)";
      // echo "CALL `add_user`(".$role_id.", '".$first_name."', '".$last_name."','".$user_email."', '".$passwordEn."', '".$user_email."', '".$user_status."', '".$user_photo."', '".$created_date."', ".$created_by.",".$customer_id.",@result, @user_id)";die();
      $stmt = $this->connection->prepare($sql);  
      $user_photo = ''; 
      $stmt->bindParam(":role_id", $role_id); 
      $stmt->bindParam(":first_name", $first_name);
      $stmt->bindParam(":last_name", $last_name);
      $stmt->bindParam(":login_id", $user_email);
      $stmt->bindParam(":user_password", $passwordEn);
      $stmt->bindParam(":user_email", $user_email);
      $stmt->bindParam(":user_status", $user_status);
      $stmt->bindParam(":user_photo", $user_photo);
      $stmt->bindParam(":created_date", $created_date);
      $stmt->bindParam(":created_by", $created_by);
      $stmt->bindParam(":customer_id", $customer_id);
      $stmt->execute();
      $res = $this->connection->query("select @result as result")->fetch(PDO::FETCH_ASSOC);
      $id = $res['result'];
      $status = array(
        "status" => "200",
        "message" => "Success",
        "update_id" => $id
      );
      return $status;
    }catch(PDOException $e) {
      $status = array(
          'status' => "500",
          'message' => $e->getMessage()
      );
      return $status;
    }
  }

  public function editUser($data){
    try{
      extract($data);
       
      $sql = "UPDATE tbl_users set role_id = :role_id,first_name=:first_name,last_name=:last_name,user_email = :user_email, modified_date=:modified_date,modified_by=:modified_by WHERE user_id=:edit_user_id";
      $stmt = $this->connection->prepare($sql);  
      $stmt->bindParam(":role_id", $role_id);
      $stmt->bindParam(":first_name", $first_name);
      $stmt->bindParam(":last_name", $last_name);
      $stmt->bindParam(":user_email", $user_email); 
      $stmt->bindParam(":edit_user_id", $edit_user_id);
      $stmt->bindParam(":modified_date", $modified_date);
      $stmt->bindParam(":modified_by", $modified_by);
      $res = $stmt->execute();
       
      if($res){
        $status = array(
          "status" => "200",
          "message" => "Success",
          "id" => $edit_user_id
        );
      }else{
         $status = array(
          "status" => "204",
          "message" => "Not Updated",
          "id" => $id
        );
      }
      return $status;
    }catch(PDOException $e) {
      $status = array(
        'status' => "500",
        'message' => $e->getMessage()
      );
      return $status;
    }
  }

  public function updateProfileDetails($data){
    try{
      extract($data);
       
      $sql = "UPDATE tbl_users set  first_name=:first_name,last_name=:last_name, modified_date=:modified_date,modified_by=:modified_by WHERE user_id=:edit_user_id";
      $stmt = $this->connection->prepare($sql);  
      $stmt->bindParam(":first_name", $first_name);
      $stmt->bindParam(":last_name", $last_name); 
      $stmt->bindParam(":edit_user_id", $edit_user_id);
      $stmt->bindParam(":modified_date", $modified_date);
      $stmt->bindParam(":modified_by", $modified_by);
      $res = $stmt->execute();
       
      if($res){
        $status = array(
          "status" => "200",
          "message" => "Success",
          "id" => $edit_user_id
        );
      }else{
         $status = array(
          "status" => "204",
          "message" => "Not Updated",
          "id" => $id
        );
      }
      return $status;
    }catch(PDOException $e) {
      $status = array(
        'status' => "500",
        'message' => $e->getMessage()
      );
      return $status;
    }
  }

  public function deleteuser($data){
    try{
      extract($data);
        $sql = "UPDATE ".DB_PREFIX."users SET user_status='9',modified_date=:modified_date,modified_by = :modified_by WHERE user_id = :user_id";
        $stmt = $this->connection->prepare($sql);  
        $stmt->bindParam(":user_id", $user);
        $stmt->bindParam(":modified_date", $modified_date);
        $stmt->bindParam(":modified_by", $modified_by);
        $res = $stmt->execute();
        if($res){
          $status = array(
            "status" => "200",
            "message" => "Sucessfully Deleted"
          );
        }else{
           $status = array(
            "status" => "204",
            "message" => "Not Deleted"
          );
        }
        return $status;
       

    }catch(PDOException $e) {
      $status = array(
          'status' => "500",
          'message' => $e->getMessage()
      );
      return $status;
    }

  } 

  public function checkUserName($data){  
    extract($data); 
    try {
      $sql = "SELECT user_id FROM ".DB_PREFIX."users WHERE login_id=:user_name";
      $stmt = $this->connection->prepare($sql); 
      $stmt->bindParam(":user_name",$user_name);
      $stmt->execute();
      $users = $stmt->fetch(PDO::FETCH_OBJ);
      $check = (!empty($users)) ? 1 : 0;
      $status = array(
         'status' =>"200",
         'message' =>"Success",
         'check' => $check
      );
      return $status;
     
    }catch(PDOException $e) {
      $status = array(
          'status' => "500",
          'message' => $e->getMessage()
      );
      return $status;
    }
  }

  public function checkUserEmail($data){  
    extract($data); 
    try {
      $sql = "SELECT user_id FROM ".DB_PREFIX."users WHERE user_email='".$user_email."'";
      $stmt = $this->connection->prepare($sql); 
      $stmt->execute();
      $users = $stmt->fetch(PDO::FETCH_OBJ);
      $check = (!empty($users)) ? 1 : 0;
       $status = array(
         'status' =>"200",
         'message' =>"Success",
         'check' => $check);
      return $status;
     
    }catch(PDOException $e) {
      $status = array(
          'status' => "500",
          'message' => $e->getMessage()
      );
      return $status;
    }

  }

  public function getUserDetails($data){
    try{
      extract($data);
      $sql = "SELECT user_id, first_name,last_name, user_email, user_status, role_id, login_id, first_name, last_name,customer_id FROM ".DB_PREFIX."users WHERE user_id=:user_id";
      $stmt = $this->connection->prepare($sql);  
      $stmt->bindParam(":user_id", $user_id); 
      $stmt->execute();
      $users = $stmt->fetch(PDO::FETCH_OBJ);
      if(!empty($users)){
        $status = array(
          "status" => "200",
          "message" => "Success",
          "users" => $users
        );
      }else{
        $status = array(
          "status" => "204",
          "message" => "No Data"
        );
      }return $status;
    }catch(PDOException $e) {
      $status = array(
          'status' => "500",
          'message' => $e->getMessage()
      );
      return $status;
    }
  }

  public function checkPassword($data){
    try{
      extract($data);
      $passwordEn = $this->PassHash($old_password); 
      $sql = "SELECT user_id FROM ".DB_PREFIX."users WHERE user_id=:user_id AND user_password= :user_password";  
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":user_id", $ch_user_id); 
      $stmt->bindParam(":user_password", $passwordEn); 
      $stmt->execute();
      $users = $stmt->fetch(PDO::FETCH_OBJ); 
      // $check = (!empty($users)) ? 0 : 1;
      $check = (!empty($users)) ? 1 : 0;
      $status = array(
       'status' =>"200",
       'message' =>"Success",
       'check' => $check
      );
      return $status;
    }catch(PDOException $e) {
      $status = array(
          'status' => "500",
          'message' => $e->getMessage()
      );
      return $status;
    }
  }

  public function updatePassword($data){
    try{
      extract($data);
      $passwordEn = $this->PassHash($new_password); 
      $sql = "UPDATE ".DB_PREFIX."users SET user_password=:user_password,password_chg_date = :password_chg_date,modified_date=:modified_date,modified_by = :modified_by WHERE user_id=:user_id";
      $stmt = $this->connection->prepare($sql);  
      $stmt->bindParam(":user_id", $edit_user_id); 
      $stmt->bindParam(":user_password", $passwordEn); 
      $stmt->bindParam(":password_chg_date", $modified_date);
      $stmt->bindParam(":modified_date", $modified_date);
      $stmt->bindParam(":modified_by", $modified_by); 
      $res = $stmt->execute();
      if($res) {
        $sql = "SELECT user_id,user_name,user_email,user_status,role_id,login_id FROM ".DB_PREFIX."users WHERE user_id=:user_id";
        $stmt = $this->connection->prepare($sql);  
        $stmt->bindParam("user_id", $edit_user_id); 
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $status = array(
          "status" => "200",
          "message" => "Successfully Updated",
          "user" => $user
        );        
      }else{
         $status = array(
          "status" => "200",
          "message" => "No Data Updated"
        );
      }
      return $status;
    }catch(PDOException $e) {
      $status = array(
          'status' => "500",
          'message' => $e->getMessage()
      );
      return $status;
    }
  }

  public function getSiteUserDetails($data){
    try{
      extract($data);
      $sql = "SELECT user_id, user_name, user_email, user_status, getRole(role_id) as role_id, first_name, last_name  FROM ".DB_PREFIX."users
        WHERE user_status != '9' ORDER BY created_date DESC";
      $stmt = $this->connection->prepare($sql); 
      $stmt->execute();
      $users = $stmt->fetchAll(PDO::FETCH_OBJ);
      // var_dump($users);die();
      if(!empty($users)){
        $status = array(
          "status" => "200",
          "message" => "Success",
          "users" => $users
        );
      }else{
        $status = array(
          "status" => "204",
          "message" => "No Data"
        );
      }return $status;

    }catch(PDOException $e) {
      $status = array(
          'status' => "500",
          'message' => $e->getMessage()
      );
      return $status;
    }
  }
  
  
  public function getUserEmailDetails($data){
    try{
      extract($data);
      $sql = "SELECT * FROM ".DB_PREFIX."users WHERE user_email = '".$email."'";
      $stmt = $this->connection->prepare($sql); 
      $stmt->execute();
      $users = $stmt->fetch(PDO::FETCH_OBJ);
      // var_dump($users);die();
      if(!empty($users)){
        $status = array(
          "status" => "200",
          "message" => "Success",
          "users" => $users
        );
      }else{
        $status = array(
          "status" => "204",
          "message" => "No Data"
        );
      }return $status;

    }catch(PDOException $e) {
      $status = array(
          'status' => "500",
          'message' => $e->getMessage()
      );
      return $status;
    }
  }
  
  function PassHash($password = NULL) {
    if(isset($password)) {
      if($password != NULL) {
        return hash('sha256', $password);
      }else {
       return hash('sha256', $password);
      }
    }        
  }

  
  public function getSiteSettings($data){ 
    try{
      extract($data);

      $sql = "SELECT * FROM ".DB_PREFIX."settings where settings_id = 1";
      $stmt = $this->connection->prepare($sql);        
      $stmt->execute();
      $res = $stmt->fetch(PDO::FETCH_OBJ);

      if(!empty($res)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $res
        ); 
      }else{
        $status = array(
         'status' =>"204",
         'message' =>"No Data Found"
        );
      }
     return $status;exit;    

    }catch(PDOException $e) {
      $status = array(
        'status' => "500",
        'message' => $e->getMessage()
      );
      return $status;
    }
  }
  
  
  public function updateSettingsDetails($data){ 
    try{
      extract($data);  
      $sql = "UPDATE ".DB_PREFIX."settings SET 
      logo =:logo,
      fav_icon=:fav_icon,
      address=:address,
      email=:email,
      mobile_no=:mobile_no,
      toll_free_no=:toll_free_no,
      facebook_link=:facebook_link,
      instagram_link=:instagram_link,
      youtube_link=:youtube_link,
      twitter_link = :twitter_link,
      pininterest_link=:pininterest_link,
      business_timings=:business_timings,
      footer_logo = :footer_logo,
      contact_nos = :contact_nos,
      footer_address = :footer_address,
      modified_date=:modified_date,
      modified_by=:modified_by  
      where settings_id = :settings_id";
     
      $stmt = $this->connection->prepare($sql);   
      $stmt->bindParam(":logo", $logo); 
      $stmt->bindParam(":fav_icon", $fav_icon); 
      $stmt->bindParam(":address", $address);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":mobile_no", $mobile_no);
      $stmt->bindParam(":toll_free_no", $toll_free_no);
      $stmt->bindParam(":facebook_link", $facebook_link);
      $stmt->bindParam(":instagram_link", $instagram_link);
      $stmt->bindParam(":youtube_link", $youtube_link);
      $stmt->bindParam(":twitter_link", $twitter_link);
      $stmt->bindParam(":pininterest_link", $pininterest_link);
      $stmt->bindParam(":business_timings", $business_timings);
      $stmt->bindParam(":footer_logo", $footer_logo);
      $stmt->bindParam(":contact_nos", $contact_nos);
      $stmt->bindParam(":footer_address", $footer_address);
      $stmt->bindParam(":settings_id", $settings_id);

      $stmt->bindParam(":modified_date", $modified_date);
      $stmt->bindParam(":modified_by", $modified_by);       
      $res = $stmt->execute(); 

      if(($res)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $res
        ); 
      }else{
        $status = array(
         'status' =>"204",
         'message' =>"No Data Found"
        );
      }
     return $status;exit;    

    }catch(PDOException $e) {
      $status = array(
        'status' => "500",
        'message' => $e->getMessage()
      );
      return $status;
    }
  }


  public function checkEmail($data){
    try{
      extract($data); 
      $sql = "SELECT count(1) AS cnt FROM ".DB_PREFIX."users WHERE user_email = :user_email";  
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":user_email", $user_email);  
      $stmt->execute();
      $users = $stmt->fetch(PDO::FETCH_OBJ);  
      $check = ($users->cnt == 1) ? 1 : 0;
      $status = array(
       'status' =>"200",
       'message' =>"Success",
       'check' => $check
      );
      return $status;
    }catch(PDOException $e) {
      $status = array(
          'status' => "500",
          'message' => $e->getMessage()
      );
      return $status;
    }
  }
  
  public function checkEditEmail($data){
    try{
      extract($data); 
      $sql = "SELECT user_email FROM ".DB_PREFIX."users WHERE user_email = :user_email AND user_id != :user_id";  
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":user_email", $user_email);  
      $stmt->bindParam(":user_id", $edit_user_id);  
      $stmt->execute();
      $users = $stmt->fetch(PDO::FETCH_OBJ); 
      $check = (!empty($users)) ? 0 : 1;
      // $check = (!empty($users)) ? 1 : 0;
      $status = array(
       'status' =>"200",
       'message' =>"Success",
       'check' => $check
      );
      return $status;
    }catch(PDOException $e) {
      $status = array(
          'status' => "500",
          'message' => $e->getMessage()
      );
      return $status;
    }
  }
  
  


}