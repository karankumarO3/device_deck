<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_Remove Device</title>
    <style>
        body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
        color: black;
        }

        .form-containerI {
            width: 50%;
            margin: 5% auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.4);
            box-shadow: 1px 1px 15px 5px white;
            border-radius: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

            label {
            display: block;
            margin-bottom: 5px;
        }

        .input-field[type="text"],
        .input-field[type="number"],
        textarea.input-field {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea.input-field {
            resize: vertical;
        }

        button {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn-add {
            background-color: #007bff;
            color: #ffffff;
        }

        .btn-add:hover {
            background-color: #0056b3;
        }

        .btn-remove {
            background-color: #dc3545;
            color: #ffffff;
        }

        .btn-remove:hover {
            background-color: #c82333;
        }

    </style>
</head>
<body>
<div class="form-containerI">
    <h2>Add/Remove Device</h2>
    <form action="admin/php/manage_device.php" method="post">
        <div class="input-group">
            <label for="name">Name:</label>
            <input type="text" class="input-field" id="name" name="name" required>
        </div>
        <div class="input-group">
            <label for="serial_no">Product Serial No:</label>
            <input type="text" class="input-field" id="serial_no" name="serial_no" required>
        </div>
        <div class="input-group">
            <label for="brand">Brand:</label>
            <input type="text" class="input-field" id="brand" name="brand" required>
        </div>
        <div class="input-group">
            <label for="price">Price:</label>
            <input type="number" class="input-field" id="price" name="price" required>
        </div>
        <div class="input-group">
            <label for="description">Description:</label>
            <textarea class="input-field" id="description" name="description" rows="3" required></textarea>
        </div>
        <button type="submit" name="action" value="add" class="btn-add">Add Device</button>
        <button type="submit" name="action" value="remove" class="btn-remove">Remove Device</button>
    </form>
</div>
</body>
</html>
