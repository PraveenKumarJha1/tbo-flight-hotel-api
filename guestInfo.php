<?php
session_start();
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

$HotelInfoResult    =$data["HotelInfoResult"];
$HotelDetails       =$HotelInfoResult["HotelDetails"];

$HotelCode         =$HotelDetails["HotelCode"]; 
$HotelName         =$HotelDetails["HotelName"];
$Description        =$HotelDetails["Description"];
$Attractions        =$HotelDetails["Attractions"];
// print_r($Attractions);

$Attractions[0]["Value"];

$HotelFacilities    =$HotelDetails["HotelFacilities"];


$HotelPolicy        =$HotelDetails["HotelPolicy"];
// print_r($HotelPolicy);
$SpecialInstructions=$HotelDetails["SpecialInstructions"];
// print_r($SpecialInstructions);
$HotelPicture       =$HotelDetails["HotelPicture"];
// print_r($HotelPicture);
$Images             =$HotelDetails["Images"];


?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/all.css" />
        <link rel="stylesheet" href="css/owl.carousel.css" />
        <script src="js/js.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/all.js" type="text/javascript"></script>
        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/owl.carousel.min.js" type="text/javascript"></script>
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
        <section class="guest-info">
            <div class="container">
                <div class="traveller-info">
                    <div class="flow-info">
                        <div class="circle fill">

                        </div>
                        <div class="line line-info"></div>
                        <div class="circle">

                        </div>
                        <div class="line line-info"></div>
                        <div class="circle">

                        </div>
                    </div>
                    <div class="flow-info text-box">
                        <div>
                            Guest Information
                        </div>
                        <div class="payment">
                            Payment Method
                        </div>
                        <div>
                            Booking Confirmed
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                        <div class="guest-details">
                            <h1>
                                <span><i class="fas fa-user"></i></span>
                                <span>Your Details</span>
                            </h1>
                            <p>
                                Please tell us the name of the guest staying at the hotel as it appears on the ID that they’ll present
                                 at check-in.
                            </p>
                            <p>
                                <span class="star-txt">*</span>
                                <span class="required-txt">fields are required</span>
                            </p>
                            <div>
                                <div class="input-fields">
                                    <label class="label-title f-name">First Name<span class="star-txt">*</span></label>
                                    <label class="note">Please give us the name of one of the people staying in this room.</label>
                                    <input type="text" class="form-control" placeholder="First Name"/>
                                </div>
                                <div class="input-fields">
                                    <label class="label-title">Last Name<span class="star-txt">*</span></label>
                                    <input type="text" class="form-control" placeholder="Last Name"/>
                                </div>
                                <div class="input-fields">
                                    <label class="label-title">Email Address<span class="star-txt">*</span></label>
                                    <input type="text" class="form-control" placeholder="Email"/>
                                </div>
                                <div class="input-fields">
                                    <label class="label-title">Mobile Number<span class="star-txt">*</span></label>
                                    <input type="text" class="form-control" placeholder="Mobile Number"/>
                                </div>
                            </div>
                        </div>

                        <?php require 'HotelApi/room.php'; ?>
                        <div class="room-info">
                            <h1>
                                <span><i class="fas fa-bed"></i></span>
                                <span>Room Details</span>
                            </h1>
                            <div>
           <?php 
            $co=$Room["HotelRoomsDetails"];
            echo count($co);
           for($i=0;$i< count($co);$i++){
            $RoomHotelRoomsDetails  = $Room["HotelRoomsDetails"][$i];
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

            ?>

                                <p class="neces-info">
                                    <?php 

                                    echo $RoomTypeName ."<span style='padding-right:60px;'>        </span>" .$CurrencyCode ."    " .$OfferedPriceRoundedOff; 
                                     ?>
                                </p>
                                <div class="more-desc">
                                    <span>
                                        <span style="color: green"><i class="fas fa-check"></i></span>
                                        <span class="include-txt">Included in your room: </span>
                                    </span>
                                    <?php 
                                        for($j=0; $j< count($HAmenities);$j++){
                                            echo '<span class="neces-text">
                                                <span><i class="fas fa-wifi"></i></span> ';
                                            echo "<span>" .$HAmenities[$j] ."</span>
                                                </span>";
                                        }

                                        ?>
                                  
  
                                    <span class="neces-text">
                                        <span><i class="fas fa-smoking-ban"></i></span>
                                        <span> Smoking: <?php echo $HSmokingPreference ?></span>
                                    </span>
                                </div>
            <?php } ?>
                            </div>

                        </div>



                        <div class="room-info">
                            <h1>
                                <span><i class="fas fa-bed"></i></span>
                                <span>Hotel Details</span>
                            </h1>
                            <div>
                                <?php echo $Description ; ?>

                                <p class="titl"><h1>Attractions</h1></p>
                                <p class="neces-info">
                                       <?php echo $Attractions[0]["Value"];  ?>
                                </p>
                                <div class="more-desc">
                                    <span>
                                        <span style="color: green"><i class="fas fa-check"></i></span>
                                        <span class="include-txt">Included in your Hotel: </span>
                                    </span>
                                    <?php 
                                        for($i=0; $i< count($HotelFacilities);$i++){
                                                echo '<span class="neces-text">
                                                        <span><i class="fas fa-wifi"></i></span> ';
                                                    echo "<span>" .$HotelFacilities[$i] ."</span>
                                                        </span>";
                                                }
                                    ?>

                                    
                       
                                </div>
                            </div>
                        </div>




                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="wrapper">
                            <div class="carousel owl-carousel">
                              
                                    <?php 
                                            for($i=0;$i< count($Images);$i++){
                                                echo "  <div>";
                                                echo "<img src='".$Images[$i] ."' class='img-fluid' style='height:260px ;'>";
                                                echo "</div>";
                                            }
                                    ?>
            
                                
                            </div>
                            <div class="property" >
                                <div class="hotel-name">
                                    <?php echo $HotelName ?>
                                </div>
                                <div class="hotel-address">
                                    <?php echo $HotelDetails["Address"] ?>
                                </div>
                            </div>
                            <div class="check-detail">
                                <div>
                                    <span class="title">Check-in : </span>
                                    <span class="value">Thursday, December 9, 2021 (noon)</span>
                                </div>
                                <div>
                                    <span class="title">Check-out : </span>
                                    <span class="value">Friday, December 10, 2021 (noon)</span>
                                </div>
                                <div class="nights">
                                    1 night, 1 room
                                </div>
                            </div>
                            <div class="delux">
                                Deluxe Room, 1 Double Bed
                            </div>
                            <div class="date-price">
                                <div class="day">
                                    Thursday, December 9, 2021
                                </div>
                                <div class="room-price">
                                    Rs. 1,099.45
                                </div>
                            </div>
                            <div class="total-price">
                                <div>Total Price</div>
                                <div class="total-price-info">
                                    <div class="grand-total-price">
                                        Rs 1,231.39
                                    </div>
                                    <div class="room-detail">
                                        for 1 room, 2 guests, 1 night
                                    </div>
                                    <div class="room-detail">
                                        Inclusive all taxes
                                    </div>
                                </div>
                            </div>
                            <div class="continue-aria">
                                <button type="button" class="continue">Continue</button>
                            </div>
                        </div>
                        
                    </div>

                </div>
            </div>
        </section>

        <script>
            $(".carousel").owlCarousel({
                margin: 10,
                loop: true,
                autoplay: true,
                autoplayHoverPause: true,
                responsive: {
                    0:{
                        items: 1,
                        nav: true,
                        dots: false
                    },
                    600:{
                        items: 1,
                        nav: true,
                        dots: false
                    },
                    1000:{
                        items: 1,
                        nav: true,
                        dots: false
                    }
                }
                
            });
        </script>
    </body>
</html>