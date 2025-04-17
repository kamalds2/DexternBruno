<?php
namespace App\Domain\Dashboard;
use PDO;
/** 
* Repository.
*/
class DashboardRepository
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
   
  
  public function getDashboardEnquiries($data){ 
    try{
      extract($data);      
      $sql = "SELECT * FROM ".DB_PREFIX."enquiries ORDER BY enquiry_id DESC LIMIT 0,10";
      $stmt = $this->connection->prepare($sql);  
       
      $stmt->execute();
      $enquiries = $stmt->fetchAll(PDO::FETCH_OBJ);

      if(!empty($enquiries)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'enquiries' => $enquiries
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
  
  public function getDashboardPages($data){ 
    try{
      extract($data);      
      $sql = "SELECT * FROM ".DB_PREFIX."services where service_status ='0' ORDER BY service_id DESC ";
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
  
  public function getDashboardSliders($data){ 
    try{
      extract($data);      
      $sql = "SELECT * FROM ".DB_PREFIX."sliders where slider_status ='0' ORDER BY slider_id DESC ";
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
  
  public function getDashboardCount($data){ 
    try{
      extract($data);     
      $res = []; 
      $sql = "SELECT count(1) AS page_cnt FROM ".DB_PREFIX."pages where page_status ='0' ";
      $stmt = $this->connection->prepare($sql);        
      $stmt->execute();
      $res['pages_cnt'] = $stmt->fetch(PDO::FETCH_OBJ)->page_cnt;

      $sql = "SELECT count(1) AS slider_cnt FROM ".DB_PREFIX."sliders where slider_status ='0' ";
      $stmt = $this->connection->prepare($sql);        
      $stmt->execute();
      $res['sliders_cnt'] = $stmt->fetch(PDO::FETCH_OBJ)->slider_cnt;
      

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
  

}

  