<?php
session_start();
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
          <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
        
    <script>
  $( function() {
    $( ".checkin" ).datepicker({ dateFormat: 'dd/mm/yy' });
  
  } );
  </script>
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

          <div class="container">
              <div class="heading-block">
                  <h1 class="heading">Hey Buddy! where are you <b>Flying to?</b></h1>
                  <p class="explore-now">Explore Now <span><i class="fas fa-long-arrow-alt-right"></i></span></p>
              </div>
          </div>
          <div class="container">
                <div class="booking-form">
                    <div class="tabs">
                        <div class="top-tab flight-tab tab-focus" id="flight-tab" onclick="changeTab(this.id)">
                            <span class="flight-icon"><i class="fas fa-plane-departure"></i></span>
                            <span class="flight-text">Filght</span>
                        </div>
                        <div class="top-tab hotel-tab tab-not-focus" id="hotel-tab" onclick="changeTab(this.id)">
                            <span class="flight-icon"><i class="fas fa-hotel"></i></span>
                            <span class="flight-text">Hotel</span>
                        </div>
                    </div>
                    <div class="form-content">
                        <div id="flight-content"> 
                            <div class="selects">
                                <div>
                                    <select class="form-select" id="trip-type" onchange="selectTripType()">
                                        <option value="1" selected>One Way</option>
                                        <option value="2">Round Trip</option>
                                   <!--                 <option value="3" >Multi Stop </option> -->
                                        <!-- <option value="4">Advanced Search</option> -->
                                        <!-- <option value="5">Special Return</option> -->
                                    </select>
                                </div>
                                <div>
                                    <select id="FlightClass" class="form-select">
                                        <option value="1">All</option>
                                        <option value="2">Economy</option>
                                        <option value="3">Premium Economy</option>
                                        <option selected value="4">Business</option>
                                        <option value="5">Premium Business</option>
                                        <option value="6">First</option>
                                    </select>
                                </div>   
                                <div>
                                    <select id="connecting" class="form-select">
                                        <option value="NO" selected>None</option>
                                        <option value="Direct" selected>Direct Type</option>
                                        <option value="One-Stop">One Stop Flight</option>
                                    </select>
                                </div>
                                <div>
                                    <select id="FlightPreffernce" class="form-select">
                                        <option selected value="NONE" selected>None</option>
                                        <option value="6E" >Indigo</option>
                                        <option value="SG">Spicejet</option>
                                        <option value="UK">Air Vistara</option>
                                        <option value="G8">Go First</option>
                                    </select>
                                </div>
                                <div id="passenger" class="passengers">
                                    <span><i class="fas fa-user"></i></span>
                                    <span><span id="a-value">1</span> adults</span><span class="vert-line">|</span>
                                    <span><span id="c-value">0</span> children</span>
                                    <div class="detail-content passenger-details">
                                        <div class="row">
                                            <div class="col-6 col-sm-6 col-md-6">
                                                <label>Adults</label>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6">
                                                <input type="number"  min="0" id="adults" onchange="getNumbers(this.id)" />

                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6">
                                                <label class="position-relative">
                                                    Children
                                                    <!-- <p class="child-age">Ages 3-17</p> -->
                                                </label>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6">
                                                <input type="number" min="0" max="4" id="children" onchange="getNumbers(this.id)" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="box-container">
                                
                                <div class="box">
                                    <p class="text">FROM</p>
                                    <input type="text" class="airport-city" id="origin-city" value="DEL" />
                                    <p class="text" id="origin-country">DEL, Delhi, INDIA</p>
                                </div>
                                <div class="box dest">
                                    <p class="text">To</p>
                                    <input type="text" class="airport-city" id="dest-city" value="BOM" />
                                    <p class="text" id="dest-country">BOM, MUMBAI, India</p>
                                    <div class="swap">
                                        <button class="btn-swap" onclick="swap()"><i class="fas fa-exchange-alt"></i></button>
                                    </div>
                                    <div class="arc arc1"></div>
                                    <div class="arc arc2"></div>
                                </div>
                                <div class="box dates">
                                    <div>
                                        <p class="text">DEPARTURE</p>
                                        <h1 class="main-title">
                                            <input type="date"  id="    " onchange="dep_date()" class="flight-date" />
                                        </h1>
                                        <p class="text">
                                            <span class="prev focus">Prev</span>
                                            <span class="next">Next</span>
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text">RETURN</p>
                                        <h1 class="main-title">
                                            <input type="date" id="return" class="flight-date" disabled id="adate" onchange="arival_date()" />
                                        </h1>
                                        <p class="text">
                                            <span class="prev">Prev</span>
                                            <span class="next">Next</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <form method="get" action="hotelList.php">
                        <div id="hotel-content" class="hotel-content">
                            <div class="hotel-box">
                                <div class="date-box">
                                    <div>
                                        <label>checkin:&nbsp;&nbsp;</label>
                                        <input type="text" class="checkin" name='checkin'/><span class="dash">-</span>
                                    </div>

                                </div>
                                <div class="details">
                                    <div>
                                        <span><i class="fas fa-user"></i></span>
                                        <span><span id="hotel-adult-value">1</span> adults</span>|
                                        <span><span id="hotel-child-value">0</span> children</span>|
                                        <span><span id="hotel-guest-value">0</span> guest</span>|
                                        <span><span id="hotel-room-value">1</span> room</span>
                                    </div>
                                    <div class="detail-content">
                                        <div class="row">
                                            <div class="col-6 col-sm-6 col-md-6">
                                                <label>Adults</label>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6">
                                                <input type="number" min="1" id="Hoteladults" value="1" name="HAdult" onchange="getNu(this.id)" />
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6">
                                                <label class="position-relative">
                                                    Children
                                                    <p class="child-age">Ages 0-17</p>
                                                </label>
                                                <div id="Hotel-age-box" class="age-box">
                                                    <input type="number" min="0" max="17" id="Hotel-age-1" placeholder="Age" class="age"/>
                                                    <input type="number" min="0" max="17" id="Hotel-age-2" placeholder="Age" class="age"/>
                                                    <input type="number" min="0" max="17" id="Hotel-age-3" placeholder="Age" class="age"/>
                                                    <input type="number" min="0" max="17" id="Hotel-age4" placeholder="Age" class="age"/>
   
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6">
                                                <input type="number" min="0" max="10" id="Hotelchildren" name='HNoOfChild' onchange="getNu(this.id)" />
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6">
                                                <label>Guests</label>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6">
                                                <input type="number" min="0" id="Hotelguests" name="guest" onchange="getNu(this.id)" />
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6">
                                                <label>Rooms</label>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6">
                                                <input type="number" min="0" id="Hotelrooms" name="room" onchange="getNumbers(this.id)" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="night-count">
                                    <label>Nights:</label>
                                    <select name="night" class="">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <div>
                                        <label>Nationality:</label>
                                         <select name="nation" class="">
                                            <option value="IN">India</option>
                                            <option value="AU">Australia</option>
                                            <option value="USA">America</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="other-detail">
                                <div class="labels">
                                    <label>Destination</label>
                                    <div>
                                        <label class="currency">Currency: </label>
                                         <select name="currency" class="">
                                            <option name="INR">INR</option>
                                            <option name="USD">USD</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <input type="text"  list="browsers" name="city" class="form-control" placeholder="City Name"/>
                                        <datalist id="browsers">
                                            <option value="130443">Delhi</option>
                                            <option value="Firefox">bombai</option>
                                            <option value="Chrome">sada</option>
                                            <option value="Opera">sadca</option>
                                            <option value="Safari">sxc</option>
                                          </datalist>
                                    </div>
                                 <!--    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <input type="text" name="country"  class="form-control" placeholder="Country Name"/>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <button class="flight-search search-hotel" id="hotel-search" type="submit">
                            <span>Search Hotel</span>
                            <span class="arrow"><i class="fas fa-long-arrow-alt-right"></i></span>
                        </button>
                    </form>
                                           <button class="flight-search" id="flight-search" type="submit" onclick="search()">
                            <span>Search Flight</span>
                            <span class="arrow"><i class="fas fa-long-arrow-alt-right"></i></span>
                        </button>
                    </div>

                </div>
          </div>
          <script>
              window.onload = getValues();
          </script>
    </body>
</html>


<script type="text/javascript">

//departure date
function dep_date(){
    window.departure_date = document.getElementById("date").value;
   
}

//arival date 
function arival_date(){
    window.arrival_date = document.getElementById("return").value; 

}

    console.log(window.arrival_date);
     console.log(window.departure_date);
window.departure_date;
 window.arrival_date;
 
function search(){
        From_city    = document.querySelector("#origin-city").value;
        TO_city = document.querySelector("#dest-city").value;


        From_country = document.querySelector("#origin-country").textContent;
        TO_country = document.querySelector("#dest-country").textContent;
        console.log(TO_country);

        tripType= document.getElementById("trip-type").value;
        console.log(tripType);
        FlightClass= document.getElementById("FlightClass").value;
        fadult= document.getElementById("adults").value;
        fchild= document.getElementById("children").value;
        connecting= document.getElementById("connecting").value;
        PreferredAirlines= document.getElementById("FlightPreffernce").value;

        // console.log(tripType);
        // console.log(FlightClass);
        // console.log(fadult);
        // console.log(fchild);
        // console.log(connecting);
        // console.log(FlightPreffernce);

window.location = "flightList.php?Origin="+From_city+"&Destination="+TO_city+"&PreferredDepartureTime="+window.departure_date+"&PreferredReturnDepartureTime="+window.arrival_date+"&FlightCabinClass="+FlightClass+"&JourneyType="+tripType+"&AdultCount="+fadult+"&ChildCount="+fchild+"&PreferredAirlines="+PreferredAirlines+"&connecting="+connecting;
}

</script>

<?php

require_once("Api/auth.php");



?>

