
<?php
session_start();

require_once("Api/search.php");

  
if($data["Response"]["ResponseStatus"] ==1)
{


    $checkerForOnewayOrTwoWay= count($data["Response"]["Results"]);
     for($t=0;$t<$checkerForOnewayOrTwoWay; $t++)
     {
            $checkersForFlightNumber= count($data["Response"]["Results"][$t]);
            for ($flightfound=0;$flightfound < $checkersForFlightNumber; $flightfound++ ) 
            {
                       
            }
             $flightfound;
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
        <style type="text/css">
            .active{
                background-color: lightgreen;
            }

        </style>
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
                                <a class="nav-link" aria-current="page" href="#">Holiday Package</a>
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
        <section class="flight-list">
            <div class="container">
                <div class="tabs">
                    <div class="top-tab flight-tab tab-focus" id="one-way" onclick="changeTab(this.id)">
                        <span class="flight-text">ONE WAY</span>
                    </div>
                    <div class="top-tab hotel-tab tab-not-focus" id="round-trip" onclick="changeTab(this.id)">
                        <span class="flight-text">ROUND TRIP</span>
                    </div>
                </div>
                <form method="GET">
                <div class="form-box">
                    <div>
                        <label class="form-label">From</label>
                        <input type="text" class="form-control" id="Origin" name="Origin" value="<?php echo $origin ; ?>" id="source"/>
                    </div>
                    <div class="text-center">
                        <button class="btn-swap swap-2" onclick="swap('listflight')"><i class="fas fa-exchange-alt"></i></button>
                    </div>
                    <div>
                        <label class="form-label">To</label>
                        <input type="text" class="form-control" name="Destination" id="dest" value="<?php echo $destination ; ?>"/>
                    </div>
                    <div>
                        <label class="form-label">Departure</label>
                        <input type="date" class="form-control"name="PreferredDepartureTime" id="DepartureDates" value="<?php echo $DepartureDate; ?>" />
                    </div>
                    <div>
                        <label class="form-label">Return</label>
                        <input type="date" class="form-control" placeholder="PAT-Patna" id="return-date" disabled/>
                    </div>
                    <div>
                        <label class="form-label">Adult </label>
                       
                                 <select id="passenger" name="AdultCount" class="form-select">
                                        <option value="1">01 </option>
                                        <option value="2">02 </option>
                                        <option value="3">03 </option>
                                        <option value="4">04 </option>
                                        <option value="5">05 </option>
                                    </select>
                    </div>
                    <div>
                        <label class="form-label">Child </label>
                       
                                 <select id="pass" name="ChildCount" class="form-select">
                                        <option value="0">0 </option>
                                        <option value="1">01 </option>
                                        <option value="2">02 </option>
                                        <option value="3">03 </option>
                                        <option value="4">04 </option>
                                    </select>
                    </div>

                   
                    <div>
                         <label class="form-label"> Class</label>
                        <select  id="FlightClass" name="FlightCabinClass"  class="form-select">
                                        <option value="1">All</option>
                                        <option value="2">Economy</option>
                                        <option value="3">Premium Economy</option>
                                        <option value="4">Business</option>
                                        <option value="5">Premium Business</option>
                                        <option value="6">First</option>
                                    </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary search-list">Search</button>
                    </div>
                </div>
            </form>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="total-flights">Total <b><?php if(isset($flightfound)){ echo $flightfound * $t ;} else{echo "0";} ?></b> flights found</div>
                        <div class="filter-aria">
                            <h1>Filter Result</h1>
                            <div>
                                <h5>No. Of Stop</h5>
                                <div class="filter-by stop">
                                    <div id="zeroStop" onclick="bystop('1')" >0 STOP</div>
                                    <div id="oneStop" onclick="bystop('2')">1 STOP</div>
                                    <div id="MoreThanOneStop" onclick="bystop('3')" >1+ STOP</div>
                                </div>
                            </div>
                            <div>
                                <h5>Preference</h5>
                                <div class="filter-by preference">
                                    <div id="Refundable">REFUNDABLE</div>
                                    <div id="Non-Refundable">NON REFUNDABLE</div>
                                </div>
                            </div>

                            <div>
                                <h5>Departure Time</h5>
                                <div class="filter-by dep-time">
                                    <div id="Anytimess" onclick="filtersTimeWise('1')">Anytime</div>
                                    <div id="Morningss" onclick="filtersTimeWise('2')">Morning</div>
                                    <div id="AfterNoonss" onclick="filtersTimeWise('3')" >AfterNoon</div>
                                    <div id="Eveningss" onclick="filtersTimeWise('4')">Evening</div>
                                    <div id="Nightss" onclick="filtersTimeWise('5')">Night</div>
                                </div>
                            </div>
                            <div>
                                <h5>Arrival Time</h5>
                                <div class="filter-by dep-time">
                                    <div id="AntimeArr" onclick="filterArrTimeWise('1')">Anytime</div>
                                    <div id="MorningArr" onclick="filterArrTimeWise('2')">Morning</div>
                                    <div id="AfterNoonArr" onclick="filterArrTimeWise('3')" >AfterNoon</div>
                                    <div id="EveningArr" onclick="filterArrTimeWise('4')">Evening</div>
                                    <div id="NightArr" onclick="filterArrTimeWise('5')">Night</div>
                                </div>
                            </div>
                            <div>
                                <h5>Price Range</h5>
                                <div class="filter-by price-by">
                                    <p>
                                        <span class="r-icon">
                                            <i class="fas fa-rupee-sign"></i>
                                        </span>
                                        <span class="min-value">100</span>
                                    </p>
                                    <input type="text" class="range"/>
                                    <p>
                                        <span class="r-icon" style="margin-left: 6px;">
                                            <i class="fas fa-rupee-sign"></i>
                                        </span>
                                        <span style="font-weight: 600;">1000</span>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9">


                        <?php 

                        include("list.php");
                  


                         ?>





                    </div>
                </div>
            </div>
        </section>
    </body>
</html>

<script>
   
    function passenger(){
        var select = document.getElementById('passenger');
        var option;
            for (var i=0; i<select.options.length; i++) {
              option = select.options[i];

              if (option.value == '<?php echo $AdultCount ?>') {
                 option.selected = true;
                 // return;
              } 
            }
        }
        passenger();
    function FlightClass(){
        var select = document.getElementById('FlightClass');
        var option;
            for (var i=0; i<select.options.length; i++) {
              option = select.options[i];

              if (option.value == '<?php echo $FlightCabinClass ?>') {
                 option.selected = true;
                 // return;
              } 
            }
        }
        FlightClass();
    function stopbyss(){
        
        if(<?php echo $DirectFlight ?> ){
            document.getElementById("zeroStop").setAttribute('class','active');
             document.getElementById("oneStop").setAttribute('class','none');
             document.getElementById("MoreThanOneStop").setAttribute('class','none');

        }
           if(<?php echo $OneStopFlight ?> ){
            document.getElementById("zeroStop").setAttribute('class','none');
             document.getElementById("oneStop").setAttribute('class','active');
             document.getElementById("MoreThanOneStop").setAttribute('class','none');
        }
                        
        }
        stopbyss();

    function bystop(bystop){
            if(bystop=='1'){
                 document.getElementById("zeroStop").setAttribute('class','active');
                 document.getElementById("oneStop").setAttribute('class','none');
                 document.getElementById("MoreThanOneStop").setAttribute('class','none');
                       
                        timecheckss(bystop);

            }else if(bystop=='2'){
                 document.getElementById("zeroStop").setAttribute('class','none');
                 document.getElementById("oneStop").setAttribute('class','active');
                 document.getElementById("MoreThanOneStop").setAttribute('class','none');
                       
                         timecheckss(bystop);
            }else if(bystop=='3'){
                 document.getElementById("zeroStop").setAttribute('class','none');
                 document.getElementById("oneStop").setAttribute('class','none');
                 document.getElementById("MoreThanOneStop").setAttribute('class','active');
                       
                         timecheckss(bystop);            
            }

        }

    function filtersTimeWise(time){
            if(time=='1'){
                      document.getElementById("Anytimess").setAttribute('class','active');
                     document.getElementById("Morningss").setAttribute('class','none');
                     document.getElementById("AfterNoonss").setAttribute('class','none');
                     document.getElementById("Eveningss").setAttribute('class','none');
                     document.getElementById("Nightss").setAttribute('class','none');

                     var PreferredDeTimes="00:00:00";
                     classChecks(PreferredDeTimes);                  

            }else if(time=='2'){
                    document.getElementById("Anytimess").setAttribute('class','none');
                    document.getElementById("Morningss").setAttribute('class','active');
                     document.getElementById("AfterNoonss").setAttribute('class','none');
                     document.getElementById("Eveningss").setAttribute('class','none');
                     document.getElementById("Nightss").setAttribute('class','none');

                     var PreferredDeTimes="08:00:00";
                     classChecks(PreferredDeTimes);
                        
            }else if(time=='3'){
                    document.getElementById("Anytimess").setAttribute('class','none');
                    document.getElementById("Morningss").setAttribute('class','none');
                    document.getElementById("AfterNoonss").setAttribute('class','active');
                     document.getElementById("Eveningss").setAttribute('class','none');
                     document.getElementById("Nightss").setAttribute('class','none');
                    
                    var PreferredDeTimes="14:00:00";
                    classChecks(PreferredDeTimes);
            }else if(time=='4'){
                    document.getElementById("Anytimess").setAttribute('class','none');
                    document.getElementById("Morningss").setAttribute('class','none');
                    document.getElementById("AfterNoonss").setAttribute('class','none');
                     document.getElementById("Eveningss").setAttribute('class','active');
                     document.getElementById("Nightss").setAttribute('class','none'); 

                     var PreferredDeTimes="19:00:00";
                     classChecks(PreferredDeTimes);

            }else if(time=='5'){
                    document.getElementById("Anytimess").setAttribute('class','none');
                    document.getElementById("Morningss").setAttribute('class','none');
                    document.getElementById("AfterNoonss").setAttribute('class','none');
                     document.getElementById("Eveningss").setAttribute('class','none');
                     document.getElementById("Nightss").setAttribute('class','active');

                     PreferredDeTimes="01:00:00"; 
                     classChecks(PreferredDeTimes);

            }

        }
    function timecheckss(bystop) {
    // body...

         var test4 = document.getElementById("Anytimess");
        var test5 = document.getElementById("Morningss");
        var test6 = document.getElementById("AfterNoonss");
        var test7 = document.getElementById("Eveningss");
        var test8 = document.getElementById("Nightss");
        var testClass4 = test4.className;
        var testClass5 = test5.className;
        var testClass6 = test6.className;
        var testClass7 = test7.className;
        var testClass8 = test8.className;
        if(testClass4 == 'active'){var PreferredDeTimes='00:00:00'; checks(bystop,PreferredDeTimes); }
        if(testClass5 == 'active'){var PreferredDeTimes='08:00:00'; checks(bystop,PreferredDeTimes); }
        if(testClass6 == 'active'){var PreferredDeTimes='14:00:00'; checks(bystop,PreferredDeTimes); }
        if(testClass7 == 'active'){var PreferredDeTimes='09:00:00'; checks(bystop,PreferredDeTimes); }
        if(testClass8 == 'active'){var PreferredDeTimes='01:00:00'; checks(bystop,PreferredDeTimes); }
}

    function classChecks(PreferredDeTimes){
            window.PreferredDeTimes=PreferredDeTimes;
            var test1 = document.getElementById("zeroStop");
            var test2 = document.getElementById("oneStop");
            var test3 = document.getElementById("MoreThanOneStop");
            
                 var testClass1 = test1.className;
            var testClass2 = test2.className;
            var testClass3 = test3.className;
            

        if(testClass1 == 'active'){ var bystop='1'; checks(bystop,PreferredDeTimes);}
        if(testClass2 == 'active'){ var bystop='2'; checks(bystop,PreferredDeTimes);}
        if(testClass3 == 'active'){ var bystop='3'; checks(bystop,PreferredDeTimes);}   
           

    }
function checks(bystop, PreferredDeTimes){

       var TravelOrigin         = document.getElementById("Origin").value;
       var TravelDestination    = document.getElementById("dest").value;
       var DepartureDates       = document.getElementById("DepartureDates").value;

       if(document.getElementById("return-date").disabled == true){ 
            // alert("disabled");
                window.tripType='1';
        }else{
                window.ReturnDates=document.getElementById("return-date").value;
                window.tripType='2';
                    }
        
        var passenger           = document.getElementById("passenger").value;
        var FlightClass         = document.getElementById("FlightClass").value;
        var PreferredAirlines ='none';
        if(bystop== 1){
            window.connecting='Direct';
         }else{
                 window.connecting='One-Stop';
         }
       
       console.log(PreferredDeTimes);
       console.log(bystop);
       
window.location = "flightList.php?Origin="+TravelOrigin+"&Destination="+TravelDestination+"&PreferredDepartureTime="+DepartureDates+"&PreferredReturnDepartureTime="+window.ReturnDates+"&FlightCabinClass="+FlightClass+"&JourneyType="+tripType+"&AdultCount="+passenger+"&PreferredAirlines="+PreferredAirlines+"&connecting="+connecting+"&PreferredDeTimes="+PreferredDeTimes;
       
    }


  function selectDepartTime() {
       
        if("00:00:00"=="<?php echo $PreferredDeTimes ?>"){
            document.getElementById("Anytimess").setAttribute('class','active');
        }else if("08:00:00"=="<?php echo $PreferredDeTimes ?>"){
            document.getElementById("Morningss").setAttribute('class','active');
        }else if("14:00:00"=="<?php echo $PreferredDeTimes ?>"){
            document.getElementById("AfterNoonss").setAttribute('class','active');
        }else if("19:00:00"=="<?php echo $PreferredDeTimes ?>"){
            document.getElementById("Eveningss").setAttribute('class','active');
        }else if("01:00:00"=="<?php echo $PreferredDeTimes ?>"){
            document.getElementById("Nightss").setAttribute('class','active');
        }
   }
   selectDepartTime();
</script>

