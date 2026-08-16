<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mobileshopmanagement";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM sell_info";
$result = $conn->query($sql);

$sell_info = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sell_info[] = $row;
    }
} else {
    echo "No records found";
    exit;
}

$conn->close();
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

        .list-container {
            width: 80%;
            margin: 7%;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: rgba(0, 0, 0, 0.4);
            box-shadow: 1px 1px 15px 5px pink;
            border-radius: 20px; 
            height: 550px; 
            overflow: scroll;
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
        }

        .list-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .list-table th, .list-table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        .list-table th {
            background-color: rgba(0, 0, 0, 0.4);
        }

        .print-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            display: block;
            margin: 0 auto;
        }

        .print-button:hover {
            background-color: #45a049;
        }
        
        @page {
            size: A4 landscape;
            margin: 20mm;
        }
        
        @media print {
            body * {
                visibility: hidden;
            }
            .list-container, .list-container * {
                visibility: visible;
            }
            .list-container {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 100%;
                margin: 0;
            }
            
        @page {
            size: A4 landscape;
            margin: 20mm;
            }
        
        @media print {
            body * {
                visibility: hidden;
            }
            .list-container, .list-container * {
                visibility: visible;
            }
            .list-container {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 100%;
                margin: 0;
            }
            .print-button {
                display: none;
            }
    </style>
</head>
<body>
    <div class="list-container">
        <h1>Device and Customer List</h1>
        <table class="list-table">
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
                    <th>Prize</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sell_info as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['customer_name']); ?></td>
                    <td><?php echo htmlspecialchars($item['mobile_no']); ?></td>
                    <td><?php echo htmlspecialchars($item['address']); ?></td>
                    <td><?php echo htmlspecialchars($item['id_proof']); ?></td>
                    <td><?php echo htmlspecialchars($item['payment_method']); ?></td>
                    <td><?php echo htmlspecialchars($item['device_name']); ?></td>
                    <td><?php echo htmlspecialchars($item['brand']); ?></td>
                    <td><?php echo htmlspecialchars($item['serial_no']); ?></td>
                    <td><?php echo htmlspecialchars($item['prize']); ?></td>
                    <td><?php echo htmlspecialchars($item['description']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button class="print-button" onclick="window.print()">Print List</button>
    </div>
</body>
</html>
