<?php
// CityId=130443
session_start();

$tokenID = $_SESSION['token']; 
$checkIn=  $_GET['checkin'] ;
$NoOfNights=  $_GET['night'] ;
$CountryCode=  $_GET['country'];
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
  'NoOfRooms' => 2,
  'RoomGuests' => 
  array (
    0 => 
    array (
      'NoOfAdults' => 1,
      'NoOfChild' => 2,
      'ChildAge' => [1,3,],
    ),
    1 => 
    array (
      'NoOfAdults' => 1,
      'NoOfChild' => 0,
      'ChildAge' => NULL,
    ),
  ),
  'MaxRating' => 5,
  'MinRating' => 0,
  'ReviewScore' => NULL,
  'IsNearBySearchAllowed' => false,
  'EndUserIp' => '192.168.1.1',
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
echo $response;


?>