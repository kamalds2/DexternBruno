<?php
namespace App\Domain\Sliders;
use PDO;
/** 
* Repository.
*/
class SlidersRepository
{ 
  /*** @var PDO The database connection  */
  private $connection;
 
  public function __construct(PDO $connection)
  { 
    $this->connection = $connection;
  }
   
  
  public function addSlider($data){ 
    try{
      extract($data);
      $sql = "INSERT INTO ".DB_PREFIX."sliders (slider_title,slider_date,slider_image,slider_description,slider_status) VALUES(:slider_title,:slider_date,:slider_image,:slider_description,:slider_status)";
       
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":slider_title",$slider_title);
      $stmt->bindParam(":slider_date",$slider_date); 
      $stmt->bindParam(":slider_image",$slider_image); 
      $stmt->bindParam(":slider_description",$slider_description); 
      $stmt->bindParam(":slider_status",$slider_status); 

      $stmt->execute();
      $slider_id = $this->connection->lastInsertId();

      if($slider_id >0) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'slider_id' => $slider_id
        ); 
      }else{
        $status = array(
         'status' =>"204",
         'message' =>"No data Added"
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
  
  public function getAllSliders($data){ 
    try{
      extract($data);
      $sql = "SELECT * FROM ".DB_PREFIX."sliders where slider_status='0' or slider_status = '1'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $sliders = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($sliders)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'sliders' => $sliders
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

  public function getSliderDetails($data){ 
    try{ 
      extract($data);
      $sql = "SELECT * FROM ".DB_PREFIX."sliders where slider_id = :slider_id";

      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":slider_id",$slider_id);
      $stmt->execute();
      $sliders = $stmt->fetch(PDO::FETCH_OBJ); 
      if(!empty($sliders)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'sliders' => $sliders
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

  public function updateSlider($data){ 
    try{
      extract($data);
      $sql = "UPDATE ".DB_PREFIX."sliders SET slider_title = :slider_title, slider_date = :slider_date, slider_image=:slider_image,slider_description = :slider_description,slider_status = :slider_status WHERE slider_id = :slider_id";
      
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":slider_id",$slider_id);
      $stmt->bindParam(":slider_title",$slider_title);
      $stmt->bindParam(":slider_date",$slider_date); 
      $stmt->bindParam(":slider_image",$slider_image); 
      $stmt->bindParam(":slider_description",$slider_description); 
      $stmt->bindParam(":slider_status",$slider_status);
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
   
  public function deleteSlider($data){ 
    try{
      extract($data);
      $sql = "UPDATE ".DB_PREFIX."sliders SET slider_status = '9' WHERE slider_id = :slider_id";
      
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":slider_id",$slider_id);
      
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

  