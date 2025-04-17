<?php
/**
 * Controller 
 * This is main controller file
 * PHP version 5
 * @author siriinnovations.com
 * @version 1.0
 * @license http://URL name
 * @package Controller
 * @access public
 */
class Controller extends myController {    
  /**
   * This variable using for creating object 
   * 
   * @access public
   */
  public $wrap;    
  /**
   *
   * @var integer/string
   * 
   * @access public
   */
  public $session;   
  public $form;     
  /**
   * This is using for creating object into view
   * @access public
   */
  public $view;
  public $model;
  public $models;
  /**
   * constructor
   * 
   * Creating objects in this constructor 
   * 
   * @access public
   */
  public function __construct() {
    $this->session = new Session();
    $this->form = new Form();
    $this->view = new View();
    $this->models = new Model();
    $this->session->start();

    /*$this->getUserRoles();*/
  }
  /**
  * LoadModel
  * 
  * Load the required model 
  * 
  * @param string $name 
  * @param string $moduleName 
  */
  public function LoadModel($name, $moduleName = NULL) {
    if($moduleName != NULL) {
      $modulePath = MODULESDIR . $moduleName . '/models/' . $name . '_model.php';
    } else {
      $modulePath = 'models/' . $name . '_model.php';
    }
    if(file_exists($modulePath)) {
      require_once $modulePath;
      $modelName = $name . '_model';
      $this->model = new $modelName;     
    }        
  }
  /**
   * redirect
   * 
   * @param string $url redirect the page
   */
  public function redirect($url) {        
    header('location: ' . PATH . $url);        
  }


  public function menus(){
      $this->view->menus = $this->models->getAllMenus();

        $this->view->services = $this->models->getServices();
        $this->view->footer_menus =$this->models->getAllFooterMenus();
        $this->view->homeservices =$this->models->getAllHomeservices();
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
        echo "Wrong way to call method";
      }
    }        
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
  /**
   * LoadModel
   * 
   * Load the required model 
   * 
   * @param string $name 
   * @param string $moduleName 
   */
  public function LoadModelNew($name, $moduleName = NULL) {
    if($moduleName != NULL) {
      $modulePath = MODULESDIR . $moduleName . '/models/' . $name . '_model.php';
    } else {
      $modulePath = 'models/' . $name . '_model.php';
    }
    if(file_exists($modulePath)) {
      require_once $modulePath;
      $modelName = $name . '_model';
      $this->$name = new $modelName;           
    }        
  }
  /**
   * closeDbConnection
   * 
   * Close DB connection
   * 
   */
  public function closeDbConnection() {
    $this->model->closeDbConnection();        
  }
  /**
   * set_logs
   * 
   * Logs
   * 
   */    
  public function set_logs($session_id, $controller, $function, $folder, $msg, $type) {    
    $msg_print = '['. $session_id .']' . '[' . date('Y/m/d H:i:s') .']' . '['. @$_SERVER['REMOTE_ADDR'] . ']' . '[' . $controller . ']' . '[' . $function . ']' . '[' . $msg . ']'. PHP_EOL;
    $f_type = '';
    if($type == "ACTIONS" || $type == "ACTS") {
      $f_type = '_ACTIONS'; 
    }elseif($type == "TRANSACTIONS" || $type == "TX") {
      $f_type = '_TRANSACTIONS';    
    }elseif($type == "ERROR" || $type == "ERR") {
      $f_type = '_ERROR';
    }else {
      $f_type = '_' . $type;  
    }    
    if($folder != ""){
      $folder = $folder;
    }else{
      $folder = "error_logs";
    }
    if (!is_dir(BASE.'logs/'.$folder)){
      mkdir(BASE.'logs/'.$folder, 777);
    }
    if (!is_dir(BASE.'logs/'.$folder.'/'.date('M')."-".date('Y'))){
      mkdir(BASE.'logs/'.$folder.'/'.date('M')."-".date('Y'), 777);
      chmod(BASE.'logs/'.$folder.'/'.date('M')."-".date('Y'), 0777);
    }
    $file = BASE.'logs/'.$folder.'/'.date('M')."-".date('Y').'/'.date('Ymd').$f_type.'.txt';
    $base_perm = BASE.'logs/'.$folder;           
    if(file_exists($file) == 1){        
      $myfile = fopen($file, "a+") or die("Unable to open file!");
      $txt = $msg."\n";
      fwrite($myfile, $msg_print);
      fclose($myfile);
    }else{
      $myfile = fopen($file, "w") or die("Unable to open file!");       
      fwrite($myfile, $msg_print);       
      fclose($myfile);
    }        
  }
  public function hasPrivileges($access, $module) {
    $check = parent::checkPrivileges($access, $module);
  }
}
/**
 * End Controller.php
 * @location core/Controller.php
 */
?>