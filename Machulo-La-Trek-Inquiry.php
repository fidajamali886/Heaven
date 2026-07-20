<?php
$conn = mysqli_connect("localhost", "root", "", "student");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $d_name = $_POST['d_name'] ?? '';
    $d_email = $_POST['d_email'] ?? '';
    $d_grade = $_POST['d_grade'] ?? '';

    if ($d_name != '' && $d_email != '' && $d_grade != '') {
        $check = "SELECT * FROM fida WHERE d_email = '$d_email'";
        $result = mysqli_query($conn, $check);

        if (mysqli_num_rows($result) > 0) {
            $message = "❌ Email already submitted.";
        } else {
            $query = "INSERT INTO fida (d_name, d_email, d_grade) VALUES ('$d_name', '$d_email', '$d_grade')";
            if (mysqli_query($conn, $query)) {
                $message = "✅ Submission successful!";
            } else {
                $message = "❌ Error: " . mysqli_error($conn);
            }
        }
    } else {
        $message = "⚠️ Please fill all fields.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Machulo La Trek Inquiry</title>
</head>
<body>
    <h2>Student Submission Form</h2>
    
    <?php if ($message): ?>
        <p><strong><?= $message ?></strong></p>
    <?php endif; ?>

    <form method="post" action="">
        <label>Name:</label><br>
        <input type="text" name="d_name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="d_email" required><br><br>

        <label>Grade:</label><br>
        <input type="text" name="d_grade" required><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
