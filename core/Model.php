<?php
/**
 * Model
 * This is main model file 
 * PHP version 5
 * @author siriinnovations.com
 * @version 1.0
 * @license http://URL name
 * @package Model
 * @access public
 */
class Model {    
  public $db;      
  /**
   * Constructor 
   * 
   * In this constructor create object into session 
   * pass the database values and connect to database
   * 
   */    
  public function __construct() {
     
      $this->db  = new Database(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD);        
  }
  /**
   * 
   * @param string|integer $term
   */
  public function Escape($term) {
     
  }
  /**
   * PassHash
   * 
   * This method using for encryption the passowrd
   * 
   * @param interger|string 
   * 
   * return hash
   * 
   */
  public function PassHash($password = NULL) {
    if(isset($password)) {
      if($password != NULL) {
          return hash('sha256', $password);
        }else {
         return hash('sha256', $password);
      }
    }        
  }
    /**
     * Slug creation
     * 
     * @param string $data
     * @return string
     */   
    public function slug($data) {
        $text = preg_replace('/\W+/', '-', $data);
        $text = strtolower(trim($text, '-'));
        return $text;
    }       


    public function getAllMenus(){
     
      $url = RESTURL."travelbunny/getallmenus"; 
      $res = $this->CallAPI("GET",$url);

      return $res;
    }

     public function getServices(){
      $url = RESTURL."travelbunny/gethomepagedetails"; 
      $res = $this->CallAPI("GET",$url);
      return $res;
    } 

     public function getAllFooterMenus(){
      $url = RESTURL."travelbunny/getallfooter_menus"; 
      $res = $this->CallAPI("GET",$url);
      return $res;
    } 

    
     public function getAllHomeservices(){
      $url = RESTURL."travelbunny/getallHomeservices"; 
      $res = $this->CallAPI("GET",$url);
      return $res;
    } 
    /**
     * LoadHelper
     * 
     * This method using for loading required helper 
     * 
     * @param string $class
     * 
     */
    public function LoadHelper($class) {
       global $calss;
       require_once 'libs/helpers/' . $class . '.php';
       $this->$class = new $class;                
    }
    public function closeDbConnection() {
        if(DB_DRIVER == 'PDO') {
            $this->db = null;
        }
        elseif(DB_DRIVER == 'MYSQL') {
        }
        elseif(DB_DRIVER == 'MYSQLI') {
        } 
    }
    public function CallAPI($method, $url, $data = false)
    {
      try{
        $curl = curl_init();
        switch ($method)
        {
          case "POST":
              curl_setopt($curl, CURLOPT_POST, true);
              if ($data) {
                                 
                  $data = json_encode($data);
                  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
              }                    
              break;
          case "PUT":
              curl_setopt($curl, CURLOPT_PUT, true);
              $data['user_id'] = "1"; 
              $data['apiKey'] = RESTAPYKEY;                    
              $data = json_encode($data);
              curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
              break;
          case "DELETE":
              curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
              $url =  $url ."/1/".RESTAPYKEY;
              break;
          default:
              if ($data) {
                  $data = json_encode($data);
                  $url = sprintf("%s?%s", $url, http_build_query($data));
              }                    
        }        
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
             if($url == "http://localhost/New-Project/restful/travelbunny/getJobDetails") {print_r($result);exit;}
        curl_close($curl);

       
        $decoded = json_decode($result);
         //print_r($decoded);exit;
        if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
            die('error occured: ' . $decoded->response->errormessage);
        }
        return $decoded;
    }catch(Exception $e) {
        die('error occured: ' . $e);
    }
  }
}
/**
 * End Model file
 * @location core/Moel.php
 */
?>