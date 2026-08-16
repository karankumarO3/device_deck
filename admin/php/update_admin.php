<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mobileshopmanagement";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['password'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$query = "UPDATE users SET email = '$email', password = '$hashed_password' WHERE id = 1";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "Admin account updated successfully!";
} else {
    echo "Error updating admin account: ". mysqli_error($conn);
}

mysqli_close($conn);
?>