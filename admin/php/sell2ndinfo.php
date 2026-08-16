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
    $customer_name = $_POST['customer_name'];
    $mobile_no = $_POST['mobile_no'];
    $address = $_POST['address'];
    $id_proof = $_POST['id_proof'];
    $payment_method = $_POST['payment_method'];

    $device_name = $_POST['device_name'];
    $serial_no = $_POST['serial_no'];
    $brand = $_POST['brand'];
    $prize = $_POST['prize'];
    $description = $_POST['description'];

    $sql_insert = "INSERT INTO sell_info (customer_name, mobile_no, address, id_proof, payment_method, device_name, serial_no, brand, prize, description)
                   VALUES ('$customer_name', '$mobile_no', '$address', '$id_proof', '$payment_method', '$device_name', '$serial_no', '$brand', '$prize', '$description')";

    if ($conn->query($sql_insert) === TRUE) {
        $sql_delete = "DELETE FROM customerdevicedetails WHERE serial_no='$serial_no'";
        if ($conn->query($sql_delete) === TRUE) {
            echo "Device sold successfully and removed from inventory.";
        } else {
            echo "Error deleting device: " . $conn->error;
        }
    } else {
        echo "Error inserting data: " . $conn->error;
    }
}

$conn->close();
?>