<?php
session_start();

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: admin_panel.php");
    exit();
}

$error = "";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "Jamali" && $password === "12345678") {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_name'] = "Admin";
        header("Location: Home.php");
        exit();
    } else {
        $error = "❌ Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="tour/Gushing/Images/Haven-Logo4.jpg" rel="icon">

    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .login-container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        input[type="submit"],
        .btn-secondary {
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            font-weight: bold;
            cursor: pointer;
        }

        input[type="submit"] {
            background-color: black;
            color: yellow;
        }

        input[type="submit"]:hover {
            background-color: yellow;
            color: black;
        }

        .btn-secondary {
            background-color: #e74c3c;
            color: white;
            margin-left: 10px;
        }

        .btn-secondary:hover {
            background-color: red;
        }

        #error {
            color: red;
            text-align: center;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .form-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

    </style>
</head>
<body>
    <div class="login-container">
        <form method="post">
            <h2>Admin Login</h2>
            <?php if ($error): ?>
                <div id="error"><?= $error ?></div>
            <?php endif; ?>

            <label>Username:</label>
            <input type="text" name="username" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <div class="form-buttons">
                <input type="submit" name="login" value="Login">
                <a href="Home.php"><button type="button" class="btn-secondary">Close</button></a>
            </div>
        </form>
    </div>
</body>
</html>