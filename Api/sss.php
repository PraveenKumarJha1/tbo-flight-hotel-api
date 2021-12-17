<?php


$sss = array (
          'EndUserIp' => $localIP,
          'TokenId' => $tokenID,
          'TraceId' => $traceID,
          'ResultIndex' => $resultIndex,
        );


$curls = curl_init();

curl_setopt_array($curls, array(
  CURLOPT_URL => 'http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/SSR',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>json_encode($sss),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$resss = curl_exec($curls);

curl_close($curls);
// echo $resss;


?>