<?php
namespace App\Domain\Roles;
use PDO;
/** 
* Repository.
*/
class RolesRepository
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
   
  
  public function getRoles($data){ 
    try{
      extract($data);
      
      $sql = "SELECT role_id, role_name, role_status, created_date,created_by FROM ".DB_PREFIX."roles  ";
      $stmt = $this->connection->prepare($sql);  
       
      $stmt->execute();
      $roles = $stmt->fetchAll(PDO::FETCH_OBJ);

      if(!empty($roles)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'roles' => $roles
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
  
  public function addRole($data){ 
    try{
      extract($data);
      $sever_apiKey = apiKey($user_id);
      $sql = "INSERT INTO ".DB_PREFIX."roles (role_name, created_date, created_by) 
          VALUES (:role_name,  :created_date, :created_by)";
      
        if($apiKey == $sever_apiKey) { 
           
          $stmt = $this->connection->prepare($sql);  
          $stmt->bindParam(":role_name", $role_name); 
          $stmt->bindParam(":created_date", $created_date);
          $stmt->bindParam(":created_by", $created_by);
          $stmt->execute();
          $role_id = $this->connection->lastInsertId();

          //privileges
          $privilege_status = '1';
          $sql = "INSERT INTO ".DB_PREFIX."privileges ( role_id, privilege_status, created_date, created_by) VALUES(:role_id, :privilege_status, :created_date, :created_by)";
          $stmt = $this->connection->prepare($sql);  
          $stmt->bindParam(":role_id", $role_id);
          $stmt->bindParam(":privilege_status", $privilege_status);
          $stmt->bindParam(":created_date", $created_date);
          $stmt->bindParam(":created_by", $created_by);
          $res = $stmt->execute(); 
          if($res) {
            $status = array(
             'status' =>"200",
             'message' =>"Success", 
             'role_id' => $role_id
            ); 
          }else{
            $status = array(
             'status' =>"204",
             'message' =>"Provided Password Wrong"
            );
          }
         return $status;exit;
        }

    }catch(PDOException $e) {
      $status = array(
        'status' => "500",
        'message' => $e->getMessage()
      );
      return $status;
    }
  }


  public function editRole($data){
    try{
      extract($data); 
        $sql = "UPDATE ".DB_PREFIX."roles SET role_name=:role_name 
                WHERE role_id = :role_id";
        $role_status = '0';
        $stmt = $this->connection->prepare($sql);  
        $stmt->bindParam(":role_name", $role_name);
        $stmt->bindParam(":role_id", $role_id);
        $stmt->execute();
        
        $status = array(
          "status" => "200",
          "message" => "Success",
          "id" => $role_id
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

  public function accessPages($data) {
    try {
      extract($data);
      $privilege_name = $privilege_name.'_m' ;
      $sever_apiKey = apiKey($user_id); 
      if($apiKey == $sever_apiKey) {
        $sql = "SELECT * FROM ".DB_PREFIX."privileges WHERE role_id=:role_id"; 
        $stmt = $this->connection->prepare($sql);   
        $stmt->bindParam(":role_id", $role_id);
        $stmt->execute();
        $modules = $stmt->fetch(PDO::FETCH_OBJ); 
        if($status == 'y') {
          if(!empty($modules)) {
            $p_data = array();
            $p_data[$privilege_name] = ($modules->$privilege_name != '') ? $modules->$privilege_name . ',' .$module_id : $module_id;            
            $up_sql = "UPDATE ".DB_PREFIX."privileges SET `".$privilege_name."`='".$p_data[$privilege_name]."'
            WHERE role_id=".$role_id;
            $up_stmt = $this->connection->prepare($up_sql);           
            $res = $up_stmt->execute();          
          } else {
            $p_data = array();
            $privilege_status = '1';
            $up_sql = "INSERT INTO ".DB_PREFIX."privileges 
            ( role_id, `".$privilege_name."`, privilege_status, created_date, created_by)
            VALUES ( :role_id, :module_id, :privilege_status, :created_date, :created_by)";
            $up_stmt = $this->connection->prepare($up_sql);   
            $up_stmt->bindParam(":role_id", $role_id);
            $up_stmt->bindParam(":module_id", $module_id);  
            $up_stmt->bindParam(":privilege_status", $privilege_status);
            $up_stmt->bindParam(":created_date", $created_date);  
            $up_stmt->bindParam(":created_by", $created_by);            
            $res = $up_stmt->execute();        
          }
        } else {
                    $values = explode(',', $modules->$privilege_name);
          $slugArray = array($module_id);
          $newValues = array_diff( $values, $slugArray);
          $p_data = array();
          $p_data[$privilege_name] = implode($newValues, ',');
          $up_sql = "UPDATE ".DB_PREFIX."privileges SET `".$privilege_name."`='".$p_data[$privilege_name]."'
          WHERE role_id=".$role_id;
          $up_stmt = $this->connection->prepare($up_sql);           
          $res = $up_stmt->execute(); 
        }
        if($res) {
          $status = array(
           'status' =>"200",
           'message' =>"Success", 
           'res' => $res
          ); 
        }else{
          $status = array(
           'status' =>"204",
           'message' =>" No data Updated"
          );
        }
        return $status;exit;
        
      }
    }catch(PDOException $e) {
      $status = array(
        'status' => "500",
        'message' => $e->getMessage()
      );
      return $status;
    }
  }

  public function getModules($data){
    try{      
      $sql = "SELECT module_id, module_name, parent_id, module_slug FROM ".DB_PREFIX."modules WHERE module_status='0' ORDER BY module_name ASC";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();  
      $modules = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($modules)){
         $status = array(
          "status" => "200",
          "message" => "success",
          "modules" => $modules
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

  public function getPrivileges($data){
    try{      
      extract($data);
      $sql = "SELECT * FROM ".DB_PREFIX."privileges WHERE role_id=:role_id";
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":role_id",$role_id);
      $stmt->execute();
      $priviliges = $stmt->fetch(PDO::FETCH_OBJ);
      // var_dump($priviliges);die();
      if(!empty($priviliges)){
        $status = array(
          "status" => "200",
          "message" => "Success",
          "priviliges" => $priviliges,
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


}

  