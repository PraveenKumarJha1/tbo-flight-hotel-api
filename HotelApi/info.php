<?php
// CityId=130443
session_start();
if(isset($_SESSION['token'])){
    $tokenID = $_SESSION['token'];
}
$localIP = getenv("REMOTE_ADDR");


$dat = array (
	"ResultIndex" => $_GET['ResultIndex'],
  	"HotelCode" => $_GET['HotelCode'],
  	"TraceId" => $_SESSION['TraceId'],
  	'EndUserIp' => $localIP,
  	'TokenId' => $tokenID,
)
;

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://api.tektravels.com/BookingEngineService_Hotel/hotelservice.svc/rest/GetHotelInfo',
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

$HotelInfoResult	=$data["HotelInfoResult"];
$HotelDetails		=$HotelInfoResult["HotelDetails"];

echo $HotelCode			=$HotelDetails["HotelCode"]; echo "<br>";
echo $HotelName			=$HotelDetails["HotelName"];echo "<br>";echo "<br>";
echo$Description		=$HotelDetails["Description"];echo "<br>";
$Attractions		=$HotelDetails["Attractions"];echo "<br>";
// print_r($Attractions);
echo "<h1>Attractions: </h1>";
echo $Attractions[0]["Value"];

$HotelFacilities	=$HotelDetails["HotelFacilities"];echo "<br>";
// print_r($HotelFacilities);
echo"<h1> HotelFacilities </h1>";
echo "<ul>";
for($i=0; $i< count($HotelFacilities);$i++){
	echo "<li>".$HotelFacilities[$i] ."</li>	";
}
echo "</ul>";

$HotelPolicy		=$HotelDetails["HotelPolicy"];echo "<br>";
print_r($HotelPolicy);
$SpecialInstructions=$HotelDetails["SpecialInstructions"];echo "<br>";
print_r($SpecialInstructions);
$HotelPicture		=$HotelDetails["HotelPicture"];echo "<br>";
print_r($HotelPicture);
$Images				=$HotelDetails["Images"];echo "<br>";
// print_r($Images);
echo "<h1> Gallery </h1>";
	for($i=0;$i< count($Images);$i++){
echo "<img src='".$Images[$i] ."'>";
echo "<br>";


}

print_r($HotelDetails["Address"]);
print_r($HotelDetails["CountryName"]);
print_r($HotelDetails["PinCode"]);
print_r($HotelDetails["HotelContactNo"]);
print_r($HotelDetails["HotelContactNo"]);
print_r($HotelDetails["FaxNumber"]);
print_r($HotelDetails["Email"]);
print_r($HotelDetails["Latitude"]);
print_r($HotelDetails["Longitude"]);
print_r($HotelDetails["RoomData"]);
print_r($HotelDetails["RoomFacilities"]);
print_r($HotelDetails["Services"]);
?>