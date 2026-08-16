<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin Account</title>
    <style>
        body {
            background-image: url(background.jpg);
            margin: 0;
            color: white;
            font-family: Arial, sans-serif;
            background-size: cover;
        }
    .login-container {
            background-color: rgba(0, 0, 0, 0.3);
            padding: 20px;
            border-radius: 20px;
            box-shadow: 1px 1px 15px 5px white;
            width: 500px;
            text-align: center;
            margin: 200px 46% 400px 34%;
        }
        .login-container h2 {
            margin-bottom: 20px;
        }
        .login-container input[type="text"], 
        .login-container input[type="email"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .login-container input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .login-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .login-container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="login-container">
    <h2>Update Admin Account</h2>
    <form action="admin/php/update_admin.php" method="post">
        <label for="email">New Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">New Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Update">
    </form>
        </div>
</body>
</html>
