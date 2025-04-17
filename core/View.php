<?php
/**
 * View
 * 
 * This is main view file 
 * 
 * PHP version 5
 * 
 * @author siriinnovations.com
 * @version 1.0
 * @license http://URL name
 * @package view
 * @access public
 * 
 * 
 */
class View  extends myView {    
    /**
     *
     * @var string
     * $use for set layout in template
     */
    public $layout = NULL;
    /**
     * Constructor
     * 
     */    
    public function __construct() {     
        $this->session = new Session();
        $this->form = new Form();
    }
    /**
     * LoadView
     * 
     * This is loadview method using for load the views
     * 
     * @param string $name
     * @param string $module
     * 
     * @access public
     */
    public function LoadView($name, $module = NULL) {
       /* $this->getUserRoles();*/
        if($module == NULL) {
            if($this->layout != NULL){
                require_once THEMEDIR . $this->layout . '.php';
            } else {
                require_once THEMEDIR . 'header.php';
            }            
           $viewBody = THEMEDIR . $name . '.php';
           if(file_exists($viewBody)) {
                require_once $viewBody;
           } else {
                echo "View Page not Exit";    
           }
           if($this->layout != NULL){
              
           } else {
            require_once THEMEDIR . 'footer.php';    
           }
        } else {           
            $viewBody = MODULESDIR . $module .'/views/' . $name . '.php';
            if($this->layout != NULL){
                require_once MODULESDIR . $module .'/views/'. $this->layout . '.php';
            } else {
                require_once THEMEDIR . 'header.php';
            }
            require_once $viewBody;
            if($this->layout != NULL) {
                
            } else {
               require_once THEMEDIR . 'footer.php';
            }
        }        
    }
    /**
     * getUrl
     * 
     * This is main uri segment 
     * 
     * @param string|integer $urlPart
     * 
     * @access public
     * 
     */
    public function getUrl($urlPart) {
        $url = SITEURL;
        $mainUrl = URL; 
        $keys = parse_url($url);
        $path = explode("/", $mainUrl);
        $path1 = explode('/',$url);
        $newArray = array_diff($path,$path1);
        $newArray1 = isset($newArray) && is_array($newArray) ? $newArray : [];
        $A = implode( ',',$newArray1);
        $mainArray = explode(',', $A);
        return  $mainArray[$urlPart];            
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
}
/**
 * End view file
 * @location core/View.php
 */
?>