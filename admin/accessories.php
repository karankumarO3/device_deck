<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessory Management</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.accessory-form-container {
    width: 50%;
    margin: 5% auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: rgba(0, 0, 0, 0.4);
    box-shadow: 1px 1px 15px 5px white;
    border-radius: 20px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

.accessory-input-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

.accessory-input-field[type="text"],
.accessory-input-field[type="number"],
textarea.accessory-input-field {
    width: 100%;
    padding: 10px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    box-sizing: border-box;
}

textarea.accessory-input-field {
    resize: vertical;
}

button {
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 10px;
}

.accessory-btn-add {
    background-color: #007bff;
    color: #ffffff;
}

.accessory-btn-add:hover {
    background-color: #0056b3;
}

.accessory-btn-remove {
    background-color: #dc3545;
    color: #ffffff;
}

.accessory-btn-remove:hover {
    background-color: #c82333;
}

    </style>
</head>
<body>
<div class="accessory-form-container">
    <h2>Add/Remove Accessories</h2>
    <form action="admin/php/manage_accessory.php" method="post">
        <div class="accessory-input-group">
            <label for="name">Name:</label>
            <input type="text" class="accessory-input-field" id="name" name="name" required>
        </div>
        <div class="accessory-input-group">
            <label for="serial_no">Product Serial No:</label>
            <input type="text" class="accessory-input-field" id="serial_no" name="serial_no" required>
        </div>
        <div class="accessory-input-group">
            <label for="brand">Brand:</label>
            <input type="text" class="accessory-input-field" id="brand" name="brand" required>
        </div>
        <div class="accessory-input-group">
            <label for="price">Price:</label>
            <input type="number" class="accessory-input-field" id="price" name="price" required>
        </div>
        <div class="accessory-input-group">
            <label for="description">Description:</label>
            <textarea class="accessory-input-field" id="description" name="description" rows="3" required></textarea>
        </div>
        <button type="submit" name="action" value="add" class="accessory-btn-add">Add Accessory</button>
        <button type="submit" name="action" value="remove" class="accessory-btn-remove">Remove Accessory</button>
    </form>
</div>
</body>
</html>
