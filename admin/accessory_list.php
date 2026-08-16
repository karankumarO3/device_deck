<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessory List</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.accessory-table-container {
    width: 80%;
    margin: 5% auto;
    padding: 20px;
    background-color: rgba(0, 0, 0, 0.4);
    box-shadow: 1px 1px 15px 5px white;
    border-radius: 20px;
    height: 550px; 
    overflow: scroll;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

.accessory-table {
    width: 100%;
    border-collapse: collapse;
}

.accessory-table th, .accessory-table td {
    border: 1px solid #ced4da;
    padding: 10px;
    text-align: left;
}

.accessory-table th {
    background-color: rgba(0, 0, 0, 0.4);
    color: #ffffff;
}

.accessory-table tbody tr:nth-child(odd) {
    background-color: rgba(255, 255, 255, 0.5);
    color: black;
}
.accessory-table tbody tr:nth-child(even) {
    background-color: rgba(0, 0, 0, 0.4);
}

    </style>
</head>
<body>
<div class="accessory-table-container">
    <h2>Accessory List</h2>
    <table class="accessory-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Product Serial No</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mobileshopmanagement";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, name, serial_no, brand, price, description FROM accessories";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["id"]. "</td>
                        <td>" . $row["name"]. "</td>
                        <td>" . $row["serial_no"]. "</td>
                        <td>" . $row["brand"]. "</td>
                        <td>" . $row["price"]. "</td>
                        <td>" . $row["description"]. "</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No accessories found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
