<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MobileShopManagement";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['logged_in'] = true; 
            $_SESSION['email'] = $email; 
            header("Location: admin.php");
            exit; 
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found with this email";
    }
}
$conn->close();
?>