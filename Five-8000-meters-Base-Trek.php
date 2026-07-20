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

    $checkQuery = "SELECT * FROM `five 8000 meters base trek` WHERE `d_Email` = '$Email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['msg'] = "❌ This email has already been used to submit the form.";
        $_SESSION['modalOpen'] = true;
    } else {
        $query = "INSERT INTO `five 8000 meters base trek` 
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
    <title>Five 8000 meters Base Trek-Haven of The World</title>
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
        /* margin-left:55%;      */
        margin-left:70%;
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

  
<!--  Navbar Start -->
<nav class="navbar navbar-expand-md navbar-light bg-light">
  <div class="container-fluid">

    <!--  Brand Logo -->
    <a class="navbar-brand" href="../Home.php">
      <img src="Logo/Haven-Logo.jpg" alt="Logo" width="100">
    </a>

    <!--  Toggle Button for Offcanvas (Mobile View) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"> 
      <span class="navbar-toggler-icon "></span>
    </button>

    <!--  Offcanvas Menu -->
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

<!--  Navbar End -->
<!--  Home Link -->
 <div class=" col-lg-12 col-12 abc">
    <a  href="#">Home</a>  | The Big Five 
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
                      <img src="Five-8000-meters-Base-Trek/Images/1.jpg" class="d-block w-100" alt="Slide 1">
                    </div>
                    <div class="carousel-item">
                        <img src="Five-8000-meters-Base-Trek/Images/2.jpg" class="d-block w-100" alt="Slide 2">
                    </div>
                    <div class="carousel-item">
                        <img src="Five-8000-meters-Base-Trek/Images/3.jpg" class="d-block w-100" alt="Slide 3">
                    </div>
                    <div class="carousel-item">
                        <img src="Five-8000-meters-Base-Trek/Images/4.jpg" class="d-block w-100" alt="Slide 4">
                    </div>
                    <div class="carousel-item">
                        <img src="Five-8000-meters-Base-Trek/Images/5.jpg" class="d-block w-100" alt="Slide 5">
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

                      <h4> The Big Five </h4> 
                      
                       Elevation&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;5000 | 5700 meters <br>
                       Level&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;Demanding | Extreme <br>
                       Region&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;Fairy Meadow| Nanga Parbat| Baltoro- K2 <br>
                       Duration&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;26 Days <br>
                       Date&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;15 July <br>
                       Mode of Transport&emsp;&nbsp;&nbsp;Road & Air 
                    
                     
                    <br><br>
                    <b>Overview</b>
                      <br>
                    Pakistan is home for the five 8000m mountains out of 14 in the world. These are K2- 8611m, Nanga Parbat- 8126m, Broad Peak- 80147m, Gasherbrum I- 8068m, and II 8035m. This trek is aimed to provide lifetime opportunity of trekking to all 5 base camps in a single holiday. The famous fairy meadow also part of this trip during trek to Nanga Parbat base camp. Read more about this at K2 base trek.                    <br>
                    <b>Trip Itinerary</b><br>
                    <b>Day 01</b><br>
                    Reception at Islamabad airport and transfer to Hotel
                    <br>   
                    <b>Day 02</b><br>
                    Early Travel- Islamabad to Chilas, either Naran Babusar route or Bisham KKH Route- Stay and Dine at hotel in Chilas – 12 hours traveling
                    <br>
                    <b>Day 03</b><br>
                    Early Travel- Chilas to Raikot Bridge- Transfer into Jeeps. Travel to Tatto Village and hike trek to Fairy Meadow- Stay and Dine at Fairy Meadow in huts
                    <br>
                    <b>Day 04</b><br>
                    Hike to Nanga Parbat base camp or stay at Fairy Meadow and enjoy
                    <br>
                    <b>Day 05</b><br>
                    Trek back to Tatto village- Travel to Raikot by Jeep, Transfer into van/ coaster and travel to Gilgit- Stay and dine at hotel in Gilgit
                    <br>
                    <b>Day 06</b><br>
                    Travel- Gilgit to Skardu- Stay and dine at hotel in Skardu
                    <br>
                    <b>Day 07</b><br>
                    Rest and Preparation Day in Skardu – Stay and Dine at Hotel in Skardu
                    <br>
                    <b>Day 08</b><br>
                    Travel- Skardu to Askoli- 5-6 Hours
                    <br>
                    <b>Day 09</b><br>
                    Trek- Askoli to Jhulla - 5-6 hours-
                    <br>
                    <b>Day 10</b><br>
                    Trek- Jhulla to Pajiu Camp- 5-7 Hours
                    <br>
                    <b>Day 11</b><br>
                    Rest/ Halt Day at Pajiu camp
                    <br>
                    <b>Day 12</b><br>
                    Pajiu to Khobursty- 5- 6 hours
                    <br>
                    <b>Day 13</b><br>
                    Trek Khobursty to Urdokas- 4- 5 hours
                    <br>
                    <b>Day 14</b><br>
                    Trek Urdokas to Ghoro II- 5-7 Hours
                    <br>
                    <b>Day 15</b><br>
                    Trek- Ghoro II to Concordia – 5-7 hours
                    <br>
                    <b>Day 16</b><br>
                    Trek K2 base camp and Broad Peak base camp- 8 hours
                    <br>
                    <b>Day 17</b><br>
                    Trek- Broad Peak to Shagharin Mord- 5- 6 hours
                    <br>
                    <b>Day 18</b><br>
                    Trek- Gasherbrum base camp excursions – Full day
                    <br>
                    <b>Day 19</b><br>
                    Trek- Shaghring to Ali Camp or Ghoro II – 7-8 hours
                    <br>
                    <b>Day 20</b><br>
                    Trek- Ali Camp to Khuspang or Ghoro II to Khobursty – 7- 8 hours
                    <br>
                    <b>Day 21</b><br>
                    Trek- Khuspang to Shaicho or Khobursty to Bardumal – 7- 8 hours
                    <br>
                    <b>Day 22</b><br>
                    Trek- Shaicho to Hushe or Bardumall to Askoli 4- 8 hours
                    <br>
                    <b>Day 23</b><br>
                    Travel- Hushe/ Askoli to Skardu – 5-7 hours
                    <br>
                    <b>Day 24</b><br>
                    Fly to Islamabad- Hotel Stay - Travel to Islamabad in case of no flights
                    <br>
                    <b>Day 25</b><br>
                    Reserved day in case of flight cancelation
                    <br>
                    <b>Day 26</b><br>
                    Drop at Islamabad international airport for departure- No hotel stay
                    <br><br>
                    
                        <b>Services Included</b><br> 
                    <b>Fees and Permit</b><br>
                    One time Trekking Permit Fees - CKNP Fees - All Camping and Bridges Fees
                    <br><br>
                    <b>Transportation</b><br>
                    Pick and Drop at Islamabad & Skardu Airports – Two way Domestic Flight ticket- Islamabad Skardu route - In case of flight cancelation- Private booked Road Transport on Islamabad Skardu route- Private booked Road Transport- from Skardu to Askoli and Askoli / Hushe to Skardu- Members and Luggage
                    <br><br>
                    <b>Accommodation</b><br>
                    One night stay in Islamabad upon intl. arrival and 2 nights stay upon return from Skardu
                    Two night’s hotel stay at Skardu upon arrival and one night upon return from the trek
                    One night hotel stays at KKH in case of road traveling
                    <br>
                    <b>Note:</b> All accommodation is offered on double occupancy basis. Single supplements will be charged accordingly. Hotel rooms come with only breakfast and WiFi, No mini bar services at hotels.
                    <br><br>
                    <b>Food & Beverage</b><br>
                    <b>Hotel’s Food</b><br>
                    In Islamabad, bed and breakfast come together. Generally, we offer all lunches and dinners in our full board package, however, since there are lots of cuisine choices in the capital, we better feel facilitate our guests, and leave them free where they want to go and eat.  Other than Islamabad, our package covers all breakfast, lunch and dinners accordingly.
                    <br><br>
                    <b>Food on Trek</b><br>
                    All meals will be prepared and served by our staff as per the availability and storage with a true quality and hygiene standard. Our meals menu would be combination of Pakistani, continental and Chinese cuisines. Just to mention some ingredients are Rice, Chicken, Pasta, nodules, tan foods, Flour s and variety of daals (Lentil).
                    <br><br>
                    <b>Beverages </b><br>
                    We provide soft drinks and mineral water at all hotels and restaurants while doing lunch and dinner. During trek only boiled water will be provided. Don’t forget to fill-up your water bottles in the morning and evening.
                    <br><br>
                    <b>Logistic Equipment</b><br>
                    Mess Tent - Kitchen Tent- Dome Tents during trek- Twin/ 3 Sharing -. Tents always come with mattress, All Kitchen Utensil and Cracory- Table and Chairs.
                    <br><br>
                    <b>Human Resources/ Crews</b><br>
                    Porters for all food, equipment and logistic material (each porter carries 25KGs).
                    Personal Luggage during trek- (12 KGs)- Porters Sirdar - Guide - Cook - Guide, Porters and staff insurance as per the govt rule.
                    <br><br>
                    <b>Services Not Included</b><br>
                    Personal insurance, healthcare, helicopter rescue deposit for emergencies
                    All Personal phone calls and internet including satellite phones
                    Any Laundry service, drinks and food other than mentioned above-
                    Hotel rooms beyond itinerary and mentioned above
                    In case of group splitting and any member skip the team and return before the end of the trip for any reason, he/she will be responsible for all the expanses travelling out of the group
                    Gratitude/tips to anyone anywhere not included
                    <br><br>
                    <b>Booking Information </b><br>
                    Book your trip early as much as possible via email, at least 45 days before the date of the trip
                    Write an email by mentioning trip code& title and ask us for trip registration form.
                    We will send you complete form and detail. Fill up the form and send us back- Booking Registration Done!
                    Booking is considered confirmed once we received advance payment
                    Advance Payment <b>500 USD</b> per person
                    Payment Mode- Bank Transfer/ Western Union/ Money Gram/ Cash
                    The rest of the payment will collect upon arrival either at Islamabad or Skardu
                    Trip cancelation can be done only through email.
                    Advance payment is non refundable unless in visa rejection. The expenses already will have occurred in ground arrangements such as purchasing domestic flight tickets and trekking permit
                    In case of visa rejection, please write us within 60 hours of your visa rejection with complete proof and detail. In this case we can do full refund if not occurred the expenses otherwise the only remaining balance will be refunded
                    No refund at all if the trip is canceled before 15 days of the trip
                    
                </div>
        
            
            </div>

                
          
            <br>
            <br>
            <br>
            <br>
            <!-- Right Side Div (25% approx, but taking 20% purposefully) -->
            <div class=" abd col-7 col-md-7 col-lg-3">
               <div style=" margin-top:  5%; width: 90%; height: auto%; background-color: #f0f0f0;" >
                    <!-- Your content here -->
                    <div class="abe">
                        <h4>The Big Five</h4>
                        <p>K2, Gilgit-Baltistan </p>
                        
                        <!-- long-line -->
                        <div class="long-line1"></div>
                        <br>
                        <p><b>Mode of Transport:</b>    Road & Air</p>
                        <p><b>Region:</b>              Fairy Meadow| Nanga Parbat| Baltoro- K2 </p>
                        <p><b>Duration:</b>             26 Days  </p>
                        <br>
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