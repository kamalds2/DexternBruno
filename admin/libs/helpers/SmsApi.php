<?php 
  /**
  * 
  */
  class SmsApi extends Model
  {
    public $smsTemplate = Null;
    public $ReceipientName='';
    public $ReceipientID='';
    public $Receipientno='';
    public $Msgtxt='';
    public $Params = array();
    public $BranchId = 0;
    public $YearId = 0;
    function __construct()
    {
      parent::__construct();      
      $this->Receipientno='';
      $this->msgtxt='';
      $this->reseller="";
      $this->user="";
      $this->senderID=urlencode('');
    }
    private function prepareSMS() {
      $sql = "SELECT * FROM tbl_sms_template WHERE sms_type_id='".$this->smsTemplate."' AND template_status=2";
      $res = $this->db->find($sql);
      $this->msgtxt = strtr($res['template_name'],$this->Params);
    }
    private function insertSMS() {
      $rand = rand(10101010, 9090909090);
      $sql1="call add_sms(
                    '".$this->ReceipientName."',
                    ".$this->ReceipientID.",
                    '".$this->BranchId."',
                    '".$this->YearId."',
                    '".$this->Receipientno."',
                    '".$this->Date."',
                    '".$this->msgtxt."',
                    ".$this->smsTemplate.",
                    '".$this->Date."',
                    '',
                    '0',
                    '".$rand."',
                    '1',
                    ".$this->userID.",
                    '".$this->Date."',
                    @result)";
      $res = $this->db->query($sql1);
    }
    function SendSms()
    {
      $this->prepareSMS();
      $this->insertSMS();      
      $url="http://bulksmsapps.com/apisms.aspx?user=siriinnov&password=".urlencode('siri@123')."&genkey=401181835&sender=".urlencode('DIGINK')."&number=".$this->Receipientno."&message=".urlencode($this->msgtxt)."";
      $ch=curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $output=curl_exec($ch);
      curl_close($ch);                                
      //echo $output;
    }
  }
?>