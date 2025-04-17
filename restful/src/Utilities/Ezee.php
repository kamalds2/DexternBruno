<?php
namespace App\Utilities;
class Ezee {   
  public $Url;
  public $request_type;
  public function __construct() {
    $this->Url = 'https://live.ipms247.com/booking/reservation_api/listing.php'; 
  }
  public function GetHotelDetails($post) {
    extract($post);
    $check_out_date = '';
    if($num_nights == '') $num_nights = '1';
    if($number_adults == '') $number_adults = '1';
    if($number_children == '') $number_children = '0';
    if($num_rooms == '') $num_rooms = '1';
    
    $this->Url .= "?request_type=RoomList&HotelCode=".$hotel_code."&APIKey=".$hotel_apikey."&check_in_date=".$check_in_date."&check_out_date=".$check_out_date."&num_nights=".$num_nights."&number_adults=".$number_adults."&number_children=".$number_children."&num_rooms=".$num_rooms."&promotion_code=&property_configuration_info=0&showtax=0&show_only_available_rooms=0&language=en";
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $this->Url,
      // CURLOPT_POST => true,
      // CURLOPT_POSTFIELDS => $post,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HEADER => false,
      CURLOPT_SSL_VERIFYPEER => false
    ));
    $result=curl_exec ($ch);
    curl_close ($ch);
    return $result;   
  }  
  public function GetHotelsList($post) {
    extract($post);

    $this->Url .= "?request_type=HotelList&GroupCode=".$hotel_code."&APIKey=".$hotel_apikey;
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $this->Url,
      // CURLOPT_POST => true,
      // CURLOPT_POSTFIELDS => $post,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HEADER => false,
      CURLOPT_SSL_VERIFYPEER => false
    ));
    $result=curl_exec ($ch);
    curl_close ($ch);
    return $result;   
  }    
  public function AddHotelBooking($data) {
    extract($data);
    $data['request_type'] = "InsertBooking";
    $bookingdata = json_encode($BookingData);
    $this->Url = 'https://live.ipms247.com/booking/reservation_api/listing.php?request_type=InsertBooking&HotelCode='.$hotel_code.'&APIKey='.$hotel_apikey.'&BookingData='.$bookingdata;
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $this->Url,
      // CURLOPT_POST => true,
      // CURLOPT_POSTFIELDS => $data,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HEADER => false,
      CURLOPT_SSL_VERIFYPEER => false
    ));
    $result=curl_exec ($ch);
    curl_close ($ch);
    return $result;   
  }
  public function ProcessHotelBooking($data) {
    extract($data);
    $data['request_type'] = "ProcessBooking";
    $processdata = json_encode($Process_Data);
   $this->Url = 'https://live.ipms247.com/booking/reservation_api/listing.php?request_type=ProcessBooking&HotelCode='.$hotel_code.'&APIKey='.$hotel_apikey.'&Process_Data='.$processdata;

    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_URL => $this->Url,
      // CURLOPT_POST => true,
      // CURLOPT_POSTFIELDS => $data,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HEADER => false,
      CURLOPT_SSL_VERIFYPEER => false
    ));
    $result=curl_exec ($ch);
    curl_close ($ch);
    return $result; 
  }
}
?>