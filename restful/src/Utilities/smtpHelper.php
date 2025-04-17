<?php 
namespace App\Utilities;

include "class.phpmailer.php";
 
class smtpHelper  {
function SendEmail(){
$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
$mail->IsSMTP();
try {
  
  $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->Host       = "ssl://smtp.gmail.com"; // sets the SMTP server
  
  $mail->AltBody = 'Ridingsolo'; 
  $mail->Subject = $this->subject;
  $mail->MsgHTML($this->message);
  if(isset($this->attachment)){
     $attachment = WEB_BASE."uploads/template_attachment/".$this->attachment;

     $mail->AddAttachment($attachment); 
  }
  if($mail->Send()) {
    return $arrResult['response'] = 'success';
  } else {
    return $arrResult['response'] = 'error';
  }

} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}
}
}
?>
