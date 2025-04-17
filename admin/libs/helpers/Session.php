<?php
/**
 * Session
 * This is Session helper
 * @uses store the values
 * PHP version 5
 * @author siriinnovations.com
 * @version 1.0
 * @license http://URL name 
 * @access public
 */
class Session {
  /**
   * Constructor
   */
  public function __construct() {      
  }
  /**
   * start
   * Session start here
   */
  public function start() {
    session_start();
  }
  /**
   * sets
   * session values set here
   */
   
  public function sets($key, $value){
    $_SESSION[$key] = $value;
  }
  public function unsets($key, $value){
    $_SESSION[$key] = $value;
  }
  /**
   * gets
   * Session values get here
   */
  public function gets($key) {
    if(isset($_SESSION[$key])) 
      return $_SESSION[$key];     
  }
  /*
   * destroy
   * This session destroy method
   */
  public function destroy() {
    session_destroy();
  }
}
/**
 * End Session file
 * @location libs/helpers/Session.php
 */
?>