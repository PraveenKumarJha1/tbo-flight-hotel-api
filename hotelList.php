<?php
session_start();

require_once("HotelApi/search.php");

if($data["HotelSearchResult"]["ResponseStatus"] ==1)
{   
    $NumberOfHotel= count($data["HotelSearchResult"]["HotelResults"]);
        global $NumberOfHotel;
    
}else
{
    print_r($data["HotelSearchResult"]["Error"]);
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
        <section class="hotel-list">
            <div class="container">
                <div class="form-box hotel-form">
                    <div class="fields">
                        <label class="form-label">Destination</label>
                        <input type="text" class="form-control" placeholder="City Name"/>
                    </div>
                    <div class="fields">
                        <input type="text" class="form-control" placeholder="Country Name"/>
                    </div>
                    <div class="fields">
                        <label class="form-label">Check-in</label>
                        <input type="date" class="form-control"/>
                    </div>
                    <div class="fields">
                        <label class="form-label">Check-out</label>
                        <input type="date" class="form-control"/>
                    </div>
                    <div class="fields">
                        <div class="details guest-info">
                            <div class="guest-detail">
                                <span><i class="fas fa-user"></i></span>
                                <span><span id="a-value">2</span> adults</span>|
                                <span><span id="c-value">0</span> children</span>|
                                <span><span id="g-value">0</span> guest</span>|
                                <span><span id="r-value">1</span> room</span>
                            </div>
                            <div class="detail-content det-content">
                                <div class="row">
                                    <div class="col-6 col-sm-6 col-md-6">
                                        <label>Adults</label>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6">
                                        <input type="number" min="0" id="adults" onchange="getNumbers(this.id)" />
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6">
                                        <label class="position-relative">
                                            Children
                                            <p class="child-age">Ages 0-17</p>
                                        </label>
                                        <div id="age-box" class="age-box">
                                            <input type="number" min="0" max="17" id="age-1" placeholder="Age" class="age"/>
                                            <input type="number" min="0" max="17" id="age-2" placeholder="Age" class="age"/>
                                            <input type="number" min="0" max="17" id="age-3" placeholder="Age" class="age"/>
                                            <input type="number" min="0" max="17" id="age-4" placeholder="Age" class="age"/>
                                            <input type="number" min="0" max="17" id="age-5" placeholder="Age" class="age"/>
                                            <input type="number" min="0" max="17" id="age-6" placeholder="Age" class="age"/>
                                            <input type="number" min="0" max="17" id="age-7" placeholder="Age" class="age"/>
                                            <input type="number" min="0" max="17" id="age-8" placeholder="Age" class="age"/>
                                            <input type="number" min="0" max="17" id="age-9" placeholder="Age" class="age"/>
                                            <input type="number" min="0" max="17" id="age-10" placeholder="Age" class="age"/>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6">
                                        <input type="number" min="0" max="10" id="children" onchange="getNumbers(this.id)" />
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6">
                                        <label>Guests</label>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6">
                                        <input type="number" min="0" id="guests" onchange="getNumbers(this.id)" />
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6">
                                        <label>Rooms</label>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6">
                                        <input type="number" min="0" id="rooms" onchange="getNumbers(this.id)" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="fields">
                        <button type="submit" class="btn btn-primary search-list">Search</button>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="total-flights total-hotel">Total <b><?php if(isset($NumberOfHotel)){ echo $NumberOfHotel;} else{echo "0";} ?></b> Hotels, Homes, Appartments found</div>
                        <div class="filter-aria">
                            <h1>Filter Result</h1>
                            <div>
                                <h5>Name contains</h5>
                                <div class="filter-by stop">
                                    <input type="text" placeholder="Property Name" class="form-control" />
                                </div>
                            </div>
                            <div>
                                <h5>Price range</h5>
                                <div class="filter-by price-range">
                                    <p class="guest-rating">
                                        <span>
                                            <i class="fas fa-rupee-sign"></i>
                                        </span>
                                        <span>0-100000</span>
                                    </p>
                                    <input type="number" class="form-control range" placeholder="1000-2000" min="0" max="10"/>
                                </div>
                            </div>
                            <div>
                                <h5>Popular filters</h5>
                                <div class="filter-by preference">
                                    <p>
                                        <input type="checkbox" class="filter-check" />
                                        <span>Breakfast included</span>
                                    </p>
                                    <p>
                                        <input type="checkbox" class="filter-check" />
                                        <span>WiFi included</span>
                                    </p>
                                    <p>
                                        <input type="checkbox" class="filter-check" />
                                        <span>Pool</span>
                                    </p>
                                    <p>
                                        <input type="checkbox" class="filter-check" />
                                        <span>Airport transfer</span>
                                    </p>
                                    <p>
                                        <input type="checkbox" class="filter-check" />
                                        <span>Romantic</span>
                                    </p>
                                </div>
                            </div>
                            <div>
                                <h5>Star rating</h5>
                                <div class="filter-by dep-time">
                                    <ul>
                                        <li>1</li>
                                        <li>2</li>
                                        <li>3</li>
                                        <li>4</li>
                                        <li>5</li>
                                    </ul>
                                </div>
                            </div>

                            <div>
                                <h5>Guest rating</h5>
                                <div class="filter-by price-range">
                                    <p class="guest-rating">
                                        <span>0-10</span>
                                    </p>
                                    <input type="number" class="form-control range" placeholder="10" min="0" max="10"/>
                                </div>
                            </div>
                            <div>
                                <h5>Free cancellation & payment</h5>
                                <div class="filter-by preference cancellation">
                                    <p>
                                        <input type="checkbox" class="filter-check" />
                                        <span>Free cancellation</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9">
                        
                        <?php
                            if($NumberOfHotel>0){
                                fetch_hotel();
                            }

                            function fetch_hotel()
                            { 
                                $HotelSearchResult  =$GLOBALS['data']["HotelSearchResult"];
                                $TraceID            =$HotelSearchResult["TraceId"];
                                $_SESSION['TraceId']=$TraceID;
                                $xe=$_SESSION['TraceId'];

                                $PreferredCurrency  =$HotelSearchResult["PreferredCurrency"];
                                for($i=0; $i< $GLOBALS['NumberOfHotel']; $i++){
                                    $HotelResults       =$HotelSearchResult["HotelResults"][$i];
                                    $IsHotDeal          =$HotelResults["IsHotDeal"]; 
                                    $ResultIndex        =$HotelResults["ResultIndex"];
                                    $HotelCode          =$HotelResults["HotelCode"];
                                    $HotelName          =$HotelResults["HotelName"];
                                    $HotelCategory      =$HotelResults["HotelCategory"];
                                    $StarRating         =$HotelResults["StarRating"];
                                    $HotelDescription   =$HotelResults["HotelDescription"];
                                    $HotelPolicy        =$HotelResults["HotelPolicy"];
                                    $HotelPicture       =$HotelResults["HotelPicture"];
                                    $HotelAddress       =$HotelResults["HotelAddress"];
                                    $HotelContactNo     =$HotelResults["HotelContactNo"];
                                    $HotelMap           =$HotelResults["HotelMap"];
                                    $Latitude           =$HotelResults["Latitude"];
                                    $Longitude          =$HotelResults["Longitude"];
                                    $HotelLocation      =$HotelResults["HotelLocation"];
                                    $SupplierPrice      =$HotelResults["SupplierPrice"];
                                    $RoomDetails        =$HotelResults["RoomDetails"];
                                    $RoomDetails        =$HotelResults["RoomDetails"];
                                    // $RoomDetails        =$HotelResults["TripAdvisor"]["ReviewURL"];

                                    $Price              =$HotelResults["Price"];
                                    $CurrencyCode       =$Price["CurrencyCode"];
                                    $RoomPrice          =$Price["RoomPrice"];
                                    $ExtraGuestCharge   =$Price["ExtraGuestCharge"];
                                    $ChildCharge        =$Price["ChildCharge"];
                                    $PublishedPriceRoundedOff=$Price["PublishedPriceRoundedOff"];



                                    echo '

                        <div class="hotel-info">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                    <div class="image-container">
                                        <img src="'.$HotelPicture .'" class="img-fluid"/>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                    <div class="hotel-detail-box">
                                        <div>
                                            <span class="h-name">'.$HotelName.'</span>
                                            <span class="star-badge">'.$StarRating.' Star </span>
                                        </div>
                                        <div>
                                            <p class="addr">
                                                ' .$HotelAddress .'
                                            </p>
                                        </div>
                                        <div>
                                            <h5 class="local-title"> Hotel Description: </h5>
                                            <p> '.$HotelDescription.'</p>
                                            <a href="HotelApi/info.php?ResultIndex='.$ResultIndex .'&HotelCode='.$HotelCode .'">Hotel Info</a>
                                            <span>  <span>
                                            <a href="HotelApi/room.php?ResultIndex='.$ResultIndex .'&HotelCode='.$HotelCode .'">Hotel room</a>
                                        <!--    <ul>
                                                <li>24 km to city centre</li>
                                                <li>11 km to Indira Gandhi International Airport (DEL)</li>
                                            </ul> 
                                        </div>
                                        <div class="review">
                                            <span class="r-value">7.6 </span>
                                            <span>Good</span>
                                            <p>47 website.com guest reviews</p>
                                        </div> -->
                                        </div>
                                        <div>
                                        <!--    <ul class="facility">
                                                <li>
                                                    <span><i class="fas fa-car"></i></span>
                                                    <span>Free Parking</span>
                                                </li>
                                                <li>
                                                    <span><i class="fas fa-swimmer"></i></span>
                                                    <span>Pool</span>
                                                </li>
                                                <li>
                                                    <span><i class="fas fa-bus"></i></span>
                                                    <span>Airport transfer</span>
                                                </li>
                                                <li>
                                                    <span><i class="fas fa-spa"></i></span>
                                                    <span>Spa</span>
                                                </li>
                                                <li>
                                                    <span><i class="fas fa-dumbbell"></i></span>
                                                    <span>Gym</span>
                                                </li>
                                                <li>
                                                    <span><i class="fas fa-utensils"></i></span>
                                                    <span>Restaurant</span>
                                                </li>
                                                <li>
                                                    <span><i class="fas fa-bath"></i></span>
                                                    <span>Bathtub</span>
                                                </li>
                                                <li>
                                                    <span><i class="fas fa-wifi"></i></span>
                                                    <span>Internet access</span>
                                                </li>
                                                <li>
                                                    <span><i class="fas fa-restroom"></i></span>
                                                    <span>Connecting rooms available</span>
                                                </li>
                                            </ul> -->
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                    <div class="booking-box">
                                        <div class="b-price">
                                            <span>'.$CurrencyCode .'</span>
                                            <span>'.$PublishedPriceRoundedOff .'</span>
                                        </div>
                                        <p class="tax">excluding taxes & fees</p>
                                        <form method="POST" action="guestInfo.php">
                                        <input type="hidden" name="ResultIndex" value="'.$ResultIndex .'" >
                                        <input type="hidden" name="HotelCode" value="'.$HotelCode .'" >
                                        <button type="submit" class="book-now">Select Room</button>
                                        </form>
                                        <div class="some-other-info">
                                            <p>
                                                <span><i class="fas fa-check"></i></span>
                                                <span>Free cancellation</span>
                                            </p>
                                            <p>
                                                <span><i class="fas fa-check"></i></span>
                                                <span>Pay at property available</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>




                                    ';
                                }
                            }



                        ?>





                    </div>
                </div>
        </section>
    </body>
</html>