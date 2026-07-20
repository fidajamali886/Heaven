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

    $checkQuery = "SELECT * FROM `Mountaineering` WHERE `d_Email` = '$Email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['msg'] = "❌ This email has already been used to submit the form.";
        $_SESSION['modalOpen'] = true;
    } else {
        $query = "INSERT INTO `Mountaineering` 
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
    <title>Mountaineering-Haven of The World</title>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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

<!--  Navbar End -->

<!--  Home Link -->
 <div class=" col-lg-12 col-12 abc">
    <a  href="../Home.php">Home</a> | Camping 
</div>
<div class="long-line abc"></div>
<br>
<div  style=" margin-left:5%;  width:95%; font-size: larger;"class="p">

     <h3>Camping </h3> 
     <h2 style=" text-align:center; font-weight:700; color:gray;">Camping Services</h2>
       Nothing beats spending a camping night at Deosai plain Skardu. Deosai is 2nd highest plateau on earth having 4000m average altitude. There are designated camping sites which of them the famous locations are Bara Pani, Shatung Nala. Spend a night and feel living at Space and glamping experience too. Our camping services may included Dome Tents, Kitchen Tents, Mess tents, toilet tents, Table chairs, Foods, BBQ, Sleeping Bags, Mattress, Kitchen crews, Transport and musical nights as per your inquiry and budget too. Kids under ages of 10 not recommenced. Please, fill- out the following inquiry form for Deosai Camping Services. <br>
       <br><br>
       <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>	 	 
                    <th>Services</th>
                    <th>Yes</th>
                    <th>No	</th>
                    <th>Quantity</th>                    
                </tr>
                <tr>			
                  <td>Tents</td>
                  <td>Yes</td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>			
                  <td>Kitchen Tent</td>
                  <td>Yes</td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>			
                  <td>Meal</td>
                  <td>Yes</td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>			
                  <td>Kitchen Crew</td>
                  <td>Yes</td>
                  <td></td>
                  <td></td>
                </tr><tr>			
                  <td>Breakfast</td>
                  <td></td>
                  <td>No</td>
                  <td></td>
                </tr><tr>			
                  <td>Mattress</td>
                  <td></td>
                  <td>No</td>
                  <td></td>
                </tr>
            </thead>
           
        </table>          
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