<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <style>
        body {
            background-image: url(background.jpg);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-size: cover;
        }

        .header {
            background-color: rgba(0, 0, 0, 0.4);
            color: white;
            text-align: center;
            border: 2px solid white;
            border-radius: 20px;
            box-shadow: 1px 1px 15px 5px pink;
            font-size: 30px;
            margin-left: 1%;
            margin-right: 1%;
            margin-top: 0.5px;
            display: flex;
            justify-content: space-between;
        }

        .container {
            display: flex;
            flex-direction: row;
            margin-top: 1.5%;
            margin-left: 1%;
            margin-right: 1%;
        }

        .left-sidebar {
            background-color: rgba(0, 0, 0, 0.4);
            width: 15%;
            padding-top: 20px;
            padding-left: 20px;
            padding-right: 20px;
            box-sizing: border-box;
            border: 2px solid white;
            border-radius: 20px;
            box-shadow: 1px 1px 15px 5px pink;
        }

        .left-sidebar button {
            display: block;
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            background-color: #ddd;
            border: none;
            text-align: center;
            cursor: pointer;
            border-radius: 10px;
            margin-bottom: 10%;
            transition: opacity 0.3s;
        }

        .left-sidebar button:hover {
            background-color: #bbb;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            border: 2px solid white;
            border-radius: 20px;
            box-shadow: 1px 1px 15px 5px pink;
            background-color: rgba(0, 0, 0, 0.4);
            color: white;
            margin-left: 1%;
            margin-right: 0.3%;
            overflow: hidden;
            position: relative;
            height: auto;
        }

        .content {
            display: none;
            opacity: 0;
            transition: opacity 0.5s, transform 0.5s;
            transform: translateX(20px);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .content.active {
            display: block;
            opacity: 1;
            transform: translateX(0);
        }

        .genie-effect {
            animation: genie 0.5s ease forwards;
        }

        @keyframes genie {
            from {
                transform: scaleY(0);
                transform-origin: top;
                opacity: 0;
            }
            to {
                transform: scaleY(1);
                transform-origin: top;
                opacity: 1;
            }
        }

        @media only screen and (min-width: 1200px) {
            .left-sidebar {
                width: 16%;
            }
            .main-content {
                margin-left: 2%;
                margin-right: 1%;
            }
        }

        @media only screen and (min-width: 992px) and (max-width: 1199px) {
            .left-sidebar {
                width: 25%;
            }
            .main-content {
                margin-left: 3%;
                margin-right: 2%;
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .left-sidebar {
                width: 30%;
            }
            .main-content {
                margin-left: 4%;
                margin-right: 3%;
            }
        }

        @media only screen and (max-width: 767px) {
            .container {
                flex-direction: column;
            }
            .left-sidebar {
                width: 100%;
                padding-top: 10px;
                padding-left: 10px;
                padding-right: 10px;
            }
            .main-content {
                margin-left: 0;
                margin-right: 0;
                padding: 10px;
            }
        }   
    </style>
</head>
<body>

<div class="header">
    <img style="width: 100px; height: 70px; margin-top: 10px;" src="logo.webp">
        <p>Device Management System - Device Deck</p>
            <form style="margin-right: 7%; margin-top: 1.5%;" action="logout.php" method="post">
                <input style="width: 80px; height: 30px; border-radius: 10px; border: 4px solid white; box-shadow: 1px 1px 15px 5px white;" type="submit" name="logout" value="Logout">
            </form>
</div>

 <div class="container">
    <div class="left-sidebar">
        <h2 style="color: white; text-align: center;"><i class="fa-solid fa-house"></i> Main</h2>

        <button id="btnSection1" onclick="showContent('section1', this)"><i class="fa-solid fa-chess-board"></i> Dashboard</button>
        <button onclick="showContent('section2', this)"><i class="fa-solid fa-mobile"></i> New Mobile List</button>
        <button onclick="showContent('section3', this)"><i class="fa-solid fa-headphones-simple"></i> Accessories List</button>
        <button onclick="showContent('section4', this)"><i class="fa-solid fa-tablet"></i> Second Hand Mobile List</button>

        <h2 style="color: white; text-align: center;"><i class="fa-solid fa-check"></i> Sell</h2>

        <button onclick="showContent('section5', this)"><i class="fa-solid fa-mobile"></i> Sell Mobile</button>
        <button onclick="showContent('section6', this)"><i class="fa-solid fa-headphones-simple"></i> Sell Accessories</button>
        <button onclick="showContent('section13', this)"><i class="fa-solid fa-mobile"></i> Sell Secondhand Mobile</button>
        <button onclick="showContent('section7', this)"><i class="fa-solid fa-mobile"></i> Add/Remove Mobile</button>
        <button onclick="showContent('section8', this)"><i class="fa-solid fa-headphones-simple"></i> Add/Remove Accessories</button>

        <h2 style="color: white; text-align: center;"><i class="fa-solid fa-money-bill"></i> Purchase <i class="fa-solid fa-check"></i> Sell</h2>

        <button onclick="showContent('section9', this)"><i class="fa-solid fa-money-bill"></i> Purchase Second Hand Device</button>
        <button onclick="showContent('section10', this)"><i class="fa-solid fa-circle-info"></i> Purchase Info</button>
        <button onclick="showContent('section11', this)"><i class="fa-solid fa-circle-info"></i> Sell Info</button>
        <button onclick="showContent('section12', this)"><i class="fa-solid fa-user"></i> Profile Setting</button>
    </div>

    <div class="main-content">
        <div id="section1" class="content active">
            <?php include 'admin/dashboard.php'; ?>
        </div>
        <div id="section2" class="content">
            <?php include 'admin/device.php'; ?>
        </div>
        <div id="section3" class="content">
            <?php include 'admin/accessory_list.php'; ?>
        </div>
        <div id="section4" class="content">
            <?php include 'admin/2ndhand.php'; ?>
        </div>
        <div id="section5" class="content">
            <?php include 'admin/selldevice.php'; ?>
        </div>
        <div id="section6" class="content">
            <?php include 'admin/sellaccessory.php'; ?>
        </div>
        <div id="section7" class="content">
            <?php include 'admin/managedevices.php'; ?>
        </div>
        <div id="section8" class="content">
            <?php include 'admin/accessories.php'; ?>
        </div>
        <div id="section9" class="content">
            <?php include 'admin/purchasedevice.php'; ?>
        </div>
        <div id="section10" class="content">
            <?php include 'admin/purchase_info.php'; ?>
        </div>
        <div id="section11" class="content">
            <?php include 'admin/sell_info.php'; ?>
        </div>
        <div id="section12" class="content">
            <?php include 'admin/profile.php'; ?>
        </div>
        <div id="section13" class="content">
            <?php include 'admin/sell2nd.php'; ?>
        </div>
    </div>
</div> 

<script>
    function showContent(sectionId, btn) {
        var contents = document.querySelectorAll('.content');
        contents.forEach(function(content) {
            content.classList.remove('active');
        });

        var contentToShow = document.getElementById(sectionId);
        contentToShow.classList.add('active', 'genie-effect');

        setTimeout(function() {
            contentToShow.classList.remove('genie-effect');
        }, 500);

        var buttons = document.querySelectorAll('.left-sidebar button');
        buttons.forEach(function(button) {
            button.style.opacity = '0.5';
        });

        btn.style.opacity = '1';
    }

    window.onload = function() {
        document.getElementById('btnSection1').click();
    };
</script>

<script src="https://kit.fontawesome.com/4fe2ab49c8.js" crossorigin="anonymous"></script>

</body>
</html>
