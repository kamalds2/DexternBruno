<?php
namespace App\Domain\Jobs;
use PDO;
/** 
* Repository.
*/
class JobsRepository
{ 
  /*** @var PDO The database connection  */
  private $connection;
 
  public function __construct(PDO $connection)
  { 
    $this->connection = $connection;
  }
   
  
  public function addJob($data){ 
    try{
      extract($data);
      $sql = "INSERT INTO ".DB_PREFIX."jobs (job_title, job_location,job_category,job_status) VALUES(:job_title, :job_location,:job_category, :job_status)";
       
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":job_title",$job_title); 
      $stmt->bindParam(":job_location",$job_location); 
      $stmt->bindParam(":job_status",$job_status);
       $stmt->bindParam(":job_category",$job_category); 
      
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
  
  public function getAllJobs($data){ 
    try{
      extract($data);
      $sql = "SELECT * FROM ".DB_PREFIX."jobs where job_status != '9'";
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

  public function getJobDetails($data){ 
    try{
      extract($data);
      $sql = "SELECT * FROM ".DB_PREFIX."jobs where job_id = :job_id";
     
      $stmt = $this->connection->prepare($sql);

      $stmt->bindParam(":job_id",$page_id);
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

  public function updateJob($data){
    try{
      extract($data);
      
      $sql = "UPDATE ".DB_PREFIX."jobs SET job_title = :job_title,job_status = :job_status,job_category = :job_category,job_location = :job_location WHERE job_id = :job_id;";
      if($banner_image != ''){
        $stmt = $this->connection->prepare("UPDATE  ".DB_PREFIX."jobs SET banner_image=:banner_image where job_id='0';");
      $stmt->bindParam(":banner_image",$banner_image);
      }
      else{
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":job_id",$job_id);
      $stmt->bindParam(":job_title",$job_title);
      $stmt->bindParam(":job_location",$job_location); 
       $stmt->bindParam(":job_category",$job_category);
      $stmt->bindParam(":job_status",$job_status); 
    }
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
   
  public function deleteJobs($data){
    try{
      
      $job_id = $data['job_id'];

      $sql = "UPDATE ".DB_PREFIX."jobs SET job_status = '9' WHERE job_id = :job_id";
      
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":job_id",$job_id);  
    
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

  