<?php 
session_start();
include('connection.php');
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST['Name'];
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $Cellno = $_POST['Cellno'];
    $Country = $_POST['Country'];
    $City = $_POST['City'];
    $participants = $_POST['participants'];
    $Pickup = $_POST['Pickup'];
    $Pickup_date = $_POST['Pickup_date'];
    $About = $_POST['About'];

    $checkQuery = "SELECT * FROM `5 Days Family Trip around Skardu` WHERE `d_Email` = '$Email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['msg'] = "❌ This email has already been used to submit the form.";
        $_SESSION['modalOpen'] = true;
    } else {
        $query = "INSERT INTO `5 Days Family Trip around Skardu` 
        (`d_id`, `d_Name`, `d_Email`, `d_Cellno`, `d_Country`, `d_City`, `d_participants`, `d_Pickup`, `d_Pickup_date`, `d_About`) 
        VALUES (NULL, '$Name', '$Email', '$Cellno', '$Country', '$City', '$participants', '$Pickup', '$Pickup_date', '$About')";

        $data = mysqli_query($conn, $query);

        if ($data) {
            $_SESSION['msg'] = "✅ Data Submitted Successfully <br>
            <span style='font-size: smaller; color: green;'>Your information has been received. We’ll get back to you within 24 hours.</span>";
        } else {
            $_SESSION['msg'] = "❌ Data Submission Failed";
        }
        $_SESSION['modalOpen'] = true;
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$msg = isset($_SESSION['msg']) ? $_SESSION['msg'] : "";
$modalOpen = isset($_SESSION['modalOpen']) ? $_SESSION['modalOpen'] : false;

unset($_SESSION['msg']);
unset($_SESSION['modalOpen']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>5-Days Family Trip around Skardu-Haven of The World</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="Gushing/Images/Haven-Logo4.jpg" rel="icon">

    <!--  Custom CSS -->
 <link rel="stylesheet" href="tour3.css">

   
 <!--  Bootstrap CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
     .btn-secondary{
        margin-left:5%;
        padding: 8px 16px;
        font-weight: bold;
        border-radius: 20px;
        color:black;
        background-color: rgb(235, 42, 42);
        border:none;
    }
    .btn-secondary:hover {
        color:white;
        background-color:red;
    }
  </style>

</head>
<body>
     <!-- Loader -->
          <!-- <br><br> -->
  <div id="loader">
    <div class="spinner"></div>
  </div>

  <!-- Actual Page Content -->
  <div id="main-content">
    <!-- <h1>Welcome to My Website</h1> -->
    <!-- <p>This is the main content of the page. </p> -->
  </div>

  <!-- Script to hide loader on page load -->
  <script>
    window.addEventListener('load', function () {
      document.getElementById('loader').style.display = 'none';
      document.getElementById('main-content').style.display = 'block';
    });
  </script>

  
 <!-- ✅ Navbar Start -->
<nav class="navbar navbar-expand-md navbar-light bg-light">
  <div class="container-fluid">

    <!-- ✅ Brand Logo -->
    <a class="navbar-brand" href="../Home.php">
      <img src="Gushing/Images/Haven-Logo.jpg" alt="Logo" width="100">
    </a>

    <!-- ✅ Toggle Button for Offcanvas (Mobile View) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"> 
      <span class="navbar-toggler-icon "></span>
    </button>

    <!-- ✅ Offcanvas Menu -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a style="color:blue; "class="nav-link active" href="../Home.php">Home</a>
        </li>
                       


          <!-- Trekking Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown">Trekking</a>
            <ul class="dropdown-menu">
             <li><a class="dropdown-item" href="K2-Ghandoghoro-Trek.php">K2 Ghandoghoro Trek</a></li>
                    <li><a class="dropdown-item" href="Gushing-La-Trek.php">Gushing La Trek</a></li>
                    <li><a class="dropdown-item" href="Machulo-La-Trek.php">Machulo La Trek</a></li>
                    <li><a class="dropdown-item" href="Five-8000-meters-Base-Trek.php">Five 8000 meters Base Trek</a></li>
                    <li><a class="dropdown-item" href="Mashabrum-Base-Trek.php">Mashabrum Base Trek </a></li>
                    <li><a class="dropdown-item" href="Spantik-Base-Trek.php">Spantik Base Trek </a></li>
                    <li><a class="dropdown-item" href="K-6-&-7-Lela-Peak-base-Trek.php">K-6 & 7 Lela Peak base Trek </a></li>
                    <li><a class="dropdown-item" href="Hunbroq-K2-View-Point-Trek.php">Hunbroq K2 View Point Trek </a></li>
            </ul>
          </li>

          <!-- Mountaineering -->
                <a class="nav-link active" href="Mountaineering.php">   Mountaineering</a>
                

          <!-- Tours Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown">Tours</a>
            <ul class="dropdown-menu">
             <li><a class="dropdown-item" href="Skardu-Trip.php">  Skardu Trip </a></li>
             <li><a class="dropdown-item" href="Skardu-&-Hunza-Trip.php">Skardu & Hunza Trip </a></li>
             <li><a class="dropdown-item" href="Hunza-Trip.php">Hunza Trip </a></li>
             <li><a class="dropdown-item" href="Kalash-Chitral-Trip.php">Kalash Chitral Trip</a></li>
            </ul>
          </li>

          <!-- Family Trips Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown">Family Trips</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="4-Days-Family-Trip-around-Skardu.php">4 Days Family Trip around Skardu</a></li>
               <li><a class="dropdown-item" href="5-Days-Family-Trip-around-Skardu.php">5 Days Family Trip around Skardu</a></li>
               <li><a class="dropdown-item" href="6-Days-Family-Trip-around-Skardu.php">6 Days Family Trip around Skardu</a></li>
               <li><a class="dropdown-item" href="7-Days-Family-Trip-around-Skardu.php">7 Days Family Trip around Skardu </a></li>            </ul>
          </li>

          <!-- Customize Trips -->
          <li class="nav-item">
                  <a class="nav-link active" href="Customize-Trips.php">Customize Trips</a>
              </li>
              <!-- ✅ Navbar Start -->
<nav class="navbar navbar-expand-md navbar-light bg-light">
  <div class="container-fluid">

    <!-- ✅ Brand Logo -->
    <a class="navbar-brand" href="../Home.php">
      <img src="Gushing/Images/Haven-Logo.jpg" alt="Logo" width="100">
    </a>

    <!-- ✅ Toggle Button for Offcanvas (Mobile View) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"> 
      <span class="navbar-toggler-icon "></span>
    </button>

    <!-- ✅ Offcanvas Menu -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a style="color:blue; "class="nav-link active" href="../Home.php">Home</a>
        </li>
                       


          <!-- Trekking Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown">Trekking</a>
            <ul class="dropdown-menu">
             <li><a class="dropdown-item" href="K2-Ghandoghoro-Trek.php">K2 Ghandoghoro Trek</a></li>
                    <li><a class="dropdown-item" href="Gushing-La-Trek.php">Gushing La Trek</a></li>
                    <li><a class="dropdown-item" href="Machulo-La-Trek.php">Machulo La Trek</a></li>
                    <li><a class="dropdown-item" href="Five-8000-meters-Base-Trek.php">Five 8000 meters Base Trek</a></li>
                    <li><a class="dropdown-item" href="Mashabrum-Base-Trek.php">Mashabrum Base Trek </a></li>
                    <li><a class="dropdown-item" href="Spantik-Base-Trek.php">Spantik Base Trek </a></li>
                    <li><a class="dropdown-item" href="K-6-&-7-Lela-Peak-base-Trek.php">K-6 & 7 Lela Peak base Trek </a></li>
                    <li><a class="dropdown-item" href="Hunbroq-K2-View-Point-Trek.php">Hunbroq K2 View Point Trek </a></li>
            </ul>
          </li>

          <!-- Mountaineering -->
                <a class="nav-link active" href="Mountaineering.php">   Mountaineering</a>
                

          <!-- Tours Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown">Tours</a>
            <ul class="dropdown-menu">
             <li><a class="dropdown-item" href="Skardu-Trip.php">  Skardu Trip </a></li>
             <li><a class="dropdown-item" href="Skardu-&-Hunza-Trip.php">Skardu & Hunza Trip </a></li>
             <li><a class="dropdown-item" href="Hunza-Trip.php">Hunza Trip </a></li>
             <li><a class="dropdown-item" href="Kalash-Chitral-Trip.php">Kalash Chitral Trip</a></li>
            </ul>
          </li>

          <!-- Family Trips Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown">Family Trips</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="4-Days-Family-Trip-around-Skardu.php">4 Days Family Trip around Skardu</a></li>
               <li><a class="dropdown-item" href="5-Days-Family-Trip-around-Skardu.php">5 Days Family Trip around Skardu</a></li>
               <li><a class="dropdown-item" href="6-Days-Family-Trip-around-Skardu.php">6 Days Family Trip around Skardu</a></li>
               <li><a class="dropdown-item" href="7-Days-Family-Trip-around-Skardu.php">7 Days Family Trip around Skardu </a></li>
          </ul>
          </li>

          <!-- Customize Trips -->
          <li class="nav-item">
                  <a class="nav-link active" href="Customize-Trips.php">Customize Trips</a>


              </li>

               <!-- Right side buttons -->
            <div class="d-flex align-items-center gap-3 mt-3 mt-md-0">
                <?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true): ?>
                    <!-- Admin Dropdown -->
                    <div class="dropdown">
                        <a style=" width: 35px;height: 35px;background-color: #0d6efd; /* blue color */color: white;border-radius: 50%; /* fully round */display: flex;align-items: center;justify-content: center;text-decoration: none;font-size: 22px;"
                        class="btn btn-outline-primary btn-sm  circle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>
                              
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="../Admin_Panel.php"> Admin Panel</a></li>
                            <li><a class="dropdown-item text-danger" href="../logout.php"> Logout</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <!-- Login button -->
                    <a href="../login.php" class="btn btn-outline-primary btn-sm"> Login</a>
                <?php endif; ?>
            </div>

        </ul>
        
        </div>
      </div>
    </div>
  </div>
</nav>
<!-- ✅ Navbar End -->

        </ul>
       
        </div>
      </div>
    </div>
  </div>
</nav>
<!-- ✅ Navbar End -->

<!--  Navbar End -->
<!--  Home Link -->
 <div class=" col-lg-12 col-12 abc">
    <a  href="/Home.php">Home</a> | 5 Days Family Trip around Skardu
</div>
<div class="long-line abc"></div>


<!--  Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="container1-fluid">
        <div class="row">
          <!-- Carousel Section (75%) -->
            <div class="col-12 col-lg-9">
                <div class="carousel-inner">
                   <div class="carousel-item active">
                      <img src="Gushing/Images/1.jpg" class="d-block w-100" alt="Slide 1">
                    </div>
                    <div class="carousel-item">
                        <img src="Gushing/Images/2.jpg" class="d-block w-100" alt="Slide 2">
                    </div>
                    <div class="carousel-item">
                        <img src="Gushing/Images/3.jpg" class="d-block w-100" alt="Slide 3">
                    </div>
                    <div class="carousel-item">
                        <img src="Gushing/Images/4.jpg" class="d-block w-100" alt="Slide 4">
                    </div>
                    <div class="carousel-item">
                        <img src="Gushing/Images/5.jpg" class="d-block w-100" alt="Slide 5">
                    </div>
                   <!-- Navigation Buttons -->
                   <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                   <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>

                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"></button>
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="3"></button>
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="4"></button>
                    </div>
                </div>
                <br><br>
                <div  style=" margin-left:5%;  width:95%;"class="p">
               
                    <h3>5 Days Family Trip around Skardu</h3> 
                    <br>
                    Trip Code  &emsp;&emsp;&emsp;&emsp;RT-402 <br> 
                    Type &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Sightseeing | Culture <br> 
                    Destinations &emsp;&emsp;&nbsp;&nbsp; Skardu | Deosai | Shigar Valley | Khaplu | Hushe Valley  <br>
                    Region &emsp;&emsp;&emsp;&emsp;&emsp;        Baltistan  <br>
                    Duration &emsp;&emsp;&emsp;&emsp;&nbsp;      5 Days, 4 Nights – Skardu to Skardu <br>
                    Service Level &emsp;&emsp;&nbsp;&nbsp;  Economy Plus | VIP (both available) <br> 
                    Traveling &emsp;&emsp;&emsp;&emsp;&nbsp;      7–8 hours daily (or depending on your mood) <br> 
                    Date &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;             Choose your own date <br>
                    <br>
                  
                  
                    <b>Trips Attractions | Destinations to be visited</b><br>
                    Skardu| Shangri-La| Upper Kachura Lake| Deosai Plain| Manthal Buddha Rock | Sadpara Lake| Cold Deserts| Katpana Lake | Shigar Valley | Khaplu Valley | Khaplu Fort| Chaqchan Mosque | Machulo | Masherbrum View Point
                    <br><br>
                    <b>Trip Itinerary</b><br>
                    <b>Day 01</b><br>
                    Reception at Airport, Travel and Visit Shangri-La- Visit Upper Kachura Lake-  Tea and Lunch at Upper Kachura- Travel to Skardu city for Stay-  45 Minutes traveling                       
                    <br>
                    <b>Day 02</b><br>
                    Travel to Deosai - Full Day excursion and photography at Deosai Plain- Photography at Sadpara Lake on return time- Visit Manthal Buddha Rock while coming back – Stay and  dine at Skardu
                    <br>
                    <b>Day 03</b><br>
                    Travel to Shigar valley- View the Shigar valley from the View Point- Travel and visit to Khaplu  and Masherbrum view point. Stay and Dine at Khaplu
                    <br>
                    <b>Day 04</b><br>
                    Travel and visit Saling, Machulo, Mashabrum View Point and in the evening back to Khaplu. Hike to Thoqsikhar Palace if the guest want- Stay and dine at Khaplu
                    <br>
                    <b>Day 05</b><br>
                    Travel to Skardu- 2 and half hours - Visit Skardu Bazar and Shopping if time allows-  Drop at Skardu Airport

                     <br>
                     
                    <br>
                    <b>Services Included</b><br> 
                    5 Days Private Booked Transport throughout the tour for sightseeing <br>
                    4 Nights hotel stay as per the itinerary <br>
                    Room’s Occupancy-  1-3- Size Family- 1 Room | 4- 6 - Size Family- 2 Rooms <br>
                    All dinner and breakfast as per itinerary  including soft drinks <br>
                    One complimentary travel guide <br>
                    <br><br>
                      
                    <b>Services Not Included</b><br>
                    Personal insurance, healthcare, helicopter rescue deposit for emergencies
                    All Personal phone calls and internet including satellite phones
                    Any Laundry service, drinks and food other than mentioned above-
                    Hotel rooms beyond itinerary and mentioned above
                    In case of group splitting and any member skip the team and return before the end of the trip for any reason, he/she will be responsible for all the expanses travelling out of the group
                    Gratitude/tips to anyone anywhere not included
                    <br><br>
                    <b>Services Exclude</b>
                    <br>
                    Domestic Airline Ticket
                    <br>
                    <b>Note:</b> PIA flight fare to Skardu is not fixed so we do not include the ticket fare in our price. We recommend either you purchase the ticket or we can provide the ticket in order to facilitate our guests, and they can pay the actual amount fare.
                    Health Insurance <br>
                    Any unexpected beyond itinerary and anything which is not mentioned  above service included segment
                    Gratitude/ tips at hotel/ restaurant/ driver etc
                    <br><br>
                    <b>Booking Information </b><br>
                    Book your trip early as much as possible via email / whatsapp/  phone call
                    Ask us and get complete price chart as per your family size and interested services level
                    Booking is considered confirmed once we received advance payment
                    Transfer or deposit the advance payment of total PKR-20000/-  
                    The rest of the payment will collect upon arrival at Skardu before get started the trip
                    No refund at all once started the trip  
                    <br><br>
                   <b>Services Comparison </b><br> 
                    <b>VIP Package - Stay and Dine | Transport</b><br>
                    Shangri-La Resort| Shigar Fort| Khaplu Fort
                    Parado TZ/ TX up Model -
                    1- 3      One  Parado
                    4-  6-    Two Parado
                    <br>
                    <b>Eco- Plus Package | Stay and Dine | Transport</b>
                    <br>
                    Mountain Lodge| PTDC| Concordia | River View | Karakoram Lodge | Parado TZ down Model
                    1-6 - One Parado at all 
                  
                </div>
        
            
            </div>

                
          
            <!-- <br>
            <br>
            <br>
            <br> -->
            <!-- Right Side Div (25% approx, but taking 20% purposefully) -->
            <div class=" abd col-7 col-md-7 col-lg-3">
               <div style=" margin-top:  5%; width: 90%; height: auto%; background-color: #f0f0f0;" >
                    <!-- Your content here -->
                    <div class="abe">
                        <h4>5 Days Family Trip around Skardu</h4>
                        <p>Baltistan </p>
                        
                        <!-- long-line -->
                        <div class="long-line1"></div>
                        <br>
                        <p><b>Mode of Transport:</b>    Road </p>
                        <p><b>Region:</b>               Baltistan  </p>
                        <p><b>Duration:</b>             5 Days 4 Nights  </p>
                       <a href="" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#exampleModal">SEND INQUIRY</a>

                        <br><br>
                    </div>
                </div>
                <div style=" margin-top:  5%; width: 90%; height: auto%; background-color: #f0f0f0;" >
                    <!-- Your content here -->
                    <div class="abe p">
                        <h4>Need help booking?</h4>
                      <br>
                        <!-- long-line -->
                        <div class="long-line1 "></div>
                        <p>Call us for individual, tailored advice for your perfect stay or send us a message with your hotel booking query.
                        </p>
                        +92-312- 9722- 994
                        <br>
                        +92-342- 7269- 551
                        <br>
                        <br>
                        
                    </div>
                </div>
                
                <div style=" margin-top:  5%; width: 90%; height: auto%; background-color: #f0f0f0;" >

                <div class="container mt-3">
                      <h5 style="font-weight:750;">Explore our latest Tours</h5>
                      <br>
                      <div class="long-line1 "></div>
                      <br>
                      <!-- Tour Item 1 Start -->
                      <div class="d-flex mb-3">
                        <a href="Gushing-La-Trek.php">
                        <img src="Gushing/Images/5.jpg" alt="" class="me-3" width="80" height="60" > </a>
                        <div class="latest">
                          <a href="Gushing-La-Trek.php">
                          <h6 class="mb-0">Gushing La Trek</h6> </a>
                          <small>Shigar, Gilgit-Blatistan</small>
                        </div>
                      </div>
                      <!-- Tour Item 1 End -->
                       
                        <!-- Tour Item 2 Start -->
                        <div  class="long-line2 "></div>
                      
                      <div style="margin-top:10%; "class="d-flex mb-3">
                        <a href="Skardu-Trip.php">
                        <img src="Skardu-Trip/Images/6.jpg" alt="" class="me-3" width="80" height="auto" object-fit="cover"> </a>
                        <div class="latest">
                          <a href="Skardu-Trip.php">
                          <h6 class="mb-0">Skardu Trip</h6> </a>
                          <small>Skardu,Gilgit-Baltistan</small>
                        </div>
                      </div>
                      <!-- Tour Item 2 End -->

                       <!-- Tour Item 3 Start -->
                        <div  class="long-line2 "></div>
                      
                      <div style="margin-top:10%; "class="d-flex mb-3">
                        <a href="Hunza-Trip.php">
                        <img src="Hunza-Trip/Images/12.jpg" alt="" class="me-3" width="80" height="60"> </a>
                        <div class="latest">
                          <a href="Hunza-Trip.php">
                          <h6 class="mb-0">Hunza Trip</h6> </a>
                          <small>Hunza, Gilgit-Baltistan</small>
                        </div>
                      </div>
                      <!-- Tour Item 3 End -->

                       <!-- Tour Item 4 Start -->
                        <div  class="long-line2 "></div>
                      
                      <div style="margin-top:10%; "class="d-flex mb-3">
                        <a href="Kalash-Chitral-Trip.php">
                        <img src="Kalash-Chitral-Trip/Images/6.jpg" alt="" class="me-3" width="80" height="60"> </a>
                        <div class="latest">
                          <a href="Kalash-Chitral-Trip.php">
                          <h6 class="mb-0">Kalash Chitral Trip</h6> </a>
                          <small>Chitral,Gilgit-Baltistan</small>
                        </div>
                      </div>
                      <!-- Tour Item 4 End -->

                       <!-- Tour Item 5 Start -->
                        <div  class="long-line2 "></div>
                      
                      <div style="margin-top:10%; "class="d-flex mb-3">
                        <a href="Mashabrum-Base-Trek.php">
                        <img src="Mashabrum-Base-Trek/Images/3.jpg" alt="" class="me-3" width="80" height="60"> </a>
                        <div class="latest">
                          <a href="Mashabrum-Base-Trek.php">
                          <h6 class="mb-0">Mashabrum Base Trek</h6> </a>
                          <small>Gilgit-Baltistan</small>
                        </div>
                      </div>
                      <!-- Tour Item 5 End -->

                       <!-- Tour Item 6 Start -->
                        <div  class="long-line2 "></div>
                      
                      <div style="margin-top:10%; "class="d-flex mb-3">
                        <a href="K2-Ghandoghoro-Trek.php">
                        <img src="K2-Ghandoghoro/Images/1.jpg" alt="" class="me-3" width="80" height="60"> </a>
                        <div class="latest">
                          <a href="K2-Ghandoghoro-Trek.php">
                          <h6 class="mb-0">K2 Base Camp | Gondogoro Pass Trek</h6> </a>
                          <small>Baltistan</small>
                        </div>
                      </div>
                      <!-- Tour Item 6 End -->

                       <!-- Tour Item 7 Start -->
                        <div  class="long-line2 "></div>
                      
                      <div style="margin-top:10%; "class="d-flex mb-3">
                        <a href="Five-8000-meters-Base-Trek.php">
                        <img src="Five-8000-meters-Base-Trek/Images/3.jpg" alt="" class="me-3" width="80" height="60"> </a>
                        <div class="latest">
                          <a href="Five-8000-meters-Base-Trek.php">
                          <h6 class="mb-0">The Gig Five</h6> </a>
                          <small>Gilgit-Baltistan</small>
                        </div>
                      </div>
                      <!-- Tour Item 7 End -->

                       <!-- Tour Item 8 Start -->
                        <div class="long-line2 "></div>
                      
                      <div style="margin-top:10%; "class="d-flex mb-3">
                        <a href="Hunbroq-K2-View-Point-Trek.php">
                        <img src="Hunbroq/Images/1.jpeg" alt="" class="me-3" width="80" height="60"> </a>
                        <div class="latest">
                          <a href="Hunbroq-K2-View-Point-Trek.php">
                          <h6 class="mb-0">Hunbroq K2 View Point Trek</h6> </a>
                          <small>Hushe, Gilgit-Baltistan</small>
                        </div>
                      </div>
                      <!-- Tour Item 8 End -->

                       <!-- Tour Item 9 Start -->
                        <div  class="long-line2 "></div>
                      
                      <div style="margin-top:10%; "class="d-flex mb-3">
                        <a href="Machulo-La-Trek.php">
                        <img src="Machulo/Images/1.jpg" alt="" class="me-3" width="80" height="60"> </a>
                        <div class="latest">
                          <a href="Machulo-La-Trek.php">
                          <h6 class="mb-0">Machulo La Trek</h6> </a>
                          <small>Machulo, Gilgit-Baltistan</small>
                        </div>
                      </div>
                      <!-- Tour Item 9 End -->

                       <!-- Tour Item 10 Start -->
                        <div  class="long-line2 "></div>
                      
                      <div style="margin-top:10%; "class="d-flex mb-3">
                        <a href="K-6-&-7-Lela-Peak-base-Trek.php">
                        <img src="K-6-&-7-Lela-Peak-base-Trek/Images/1.jpg" alt="" class="me-3" width="80" height="60"> </a>
                        <div class="latest">
                          <a href="K-6-&-7-Lela-Peak-base-Trek.php">
                          <h6 class="mb-0">K-7 | Leal Peak Trek</h6> </a>
                          <small>Gilgit-Baltistan</small>
                        </div>
                      </div>
                      <!-- Tour Item 10 End -->

                      
                      <br>
                    

                        
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
      
    
   
        
</div>

<br>

   
<!-- Footer Start -->
    <div class="container-1 bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s">
        <div class="container pb-5">
            <div class="row g-5">
                <div class=" col-lg-4 col-md-8">
                    <div class="footer-a rounded p-4">
                        <a class="footer-home" href="../Home.php"><h1 class="f-text text-uppercase mb-3">Heaven of The World </h1></a>
                        <p class="text-white mb-0">"Based in Skardu, we are a dedicated trekking company with deep roots in Baltistan, offering expertly guided adventures into the heart of the Karakoram Mountains. Run by some of the region’s most experienced local guides, we specialize in crafting personalized and corporate trekking experiences you can truly trust."

                            
                    </div>
                </div>
                <div class=" col-lg-3 col-md-4">
                    
                    
                    <h4 class="section-title text-start  text-uppercase mb-4">Services</h4>
                    <a class="btn btn-link" href="Trekking-&-Expeditions.php">Trekking & Expeditions</a>
                    <a class="btn btn-link" href="Tour-Guide.php">Tour Guide</a>
                    <a class="btn btn-link" href="Home-Hotel.php">Home | Hotel </a>
                    <a class="btn btn-link" href="Transports.php">Transport </a>
                     <a class="btn btn-link" href="Camping.php">Camping</a>

                </div>
                <div class="col-lg-5 ">
                    <div class="row gy-5 g-4">
                        <div class="col-lg-6 col-md-8">
                            <h4 class="section-title text-start  text-uppercase mb-4">Information</h4>
                            <a class="btn btn-link" href="About-Company.php">About Company</a>
                            <a class="btn btn-link" href="Equipment-Checklist.php">Equipment Checklist </a>
                            <a class="btn btn-link" href="">Support</a>
                            <div class="d-flex pt-5">
                      
                                <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/fidajamali3/" target="_blank"><i class="fab fab fa-instagram"></i></a>
                                <a class="btn btn-outline-light btn-social" href="https://web.facebook.com/fida.jamali.403599" target="_blank" ><i class="fab fa-facebook"></i></a>
                                <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/watch?v=zudor7Lgcrc" target="_blank"><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-outline-light btn-social" href="https://wa.me/+923129722994" target="_blank" class="social-icon whatsapp"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4">
                            <h4 class="section-title text-start  text-uppercase mb-4">Contact </h4>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+92 3129722994 <br> 
                        <p style="margin-left: 30px;">+92 3427269551</p></p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@heavenofworld.com</p>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Zain Turabi Chowk , Skardu , Baltistan</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy;  www.Heavenofworld.com, All Right Reserved. 
                    </div>
                    <div class="col-md-4 text-center text-md-end">
                        <div class="footer-menu">
                            <a style="text-decoration:none;"href="">Designed & Developed By ➤</a>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <button id="backToTop" onclick="scrollToTop()">^</button>

    </div>
    <!-- Footer End -->


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <form id="inquiryForm" method="POST">
            <div style="margin-left:35%; margin-top:2%;">
              <img src="Gushing/Images/Haven-Logo.jpg" alt="Logo" width="300px" >
              
            </div>

        <p style="margin-left:2.5%;">Please complete the form below to send us your message directly.</p>
        <?php if (!empty($msg)): ?>
          <div class="alert alert-info"><?php echo $msg; ?></div>
        <?php endif; ?>
          
        <label>Your Name</label>
        <input type="text" name="Name"placeholder="Enter your Name" required>

        <label>Your Email</label>
        <input type="email" name="Email" id="email" placeholder="Enter your Email" required>
        <p id="error"></p>
        <label>Your Cell No</label>
        <input type="text" name="Cellno" placeholder="Enter your Cell No" required>

        <label>Your Country</label>
        <input type="text" name="Country" placeholder="Enter your Country" required>

        <label>Your City</label>
        <input type="text" name="City" placeholder="Enter Your City" required>

        <label>No of participants</label>
        <input type="text" name="participants" placeholder="No of participants" required>

         <label>Pick up Airport in Pakistan</label>
        <input type="text" name="Pickup" placeholder="Pick up Airport in Pakistan" required>

        <label>Arrival/Pick Up date in Pakistan</label>
        <input type="date" name="Pickup_date" placeholder="" required>

       <label for="about">What you would like to inquire about?</label>
        <input type="about" id="about" name="About" maxlength="40" 
        placeholder="What you would like to inquire about?" required
        oninput="updateCharCount(this)">
        <small id="charCount" style="display:block; margin-left:5%; color:gray;">0 / 40</small>

        <input type="submit" value="SUBMIT INQUIRY"> 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <br>
        <br>
      </form>
    </div>
  </div>
</div>
<script>
  const aboutField = document.getElementById("about");
  const charCount = document.getElementById("charCount");

  aboutField.addEventListener("input", function () {
      const maxLength = 40;
      if (this.value.length > maxLength) {
          this.value = this.value.slice(0, maxLength); // extra remove
      }
      charCount.textContent = this.value.length + " / " + maxLength;
  });
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("inquiryForm");
  const emailInput = document.getElementById("email");
  const errorBox = document.getElementById("error");

  form.addEventListener("submit", function (e) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const email = emailInput.value.trim();

    if (!emailPattern.test(email)) {
      e.preventDefault();
      errorBox.textContent = "❌ Please enter a valid email address.";
      emailInput.focus();
    } else {
      errorBox.textContent = "";
    }
  });
});
</script>

<?php if ($modalOpen): ?>
<script>
  const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
  window.onload = () => modal.show();
</script>
<?php endif; ?>


   <!-- <h1>Scroll Down and Click the Button to Go Back to Top</h1> -->
    
   <script>
       window.onscroll = function() {
           let button = document.getElementById("backToTop");
           if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
               button.style.display = "block";
           } else {
               button.style.display = "none";
           }
       };

       function scrollToTop() {
           window.scrollTo({ top: 0, behavior: "smooth" });
       }
   </script>

  
</body>
</html>