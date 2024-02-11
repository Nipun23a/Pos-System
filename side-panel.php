<!DOCTYPE html>
<html lang="en">
<head>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @font-face {
            font-family: Cheque;
            src: url('Other Necessary Item/Cheque/Commercial/WEB/Cheque-Regular.eot');
            src: url('Other Necessary Item/Cheque/Commercial/WEB/Cheque-Regular.eot') format('embedded-opentype'),
            url('Other Necessary Item/Cheque/Commercial/WEB/Cheque-Regular.woff2') format('woff2'), 
            url('Other Necessary bItem/Cheque/Commercial/WEB/Cheque-Regular.woff') format('woff');
        } 
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        *{
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
        }
        .side-bar{
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 260px;
            background: #a6a6a6;
        }
        .side-bar .logo-details{
            height: 100px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .side-bar .logo-details .logo_name{
            font-family: Cheque;
            font-size: 35px;
            min-width: 78px;
            line-height: 50px;
        }
         
        .side-bar .nav-links{
           
            height: 100%;
            padding-top: 30px;
        }
        .side-bar .nav-links li{
            position: relative;
            list-style: none;  
        }
        .side-bar .nav-links li img{
            height: 50px;
            min-width: 50px;
            text-align: center;
            line-height: 50px;
        }
        .side-bar .nav-links li a{
            display: flex;
            align-items: center;
            text-decoration: none;
            border: 1px solid white;
            padding: 10px
        }
        .side-bar .nav-links li a .ultitle{
            font-size: 16px;
            color: black;
            font-weight: 300;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="side-bar">
    <div class="logo-details">
         <span class="logo_name">POS SERVER</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="server_dashboard.php">
            <img src="image/visualization.png" alt="Dasboard" height="20" width="20">
            <span class="ultitle">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="item_menu.php">
            <img src="image/box.png" alt="Item menu" height="20" width="20">
            <span class="ultitle">Item Menu</span>
            </a>
        </li>
        <li>
            <a href="#">
            <img src="image/invoice.png" alt="Invoice Information" height="20" width="20">
            <span class="ultitle">Invoice Inforamtion</span>
            </a>
        </li>
       
        <li>
            <a href="grn_menu.php">
            <img src="image/report.png" alt="GRN" height="20" width="20">
            <span class="ultitle">GRN</span>
            </a>
        </li>
        
        <li>
            <a href="customer_menu.php">
            <img src="image/people.png" alt="Customer" height="20" width="20">
            <span class="ultitle">Customer Menu</span>
            </a>
        </li>
        <li>
            <a href="settings_menu.php">
            <img src="image/settings.png" alt="Settings" height="20" width="20">
            <span class="ultitle">Settings</span>
            </a>
        </li>
    </ul>        
    </div>
</body>
</html>