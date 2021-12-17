<?php

$localIP = getenv("REMOTE_ADDR");

$postdata = array (
  "ClientId"    => "ApiIntegrationNew",
    "UserName"  => "bigvalue",
    "Password"  => "bigvalue@123",
    "EndUserIp" => $localIP
)
;
    
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://api.tektravels.com/SharedServices/SharedData.svc/rest/Authenticate',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => json_encode($postdata),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

// print_r($response);

$array = json_decode($response,true);

// echo $array["Status"] ; echo "<br>";
$token=$array["TokenId"] ;
echo $_SESSION['token']= $token;


?>