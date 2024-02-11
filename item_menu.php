<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Menu</title>
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
        <h1 id="dashboard_name">Item Menu</h1>
        <div class="button-container">
            </a><a href="add_new_item.php" class="square-button">
                <img src="image/new-product.png" width="99.2" height="99.2" alt="Add New Product">
                <span>Add New Item</span>
            </a>
            <a href="view_item.php" class="square-button">
                <img src="image/box.png" alt="View Items" width="99.2" height="99.2">
                <span>View Item</span>
            </a>
            <a href="view_category.php" class="square-button">
                <img src="image/category.png" alt="View Category" width="99.2" height="99.2">
                <span>View Category</span>
</a>
  </div>
  <div class="button-container">
            <a href="view_company.php" class="square-button">
                <img src="image/office.png" alt="View Company" width="99.2" width="99.2">
                <span>View Company</span>
            </a>
            <a href="#tab6" class="square-button">
                <img src="image/report.png" alt="View Item Report" width="99.2" width="99.2">
                <span>Get Report</span>
            </a>
  </div>
    </div>
</body>
</html>