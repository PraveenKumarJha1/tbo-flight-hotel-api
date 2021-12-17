<?php

$TraceID= $data["Response"]["TraceId"];
$_SESSION['TraceID']= $TraceID;

  
if ($data["Response"]["ResponseStatus"] ==2){
	echo "No Result.";}
if($data["Response"]["ResponseStatus"] ==1){

    $from = $data["Response"]["Origin"];
    $to = $data["Response"]["Destination"];

$checks= count($data["Response"]["Results"]);
 // echo "<br>" .$checks ."<br>";
for($j=0;$j<$checks; $j++){
	// echo "<br>" .$j ."<br>";
	$check= count($data["Response"]["Results"][$j]);
for ($i=0;$i < $check; $i++ ) {

    $ResultIndex=$data["Response"]["Results"][$j][$i]["ResultIndex"];

    $Refundable;
    if($data["Response"]["Results"][$j][$i]["IsRefundable"] == 1){
            $Refundable= "Refundable";
    }else{
        $Refundable="Non-Refundable";
    }

    // fare
    $fare = $data["Response"]["Results"][$j][$i]["Fare"];
    $Currency 				=$fare["Currency"];
    $BaseFare 				=$fare["BaseFare"];
    $Tax 					=$fare["Tax"];
    $YQTax 					=$fare["YQTax"];
    $AdditionalTxnFeeOfrd 	=$fare["AdditionalTxnFeeOfrd"];
    $AdditionalTxnFeePub 	=$fare["AdditionalTxnFeePub"];
    $PGCharge 				=$fare["PGCharge"];
    $OtherCharges			=$fare["OtherCharges"];
    $Discount				=$fare["Discount"];
    $PublishedFare			=$fare["PublishedFare"];
    $CommissionEarned		=$fare["CommissionEarned"];
    $PLBEarned				=$fare["PLBEarned"];
    $OfferedFare			=$fare["OfferedFare"];
    $TdsOnCommission		=$fare["TdsOnCommission"];
    $TdsOnPLB				=$fare["TdsOnPLB"];
    $TdsOnIncentive			=$fare["TdsOnIncentive"];
    $ServiceFee				=$fare["ServiceFee"];
    $TotalBaggageCharges	=$fare["TotalBaggageCharges"];
    $TotalMealCharges		=$fare["TotalMealCharges"];
    $TotalSeatCharges		=$fare["TotalSeatCharges"];
    $TotalSeatCharges		=$fare["TotalSeatCharges"];
    $TotalSpecialServiceCharges	=$fare["TotalSpecialServiceCharges"];


    
   	$FareRules= $data["Response"]["Results"][$j][$i]["FareRules"];
   	$Origin 		= $FareRules["0"]["Origin"];
   	$Destination 	= $FareRules["0"]["Destination"];
   	$Airline 		= $FareRules["0"]["Airline"];
   	$FareBasisCode	= $FareRules["0"]["FareBasisCode"];
   	$FareRuleDetail	= $FareRules["0"]["FareRuleDetail"];
   	$FareRestriction = $FareRules["0"]["FareRestriction"];
   	$FareFamilyCode = $FareRules["0"]["FareFamilyCode"];
   	$FareRuleIndex 	= $FareRules["0"]["FareRuleIndex"];

     

        // segement
    $segments = $data["Response"]["Results"][$j][$i]["Segments"];

        
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

    $NoOfSeatAvailable=  $segments["0"][$z]["NoOfSeatAvailable"] ;


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
        array_push($NoOfSeatAvailableArray, $NoOfSeatAvailable);
        array_push($DepartureArray,$Departure);
                $Departure= $DepartureArray["0"];
                $Departure = explode ("T", $Departure); 

 
        }

          if(isset($segments["0"][$NoOfStop -1]["AccumulatedDuration"])){
            $AccumulatedDuration= $segments["0"][$NoOfStop -1]["AccumulatedDuration"];

        }else{
                $AccumulatedDuration = $duration;
        }
        
// print_r($DepartureArray);


?>


                        <div class="flight-aria">
                            <div class="main-content">
                                <div class="text-center">
                                    <div class="company-logo">
                                        <img src="images/spicejet.png" width="46"/>
                                    </div>
                                    <div class="company-name"><?php echo $AirlineName ?></div>
                                    <div class="flight-number">
                                        <?php 
                                                foreach($AirlineCodeAndNumberArray as $key => $value){
                                                          echo $value ." |  ";
                                                        }
                                             ?>
                                    
                                </div>
                                </div>
                                <div class="timing-aria">
                                    <div>
                                        <div><?php echo $OriginAirportCodeArray["0"] ?></div>
                                        <div class="time"><?php echo $Departure["0"] ;?></div>
                                        <div class="date"><?php echo $Departure["1"] ;?></div>
                                    </div>
                                    <div class="total-time">
                                        <div class="date"><?php echo $AccumulatedDuration ."min"?></div>
                                        <div class="line-box">
                                            <div class="dot"></div>
                                            <div class="line"></div>
                                            <div class="dot"></div>
                                        </div>
                                        <div class="none-stop"><?php echo $StopOver; ?></div>
                                        <div class="date"><?php 
                                                      foreach($NoOfSeatAvailableArray as $key => $value){
                                                          echo $value ." Seat's left  ";
                                                        } 
                                                                ?>
                                                                 

                                        </div>
                                    </div>
                                    <div>
                                        <div> <?php 
                                                echo end($DestinationAirportCodeArray);
                                                         
                                                        
                                             ?>


                                        </div>
                                        <div class="time"><?php echo $Arrival["0"] ;?></div>
                                        <div class="date"><?php echo $Arrival["1"] ;?></div>
                                    </div>
                                </div>
                                <div class="price">
                                    <div class="price-text"><?php echo $Currency ." " .$PublishedFare ;?></div>
                                    <div class="btn-book-box">
                                        <form method="POST" action="travellerInfo.php">
                                            <input type="hidden" name="ResultIndex" value="<?php echo $ResultIndex ?>">
                                            <input type="hidden" name="travelcount" value="<?php echo $AdultCount + $ChildCount ?>">
                                            <button type="submit" class="btn btn-success btn-book">Book</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-content">
                                <div>
                                    <span class="flight-detail" id="flight-<?php echo $j .$i ?>"  onclick="showHideDetail(this.id)">Flight Detail</span>
                                    <span class="refundable"><?php echo $Refundable ?></span>
                                </div>
                                <div class="luggage">
                                    <span class="luggage-1">
                                        <span class="l-icon">
                                            <i class="fas fa-suitcase-rolling"></i>
                                        </span>
                                        <span>
                                            ADT : <b><?php echo $CabinBaggage ?></b>
                                        </span>
                                    </span>
                                    <span class="luggage-2">
                                        <span class="l-icon">
                                            <i class="fas fa-shopping-bag"></i>
                                        </span>
                                        <span>
                                            ADT : <b><?php echo $Baggage ?></b>
                                        </span>
                                    </span>
                                </div>
                            </div>


    <div class="detail-aria" id="flight-<?php echo $j .$i ?>-detail" style="display: none;">



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

    $NoOfSeatAvailable=  $segments["0"][$z]["NoOfSeatAvailable"] ;


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
                    <div class="tab-box active" b="2" id="flight-<?php echo $j .$i?>-detail<?php echo $z ?>-tab-1" onclick="zValue(<?php echo $z ?>);tabChange(id,'<?php echo $z ?>')">
                        <span class="icon plane">
                            <i class="fas fa-plane"></i>
                        </span>
                        <span class="txt">Flight Itinerary</span>
                    </div>
                    <div class="tab-box tab-2" id="flight-<?php echo $j .$i?>-detail<?php echo $z ?>-tab-2" onclick="zValue(<?php echo $z ?>);tabChange(id,'<?php echo $z ?>')">
                        <span class="icon">
                            <i class="fas fa-shopping-bag"></i>
                        </span>
                        <span class="txt">Baggage</span>
                    </div>
                    <div class="tab-box tab-3" id="flight-<?php echo $j .$i?>-detail<?php echo $z ?>-tab-3" onclick="zValue(<?php echo $z ?>);tabChange(id,'<?php echo $z ?>')">
                        <span class="icon">
                            <i class="fas fa-bars"></i>
                        </span>
                        <span class="txt">Fare Rule</span>
                    </div>
                </div>
                <div id="flight-<?php echo $j .$i?>-detail<?php echo $z ?>-tab-1-content">
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
                <div id="flight-<?php echo $j .$i?>-detail<?php echo $z ?>-tab-2-content" style="display: none">
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
                <div id="flight-<?php echo $j .$i?>-detail<?php echo $z ?>-tab-3-content" style="display: none">
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







<?php
    echo "<br>";
} // end of for loop for $i


} // end of for loop for $j

} // end of if 


?>