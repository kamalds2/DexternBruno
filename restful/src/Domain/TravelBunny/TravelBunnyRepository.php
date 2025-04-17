<?php
namespace App\Domain\TravelBunny;
use PDO;
/** 
* Repository.
*/
class TravelBunnyRepository
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
      $sql = "SELECT * FROM ".DB_PREFIX."menus where  menu_status = 'y'";
      
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $menus = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($menus)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $menus
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


  

  public function getAllFooterMenus($data){ 
    try{
      extract($data);
      $sql = "SELECT * FROM ".DB_PREFIX."footer_menus where  menu_status = 'y'";
      
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $menus = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($menus)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $menus
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


  public function getAllJobs(){ 
    try{
      
      $sql = "SELECT * FROM ".DB_PREFIX."jobs where  job_status = '0'";
      
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $jobs = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($jobs)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $jobs
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

public function getAllJobDetails($data) { 
    try {
    
        $category = $data['category'] ?? null;
        $location = $data['location'] ?? null;

        $sql = "SELECT * FROM " . DB_PREFIX . "jobs WHERE job_status = '0'";
        if (!empty($category)) {
            $sql .= " AND job_category = :job_category";
        }
        if (!empty($location)) {
            $sql .= " AND job_location = :job_location";
        }
        $stmt = $this->connection->prepare($sql);

        if (!empty($category)) {
            $stmt->bindParam(':job_category', $category);
        }
        if (!empty($location)) {
            $stmt->bindParam(':job_location', $location);
        }
        $stmt->execute();
        $jobs = $stmt->fetchAll(PDO::FETCH_OBJ);

        if (!empty($jobs)) {
            $status = array(
                'status' => "200",
                'message' => "Success", 
                'res' => $jobs
            ); 
        } else {
            $status = array(
                'status' => "204",
                'message' => "No Data Found"
            );
        }
        return $status; exit;    

    } catch (PDOException $e) {
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
      $sql = "SELECT * FROM ".DB_PREFIX."sliders where slider_status = '0'";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute();
      $sliders = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($sliders)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $sliders
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
      $sql = "SELECT * FROM ".DB_PREFIX."sliders where slider_id =:slider_id";
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":slider_id",$slider_id);
      $stmt->execute();
      $sliders = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($sliders)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $sliders
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

 

 
  public function getAllTestimonials($data){ 
    try{
      extract($data);
      $sql = "SELECT * FROM ".DB_PREFIX."testimonials where testimonial_status = 0 and testimonial_title=:testimonial_name";      
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":testimonial_name",$testimonial_name);
      $stmt->execute();
      $testimonials = $stmt->fetchAll(PDO::FETCH_OBJ);
      if(!empty($testimonials)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $testimonials
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
      $sql = "SELECT * FROM `tbl_pages` WHERE meta_title = :meta_title";
      
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(":meta_title",$meta_title); 
      $stmt->execute(); 
      $page = $stmt->fetch(PDO::FETCH_OBJ); 
      if(!empty($page)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $page
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

   
  public function getSettingsData($data){ 
    try{
      extract($data); 
      $sql = "SELECT * FROM ".DB_PREFIX."settings WHERE settings_id = 1";
      
      $stmt = $this->connection->prepare($sql); 
      $stmt->execute(); 
      $modules = $stmt->fetch(PDO::FETCH_OBJ); 
      if(!empty($modules)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $modules
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

  public function getHomePageDetails($data){ 
    try{
      extract($data); 
      $sql = "SELECT * FROM tbl_services where service_status = 0";
      
      $stmt = $this->connection->prepare($sql); 
      $stmt->execute(); 
      $page = $stmt->fetchAll(PDO::FETCH_OBJ); 
      if(!empty($page)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $page
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

   public function getHomePageServices($data){ 
    try{
      extract($data); 
      $sql = "SELECT * FROM ".DB_PREFIX."home_services ";
      
      $stmt = $this->connection->prepare($sql); 
      $stmt->execute(); 
      $page = $stmt->fetchAll(PDO::FETCH_OBJ); 
      if(!empty($page)) {
        $status = array(
         'status' =>"200",
         'message' =>"Success", 
         'res' => $page
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

  