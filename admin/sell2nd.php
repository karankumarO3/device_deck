<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Device Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .unique-form-container {
            width: 80%;
            margin-top: 50px;
            margin-left: 10%;
            margin-right: 10%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: rgba(0, 0, 0, 0.4);
            box-shadow: 1px 1px 15px 5px white;
            border-radius: 20px;
            height: 700px;
        }

        .unique-device-sale-form {
            display: flex;
            flex-direction: column;
        }

        .unique-device-sale-form h2 {
            width: 100%;
            margin-bottom: 10px;
        }

        .unique-customer-info, .unique-device-info {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-bottom: 10px;
        }

        .unique-customer-info label, .unique-device-info label {
            width: 150px;
            margin-right: 10px;
            text-align: right;
        }

        .unique-customer-info input, .unique-device-info input, 
        .unique-customer-info select, .unique-device-info textarea {
            flex-grow: 1;
            padding: 8px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        .submit-button {
            width: 60%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            margin-left: 20%;
            margin-bottom: 20%;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="unique-form-container">
        <form action="admin/php/sell2ndinfo.php" method="POST" class="unique-device-sale-form">
            <h2>Customer Details</h2>
            <div class="unique-customer-info">
                <label for="customer_name">Name of Customer:</label>
                <input type="text" id="customer_name" name="customer_name" required>
            </div>
            <div class="unique-customer-info">
                <label for="mobile_no">Mobile No:</label>
                <input type="text" id="mobile_no" name="mobile_no" required>
            </div>
            <div class="unique-customer-info">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="unique-customer-info">
                <label for="id_proof">ID Proof:</label>
                <input type="text" id="id_proof" name="id_proof" required>
            </div>
            <div class="unique-customer-info">
                <label for="payment_method">EMI/CASH:</label>
                <select id="payment_method" name="payment_method" required>
                    <option value="EMI">EMI</option>
                    <option value="CASH">CASH</option>
                </select>
            </div>

            <h2>Device Details</h2>
            <div class="unique-device-info">
                <label for="device_name">Name:</label>
                <input type="text" id="device_name" name="device_name" required>
            </div>
            <div class="unique-device-info">
                <label for="serial_no">Serial No:</label>
                <input type="text" id="serial_no" name="serial_no" required>
            </div>
            <div class="unique-device-info">
                <label for="brand">Brand:</label>
                <input type="text" id="brand" name="brand" required>
            </div>
            <div class="unique-device-info">
                <label for="prize">Prize:</label>
                <input type="text" id="prize" name="prize" required>
            </div>
            <div class="unique-device-info">
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
            </div>

            <button type="submit" class="submit-button">Sell Device</button>
        </form>
    </div>
</body>
</html>
