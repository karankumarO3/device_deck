<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mobileshopmanagement";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT device_name, brand, serial_no, specification, price, FROM customer_device_details";
$result = $conn->query($sql);

$purchased_devices = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $purchased_devices[] = $row;
    }
} else {
    echo "No records found";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchased Device Information</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    padding: 20px;
}

.containerI {
    max-width: 100%;
    margin: 0 auto;
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

h1 {
    margin-bottom: 20px;
}

.table-containerI {
    overflow-x: auto;
}

.device-tableI {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.device-tableI th, .device-tableI td {
    padding: 10px;
    border: 1px solid #ddd;
}

.device-tableI th {
    background-color: #f2f2f2;
}

.print-buttonI {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
}

.print-buttonI:hover {
    background-color: #45a049;
}

@media print {
    .print-button {
        display: none;
    }
}

    </style>
</head>
<body>
    <div class="containerI">
        <h1>Purchased Device Information</h1>
        <div class="table-containerI">
            <table class="device-tableI">
                <thead>
                    <tr>
                        <th>Device Name</th>
                        <th>Brand</th>
                        <th>Serial No</th>
                        <th>Specification</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($purchased_devices as $device): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($device['device_name']); ?></td>
                            <td><?php echo htmlspecialchars($device['brand']); ?></td>
                            <td><?php echo htmlspecialchars($device['serial_no']); ?></td>
                            <td><?php echo htmlspecialchars($device['specification']); ?></td>
                            <td><?php echo htmlspecialchars($device['price']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
