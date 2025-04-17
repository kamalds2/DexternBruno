<?php
/**
 * Wrapper
 * 
 * This is main file here we are connecting all core class
 * 
 * PHP version 5
 * 
 * @author Sudhakar  <sudhakar.c@siriinnovations.com>
 * @author shilpa <shilpa.b@siriinnovations.com> 
 * @version 1.0
 * @license http://URL name
 * @package Wrapper
 * @access public
 */
class Wrapper {    
   /**
    * Construct
    * 
    * This method was automatically execute
    * 
    * @link libs/drivers/Mysqli.php Mysqli Driver
    * @link libs/drivers/Database.php PDO Driver
    * 
    * @link core/Controller.php main controller
    * @link core/Model.php main model
    * @link core/View.php main view 
    * 
    * @link libs/helpers/Session.php
    */
    public function __construct() {    
        if(DB_DRIVER == 'mysqli'){
            require_once 'libs/drivers/Mysqli.php';
        } else if(DB_DRIVER == 'mysql'){
            require_once 'libs/drivers/Mysql.php';
        } else {
            require_once 'libs/drivers/Database.php';
        }        
        /**
         * Includeing the session helper access sessions in to this file
         */        
        require_once 'libs/helpers/Session.php';   
        require_once 'libs/helpers/Form.php';     
        /**
         * Including the main controler access the controler in this file
         *  
         */
         require_once 'core/myController.php';
         require_once 'core/Controller.php';        
        /**
         * Including the main model file access the model funtions in this file
         */        
        require_once 'core/Model.php';        
        /**
         * Including the myView file access the myView functions in this file
         */        
        require_once 'core/myView.php';       
        /**
         * Including the main view file access the view functions in this file
         */        
        require_once 'core/View.php';         
        /**
         * Getting url from the .htaccess file or main browser url
         */        
        $link = str_replace(SITEURL, '', URL);
        $link = rtrim($link, "/");
        $link = filter_var($link, FILTER_SANITIZE_URL); 
    
        if($link != 'index.php' && $link != '') {            
            $link = array_filter(explode('/', $link)); 
             
            $controllerName = $link[0];  
            if(isset($link[1])) {
                $methodName = $link[1]; 

            } else {
                $methodName = 'index';
            }
        } else {
            $controllerName = DEFAULTCONTROLLER;
            $methodName = 'index';
        }     
        if(isset($controllerName) && $controllerName !='') {
          
            $controllerUrl = CONTROLLERSDIR . $controllerName . '.php';
            if(file_exists($controllerUrl)) {
                require_once ( $controllerUrl);
            } else {
                $moduleName = $controllerName;                    
                $moduleControllerUrl = MODULESDIR . $controllerName;
                if(is_dir($moduleControllerUrl)) {
                   $install = $moduleControllerUrl . '/install/';
                        if(is_dir($install)) {                           
                            require_once $install . 'index.php';                           
                            $ins = new install();
                            $ins->loadModule = $moduleName; 
                            $ins->install();                            
                        }                        
                        if(file_exists($moduleControllerUrl . '/controllers/' . $controllerName . '.php')) {                           
                            require_once $moduleControllerUrl . '/controllers/' . $controllerName . '.php';
                        }
                    } else {
                        $this->showError();
                    }
                }
            }
            $init = new $controllerName();                      
            if(isset($moduleName)) {

                $init->LoadModel($controllerName, $moduleName);

            } else {
                $init->LoadModel($controllerName);                
            }
            if(isset($link[3])) {               
                $A = array_diff($link, array($controllerName));
                $B = array_diff($A, array($methodName));
                $C = implode( ',',$B);
                $mainLink = explode(',', $C);
                $init->$methodName($mainLink);
            }else if(isset($link[2])){

                $init->{$methodName}($link[2]);
                
            } else if(method_exists($init, $methodName)) {
                $init->$methodName();
            } else {
                $this->showError();
            }
        }        
    /**
     * showError 
     * 
     * Access if any method not found
     * 
     */
    public function showError() {
        header('location: ' . PATH . "errorPage");
    }
}    
/**
* Creating object into Boostrap file
*/    
$sgenio = new Wrapper();
/**
* End Bootstrap.php
* @location core/Bootstrap.php 
*/
?>