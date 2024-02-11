<?php include("server.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Customer</title>
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
    .input-credit{
        width: 200.2px;
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
</head>
<body>
    <!-- Customer Register Form-->
    <?php include("side-panel.php")?>
    <div class="new-customer-container">
        <form action="add_new_customer.php" method="post">
            <h1>ADD NEW CUSTOMER</h1>
            <div class="add-new-customer-input">
                <label for="customer_name" class="input-label">Customer Name</label><br>
                <input type="text" name="customer_name"class="input-box" id="searchInput" required>
            </div>
            <div class="add-new-customer-input">
                <label for="customer-telephone" class="input-label">Customer Telephone</label><br>
                <input type="text" name="customer_telephone"class="input-box" required>
            </div>
            <div class="add-new-customer-input">
                <label for="customer-address" class="input-label">Customer Address</label><br>
                <textarea name="customer_address" id="customer_address" cols="41" rows="6" required></textarea>
            </div>
            <div class="add-new-customer-input">
                <label for="customer-credit" class="input-label">Customer Credit Limit</label><br>
                <input type="text" name="customer_credit"class="input-credit" required>
            </div>
            <div class="button-container">
                <button type="reset" class="button" id="reset">Reset Form</button>
                <button type="submit" class="button" id="submit" name="register_customer">Register Customer</button>
            </div>
            </form> 
            <?php include ("adding_customer_error.php");?>   
            </div>
</div>
</body>
</html>