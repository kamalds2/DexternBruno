<?php
/*
 * PHP version 5
 * 
 * @author siriinnovations.com
 * @version 1.0
 * @license http://URL name 
 * @access public
 */
class Form {    
    public function __construct() {        
    }    
    public function FormOpen($id, $name, $action = '') { 
    	$str = '<form role="form" id="'.$id.'" name="'.$name.'" >';
        echo $str;
    }    
    public function FormClose() {       
    }
}
?>