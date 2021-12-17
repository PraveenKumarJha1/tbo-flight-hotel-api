<?php

// session_start();
if(isset($_SESSION['token'])){
    $tokenID = $_SESSION['token'];
}

if(isset($_SESSION['TraceID'])){
    $traceID = $_SESSION['TraceID'];
}
$localIP = getHostByName(getHostName());


// $pnr= $_GET['pnr'];
// $bookingId= $_GET['bookingId'];

$ticket =array (
  'EndUserIp' => $localIP,
  'TokenId' => $tokenID,
  'TraceId' => $traceID,
  'PNR' => $pnr,
  'BookingId' => $bookingId,
)
;

// print_r($ticket);
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/Ticket',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>json_encode($ticket),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo "<br><br><br><br><br><br> ticket<br>";
// echo $response;
$r = json_decode($response, true);
 $r=$r["Response"]["Response"];
       

//Ticket Request for NON LCC (With Passport Details if Passport details were not passed in Hold Request)



?>