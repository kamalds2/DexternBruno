<?php
namespace App\Domain\Footer_menu;
use PDO;
/** 
* Repository.
*/
class MenusRepository
{ 
  /*** @var PDO The database connection  */
  private $connection;
 
  public function __construct(PDO $connection)
  { 
    $this->connection = $connection;
  }
   
   
  public function getAllMenus($data){ 
    try{
      extract($data);
      $sql = "SELECT * FROM ".DB_PREFIX."footer_menus where  menu_status != '9'";      
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $res = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($res)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'menus' => $res
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

  public function getAllPages($data){ 
    try{
      extract($data);
      $sql = "SELECT * FROM ".DB_PREFIX."pages WHERE page_status= '0'";      
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $res = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($res)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'pages' => $res
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

  public function getAllModules($data){ 
    try{
      extract($data);
      $sql = "SELECT * FROM ".DB_PREFIX."modules";      
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $res = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($res)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'modules' => $res
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

  public function addMenuDetails($data){ 
    try{ 
      extract($data);
     
      $sql = "INSERT INTO ".DB_PREFIX."footer_menus(menu_name,menu_type,menu_module,menu_status) VALUES (:menu_name,:menu_type,:menu_module,:menu_status);";
       
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":menu_name",$menu_name);
      $stmt->bindParam(":menu_module",$menu_module);
      $stmt->bindParam(":menu_type",$menu_type);
      $stmt->bindParam(":menu_status",$menu_status);
     
      $stmt->execute();
      $menu_id = $this->connection->lastInsertId();
      if($menu_id > 0) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $menu_id
        ); 
      }else{
        $status = array(
         'status' =>"204",
         'message' =>"No Data Found"
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

  public function updateMenuDetails($data){ 
    try{ 
      extract($data);
      
      $sql = "UPDATE ".DB_PREFIX."footer_menus set  menu_name = :menu_name,menu_type=:menu_type,menu_module=:menu_module,menu_status = :menu_status WHERE menu_id = :menu_id;";
      
      
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":menu_name",$menu_name);
      $stmt->bindParam(":menu_module",$menu_module);
      $stmt->bindParam(":menu_status",$menu_status);
      $stmt->bindParam(":menu_type",$menu_type);

      $stmt->bindParam(":menu_id",$menu_id);
      $res = $stmt->execute();
       
      if($res) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $menu_id
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

  public function getMenuDetails($data){ 
    try{ 
      extract($data);
      $sql = "SELECT * FROM ".DB_PREFIX."footer_menus WHERE `menu_id` = :menu_id;";      
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":menu_id",$menu_id);
      $stmt->execute();
      $menu = $stmt->fetch(PDO::FETCH_OBJ);
      if($menu_id > 0) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $menu
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

  public function deleteMenuItems($data){ 
    try{ 
      extract($data);

      $sql = "UPDATE tbl_footer_menus set menu_status = '9' WHERE menu_id = :menu_id;";   
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":menu_id",$menu_id);
      $res =  $stmt->execute();
      if($res) {
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

  


}

  