<?php
/**
* Email
* This is Email helper
* @uses sending for mail
* PHP version 5
* @author siriinnovations.com
* @version 1.0
* @license http://URL name 
* @access public
*/
class Email {    
  /**
   * Assign to mail id into this variable
   * @var string
   */
  public $To;
  /**
   * Assign From mail id into this variable
   * @var string
   */
  public $From;
  /**
   * Assing mail subject in to this variable
   * @var string
   */
  public $Subject;
  /**
   *
   * Assign Message body in to this variable
   * @var string|array
   */
  public $Message;
  /*
   * Assign Attachment file in to this variable
   * 
   */
  public $Attachment;
  /**
   * Constructor
   */
  public function __construct() {
    $this->Attachment = NULL;    
    $this->From = SITEEMAIL; 
  }
  /**
   * send
   * 
   * return boolean
   */
  public function send() {
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
    $headers .= 'From:'.$this->From ."\r\n";
    @mail($this->To,$this->Subject,$this->Message,$headers);      
  }    
}
?>