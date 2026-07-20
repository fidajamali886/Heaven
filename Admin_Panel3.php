
<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
?>
<?php
include("connection.php");

// List of all tables
$tables = [
    "tour guide", "home hotel", 
];

$current_table = $_GET['table'] ?? $tables[0];
$search = $_GET['search'] ?? "";

// Security check (optional)
if (!in_array($current_table, $tables)) {
    die("Invalid table selected");
}

$sql = "SELECT * FROM `$current_table`";
if (!empty($search)) {
    $sql .= " WHERE d_Name LIKE '%$search%' OR d_Email LIKE '%$search%' OR d_Country LIKE '%$search%' OR d_Pickup LIKE '%$search%' ";
}

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Haven Of The World</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="Home/Images/Haven-Logo4.jpg" rel="icon">

    <!-- Custom CSS -->
 <link rel="stylesheet" href="tour/tour3.css">
   
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
 
 <style>
    .circle {
 
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
    <a class="navbar-brand" href="Home.php">
      <img src="Home/Images/Haven-Logo1.jpg" alt="Logo" width="100">
    </a>

    <!-- ✅ Toggle Button for Offcanvas (Mobile View) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- ✅ Offcanvas Menu -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a style="color:blue;"class="nav-link active" href="Home.php">Home</a>
        </li>

          <!-- Trekking Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active " href="#" role="button" data-bs-toggle="dropdown">Trekking</a>
            <ul class="dropdown-menu">
             <li><a class="dropdown-item" href="tour/K2-Ghandoghoro-Trek.php">K2 Ghandoghoro Trek</a></li>
                    <li><a class="dropdown-item" href="tour/Gushing-La-Trek.php">Gushing La Trek</a></li>
                    <li><a class="dropdown-item" href="tour/Machulo-La-Trek.php">Machulo La Trek</a></li>
                    <li><a class="dropdown-item" href="tour/Five-8000-meters-Base-Trek.php">Five 8000 meters Base Trek</a></li>
                    <li><a class="dropdown-item" href="tour/Mashabrum-Base-Trek.php">Mashabrum Base Trek </a></li>
                    <li><a class="dropdown-item" href="tour/Spantik-Base-Trek.php">Spantik Base Trek </a></li>
                    <li><a class="dropdown-item" href="tour/K-6-&-7-Lela-Peak-base-Trek.php">K-6 & 7 Lela Peak base Trek </a></li>
                    <li><a class="dropdown-item" href="tour/Hunbroq-K2-View-Point-Trek.php">Hunbroq K2 View Point Trek </a></li>
            </ul>
          </li>

          <!-- Mountaineering -->
                <a class="nav-link active" href="tour/Mountaineering.php">   Mountaineering</a>
                

          <!-- Tours Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown">Tours</a>
            <ul class="dropdown-menu">
             <li><a class="dropdown-item" href="tour/Skardu-Trip.php">  Skardu Trip </a></li>
             <li><a class="dropdown-item" href="tour/Skardu-&-Hunza-Trip.php">Skardu & Hunza Trip </a></li>
             <li><a class="dropdown-item" href="tour/Hunza-Trip.php">Hunza Trip </a></li>
             <li><a class="dropdown-item" href="tour/Kalash-Chitral-Trip.php">Kalash Chitral Trip</a></li>
            </ul>
          </li>

          <!-- Family Trips Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown">Family Trips</a>
            <ul class="dropdown-menu">
               <li><a class="dropdown-item" href="tour/4-Days-Family-Trip-around-Skardu.php">4 Days Family Trip around Skardu</a></li>
               <li><a class="dropdown-item" href="tour/5-Days-Family-Trip-around-Skardu.php">5 Days Family Trip around Skardu</a></li>
               <li><a class="dropdown-item" href="tour/6-Days-Family-Trip-around-Skardu.php">6 Days Family Trip around Skardu</a></li>
               <li><a class="dropdown-item" href="tour/7-Days-Family-Trip-around-Skardu.php">7 Days Family Trip around Skardu </a></li>
            </ul>
          </li>

          <!-- Customize Trips -->
          <li class="nav-item">
                  <a class="nav-link active" href="tour/Customize-Trips.php">Customize Trips</a>
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
                <li><a class="dropdown-item" href="Admin_Panel.php"><i class=""></i> Admin Panel</a></li>
                <li><a class="dropdown-item" href="Admin_Panel2.php"><i class=""></i> Admin Pane2</a></li>
                 <li><a class="dropdown-item" href="Admin_Panel3.php"><i class=""></i> Admin Pane3</a></li>

                <li><a class="dropdown-item text-danger" href="logout.php"><i class=""></i> Logout</a></li>
            </ul>
        </div>
    <?php else: ?>
        <!-- Login button -->
        <a href="login.php" class="btn btn-outline-primary btn-sm"><i class="fas fa-sign-in-alt"></i> Login</a>
    <?php endif; ?>
</div>

        </ul>
        
       
      </div>
    </div>
  </div>
</nav>
<!-- ✅ Navbar End -->
<div class="container py-4">
            <h1 style="text-align:center;">Admin Panel 3</h1> 

        <h2 style="text-align:center;">Public Data View - Tour Submissions</h2>

    <!-- Table Selector + Search -->
    <form method="get" class="row g-2 mb-3">
        <div class="col-md-4">
            <select name="table" class="form-select" onchange="this.form.submit()">
                <?php foreach ($tables as $table): ?>
                    <option value="<?= $table ?>" <?= ($table == $current_table) ? "selected" : "" ?>>
                        <?= str_replace("_", " ", $table) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Search Name or Email & Pickup Airport" value="<?= htmlspecialchars($search) ?>">
        </div>
        <div class="col-md-4 ">
            <button class="btn btn-primary">Search</button>
        </div>
        
           
    </form>
    <!-- Data Table -->
   <div class="" style="overflow-x: auto; margin-left:-5%; margin-right:-5%;">
  <table class="table table-bordered table-striped  text-nowrap">
    <thead class="table-dark">
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Cell No</th>
        <th>Country</th>
        <th>City</th>
        <th>Person</th>
        <th>Nights</th>
        <th>Days</th>
        <th>Guide</th>
        <th>Time</th>
        <th>About</th>
      </tr>
    </thead>
    
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $row['d_Id'] ?? '-' ?></td>
                            <td><?= $row['d_Name'] ?? '-' ?></td>
                            <td><?= $row['d_Email'] ?? '-' ?></td>
                            <td><?= $row['d_Cellno'] ?? '-' ?></td>
                            <td><?= $row['d_Country'] ?? '-' ?></td>
                            <td><?= $row['d_City'] ?? '-' ?></td>
                            <td><?= $row['d_participants'] ?? '-' ?></td>
                            <td><?= $row['d_Nights'] ?? '-' ?></td>
                            <td><?= $row['d_Days'] ?? '-' ?></td>
                            <td><?= $row['d_Guide'] ?? '-' ?></td>
                            <td><?= $row['d_Time'] ?? '-' ?></td>
                            <td><?= $row['d_About'] ?? '-' ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="10" class="text-center">No data found</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- ✅ Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    

<!-- Footer Start -->
    <div class="container-1 bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s">
        <div class="container pb-5">
            <div class="row g-5">
                <div class=" col-lg-4 col-md-8">
                    <div class="footer-a rounded p-4">
                        <a class="footer-home" href="Home.php"><h1 class="f-text text-uppercase mb-3">Heaven of The World </h1></a>
                        <p class="text-white mb-0">"Based in Skardu, we are a dedicated trekking company with deep roots in Baltistan, offering expertly guided adventures into the heart of the Karakoram Mountains. Run by some of the region’s most experienced local guides, we specialize in crafting personalized and corporate trekking experiences you can truly trust."

                            
                    </div>
                </div>
                <div class=" col-lg-3 col-md-4">
                    
                    
                    <h4 class="section-title text-start  text-uppercase mb-4">Services</h4>
                    <a class="btn btn-link" href="tour/Trekking-&-Expeditions.php">Trekking & Expeditions</a>
                    <a class="btn btn-link" href="tour/Tour-Guide.php">Tour Guide</a>
                    <a class="btn btn-link" href="tour/Home-Hotel.php">Home | Hotel </a>
                    <a class="btn btn-link" href="tour/Transports.php">Transport </a>
                     <a class="btn btn-link" href="tour/Camping.php">Camping</a>

                </div>
                <div class="col-lg-5 ">
                    <div class="row gy-5 g-4">
                        <div class="col-lg-6 col-md-8">
                            <h4 class="section-title text-start  text-uppercase mb-4">Information</h4>
                            <a class="btn btn-link" href="tour/About-Company.php">About Company</a>
                            <a class="btn btn-link" href="tour/Equipment-Checklist.php">Equipment Checklist </a>
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





<!-- Template Javascript -->
<script src="js/main.js"></script>

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
