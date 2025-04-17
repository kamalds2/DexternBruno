<?php 
include "class.phpmailer.php";
 
class smtpHelper extends Model  {
function SendEmail(){

  $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP();

try {
  $mail->IsHTML(true);
  $mail->SMTPDebug  = 1;
  $mail->SMTPAuth = true; // enable SMTP authentication
  $mail->SMTPSecure = "ssl"; // sets the prefix to the servier ssl or tls
  $mail->Host = "mail.jepy.in"; // sets GMAIL as the SMTP server
  $mail->Port = 465; 
  $mail->Username   = "testing@jepy.in"; // SMTP account username
  $mail->Password   = "admin@siri"; // SMTP account password
  $mail->AddAddress($this->email);
  $mail->SetFrom('testing@jepy.in', 'Xpresscements');
  $mail->AddReplyTo('testing@jepy.in');
  $mail->AltBody = 'Xpresscements'; 
  $mail->Subject = $this->subject;
  $mail->MsgHTML($this->message);
  $x = $mail->Send();
  print_r($x);
  unset($x);
  

} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}
}
}
?>
