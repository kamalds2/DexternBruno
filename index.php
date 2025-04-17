<?php


/**
 *  By default we have include config file
 * in this file conain default controller
 * you need change this file go to config and change there
 */
error_reporting(0); 
//ini_set('display_errors', '1');

date_default_timezone_set("Asia/Kolkata");  
require_once 'libs/config.php';
/**
 * Wrapper file is mainly using manage all core files
 */
require_once 'core/Wrapper.php';
?>