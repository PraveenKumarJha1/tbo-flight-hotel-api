<?php
// CityId=130443

if(isset($_SESSION['token'])){
  echo  $tokenID = $_SESSION['token'];
}
$localIP = getenv("REMOTE_ADDR");

if(isset($_GET['checkin'])){
  $checkIn=  $_GET['checkin'] ;
}
if(isset($_GET['night'])){
  $NoOfNights=  $_GET['night'] ;
}

if(isset($_GET['country'])){
  $CountryCode=  $_GET['country'];
}

$CityId=  $_GET['city'];
$PreferredCurrency=  $_GET['currency'] ;
$GuestNationality=  $_GET['nation'];
$NoOfRooms=  $_GET['room'] ;
$NoOfAdults=  $_GET['HAdult'];
// echo $NoOfChild=  $_GET['HNoOfChild'];



$dat = array (
  'CheckInDate' => $checkIn,
  'NoOfNights' => $NoOfNights ,
  'CountryCode' => 'IN',
  'CityId' => $CityId ,
  'ResultCount' => NULL,
  'PreferredCurrency' => $PreferredCurrency,
  'GuestNationality' =>  $GuestNationality,
  // 'IsTBOMapped'=> 'true',
  'NoOfRooms' => 1,
  'RoomGuests' => 
  array (
    0 => 
    array (
      'NoOfAdults' => $NoOfAdults,
      'NoOfChild' => 0,
      'ChildAge' => NULL,
    ),
  ),
  'MaxRating' => 5,
  'MinRating' => 0,
  'ReviewScore' => NULL,
  'IsNearBySearchAllowed' => false,
  'EndUserIp' => $localIP,
  'TokenId' => $tokenID,
)
;

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://api.tektravels.com/BookingEngineService_Hotel/hotelservice.svc/rest/GetHotelResult/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>  json_encode($dat),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
$data = json_decode($response, true);


?>