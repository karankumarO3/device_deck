<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mobileshopmanagement";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO customerdevicedetails (name, mobile, address, id_proof, payment, device_name, brand, serial_no, specification, prize) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssd", $name, $mobile, $address, $id_proof, $payment, $device_name, $brand, $serial_no, $specification, $prize);

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$id_proof = $_POST['id_proof'];
$payment = $_POST['payment'];
$device_name = $_POST['device_name'];
$brand = $_POST['brand'];
$serial_no = $_POST['serial_no'];
$specification = $_POST['specification'];
$prize = $_POST['prize'];

if ($stmt->execute()) {
    echo "New records created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
