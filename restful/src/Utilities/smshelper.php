<?php
namespace App\Utilities;
class smshelper  {
	function SendSms($message,$mobile){
	 $this->SendIndSms($message,$mobile);
	}
	function SendIndSms($message,$mobile){
		$apiKey = urlencode('RltD1NWPUOE-1uoeLluZSBSV11WsUJoYt4wNrgX7oC');
		$sender = "RDsolo"; // This is who the message appears to be from.
		$numbers = $mobile; // A single number or a comma-seperated list of numbers
		$message = $message;
		$message = urlencode($message);
		$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
        $ch = curl_init('https://api.textlocal.in/send/');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch); // This is the result from the API
		curl_close($ch);
	}
}
?>