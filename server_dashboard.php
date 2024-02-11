<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Server Dashboard.</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet"> 
    
</head>
<body>
    <div class="upper_part">
        <h1 id="pos_server_title">POS SERVER</h1>
        <div id="datetime"></div>
        <script src="script.js"></script>
    </div>
    <div class="middle_part">
        <h1 id="dashboard_name">DASHBOARD</h1>
        <div class="button-container">
            <a href="item_menu.php" class="square-button">
                <img src="image/box.png" alt="View Items" width="99.2" height="99.2">
                <span>Item Menu</span>
            </a>
            <a href="invoice_menu.php" class="square-button">
                <img src="image/invoice.png" alt="View Invoice" width="99.2" height="99.2">
                <span>Invoice Menu</span>
</a>

            <a href="grn_menu.php" class="square-button">
                <img src="image/report.png" alt="GRN Menu" width="99.2" width="99.2">
                <span>GRN</span>
    </a>
  </div>
  <div class="button-container">
            <a href="customer_menu.php" class="square-button">
                <img src="image/people.png" alt="Customer Information" width="99.2" width="99.2">
                <span>Customer Menu</span>
            </a>
            <a href="settings_menu.php" class="square-button">
                <img src="image/settings.png" alt="Settings" width="99.2" width="99.2">
                <span>Settings</span>
            </a>
  </div>
        </div>
        <div class="log-out">
        <a href="register.php" class="logout-icon">
        <i class='bx bx-log-out'></i>
  </a>   
        </div>
       
</body>
</html>