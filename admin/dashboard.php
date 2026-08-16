<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mobileshopmanagement";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqlDevices = "SELECT COUNT(*) as totalDevices FROM devices";
$resultDevices = $conn->query($sqlDevices);
$totalDevices = $resultDevices->fetch_assoc()['totalDevices'];

$sqlAccessories = "SELECT COUNT(*) as totalAccessories FROM accessories";
$resultAccessories = $conn->query($sqlAccessories);
$totalAccessories = $resultAccessories->fetch_assoc()['totalAccessories'];

$sqlSellInfo = "SELECT COUNT(*) as totalSellInfo FROM sell_info";
$resultSellInfo = $conn->query($sqlSellInfo);
$totalSellInfo = $resultSellInfo->fetch_assoc()['totalSellInfo'];

$sqlTotalEarnings = "SELECT SUM(prize) as totalEarnings FROM sell_info";
$resultTotalEarnings = $conn->query($sqlTotalEarnings);
$totalEarnings = $resultTotalEarnings->fetch_assoc()['totalEarnings'];

$sqlSecondHandDevices = "SELECT COUNT(*) as totalSecondHandDevices FROM customerdevicedetails";
$resultSecondHandDevices = $conn->query($sqlSecondHandDevices);
$totalSecondHandDevices = $resultSecondHandDevices->fetch_assoc()['totalSecondHandDevices'];

$sqlWeeklyEarnings = "SELECT WEEK(sell_date) as week, SUM(prize) as earnings FROM sell_info GROUP BY WEEK(sell_date)";
$resultWeeklyEarnings = $conn->query($sqlWeeklyEarnings);
$weeklyEarnings = [];
while($row = $resultWeeklyEarnings->fetch_assoc()) {
    $weeklyEarnings[] = $row;
}

$sqlMonthlyEarnings = "SELECT MONTH(sell_date) as month, SUM(prize) as earnings FROM sell_info GROUP BY MONTH(sell_date)";
$resultMonthlyEarnings = $conn->query($sqlMonthlyEarnings);
$monthlyEarnings = [];
while($row = $resultMonthlyEarnings->fetch_assoc()) {
    $monthlyEarnings[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        .dashboard-card {
            margin-top: 10px;
            margin-left: 40px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 120px;
            color: white;
            border-radius: 5px;
            overflow: hidden;
            height: 100px;
            background-color: rgba(0, 0, 0, 0.4);
            box-shadow: 1px 1px 15px 5px white;
        }

        .dashboard-card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.5);
        }

        .dashboard-card-body {
            padding: 2px;
            text-align: center;
        }

        .dashboard-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            height: 100px;
        }

        .dashboard-header {
            background-color: rgba(0, 0, 0, 0.4);
            color: white;
            text-align: center;
            border: 2px solid white;
            border-radius: 20px;
            box-shadow: 1px 1px 15px 5px white;
            font-size: 30px;
            margin: 20px;
        }

        body {
            background-size: cover;
            color: white;
            font-family: Arial, sans-serif;
        }

        .chart-container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 1);
            box-shadow: 1px 1px 15px 5px black;
            color: white;
        }

        .scroll {
            overflow: scroll;
            height: 600px;
        }

    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="dashboard-header">
    <p>Admin Dashboard</p>
</div>

<div class="dashboard-container">
    <div class="dashboard-card">
        <div class="dashboard-card-body">
            <h5 class="card-title">Total Devices</h5>
            <p class="card-text"><?php echo $totalDevices; ?></p>
        </div>
    </div>
    <div class="dashboard-card">
        <div class="dashboard-card-body">
            <h5 class="card-title">Total Accessories</h5>
            <p class="card-text"><?php echo $totalAccessories; ?></p>
        </div>
    </div>
    <div class="dashboard-card">
        <div class="dashboard-card-body">
            <h5 class="card-title">Total Sell Info</h5>
            <p class="card-text"><?php echo $totalSellInfo; ?></p>
        </div>
    </div>
    <div class="dashboard-card">
        <div class="dashboard-card-body">
            <h5 class="card-title">Total Earnings</h5>
            <p class="card-text"><?php echo '₹' . number_format($totalEarnings, 2); ?></p>
        </div>
    </div>
    <div class="dashboard-card">
        <div class="dashboard-card-body">
            <h5 class="card-title">Second-Hand Devices</h5>
            <p class="card-text"><?php echo $totalSecondHandDevices; ?></p>
        </div>
    </div>
</div>

<div class="scroll">
    <div class="chart-container">
        <canvas id="weeklyEarningsChart"></canvas>
    </div>

    <div class="chart-container">
        <canvas id="monthlyEarningsChart"></canvas>
    </div>
</div>

<script>
    const weeklyEarnings = <?php echo json_encode($weeklyEarnings); ?>;
    const weeklyLabels = weeklyEarnings.map(item => `Week ${item.week}`);
    const weeklyData = weeklyEarnings.map(item => item.earnings);

    const ctxWeekly = document.getElementById('weeklyEarningsChart').getContext('2d');
    new Chart(ctxWeekly, {
        type: 'line',
        data: {
            labels: weeklyLabels,
            datasets: [{
                label: 'Weekly Earnings',
                data: weeklyData,
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: false
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const monthlyEarnings = <?php echo json_encode($monthlyEarnings); ?>;
    const monthlyLabels = monthlyEarnings.map(item => `Month ${item.month}`);
    const monthlyData = monthlyEarnings.map(item => item.earnings);

    const ctxMonthly = document.getElementById('monthlyEarningsChart').getContext('2d');
    new Chart(ctxMonthly, {
        type: 'line',
        data: {
            labels: monthlyLabels,
            datasets: [{
                label: 'Monthly Earnings',
                data: monthlyData,
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1,
                fill: false
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>
