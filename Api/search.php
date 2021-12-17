<?php


if(isset($_SESSION['token'])){
    $tokenID = $_SESSION['token'];
}
if(isset($_GET['Origin'])){
    $origin = $_GET['Origin'];
}
if(isset($_GET['Destination'])){
    $destination = $_GET['Destination'];
}
if(isset($_GET['PreferredDepartureTime'])){
    $DepartureDate = $_GET['PreferredDepartureTime'];
}

if(isset($_GET['PreferredReturnDepartureTime'])){
    $ReturnDate = $_GET['PreferredReturnDepartureTime'];
}

if(isset($_GET['JourneyType'])){
    $JourneyType=$_GET['JourneyType'];
}else{
    $JourneyType='1';
}


if(isset($_GET['AdultCount'])){
    $AdultCount=$_GET['AdultCount'];
}else{
    $AdultCount='1';
}
if(isset($_GET['ChildCount'])){
    $ChildCount=$_GET['ChildCount'];
}else{
    $ChildCount='0';
}

if(isset($_GET['FlightCabinClass'])){
    $FlightCabinClass=$_GET['FlightCabinClass'];
}else{
    $FlightCabinClass='1';
}

if(isset($_GET["connecting"])){
    $connecting=$_GET["connecting"];
    if($connecting == "Direct"){ $DirectFlight= "true";}else {$DirectFlight= "false";}

    if($connecting == "One-Stop"){ $OneStopFlight= "true";}else {$OneStopFlight= "false";}

}else{
    $DirectFlight= "false";
    $OneStopFlight= "false";
}

if(isset($_GET['PreferredAirlines'])){
    $PreferredAirlines=$_GET['PreferredAirlines'];
}else{
    $PreferredAirlines='null';
}

if(isset($_GET['PreferredDeTimes'])){
    $PreferredDeTimes=$_GET['PreferredDeTimes'];
}else{
    $PreferredDeTimes='00:00:00';
}

$localIP = getHostByName(getHostName());

    // echo $JourneyType;
$dat = array (
  "EndUserIp" => $localIP,
  "TokenId" => $tokenID,
  "AdultCount" => $AdultCount,
  "ChildCount" => $ChildCount,
  "InfantCount" => "0",
  "DirectFlight" => $DirectFlight,
  "OneStopFlight" => $OneStopFlight,
  "JourneyType" => $JourneyType,
  "PreferredAirlines" => NULL,
  "Segments" => 
  array (
    0 => 
    array (
      "Origin" => $origin,
      "Destination" => $destination,
      "FlightCabinClass" => $FlightCabinClass,
      "PreferredDepartureTime" => $DepartureDate."T".$PreferredDeTimes,
      "PreferredArrivalTime" => $DepartureDate."T00: 00: 00",
    ),
  ),
  "Sources" => NULL,
)
;

switch ($PreferredAirlines) {
  case "6E":
     $dat["Sources"] = ["6E"];
    break;
  case "SG":
     $dat["Sources"] = ["SG"];
    break;
  case "G8":
     $dat["Sources"] = ["G8"];
    break;  case "UK":
     $dat["Sources"] = ["UK"];
    break;
  default:
     $dat["Sources"] = NULL;
}

// return addding in array 
if($JourneyType == "2"){
    echo $JourneyType;
   
$dat["Segments"] +=  array (1 => array(
      "Origin" => $destination,
      "Destination" => $origin,
      "FlightCabinClass" => "1",
      "PreferredDepartureTime" => $ReturnDate."T00: 00: 00",
      "PreferredArrivalTime" => $ReturnDate."T00: 00: 00",
    ));



}
// echo json_encode($dat);

  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/Search',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => json_encode($dat),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
 // echo $response;

$data = json_decode($response, true);



?>