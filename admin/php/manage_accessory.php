<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mobileshopmanagement";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $serial_no = $_POST['serial_no'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $action = $_POST['action'];

    if ($action == 'add') {
        $sql = "INSERT INTO accessories (name, serial_no, brand, price, description) VALUES ('$name', '$serial_no', '$brand', '$price', '$description')";
        if ($conn->query($sql) === TRUE) {
            echo "New accessory added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($action == 'remove') {
        $sql = "DELETE FROM accessories WHERE serial_no='$serial_no'";
        if ($conn->query($sql) === TRUE) {
            echo "Accessory removed successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
