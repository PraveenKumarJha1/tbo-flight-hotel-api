<?php



$tickets=array (
  'PreferredCurrency' => NULL,
  'ResultIndex' => $resultIndex,
  'AgentReferenceNo' => 'sonam1234567890',
  'Passengers' => 
  array (
    0 => 
    array (
      'Title' => $title,
      'FirstName' => $fname,
      'LastName' => $lname,
      'PaxType' => 1,
      'Gender' => $gender,
      'AddressLine1' => $Address1,
      'AddressLine2' => $Address2,
      'Fare' => 
      array (
        'BaseFare' => $BaseFare,
        'Tax' => $Tax,
        'YQTax' => $YQTax,
        'AdditionalTxnFeePub' => $AdditionalTxnFeePub,
        'AdditionalTxnFeeOfrd' =>  $AdditionalTxnFeeOfrd,
        'OtherCharges' =>$OtherCharges,
      ),
      'City' => $city,
      'CountryCode' => $country,
      'CountryName' => 'India',
      'Nationality' => $Nationality,
      'ContactNo' => $CellNumber,
      'Email' => $email,
      'IsLeadPax' => true,
      'FFAirlineCode' => '',
      'FFNumber' => '',
      'Baggage' => 
      array (
        0 => $SSSBaggage,
      ),
      'MealDynamic' => $SSSMealDynamic,
     
      'GSTCompanyAddress' => '',
      'GSTCompanyContactNumber' => '',
      'GSTCompanyName' => '',
      'GSTNumber' => '',
      'GSTCompanyEmail' => '',
    ),
  ),
  'EndUserIp' => $localIP,
  'TokenId' => $tokenID,
  'TraceId' =>  $traceID,
)
        ;
// print_r($tickets);
$curlsed = curl_init();

curl_setopt_array($curlsed, array(
  CURLOPT_URL => 'http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/Ticket',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>json_encode($tickets),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$ressslcc = curl_exec($curlsed);
curl_close($curlsed);
// echo $ressslcc;

$r = json_decode($ressslcc, true);



?>