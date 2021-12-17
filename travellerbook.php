<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/all.css" />
        <script src="js/js.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/all.js" type="text/javascript"></script>
        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Fly<b>High</b></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Holiday Package</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Flight Schedule</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Account Setting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" >Manage Booking</a>
                            </li>
                        </ul>
                        <div class="d-flex align-items-center">
                            <a class="register" href="#">Register</a>
                            <button class="btn-signin">Sign In</button>
                            <select class="lang-select">
                                <option>EN</option>
                                <option>HN</option>
                            </select>
                        </div>
                    </div>
                </div>
            </nav>
          </div>


<?php
session_start();

if(isset($_SESSION['token'])){
    $tokenID = $_SESSION['token'];
}

if(isset($_SESSION['TraceID'])){
    $traceID = $_SESSION['TraceID'];
}
$localIP = getHostByName(getHostName());

$resultIndex=$_POST['resultIndex'];
$gender=$_POST['gender'];
$title=$_POST['title'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$dob=$_POST['dob'];
$PassportNo=$_POST['PassportNo'];
$PassportExpiry=$_POST['PassportExpiry'];
$email=$_POST['email'];
$CellCountryCode=$_POST['cellCountryCode'];
$CellNumber=$_POST['cellNumber'];
$city=$_POST['city'];
$country=$_POST['country'];
$Nationality=$_POST['Nationality'];
$Address1=$_POST['Address1'];
$Address2=$_POST['Address2'];


$FareQuoteData = array (
          'EndUserIp' => $localIP,
          'TokenId' => $tokenID,
          'TraceId' => $traceID,
          'ResultIndex' => $resultIndex,
        );


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://api.tektravels.com/BookingEngineService_Air/AirService.svc/rest/FareQuote',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>json_encode($FareQuoteData),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;

$data = json_decode($response, true);

if ($data["Response"]["ResponseStatus"] ==2)
    {
         echo "No Result.";
     }
if($data["Response"]["ResponseStatus"] ==1)
{
        $data["Response"]["Results"]["IsHoldAllowedWithSSR"];
        $ResultIndex=$data["Response"]["Results"]["ResultIndex"];
        $IsLCC=$data["Response"]["Results"]["IsLCC"];

           
        $fare = $data["Response"]["Results"]["Fare"];
        $Currency               =$fare["Currency"];
        $BaseFare               =$fare["BaseFare"];
        $Tax                    =$fare["Tax"];
        $YQTax                  =$fare["YQTax"];
        $AdditionalTxnFeeOfrd   =$fare["AdditionalTxnFeeOfrd"];
        $AdditionalTxnFeePub    =$fare["AdditionalTxnFeePub"];
        $PGCharge               =$fare["PGCharge"];
        $OtherCharges           =$fare["OtherCharges"];
        $Discount               =$fare["Discount"];
        $PublishedFare          =$fare["PublishedFare"];
        $CommissionEarned       =$fare["CommissionEarned"];
        $PLBEarned              =$fare["PLBEarned"];
        $OfferedFare            =$fare["OfferedFare"];
        $TdsOnCommission        =$fare["TdsOnCommission"];
        $TdsOnPLB               =$fare["TdsOnPLB"];
        $TdsOnIncentive         =$fare["TdsOnIncentive"];
        $ServiceFee             =$fare["ServiceFee"];
        $TotalBaggageCharges    =$fare["TotalBaggageCharges"];
        $TotalMealCharges       =$fare["TotalMealCharges"];
        $TotalSeatCharges       =$fare["TotalSeatCharges"];
        $TotalSeatCharges       =$fare["TotalSeatCharges"];
        $TotalSpecialServiceCharges =$fare["TotalSpecialServiceCharges"];

        

}
 
if($_POST['isLCC']==1){
        $resultIndex= $_POST['resultIndex'];
        require 'Api/sss.php';
        echo "<br> isLCC";
        $datasss = json_decode($resss, true);
       
            $SSSBaggage     = $datasss["Response"]["Baggage"]["0"]["0"];
            $SSSMealDynamic = $datasss["Response"]["MealDynamic"]["0"];

            
            require 'Api/lccTicket.php';

            $r=$r["Response"]["Response"];
            // echo "<br>";
            // echo "<h1> PNR: " .$r["PNR"] ." </h1>";
            // echo "<br>";
            // echo "<h1> BookingId: " .$r["BookingId"] ."</h1>";

echo '
        <div class="container goto-payment-box">
            <div class="goto-payment">
                <div>
                  <span>Booking Status : </span>
                  <span class="txt">Ticket Generated</span>
                </div>
                <div>
                    <span>PNR NO : </span>
                    <span class="txt">' .$r["PNR"] .'</span>
                </div>
                <div>
                    <span>Booking ID : </span>
                    <span class="txt">'.$r["BookingId"].'</span>
                </div>
            
                 <div class="got-payment-btn">
                 
                    <button type="button" class="btn btn-primary">
                        <span><a href="index.php">Go To Home Page</a></span>
                    </button>
              </div>
            
    
            </div>
        </div>


';
    

}else{


require('Api/book.php');


// "PNR: ";
$pnr= $res["PNR"];
"<br>";
// "Booking id:  "; 
$bookingId=$res["BookingId"];

// echo "<script>alert('Your Booking iS sucssesful PNR: $pnr'); </script>";
// echo "<a href='ticket.php?pnr=".$pnr ."&bookingId=" .$bookingId ." ' >Get Ticket </a>" ;

require 'ticket.php';

    echo '
        <div class="container goto-payment-box">
            <div class="goto-payment">
                <div>
                  <span>Status : </span>
                  <span class="txt">Ticket Generated</span>
                </div>
                <div>
                    <span>PNR NO : </span>
                    <span class="txt">' .$r["PNR"] .'</span>
                </div>
                <div>
                    <span>Booking ID : </span>
                    <span class="txt">' .$r["BookingId"] .'</span>
                </div>
            
                 <div class="got-payment-btn">
                 
                    <button type="button" class="btn btn-primary">
                        <a href="index.php">Go To Home Page</a>
                    </button>
              </div>
            
    
            </div>
        </div>


';



}

?>

    </body>
</html>