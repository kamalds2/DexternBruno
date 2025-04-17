<?php
namespace App\Domain\Services;
use PDO;
/** 
* Repository.
*/
class ServicesRepository
{ 
  /*** @var PDO The database connection  */
  private $connection;
 
  public function __construct(PDO $connection)
  { 
    $this->connection = $connection;
  }
   
  
  public function addPage($data){ 
    try{
      extract($data);
      $sql = "INSERT INTO ".DB_PREFIX."services (service_title, service_description,service_image ,service_status) VALUES(:service_title, :service_description, :service_image, :service_status)";
       
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":service_title",$service_title);
      $stmt->bindParam(":service_description",$service_description);  
      $stmt->bindParam(":service_image",$service_image); 
      $stmt->bindParam(":service_status",$service_status); 
      
      $stmt->execute();
      $page_id = $this->connection->lastInsertId();

      if($page_id >0) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'page_id' => $page_id
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

  public function addHomePage($data){ 
    try{
      extract($data);
    
      
        $homeservice_id = implode(',', $data['homeservice_id']); 

      $sql = "INSERT INTO ".DB_PREFIX."home_services (homeservice_id) VALUES(:homeservice_id)";
       
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":homeservice_id",$homeservice_id);
      $stmt->execute();
      $page_id = $this->connection->lastInsertId();

      if($page_id >0) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'page_id' => $page_id
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
      $sql = "SELECT * FROM ".DB_PREFIX."services where service_status != '9'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $pages = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($pages)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'pages' => $pages
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
   public function getAllHomePages($data){ 
    try{
      extract($data);
      $sql = "SELECT * FROM ".DB_PREFIX."home_services";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $pages = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($pages)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'pages' => $pages
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

  public function getPageDetails($data){ 
    try{
      extract($data);
      $sql = "SELECT * FROM ".DB_PREFIX."services where service_id = :service_id";
     
      $stmt = $this->connection->prepare($sql);

      $stmt->bindParam(":service_id",$page_id);
      $stmt->execute();
      $pages = $stmt->fetch(PDO::FETCH_OBJ);
      if(!empty($pages)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'pages' => $pages
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

  public function updatePage($data){
    try{
      extract($data);
      
      $sql = "UPDATE ".DB_PREFIX."services SET service_title = :service_title, service_description = :service_description,service_status = :service_status,service_image = :service_image WHERE service_id = :service_id";
      


      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":service_id",$service_id);
      $stmt->bindParam(":service_title",$service_title);
      $stmt->bindParam(":service_description",$service_description); 
      $stmt->bindParam(":service_image",$service_image); 
      $stmt->bindParam(":service_status",$service_status); 
      $res = $stmt->execute();
      
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
  public function updateHomePage($data){ 
    try{
      extract($data);
       $homeservice_id = implode(',', $data['homeservice_id']); 

      $sql = "UPDATE ".DB_PREFIX."home_services set homeservice_id=:homeservice_id ";
       
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":homeservice_id",$homeservice_id);
      $stmt->execute();
      $page_id = $this->connection->lastInsertId();

      if($page_id >0) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'page_id' => $page_id
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
   
  public function deletePage($data){
    try{
      extract($data);
      $sql = "UPDATE ".DB_PREFIX."services SET  service_status = '9' WHERE service_id = :service_id";
      
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":service_id",$page_id);  
    
      $res = $stmt->execute();
      
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

  