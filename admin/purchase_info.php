<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mobileshopmanagement";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM customerdevicedetails";
$result = $conn->query($sql);

$devices_customers = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $devices_customers[] = $row;
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
    <title>Device and Customer List</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    padding: 20px;
}

.list-container-custom {
    width: 80%;
    margin: 7%;
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    background-color: rgba(0, 0, 0, 0.4);
    box-shadow: 1px 1px 15px 5px white;
    border-radius: 20px; 
    height: 550px; 
    overflow: scroll;           
}

h1 {
    margin-bottom: 20px;
}

.list-table-custom {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: rgba(0, 0, 0, 0.4);
}

.list-table-custom th, .list-table-custom td {
    padding: 10px;
    border: 1px solid #ddd;
}

.list-table-custom th {
    background-color: rgba(0, 0, 0, 0.4);
}

.print-button-custom {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
}

.print-button-custom:hover {
    background-color: #45a049;
}

@media print {
    .print-button-custom {
        display: none;
    }
}

@media (max-width: 768px) {
    .list-table-custom {
        font-size: 14px;
    }
}
    </style>
</head>
<body>
    <div class="list-container-custom">
        <h1>Device and Customer List</h1>
        <table class="list-table-custom">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Mobile No</th>
                    <th>Address</th>
                    <th>ID Proof</th>
                    <th>Payment Method</th>
                    <th>Device Name</th>
                    <th>Brand</th>
                    <th>Serial No</th>
                    <th>Specification</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($devices_customers as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td><?php echo htmlspecialchars($item['mobile']); ?></td>
                    <td><?php echo htmlspecialchars($item['address']); ?></td>
                    <td><?php echo htmlspecialchars($item['id_proof']); ?></td>
                    <td><?php echo htmlspecialchars($item['payment']); ?></td>
                    <td><?php echo htmlspecialchars($item['device_name']); ?></td>
                    <td><?php echo htmlspecialchars($item['brand']); ?></td>
                    <td><?php echo htmlspecialchars($item['serial_no']); ?></td>
                    <td><?php echo htmlspecialchars($item['specification']); ?></td>
                    <td><?php echo htmlspecialchars($item['prize']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button class="print-button-custom" onclick="window.print()">Print List</button>
    </div>
</body>
</html>

<?php
$conn->close();
?>
