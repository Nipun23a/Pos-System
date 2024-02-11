<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet"> 
</head>
<body>
<div class="upper_part">
    <a href="server_dashboard.php">
    <img src="image/back-button.png" alt="Back Button" width="30px" height="30px">
    </a>  
        <div id="datetime"></div>
        <script src="script.js"></script>
    </div>
    <div class="middle_part">
        <h1 id="dashboard_name">Settings</h1>
        <div class="button-container">
            </a><a href="#" class="square-button">
                <img src="image/profile-user.png" width="99.2" height="99.2" alt="User Profile">
                <span>User Information</span>
            </a>
            <a href="view_item.php" class="square-button">
                <img src="image/database.png" alt="Database Information" width="99.2" height="99.2">
                <span>Database Information</span>
            </a>
  </div>
    </div>
</body>
</html>