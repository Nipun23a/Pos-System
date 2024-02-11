<?php include("server.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Item</title>
    <link rel="stylesheet" href="add-batch.css">
    
    <style>
        .message-box{
            border: 1px solid #ccc;
            text-align: center;
            padding: 10px 10px 10px 10px;
            height: 50%;
        }
        .message-box-description{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .button-container{
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }
        .right-button{
            margin-left: 10px;
        }
        .hidden-container{
            height: 50%;
        }
        .form{
            
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 180px;
            background: white;
        }
        .form-container{
            border: 1px solid #ccc;
            padding: 10px;
            width: 650px;
            height: 100%;
            position: relative;
            
    }
    .button-container{
        align-content: right;
        margin-top: 10px;
        display: flex;
      gap: 15px; 
    }
    .button {
    
      padding: 10px 20px;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 13px;
    }
    #reset{
        background: red;
    }
    #submit{
        background: green;
    }
    .button:hover {
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); /* Add box shadow on hover */
    }
    .add-new-item-input{
        margin-top: 15px;
        position: relative;
        
    }
    .input-box{
        width: 581.2px;
        height: 39px;
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
  .category{
    display: none;
  }
  .blur {
    filter: blur(5px); /* Apply blur to elements with this class */
    transition: filter 0.3s;
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
  .input-container{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 200px;
    
  }
  .btn{
    background: red;
    color: white;
    padding: 10px 30px;
    text-decoration: none;
  }
  .btn:hover{
    box-shadow: #ccc;
  }   .batch-container{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;   
        }
        .batch-form-container{
            border: 1px solid #ccc;
            padding: 10px 10px 10px 10px;
            position: relative;
            display: none;
        }
        .batch-form-row{
            display: flex;
            font-family: 'Poppins', sans-serif;
        }
        .input-container{
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
        .blur {
            filter: blur(5px); /* Apply blur to elements with this class */
            transition: filter 0.3s;
        }
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
            backdrop-filter: blur(5px); /* Apply the blur effect */
            z-index: 1000; /* Ensure it's on top of other elements */
        }       
        .alert-box {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
        }

        .alert-content {
            padding: 10px;
        }
        #add-batch{
            background-color: green;
        }
        #cancel{
            background-color: red;
        }
    

       
    </style>
    <script src="script.js"></script>
</head>
<body>
        <div class="overlay" id="overlay"></div>
    <!-- Confirm Container Start Here -->
        <div class="alert-box" id="alertBox">
            <div class="alert-content">
                <p>Item Registered Succefully. Do You Want Add Batch?</p>
                <button type="reset" class="button" id="cancel">Cancel</button>
                <button type="submit" class="button" id="add-batch" name="register">Add Batch</button> 
            </div>

        </div>
    
    <!-- Item Register Form-->
    <?php include("side-panel.php")?>
    <div class="new-item-container">
        <form action="add_new_item.php" method="post">
            <h1>ADD NEW ITEM</h1>
            <div class="add-new-item-input">
                <label for="company_name" class="input-label">Company Name</label><br>
                <input type="text" name="company_name"class="input-box" id="searchInput">
                <input type="submit" value="Add" name='add_company_button'>
                <div id="dropdown">
                <?php include('database_connection.php');
                    $db=$database_connection;
                    require_once "server.php";
                    $database_connection=$db;
                    $button='add_company_button';
                    $label_name='company_name';
                    $table_name='company_table';
                    $table_column='company_name';
                    $name='Company';
                    $a=adding_to_database($button, $label_name, $database_connection, $table_name, $table_column, $name, $function_errors, $success_messages);
                    include('function_error.php');  
                ?>
                </div>
                
</div>
            <div class="add-new-item-input">
                <label for="category_name" class="input-label">Category Name</label><br>
                <input type="text" name="category_name"class="input-box" id="searchInput">
                <input type="submit" value="Add" name='add_category_button'>
                <div id="dropdown">
                <?php include('database_connection.php');
                    $db=$database_connection;
                    require_once "server.php";
                    $database_connection=$db;
                    $button='add_category_button';
                    $label_name='category_name';
                    $table_name='category_table';
                    $table_column='category_name';
                    $name='Category';
                    $a=adding_to_database($button, $label_name, $database_connection, $table_name, $table_column, $name, $function_errors, $success_messages);
                    include('function_error.php');  
                ?>
                </div>
            </div>
            <div class="add-new-item-input">
                <label for="item_name" class="input-label">Item Name</label><br>
                <input type="text" name="item_name"class="input-box">
            </div>
            <div class="add-new-item-input">
                <label for="qr_code" class="input-label">QR Code</label><br>
                <input type="text" name="qr_code"class="input-box">
            </div>
            <div class="add-new-item-input">
                <label for="item_description" class="input-label">Item Sinhala Description</label><br>
                <textarea name="item_description" id="input_text" cols="41" rows="6" placeholder="සිංහල විස්තරය​"></textarea>
            </div>
            <div class="button-container">
                <button type="reset" class="button" id="reset">Reset Form</button>
                <button type="submit" class="button" id="submit" name="register">Register Item</button>
            </div>
            </form> 
            <?php include ("adding_errors.php")?>   
            </div>
            

</body>
</html>