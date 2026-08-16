<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/4fe2ab49c8.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url(background.jpg);
            margin: 0;
            color: white;
            font-family: Arial, sans-serif;
            background-size: cover;
        }
        .main-container {
            width: 80%;
            height: 700px;
            background-color: rgba(0, 0, 0, 0.4);
            border: 2px solid white;
            margin-left: 10%;
            margin-right: 10%;
            margin-top: 100px;
            box-shadow: 1px 1px 15px 5px pink;
            border-radius: 40px;
        }
        .login-container {
            background-color: rgba(0, 0, 0, 0.3);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 1px 1px 15px 5px white;
            width: 500px;
            text-align: center;
            margin: 200px 46% 400px 34%;
        }
        .login-container h2 {
            margin-bottom: 20px;
        }
        .login-container input[type="text"], 
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

        @media (max-width: 768px) {
            .main-container {
                width: 90%;
                margin: 50px auto;
                height: 500px;
            }
            .login-container {
                width: 80%;
                margin: 20% 10%;

            }
        }
        @media (max-width: 480px) {
            .main-container {
                padding: 10px;
            }
        }
        @media (max-width: 820px) {
            .main-container {
                width: 90%;
                margin: 50px auto;
                height: 500px;
            }
            .login-container {
                width: 80%;
                margin: 20% 10%;

            }
        }
        @media (max-width: 1024px) {
            .main-container {
                width: 90%;
                margin: 50px auto;
                height: 500px;
            }
            .login-container {
                width: 80%;
                margin: 10% 10%;

            }
        }
        @media (max-width: 1280px) {
            .main-container {
                width: 90%;
                margin: 50px auto;
                height: 500px;
            }
            .login-container {
                width: 80%;
                margin: 10% 10%;

            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="login-container text-light">
            <h2><b><i class="fa-solid fa-gears"></i> Login</b></h2>
            <form method="post" action="login.php">
                <input type="text" name="email" placeholder="email" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
</body>
</html>
