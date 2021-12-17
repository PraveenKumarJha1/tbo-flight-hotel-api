<?php

if(isset($_SESSION['token'])){
    $tokenID = $_SESSION['token'];
}
$localIP = getenv("REMOTE_ADDR");


$dat = array (
	 "ResultIndex" => $_POST['ResultIndex'],
    "HotelCode" => $_POST['HotelCode'],
    "TraceId" => $_SESSION['TraceId'],
    'EndUserIp' => $localIP,
    'TokenId' => $tokenID,
)
;

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://api.tektravels.com/BookingEngineService_Hotel/hotelservice.svc/rest/GetHotelRoom',
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
$RoomData = json_decode($response, true);

$Room               =$RoomData["GetHotelRoomResult"];
$RoomResponseStatus = $Room["ResponseStatus"];

echo $RoomIsUnderCancellationAllowed = $Room["IsUnderCancellationAllowed"];

function fetchHotel($i){

$RoomHotelRoomsDetails  = $GLOBALS['Room']["HotelRoomsDetails"][$i];

$Availability           = $RoomHotelRoomsDetails["AvailabilityType"];

$ChildCount             = $RoomHotelRoomsDetails["ChildCount"];

$RequireAllPaxDetails   = $RoomHotelRoomsDetails["RequireAllPaxDetails"];

$RoomId                 = $RoomHotelRoomsDetails["RoomId"];

$RoomStatus             = $RoomHotelRoomsDetails["RoomStatus"];

$RoomIndex              = $RoomHotelRoomsDetails["RoomIndex"];

$RoomTypeCode           = $RoomHotelRoomsDetails["RoomTypeCode"];

$RoomDescription        = $RoomHotelRoomsDetails["RoomDescription"];

$RoomTypeName           = $RoomHotelRoomsDetails["RoomTypeName"];

$RatePlanCode           = $RoomHotelRoomsDetails["RatePlanCode"];

$RatePlan               = $RoomHotelRoomsDetails["RatePlan"];

$RatePlanName           = $RoomHotelRoomsDetails["RatePlanName"];

$InfoSource             = $RoomHotelRoomsDetails["InfoSource"];

$SequenceNo             = $RoomHotelRoomsDetails["SequenceNo"];


$DayRates             = $RoomHotelRoomsDetails["DayRates"][0];
  $Amount             = $DayRates["Amount"];
  $Date               = $DayRates["Date"];
$IsPerStay    = $RoomHotelRoomsDetails["IsPerStay"];
$SupplierPrice    = $RoomHotelRoomsDetails["SupplierPrice"];

$Price          = $RoomHotelRoomsDetails["Price"];
$CurrencyCode   =$Price["CurrencyCode"];
$RoomPrice      =$Price["RoomPrice"];
$Tax           =$Price["Tax"];
$OfferedPriceRoundedOff           =$Price["OfferedPriceRoundedOff"];

$RoomPromotion           =$RoomHotelRoomsDetails["RoomPromotion"];

$HAmenities           =$RoomHotelRoomsDetails["Amenities"];
$HAmenities;
$HSmokingPreference           =$RoomHotelRoomsDetails["SmokingPreference"];

$CancellationPolicies         =$RoomHotelRoomsDetails["CancellationPolicies"][0];
      $Charge=$CancellationPolicies["Charge"];
      $ChargeType=$CancellationPolicies["ChargeType"];
      $Currency=$CancellationPolicies["Currency"];
      $FromDate=$CancellationPolicies["FromDate"];
      $ToDate=$CancellationPolicies["ToDate"];

$CancellationPolicy         =$RoomHotelRoomsDetails["CancellationPolicy"];
}

?>