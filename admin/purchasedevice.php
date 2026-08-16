<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer and Device Details Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .form-container {
            max-width: 1000px;
            margin: 7% auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: rgba(0, 0, 0, 0.4);
            box-shadow: 1px 1px 15px 5px white;
            border-radius: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-section {
            display: flex;
            justify-content: space-between;
        }

        .customer-info, .device-info {
            width: 48%;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }

        legend {
            font-weight: bold;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #4CAF50;
            color: black;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            width: 100%;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>
    <div class="form-container">
        <h1>Customer and Device Details</h1>
        <form action="admin/php/purchase_device.php" method="post">
            <div class="form-section">
                <fieldset class="customer-info">
                    <legend>Customer Detail</legend>
                    <label for="name">Name of Customer:</label>
                    <input type="text" id="name" name="name" required>
                    <label for="mobile">Mobile No:</label>
                    <input type="text" id="mobile" name="mobile" required>
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" required></textarea>
                    <label for="id_proof">ID Proof:</label>
                    <input type="text" id="id_proof" name="id_proof" required>
                    <label for="payment">CARD/CASH:</label>
                    <select id="payment" name="payment" required>
                        <option value="CARD">CARD</option>
                        <option value="CASH">CASH</option>
                    </select>
                </fieldset>
                <fieldset class="device-info">
                    <legend>Device Detail</legend>
                    <label for="device_name">Device Name:</label>
                    <input type="text" id="device_name" name="device_name" required>
                    <label for="brand">Brand:</label>
                    <input type="text" id="brand" name="brand" required>
                    <label for="serial_no">Serial No:</label>
                    <input type="text" id="serial_no" name="serial_no" required>
                    <label for="specification">Specification:</label>
                    <textarea id="specification" name="specification" required></textarea>
                    <label for="prize">Prize:</label>
                    <input type="number" id="prize" name="prize" required>
                </fieldset>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
