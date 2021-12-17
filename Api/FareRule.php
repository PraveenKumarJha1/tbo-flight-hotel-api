<?php

// session_start();

if(isset($_SESSION['token'])){
    $tokenID = $_SESSION['token'];
}

if(isset($_SESSION['TraceID'])){
    $traceID = $_SESSION['TraceID'];
}
$localIP = getHostByName(getHostName());
$resultIndex=$_POST["ResultIndex"];

$FareRule = array (
				  'EndUserIp' => $localIP,
				  'TokenId' => $tokenID,
				  'TraceId' => $traceID,
				  'ResultIndex' => $resultIndex,
				);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/FareRule',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>json_encode($FareRule),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

$data = json_decode($response, true);
echo $data["Response"]["FareRules"]["0"]["FareRuleDetail"];


?>