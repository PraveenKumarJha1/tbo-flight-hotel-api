<?php



$datas= array (
  'ResultIndex' => $resultIndex,
  'Passengers' => array (
      0 => array (
        'Title' => $title,
        'FirstName' => $fname,
        'LastName' => $lname,
        'PaxType' => 1,
        'DateOfBirth' => $dob .'T00:00:00',
        'Gender' => $gender,
        'PassportNo' => $PassportNo,
        'PassportExpiry' => $PassportExpiry .'T00:00:00',
        'AddressLine1' => $Address1,
        'AddressLine2' => $Address2,
        'Fare' => array (
          'Currency' => $Currency,
          'BaseFare' => $BaseFare ,
          'Tax' => $Tax,
          'YQTax' => $YQTax,
          'AdditionalTxnFeePub' => $AdditionalTxnFeeOfrd,
          'AdditionalTxnFeeOfrd' =>$AdditionalTxnFeePub,
          'OtherCharges' => $OtherCharges,
          'Discount' => $Discount,
          'PublishedFare' => $PublishedFare,
          'OfferedFare' => $OfferedFare,
          'TdsOnCommission' => $TdsOnCommission,
          'TdsOnPLB' => $TdsOnPLB,
          'TdsOnIncentive' => $TdsOnIncentive ,
          'ServiceFee' => $ServiceFee,
        ),
      'City' => $city,
      'CountryCode' => $country,
      'CellCountryCode' => $CellCountryCode.'-',
      'ContactNo' => $CellNumber,
      'Email' => $email,
      'IsLeadPax' => true,
      'FFAirlineCode' => NULL,
      'FFNumber' => '',
      'GSTCompanyAddress' => '',
      'GSTCompanyContactNumber' => '',
      'GSTCompanyName' => '',
      'GSTNumber' => '',
      'GSTCompanyEmail' => '',
    ),
    1 => array (
        'Title' => 'Mr',
        'FirstName' => 'test',
        'LastName' => 'tbotest',
        'PaxType' => 1,
        'DateOfBirth' => $dob .'T00:00:00',
        'Gender' =>'1',
        'PassportNo' => 'kjsikjkjht',
        'PassportExpiry' => $PassportExpiry .'T00:00:00',
        'AddressLine1' => 'aaa',
        'AddressLine2' => 'bbb',
        'Fare' => array (
          'Currency' => $Currency,
          'BaseFare' => $BaseFare ,
          'Tax' => $Tax,
          'YQTax' => $YQTax,
          'AdditionalTxnFeePub' => $AdditionalTxnFeeOfrd,
          'AdditionalTxnFeeOfrd' =>$AdditionalTxnFeePub,
          'OtherCharges' => $OtherCharges,
          'Discount' => $Discount,
          'PublishedFare' => $PublishedFare,
          'OfferedFare' => $OfferedFare,
          'TdsOnCommission' => $TdsOnCommission,
          'TdsOnPLB' => $TdsOnPLB,
          'TdsOnIncentive' => $TdsOnIncentive ,
          'ServiceFee' => $ServiceFee,
        ),
      'City' => $city,
      'CountryCode' => $country,
      'CellCountryCode' => $CellCountryCode.'-',
      'ContactNo' => $CellNumber,
      'Email' => $email,
      'IsLeadPax' => false,
      'FFAirlineCode' => NULL,
      'FFNumber' => '',
      'GSTCompanyAddress' => '',
      'GSTCompanyContactNumber' => '',
      'GSTCompanyName' => '',
      'GSTNumber' => '',
      'GSTCompanyEmail' => '',
    ),
        
  ),
  'EndUserIp' => $localIP,
  'TokenId' => $tokenID,
  'TraceId' => $traceID,
);
print_r($datas);
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/Book',  
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>json_encode($datas),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;

$data = json_decode($response, true);
echo "<br>";
$res=$data["Response"]["Response"];
// echo $res["PNR"];
// echo "<br>";
// echo $res["BookingId"];
// echo "<br>";
// echo $res["SSRDenied"];
// echo "<br>";
// echo $res["SSRMessage"];
// echo "<br>";
// echo $res["Status"];
// echo "<br>";
// echo $res["IsPriceChanged"];
// echo "<br>";
// echo $res["IsTimeChanged"];
// echo "<br>";

// echo $res["FlightItinerary"]["CommentDetails"];
// echo "<br>";
// echo $res["FlightItinerary"]["JourneyType"];
// echo "<br>";
// echo $res["FlightItinerary"]["TripIndicator"];
// echo "<br>";
// echo $res["FlightItinerary"]["BookingAllowedForRoamer"];
// echo "<br>";
// echo $res["FlightItinerary"]["BookingId"];echo "<br>";
// echo $res["FlightItinerary"]["IsCouponAppilcable"]; echo "<br>";
// echo $res["FlightItinerary"]["IsManual"];echo "<br>";
// echo $res["FlightItinerary"]["PNR"];echo "<br>";
// echo $res["FlightItinerary"]["IsDomestic"];echo "<br>";
// echo $res["FlightItinerary"]["ResultFareType"];echo "<br>";
// echo $res["FlightItinerary"]["Source"];echo "<br>";
// echo $res["FlightItinerary"]["Origin"];echo "<br>";
// echo $res["FlightItinerary"]["Destination"];echo "<br>";
// echo $res["FlightItinerary"]["AirlineCode"];echo "<br>";
// echo $res["FlightItinerary"]["LastTicketDate"];echo "<br>";
// echo $res["FlightItinerary"]["ValidatingAirlineCode"];echo "<br>";
// echo $res["FlightItinerary"]["AirlineRemarks"];echo "<br>";
// echo $res["FlightItinerary"]["IsLCC"];echo "<br>";
// echo $res["FlightItinerary"]["NonRefundable"];echo "<br>";
// echo $res["FlightItinerary"]["FareType"];echo "<br>";
// echo "<br>";
// echo $res["FlightItinerary"]["Fare"]["Currency"];echo "<br>";
// echo $res["FlightItinerary"]["Fare"]["BaseFare"];echo "<br>";
// echo $res["FlightItinerary"]["Fare"]["Tax"];echo "<br>";
// echo $res["FlightItinerary"]["Fare"]["YQTax"];echo "<br>";
// echo $res["FlightItinerary"]["Fare"]["AdditionalTxnFeeOfrd"];echo "<br>";
// echo $res["FlightItinerary"]["Fare"]["OtherCharges"];echo "<br>";
// echo $res["FlightItinerary"]["Fare"]["Discount"];echo "<br>";
// echo $res["FlightItinerary"]["Fare"]["PublishedFare"];
// echo $res["FlightItinerary"]["Fare"]["CommissionEarned"];echo "<br>";
// echo $res["FlightItinerary"]["Fare"]["PLBEarned"];echo "<br>";
// echo $res["FlightItinerary"]["Fare"]["IncentiveEarned"];echo "<br>";
// echo $res["FlightItinerary"]["Fare"]["OfferedFare"];echo "<br>";
// echo $res["FlightItinerary"]["Fare"]["TdsOnCommission"];echo "<br>";
// echo $res["FlightItinerary"]["Fare"]["TdsOnPLB"];echo "<br>";
// echo $res["FlightItinerary"]["Fare"]["TdsOnIncentive"];echo "<br>";
// echo $res["FlightItinerary"]["Fare"]["ServiceFee"];echo "<br>";
// echo $res["FlightItinerary"]["Fare"]["TotalBaggageCharges"];echo "<br>";
// echo $res["FlightItinerary"]["Fare"]["TotalMealCharges"];echo "<br>";
// echo $res["FlightItinerary"]["Fare"]["TotalSeatCharges"];echo "<br>";
// echo $res["FlightItinerary"]["Fare"]["TotalSpecialServiceCharges"];echo "<br>";


// echo$PaxID= $res["FlightItinerary"]["Passenger"]["0"]["PaxId"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["Title"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["FirstName"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["LastName"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["PaxType"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["Gender"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["AddressLine1"];echo "<br>";
// // echo $res["FlightItinerary"]["Passenger"]["0"]["AddressLine2"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["City"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["CountryCode"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["Nationality"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["ContactNo"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["Email"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["IsLeadPax"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["FFAirlineCode"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["FFNumber"];echo "<br>";

// echo $res["FlightItinerary"]["Passenger"]["0"]["Fare"]["Currency"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["Fare"]["BaseFare"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["Fare"]["Tax"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["Fare"]["YQTax"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["Fare"]["AdditionalTxnFeeOfrd"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["Fare"]["AdditionalTxnFeePub"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["Fare"]["OtherCharges"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["Fare"]["Discount"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["Fare"]["PublishedFare"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["Fare"]["CommissionEarned"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["Fare"]["PLBEarned"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["Fare"]["IncentiveEarned"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["Fare"]["IncentiveEarned"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["Fare"]["OfferedFare"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["Fare"]["TdsOnCommission"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["Fare"]["TdsOnPLB"];echo "<br>";
// echo $res["FlightItinerary"]["Passenger"]["0"]["Fare"]["TdsOnIncentive"];echo "<br>";


// echo $res["FlightItinerary"]["Passenger"]["Fare"]["Meal"];echo "<br>";echo "<br>";

// echo $data["Response"]["Response"]["FlightItinerary"]["FareRules"]["0"]["FareRuleDetail"]; echo "<br>";

?>