<?php
session_start();
include('connection.php');
error_reporting(0);

if (isset($_POST['submit'])) {
    $Name = $_POST['Name'];
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $Cellno = $_POST['Cellno'];
    $Country = $_POST['Country'];
    $City = $_POST['City'];
    $Participents = $_POST['Participents'];
    $Picup = $_POST['Picup'];
    $Picdate = $_POST['Picdate'];
    $About = $_POST['About'];

    // Check if email already submitted
    $checkQuery = "SELECT * FROM `Gushing la trek` WHERE `d_Email` = '$Email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['msg'] = "❌ This email has already been used to submit the form.";
    } else {
        $query = "INSERT INTO `Gushing la trek` 
        (`d_id`, `d_Name`, `d_Email`, `d_Cellno`, `d_Country`, `d_City`, `d_Participents`, `d_Picup`, `d_Picdate`, `d_About`) 
        VALUES (NULL, '$Name', '$Email', '$Cellno', '$Country', '$City', '$Participents', '$Picup', '$Picdate', '$About')";

        $data = mysqli_query($conn, $query);

        if ($data) {
            $_SESSION['msg'] = "✅ Data Submitted Successfully";
        } else {
            $_SESSION['msg'] = "❌ Data Submission Failed";
        }
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$msg = "";
if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Haven of The World</title>
    <link href="Gushing/Images/Haven-Logo4.jpg" rel="icon">
    <style>
        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
            border-radius: 20px;
        }

        input[type="submit"] {
            padding: 8px 16px;
            font-weight: bold;
            border-radius: 20px;
            color: yellow;
            background-color: black;
            border: none;
        }

        input[type="submit"]:hover {
            color: black;
            background-color: yellow;
        }

        button {
            margin-left: 5%;
            padding: 8px 16px;
            font-weight: bold;
            border-radius: 20px;
            color: black;
            background-color: rgb(235, 42, 42);
            border: none;
        }

        button:hover {
            color: white;
            background-color: red;
        }

        label {
            margin-left: 1%;
        }

        form {
            margin-left: 5%;
            margin-right: 5%;
        }
    </style>
</head>
<body>

<!-- ✅ Message Box -->
<?php if ($msg != ""): ?>
    <div id="msgBox" style="color: green; margin-left:5%; font-weight: bold;">
        <?php echo $msg; ?>
        <?php if (strpos($msg, "Submitted Successfully") !== false): ?>
            <p style="font-weight: normal; margin-left:0%; color:black">
                Thank you! Your information has been successfully submitted.
            </p>
        <?php endif; ?>
    </div>
    <script>
        setTimeout(function () {
            var box = document.getElementById('msgBox');
            if (box) {
                box.style.display = 'none';
            }
        }, 8000);
    </script>
<?php endif; ?>

<!-- ✅ Form -->
<form action="" id="myForm" method="post">
    <label>Your Name</label><br>
    <input type="text" name="Name" placeholder="Enter your Name" required><br>

    <label for="email">Your Email</label><br>
    <input type="text" name="Email" id="email" placeholder="Enter your email" required><br>

    <label for="">Your Cell No</label><br>
    <input type="text" name="Cellno" placeholder="Your Cell No" required><br>

    <label for="">Your Country</label><br>
    <input type="text" name="Country" placeholder="Your Country" required><br>

    <label for="">Your City</label><br>
    <input type="text" name="City" placeholder="Your City" required><br>

    <label for="">No of participents</label><br>
    <input type="text" name="Participents" placeholder="No of participants" required><br>

    <label for="">Pick up Airport in Gilgit-Baltistan</label><br>
    <input type="text" name="Picup" placeholder="Pick up Airport in Gilgit-Baltistan" required><br>

    <label for="">Arrival/Pick Up date in Gilgit-baltistan</label><br>
    <input type="date" name="Picdate" id="picdate" required><br>

    <label for="">What you would like to inquire about?</label><br>
    <input type="text" name="About" id="about" placeholder="What you would like to inquire about?" required><br>

    <p id="error" style="color:red;"></p>

    <input type="submit" name="submit" value="Submit">
    <a href="Gushing-La-Trek.php">
        <button type="button" class="btn btn-secondary">Close</button>
    </a>
</form>

<!-- ✅ JavaScript Validation -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById('myForm');
    const emailInput = document.getElementById('email');
    const dateInput = document.getElementById('picdate');
    const errorText = document.getElementById('error');

    form.addEventListener('submit', function (event) {
        const email = emailInput.value.trim();
        const dateValue = dateInput.value.trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        let isValid = true;
        let errorMsg = "";

        if (!emailPattern.test(email)) {
            isValid = false;
            errorMsg += "❌ Please enter a valid email address.\n";
            emailInput.focus();
        }

        if (dateValue === "") {
            isValid = false;
            errorMsg += "❌ Please select a valid date.\n";
            dateInput.focus();
        }

        if (!isValid) {
            event.preventDefault();
            errorText.textContent = errorMsg;
        } else {
            errorText.textContent = "";
        }
    });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const aboutInput = document.getElementById('about');

    aboutInput.addEventListener('input', function () {
        let lettersOnly = this.value.replace(/[^a-zA-Z ]/g, '');

        if (lettersOnly.length > 50) {
            let count = 0;
            let result = '';

            for (let i = 0; i < this.value.length; i++) {
                if (/[a-zA-Z ]/.test(this.value[i])) {
                    if (count >= 50) break;
                    count++;
                }
                result += this.value[i];
            }

            this.value = result;
        }
    });
});
</script>

</body>
</html>
