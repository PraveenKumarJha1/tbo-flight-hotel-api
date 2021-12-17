<?php

include 'Api/FareQuote.php';
if ($data["Response"]["ResponseStatus"] ==2)
    {
         echo "No Result.";
     }
if($data["Response"]["ResponseStatus"] ==1)
{

    
           $data["Response"]["Results"]["IsHoldAllowedWithSSR"];
           $isLCC= $data["Response"]["Results"]["IsLCC"];
        print_r($isLCC);

              $ResultIndex=$data["Response"]["Results"]["ResultIndex"];

                $Refundable;
                if($data["Response"]["Results"]["IsRefundable"] == 1){
                        $Refundable= "Refundable";
                }else{
                    $Refundable="Non-Refundable";
                }

               
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




                $FareRules= $data["Response"]["Results"]["FareRules"];
                $Origin         = $FareRules["0"]["Origin"];
                $Destination    = $FareRules["0"]["Destination"];
                $Airline        = $FareRules["0"]["Airline"];
                $FareBasisCode  = $FareRules["0"]["FareBasisCode"];
                $FareRuleDetail = $FareRules["0"]["FareRuleDetail"];
                $FareRestriction = $FareRules["0"]["FareRestriction"];
                $FareFamilyCode = $FareRules["0"]["FareFamilyCode"];
                $FareRuleIndex  = $FareRules["0"]["FareRuleIndex"];

                $FareBreakdown  = $data["Response"]["Results"]["FareBreakdown"]["0"];
                $FCurrency      = $FareBreakdown["Currency"];
                $PassengerType   = $FareBreakdown["PassengerType"];
                $PassengerCount  = $FareBreakdown["PassengerCount"];
                $FBaseFare        = $FareBreakdown["BaseFare"];
                $FTax        = $FareBreakdown["Tax"];


 // segement
    $segments = $data["Response"]["Results"]["Segments"];

        
        $NoOfStop     =   count($segments["0"]) ;



     $OriginAirportCodeArray        = []; 
     $DestinationAirportCodeArray   = []; 
     $AirlineNameArray              = [];
     $AirlineCodeAndNumberArray     = [];
     $NoOfSeatAvailableArray        = [];
     $DepartureArray                = [];
     $durationArray                 = [];
     $GroundTimeArray               = [];
        for($z=0;$z < $NoOfStop;$z++ )
     
        {
    $Baggage        =   $segments["0"][$z]["Baggage"] ;
    $CabinBaggage   =   $segments["0"][$z]["CabinBaggage"] ;
    $CabinClass     =   $segments["0"][$z]["CabinClass"] ;

    $TripIndicator      =   $segments["0"][$z]["TripIndicator"] ;
    $SegmentIndicator   =   $segments["0"][$z]["SegmentIndicator"] ;

    $AirlineName    =  $segments["0"][$z]["Airline"]["AirlineName"] ;
       

    $FlightNumber   =  $segments["0"][$z]["Airline"]["FlightNumber"] ;
    $AirlineCode    =  $segments["0"][$z]["Airline"]["AirlineCode"] ;
           

    $FareClass      =  $segments["0"][$z]["Airline"]["FareClass"] ;

   
    $OriginAirportCode  = $segments["0"][$z]["Origin"]["Airport"]["AirportCode"] ;
        


    $OriginAirportName  = $segments["0"][$z]["Origin"]["Airport"]["AirportName"] ;
    $OriginTerminal     = $segments["0"][$z]["Origin"]["Airport"]["Terminal"];
    $OriginCityName     = $segments["0"][$z]["Origin"]["Airport"]["CityName"] ;
    $OriginCountryCode  = $segments["0"][$z]["Origin"]["Airport"]["CountryCode"] ;
    $OriginCountryName  = $segments["0"][$z]["Origin"]["Airport"]["CountryName"] ;
    $Departure          = $segments["0"][$z]["Origin"]["DepTime"] ;
        

  
    
    $DestinationAirportCode     = $segments["0"][$z]["Destination"]["Airport"]["AirportCode"] ;      
    $DestinationAirportName     = $segments["0"][$z]["Destination"]["Airport"]["AirportName"] ;
    $DestinationTerminal        = $segments["0"][$z]["Destination"]["Airport"]["Terminal"] ;
    $DestinationCityName        = $segments["0"][$z]["Destination"]["Airport"]["CityName"] ;
    $DestinationCountryCode     = $segments["0"][$z]["Destination"]["Airport"]["CountryCode"] ;
    $DestinationCountryName     = $segments["0"][$z]["Destination"]["Airport"]["CountryName"] ;

    $Arrival= $segments["0"][$z]["Destination"]["ArrTime"] ;

    $Arrival = explode ("T", $Arrival); 
    $Arrival["0"];  // date
    $Arrival["1"];  // time

    $duration= $segments["0"][$z]["Duration"];
   

    $StopPoint= $segments["0"][$z]["StopPoint"];
    $StopOver= $segments["0"][$z]["StopOver"];
   
            if($NoOfStop ==1 ){
                 if($StopOver == false){
                    $StopOver= "Non-stop";
                 }else{
                   $StopOver= $StopOver ."-Stop";
                 }
            }else{
                $StopOver= $NoOfStop-1 ."-Stop";
            }
   



    $CabinClassValue;
    if($CabinClass==1){    $CabinClassValue= "all";    }
    elseif($CabinClass==2){$CabinClassValue= "Economy";    }
    elseif($CabinClass==3){$CabinClassValue= "Premium Economy";}
    elseif($CabinClass==4){$CabinClassValue= "Bussiness";}
    elseif($CabinClass==5){$CabinClassValue= "Premium Bussiness";}
    elseif($CabinClass==6){$CabinClassValue= "First";}
    else{
        echo "not";
     }

        array_push($OriginAirportCodeArray, $OriginAirportCode ."," .$OriginCityName);
        array_push($DestinationAirportCodeArray, $DestinationAirportCode ."," .$DestinationCityName);
        array_push($AirlineNameArray,$AirlineName);
        array_push($AirlineCodeAndNumberArray, $AirlineCode ."-" .$FlightNumber);
 
        array_push($DepartureArray,$Departure);
                $Departure= $DepartureArray["0"];
                $Departure = explode ("T", $Departure); 

 
        }
if(isset($segments["0"][$NoOfStop -1]["AccumulatedDuration"])){
            $AccumulatedDuration= $segments["0"][$NoOfStop -1]["AccumulatedDuration"];

        }else{
                $AccumulatedDuration = $duration;
        }



}

?>

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
        <section class="traveller-info">
           
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-10 col-md-10 col-lg-10">
                        <div class="flow-info">
                            <div class="circle fill">

                            </div>
                            <div class="line"></div>
                            <div class="circle">

                            </div>
                            <div class="line"></div>
                            <div class="circle">

                            </div>
                        </div>
                        <div class="flow-info text-box">
                            <div>
                                Traveller Information
                            </div>
                            <div class="payment">
                                Payment Method
                            </div>
                            <div>
                                Booking Confirmed
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-2 col-md-2 col-lg-2">
                        <div class="timer">
                            <span class="icon">
                                <i class="far fa-clock"></i>
                            </span>
                            <span>12 m : 50 s</span>
                        </div>
                    </div>
                </div>
                <div class="f-detail">
                    <div class="f-box">
                        <div class="d-flex"> 
                            <div class="icon">
                                <img src="images/spicejet.png" width="30"/>
                            </div>
                            <div>
                                <div class="d-flex">
                                    <div>
                                        <span class="place"><?php echo $OriginAirportCodeArray["0"] ?></span>
                                        <span class="time"><?php echo $Departure["1"] ;?></span>
                                        <span class="date"><?php echo $Departure["0"] ;?></span>
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                    <div>
                                        <span class="place"> <?php echo end($DestinationAirportCodeArray);?></span>
                                        <span class="time"><?php echo $Arrival["1"] ;?></span>
                                        <span class="date"><?php echo $Arrival["0"] ;?></span>
                                    </div>
                                </div>
                                <div class="more-detail">
                                    <span><?php echo $StopOver; ?></span> .
                                    <span><?php echo $AccumulatedDuration ."min"?></span> .
                                    <span>Check-in NA</span> |
                                    <span>Cabin NA</span>
                                </div>
                            </div>
                        </div>
                        <button class="info" data-bs-toggle="modal" data-bs-target="#extraItemModal" id="i-button"
                            onclick="openModal(this.id)">
                            i
                        </button>
                    </div>
                     <form method="POST" action="travellerbook.php">
                    <div class="row">
                        <form method="POST" action="Api/book.php">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                            <div class="info-body">
                                <div class="info-heading">

                                    <h1>Traveller Information</h1>
                                </div>
                               
                                <div class="tr-detail">
                                  <div class="adult">Passengers Details</div>
                            <!--       <div id="passengers-info">
                                        
                                    </div> -->
                                <div class="adult">P-1</div>
                                <div class="input-fields">
                                    <select name="gender" class="form-select">
                                        <!-- <option >Gender</option> -->
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                    <select  name="title" class="form-select">
                                            <option value="">Title</option>
                                            <option value="Mr">Mr</option>
                                            <option value="Ms">Ms</option>
                                            <option value="Mrs">Mrs</option>
                                    </select>
                                    <input type="text" class="form-control name" name="fname" placeholder="First Name" />
                                    <input type="text" class="form-control name" name="lname" placeholder="Last Name"/>
                                    <input type="text" class="form-control" name="dob" placeholder="Date of Birth" onfocus="(this.type='date')"/>
                                </div>
                                <div class="input-fields" id="myDIV">
                                    <input type="text" class="form-control" name="PassportNo" placeholder="PassportNo" />
                                    <input type="text" class="form-control" name="PassportExpiry"placeholder="PassportExpiry" onfocus="(this.type='date')"/>
                                </div>

        <?php
                if($_POST['travelcount']=='1'){

                }
                else if($_POST['travelcount']==2){}


        ?>                                    
                                    <div class="input-fields">
<!-- 
                                        <input type="text" name="fname" class="form-control name" placeholder="First Name & Middle Name" />
                                        <input type="text" name="lname" class="form-control" placeholder="Last Name"/> -->
                                    </div>
                                    <div class="freq-flyer">
                                        <span class="fr-text" id="freq-flyer" onclick="showHideFields(this.id)">
                                            Add Frequent Flyer Number
                                        </span>
                                        <span class="plus" id="plus" style="display: inline-block;"><i class="fas fa-plus"></i></span>
                                        <span class="minus" id="minus" style="display: none;"><i class="fas fa-minus"></i></span>
                                        <div class="freq-flyer-aria" id="freq-flyer-aria">
                                            <select class="form-select">
                                                <option value="1">Frequent Flyer Airline</option>
                                                <option value="1">A</option>
                                                <option value="1">A</option>
                                            </select>
                                            <input type="text" class="form-control" placeholder="Frequent Flyer Number" />
                                        </div>
                                    </div>
                               
                                    <div class="adult contact-txt">Contact Information</div>
                                                                        <div>
                                        <div class="d-inline-block marginTB fields-in-contact">
                                            <input type="text" name="email" class="form-control" placeholder="Email"/>
                                        </div>
                                        <div class="d-inline-block marginTB fields-in-contact">
                                            <input type="text" name="cellCountryCode" class="form-control code" placeholder="Country Code(+91)"/>
                                        </div>
                                        <div class="d-inline-block marginTB fields-in-contact">
                                            <input type="text" name="cellNumber" class="form-control" placeholder="Mobile Number"/>
                                        </div>
                                        <div class="d-inline-block marginTB fields-in-contact">
                                            <input type="text" name="city" class="form-control" placeholder="City"/>
                                        </div>
                                        <div class="d-inline-block marginTB fields-in-contact">
                                            <select name="country" class="form-select code">
                                                <option value="0">Country Code</option>
                                                <option value="IN">IN</option>
                                                <option value="AU">AU</option>
                                                <option value="US">US</option>
                                            </select>
                                        </div>
                                        <div class="d-inline-block marginTB fields-in-contact">
                                            <input type="text" name="Nationality" class="form-control" placeholder="Nationality"/>
                                        </div>
                                        <div class="marginTB">
                                            <textarea type="text" name="Address1" class="form-control" placeholder="Address Line 1"></textarea>
                                        </div>
                                        <div class="marginTB">
                                            <textarea type="text" name="Address2" class="form-control" placeholder="Address Line 2"></textarea>
                                        </div>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                            <div class="fare-aria">
                                <div class="info-heading">
                                    <h1>Fare Information</h1>
                                </div>
                                <div class="fare-content">
                                    <div class="fare-box">
                                        <div>
                                            <p class="txt">Base Fare</p>
                                            <!-- <p class="extra-txt">+ Meal / Extra Baggage</p> -->
                                            <p class="txt">Tax & Fees</p>
                                        </div>
                                        <div>
                                            <p class="txt"><?php echo $Currency ." " .$BaseFare ?></p>
                                            <!-- <p class="extra-txt">INR 4,395</p> -->
                                            <p class="txt"><?php echo $Currency ." " .$Tax ?></p>
                                        </div>
                                    </div>
                                    <div class="total-aria">
                                        <div>
                                            <p class="g-txt">Grand Total</p>
                                            <p class="ad-txt">Additional Charges*</p>
                                        </div>
                                        <div>
                                            <p class="g-txt"><?php echo $Currency ." " .$OfferedFare ?></p>
                                            <p class="ad-txt">INR 15</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                                <input type="hidden" name="resultIndex" value="<?php echo $ResultIndex;?>">
                                <input type="hidden" name="isLCC" value="<?php echo $isLCC;?>">
                                <input type="hidden" name="resultIndex" value="<?php echo $ResultIndex;?>">
                                <button type="submit" class="btn-continue">Continue</button>
                           
                        </div>
             
                    </div> </form>
                </div>
            </div>
            
        </section>
        <!--Modal of add meal and baggage and i button-->
        <div class="modal fade" id="extraItemModal" tabindex="-1" aria-labelledby="extraItemModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" id="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="extraItemModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <div id="extra-items">
                            <label class="meal-label">Meal (<span></span>)</label>
                            <?php 

                             $x=count($datasss["Response"]["Meal"]);
                                echo "<select class='form-select' id='meal-item' onchange='extraItem(this.id)>'";
                                echo "<option value= 'none'> None </option>";
                                for($i=0;$i<$x; $i++ ){
                                    $key=$datasss["Response"]["Meal"][$i];
                                    
                                        $c=$key["Code"];
                                        $Des=$key["Description"];
                                        echo  $se= "<option value= '".$c ."'> ".$Des ."</option>
                                                    ";
                                }
                            echo "</select> ";

                            ?>


                            <label class="bag-label">Extra baggage (<span>PAT-DEL</span>)</label>
                            <select class="form-select" id="bag-item" onchange="extraItem(this.id)">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>


                        </div>
                        <div id="flight-info">
                            <div class="f-box f-box-detail">
                                <div class="d-flex"> 
                                    <div>
                                        <div class="d-flex">
                                            <div>
                                                <span class="place"><?php echo $OriginAirportCodeArray["0"] ?></span>
                                                <span class="time"><?php echo $Departure["1"] ;?></span>
                                                <span class="date"><?php echo $Departure["0"] ;?></span>
                                            </div>
                                            <div class="arrow-icon">
                                                <i class="fas fa-arrow-right"></i>
                                            </div>
                                            <div>
                                               <span class="place"> <?php echo end($DestinationAirportCodeArray);?></span>
                                                <span class="time"><?php echo $Arrival["1"] ;?></span>
                                                <span class="date"><?php echo $Arrival["0"] ;?></span>
                                            </div>
                                        </div>
                                        <div class="more-detail">
                                            <span>Non-stop</span> .
                                            <span>01h 50m</span> .
                                            <span>Check-in NA</span> |
                                            <span>Cabin NA</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <!-- <span>INR</span> -->
                                        <span class="final-price"><?php echo $Currency ." " .$OfferedFare ?></span>
                                    </div>
                                    <div class="seat-left">
                                       <!--  <span>9</span>
                                        <span>seat(s) left</span> -->
                                    </div>
                                </div>
                            </div>


                            <div class="detail-aria">
                                
         

<?php
        for($z=0;$z < $NoOfStop;$z++ )
     
        {
        
    $Baggage        =   $segments["0"][$z]["Baggage"] ;
    $CabinBaggage   =   $segments["0"][$z]["CabinBaggage"] ;
    $CabinClass     =   $segments["0"][$z]["CabinClass"] ;

    $TripIndicator      =   $segments["0"][$z]["TripIndicator"] ;
    $SegmentIndicator   =   $segments["0"][$z]["SegmentIndicator"] ;

    $AirlineName    =  $segments["0"][$z]["Airline"]["AirlineName"] ;
    $FlightNumber   =  $segments["0"][$z]["Airline"]["FlightNumber"] ;
    $AirlineCode    =  $segments["0"][$z]["Airline"]["AirlineCode"] ;
    $FareClass      =  $segments["0"][$z]["Airline"]["FareClass"] ;

    // $NoOfSeatAvailable=  $segments["0"][$z]["NoOfSeatAvailable"] ;


    $OriginAirportCode  = $segments["0"][$z]["Origin"]["Airport"]["AirportCode"] ;
      


    $OriginAirportName  = $segments["0"][$z]["Origin"]["Airport"]["AirportName"] ;
    $OriginTerminal     = $segments["0"][$z]["Origin"]["Airport"]["Terminal"];
    $OriginCityName     = $segments["0"][$z]["Origin"]["Airport"]["CityName"] ;
    $OriginCountryCode  = $segments["0"][$z]["Origin"]["Airport"]["CountryCode"] ;
    $OriginCountryName  = $segments["0"][$z]["Origin"]["Airport"]["CountryName"] ;
    $Departure          = $segments["0"][$z]["Origin"]["DepTime"] ;

    $Departure = explode ("T", $Departure); 
    $Departure["0"];  // date
    $Departure["1"];    // time
    
    $DestinationAirportCode     = $segments["0"][$z]["Destination"]["Airport"]["AirportCode"] ;
    $DestinationAirportName     = $segments["0"][$z]["Destination"]["Airport"]["AirportName"] ;
    $DestinationTerminal        = $segments["0"][$z]["Destination"]["Airport"]["Terminal"] ;
    $DestinationCityName        = $segments["0"][$z]["Destination"]["Airport"]["CityName"] ;
    $DestinationCountryCode     = $segments["0"][$z]["Destination"]["Airport"]["CountryCode"] ;
    $DestinationCountryName     = $segments["0"][$z]["Destination"]["Airport"]["CountryName"] ;

    $Arrival= $segments["0"][$z]["Destination"]["ArrTime"] ;

    $Arrival = explode ("T", $Arrival); 
    $Arrival["0"];  // date
    $Arrival["1"];  // time

    $duration= $segments["0"][$z]["Duration"];

    

    $StopPoint= $segments["0"][$z]["StopPoint"];
    $StopOver= $segments["0"][$z]["StopOver"];
    if($StopOver == false){
        $StopOver= "Non-stop";
     }else{
       $StopOver= $StopOver ."-Stop";
     }



    $CabinClassValue;
    if($CabinClass==1){    $CabinClassValue= "all";    }
    elseif($CabinClass==2){$CabinClassValue= "Economy";    }
    elseif($CabinClass==3){$CabinClassValue= "Premium Economy";}
    elseif($CabinClass==4){$CabinClassValue= "Bussiness";}
    elseif($CabinClass==5){$CabinClassValue= "Premium Bussiness";}
    elseif($CabinClass==6){$CabinClassValue= "First";}
    else{
        echo "not";
     }




?>


                            
                                <div class="tab-menu">
                                    <div class="tab-box active" b="2" id="flight-detail<?php echo $z ?>-tab-1" onclick="zValue(<?php echo $z ?>);tabChange(id)">
                                        <span class="icon plane">
                                            <i class="fas fa-plane"></i>
                                        </span>
                                        <span class="txt">Flight Itinerary</span>
                                    </div>
                                    <div class="tab-box tab-2" id="flight-detail<?php echo $z ?>-tab-2" onclick="zValue(<?php echo $z ?>);tabChange(this.id)">
                                        <span class="icon">
                                            <i class="fas fa-shopping-bag"></i>
                                        </span>
                                        <span class="txt">Baggage</span>
                                    </div>
                                    <div class="tab-box tab-3" id="flight-detail<?php echo $z ?>-tab-3" onclick="zValue(<?php echo $z ?>);tabChange(this.id)">
                                        <span class="icon">
                                            <i class="fas fa-bars"></i>
                                        </span>
                                        <span class="txt">Fare Rule</span>
                                    </div>
                                </div>
                                <div id="flight-detail<?php echo $z ?>-tab-1-content">
                                    <div class="d-box">
                                        <div>
                                            <img src="images/spicejet.png" width="30" />
                                        </div>
                                        <div>
                                            <?php echo $AirlineName ." " .$AirlineCode; ?>
                                        </div>
                                        <div class="dot">
    
                                        </div>
                                        <div>
                                          <?php echo $FlightNumber; ?>
                                        </div>
                                        <div class="dot"></div>
                                        <div>Class <b><?php echo $FareClass ?></b></div>
                                        <div class="dot"></div>
                                        <div><?php echo $CabinClassValue ?></div>
                                    </div>
                                    <div class="f-box">
                                        <div class="p-detail">
                                            <h6><?php echo $OriginAirportCode?> <b><?php echo $Departure["1"] ;?></b></h6>
                                            <p><?php echo $OriginAirportName;?></p>
                                            <p><?php echo  $OriginCityName?></p>
                                            <p><?php echo $Departure["0"] ;?></p>
                                        </div>
                                        <div class="t-detail">
                                            <p>
                                                <i class="far fa-clock"></i>
                                            </p>
                                            <p><?php echo $duration ."min"?></p>
                                        </div>
                                        <div class="p-detail des-t">
                                            <h6><?php echo $DestinationAirportCode ?> <b><?php echo  $Arrival["1"]; ?></b></h6>
                                            <p><?php echo $DestinationAirportName;?></p>
                                            <p><?php echo $DestinationCityName ?></p>
                                            <p><?php echo $Arrival["0"]; ?></p>
                                        </div>
                                        <div class="r-box">
                                          <?php echo $Refundable ?>
                                        </div>
                                    </div>
                                </div>
                                <div id="flight-detail<?php echo $z ?>-tab-2-content" style="display: none">
                                    <div class="b-detail">
                                        <div class="b-top">
                                            <img src="images/spicejet.png" width="30"/>
                                            <p><?php echo $OriginCityName ." - " .$DestinationCityName;?></p>
                                        </div>
                                        <table class="table table-bordered">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Baggage Type</th>
                                                    <th>Check-in baggage</th>
                                                    <th>Cabin baggage</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Adult/Child</td>
                                                    <td><?php echo $Baggage ?></td>
                                                    <td><?php echo $CabinBaggage ?></td>
                                                    
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p class="some-txt">
                                            The baggage information is just for reference. Please check with the airline before 
                                            check-in.
                                        </p>
                                    </div>
                                </div>
                                <div id="flight-detail<?php echo $z ?>-tab-3-content" style="display: none">
                                    <?php

                                        echo " Origin: " .$Origin ."<br>";
                                        echo  "Destination: " .$Destination ."<br>";
                                        echo  "Airline: " .$Airline ."<br>";
                                        echo  "FareRuleDetail: " .$FareRuleDetail ."<br>";
                                    ?>
                                </div>
                                
<?php

       }

?>



                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            </div>
           <?php  //require_once("Api/sss.php"); ?>
            <script>
                window.onload = loadInfoBox();
            </script>
    </body>
</html>