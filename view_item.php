<!-- Batch Deleting Php Code Start Here-->
<?php
include ("database_connection.php");
$db= $database_connection;
$tableName="batch_table";
if(isset($_GET['delete']))
{
  $id= validate($_GET['delete']);
  $condition =['batch_id'=>$id];
  $deleteMsg=delete_data($db, $tableName, $condition);
  header("location:view_item.php");
}
function delete_data($db, $tableName, $condition){
    $conditionData='';
    $i=0;
    foreach($condition as $index => $data){
        $and = ($i > 0)?' AND ':'';
         $conditionData .= $and.$index." = "."'".$data."'";
         $i++;
    }
  $query= "DELETE FROM ".$tableName." WHERE ".$conditionData;
  $result= $db->query($query);
  if($result){
    $msg="data was deleted successfully";
  }else{
    $msg= $db->error;
  }
  return $msg;
}
function validate($value) {
$value = trim($value);
$value = stripslashes($value);
$value = htmlspecialchars($value);
return $value;
}
?>
<!--Html Part Start Here-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>View Items</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        body{
            margin-top: 10px;
            margin-left: 280px;
            font-family: 'Poppins', sans-serif;
        }
        .main-container{
            display: flex;
            width: 99%;
            height: 250px;
            border: 1px solid black;
        }
        .upper-part{
            margin-top: 10px;
            display: flex;
            position: relative;
        }
        .information-box{
            width: 302.2px;
            height: 24.3px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f8f8f8;
            white-space: pre-wrap;
            overflow-x: auto;
            font-family: monospace;
        }
        .item-information{
            margin-top: 10px;
            width: 523px;
            height: 190px;
            border: 1px solid black;
        }
        #item-information{
            margin-left: 10px;
        }
        .information{
            margin-left: 10px;
            margin-top: 15px;
        }
        .input-container1 input{
            width: 343.2px;
            height: 29.5px;
            outline: none;
        }
        .input-container1 input:hover{
            outline: none;
}
        .input-container button{
            width: 129.7px;
            height: 29.5px;
            border-radius: 0;
            margin-left: 43.4px;
            background: green;
            color: white;
        }
       
        .add-button-container{
            position: absolute;
            top: 115px;
            right: -100px;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }

        .add-button {
            position: absolute;
            justify-self: end;
            align-items: center;
            justify-content: center;
            display: flex;
            width: 196.7px;
            height: 215.6px;
            border:none;
            background: green;
            font-size: 80px; /* You can adjust the size as needed */
            color: black; /* Change the color as needed */
            cursor: pointer;
        }
        .table-container {
            margin-top: 20px; /* Adjust margin as needed */
            width: 99.5%;
            overflow-x: auto;
        }

        .data-table {
            border-collapse: collapse;
            width: 99.5%;
            border: 1px solid #ccc;
            margin-top: 10px; /* Adjust margin as needed */
            
        }

        .data-table th{
            position: relative;
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
            background-color: #00bf63;
            color: white;
            font-weight: 400;
            
        }
        .data-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        .resizable {
            position: relative;
            user-select: none;
            padding-right: 16px;
        }
        .resize-handle {
            position: absolute;
            top: 0;
            right: -8px;
            width: 16px;
            height: 100%;
            cursor: col-resize;
        }
        .blur {
            filter: blur(5px); /* Apply blur to elements with this class */
            transition: filter 0.3s;
        }
        .form{
            
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
        }
        .form-container{
            border: 1px solid #ccc;
            padding: 10px;
            height: 100%;
            position: relative;
            
        }
        .batch-form-row{
            display: flex;
            font-family: 'Poppins', sans-serif;
        }
        .input-container1{
            width: 234px;
            height: 30.3px;
            border: 1px solid #ccc;
        }
        .batch-form-col{
            margin-left: 10px;
            margin-bottom: 10px;
        }
        .close-button {
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
        }

        .close-button::before {
            content: "X";
            font-weight: bold;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999; /* Ensure the overlay is on top */
  }
        .information-container{
            margin-top: 10px;
            border: 1px solid #ccc;
            padding: 10px 10px 10px 10px;
        }
        .add-button-container:disabled{
            opacity: .5;
            cursor: not-allowed;
        }
       
    </style>
</head>
<body>
    <!-- Add Form Is Here-->
    <div class="overlay" id="overlay">
    <div class="form">
    <div class="form-container">
        <div class="close-button" onclick="closeForm()"></div>
        <form action="view_item.php" method="post" class="batch-form" id="batch-form">
        <h1>Add New Batch</h1>
        <div class="batch-form-row">
            <div class="batch-form-col">
                <label for="item-id">Item ID</label>
                <div class="input-container1"></div>
            </div>
            <div class="batch-form-col">
                <label for="batch-id">Batch ID</label>
                <div class="input-container1"></div>
            </div>
            <div class="batch-form-col">
                <label for="item-code">QR Code</label>
                <div class="input-container1"></div>
            </div>
        </div>
        <div class="batch-form-row">
            <div class="batch-form-col">
                <label for="qty">QTY</label><br>
                <input type="text" name="qty" placeholder="0" class="input-container1">
            </div>
            <div class="batch-form-col">
                <label for="buy-price">Buy Price</label><br>
                <input type="text" name="buy-price" placeholder="රු 0.00" class="input-container1">
            </div>
            <div class="batch-form-col">
                <label for="mark-price">Mark Price</label><br>
                <input type="text" name="mark-price" placeholder="රු 0.00" class="input-container1">
            </div>
        </div>
        <div class="batch-form-row">
            <div class="batch-form-col">
                <label for="retail-price">Retail Price</label><br>
                <input type="text" name="retail-price" placeholder="රු 0.00" class="input-container1">
            </div>
            <div class="batch-form-col">
                <label for="wholesale-price">Wholesale Price</label><br>
                <input type="text" name="wholesale-price" placeholder="රු 0.00" class="input-container1">
            </div>
            <div class="batch-form-col">
                <label for="card-price">Card Price</label><br>
                <input type="text" name="card-price" placeholder="රු 0.00" class="input-container1">
            </div>
        </div>
        <div class="batch-form-row">
            <div class="batch-form-col">
            <input type="reset" value="Cancel" class="btn btn-danger" name="cancel" onclick="clearForm()">
            <input type="submit" value="Add Batch" class="btn btn-success">
            </div>
        </div>
            
        </form>
    </div>
    </div>
    </div>
    <!-- Show Table Start Here-->
<div class="main-container">
    <div class="upper-part col-md-6">
    <?php include("side-panel.php");?>
        <form action="view_item.php" method="post">
            <div class="input-container">
                <input type="text" name="item_qrcode" id="input-box" placeholder="QR Code" >
                <button type="submit" name="search_item_button" id="search">Search</button>    
            </div>
            <div class="information-container">
            <div class="show-information-container">
                <p>Item Name</p>
                <div class="information-box" id="item-name">
                </div>
            </div>
            <div class="show-information-container">
                <p>Item Code</p>
                <div class="information-box" id="item-code">
                </div>
            </div>
            </div>
            <div class="add-button-container">
            <div class="add-button" id="openButton" >
                <button id="add-batch-button">
                <i class='bx bx-plus-circle'></i>
                </button>
            </div>
            </div>
        </form>
    </div>
    </div>
    <div class="table-container ">
        <table class="data-table" id="resizeMe">
            <thead>
                <tr>
                    <th class="resizable">#</th>
                    <th class="resizable">Item ID</th>
                    <th class="resizable">Item Barcode</th>
                    <th class="resizable">Item Name</th>
                    <th class="resizable">Item Company Name</th>
                    <th class="resizable">Item Category Name</th>
                    <!--<th class="resizable">Item Batch Count</th>-->
                    <th class="resizable">Action</th>
                </tr>
            </thead>
            <tbody>
              <?php
                    $row;
                    $row_number=1;
                    if(isset($_POST['search_item_button'])) {
                        $itemQRcode = mysqli_real_escape_string($database_connection, $_POST['item_qrcode']);                    
                        // Build the SQL query based on the provided conditions
                        $item_query = "SELECT i.item_id, i.qr_code, i.item_name, com.company_name, c.category_name
                                            FROM item_table i
                                            LEFT JOIN category_table c ON i.item_categoryid = c.category_id
                                            LEFT JOIN company_table com ON i.item_companyid = com.company_id
                                            WHERE 1";
                    
                        if (!empty($itemQRcode)) {
                            $item_query = "SELECT i.item_id, i.qr_code, i.item_name, com.company_name, c.category_name
                                            FROM item_table i
                                            LEFT JOIN category_table c ON i.item_categoryid = c.category_id
                                            LEFT JOIN company_table com ON i.item_companyid = com.company_id
                                            WHERE i.qr_code = '$item_code'";
                        }                    
                        $result = mysqli_query($database_connection, $item_query);
                    
                    if($result->num_rows>0){
    
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>
                            <td>' . $row_number . '</td>
                            <td>' . $row['item_id'] . '</td>
                            <td>' . $row['qr_code'] . '</td>
                            <td>' . $row['item_name'] . '</td>
                            <td>' . $row['company_name'] . '</td>
                            <td>' . $row['category_name'] . '</td>
                            <td>
                                <a href="view_item.php?delete=' . $row['item_id'] . '" class="btn btn-danger">Delete</a>
                                <a href="view_item.php?update=' . $row['item_id'] . '" class="btn btn-primary">Update</a>
                            </td>
                         </tr>';
                                 $row_number++;
                                    }
                        }else{

                            echo"No Batch Found";
                            }                
                           
                        }
            
                    
?>

            </tbody>
        </table>
    </div>
    <script src="script_resizing_table.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function closeForm() {
            var overlay = document.getElementById("overlay");
            var content = document.querySelector(".main-container");
            overlay.style.display = "none";
            content.classList.remove("blur");
}
        function openForm() {
          var overlay = document.getElementById("overlay");
          var content = document.querySelector(".main-container");
          overlay.style.display = "flex";
          content.classList.add("blur");
}    
        function performSearch(){
          var searchQuery = document.getElementById("input-box").value;

          var xhr = new XMLHttpRequest();
          xhr.open("POST","view_item.php",true);
          xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
          xxhr.onreadystatechange = function(){
            if(xhr.readyState === 4 && xhr.status === 200){
                var response = xhr.responseText;
                if(response === "No Batch Found "){
                    openForm()
                }
            }
          };
          xhr.send("input-box="+encodeURIComponent(searchQuery));
        }
    </script>
    
</body>
</html>