<?php
include ("database_connection.php");
include("server.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <title>Invoice</title>
    <link rel="stylesheet" href="style1.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
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
    background: lightblue;
    color: white;
    padding: 10px 30px;
    text-decoration: none;
  }
  .btn:hover{
    box-shadow: #ccc;
  }
  </style>
</head>
<body>
    <div class="main-container ">
    <div class="upper-part col-md-6">
    <?php include("side-panel.php");?>
        <form action="invoice_menu.php" method="post">
            <div class="input-container">
                <label for="search_Invoic_ID">Invoice ID</label><br>
                <input type="text" name="search_company" id="input-box" placeholder="Invoice ID">
                <label for="invoice-start-date">Start Date</label><br>
                <input type="date" id="invoice-start-date" name="invoice-start-date">
                <label for="invoice-end-date">End Date</label><br>
                <input type="date" id="invoice-end-date" name="invoice-end-date">
                <button type="submit" name="search_company_button" id="search">Search</button>
                
            </div>
        </form>
    </div>
    </div>
    <div class="table-container ">
        <table class="data-table" id="resizeMe">
            <thead>
                <tr>
                    <th class="resizable">#</th>
                    <th class="resizable">Invoice Id</th>
                    <th class="resizable">Invoice Price</th>
                    <th class="resizable">Invoice Date</th>
                    <th class="resizable">Action</th>
                </tr>
            </thead>
            <tbody>
              <?php
                        if(isset($_POST['search_company_button'])) {
                            $searchInvoiceId = mysqli_real_escape_string($database_connection, $_POST['search_company']);
                            $startDate = mysqli_real_escape_string($database_connection, $_POST['invoice-start-date']);
                            $endDate = mysqli_real_escape_string($database_connection, $_POST['invoice-end-date']);
                        
                            // Build the SQL query based on the provided conditions
                            $invoice_query = "SELECT * FROM inovice_table WHERE 1";
                        
                            if (!empty($searchInvoiceId)) {
                                $invoice_query .= " AND inovice_id = '$searchInvoiceId'";
                            }
                        
                            if (!empty($startDate) && !empty($endDate)) {
                                $invoice_query .= " AND invoice_date BETWEEN '$startDate' AND '$endDate'";
                            }
                        
                            $inovice_result = mysqli_query($database_connection, $invoice_query);
                        
                            // Display the results
                            if ($inovice_result->num_rows > 0) {
                                $row_number = 1;
                                while ($row = $inovice_result->fetch_assoc()) {
                                    echo '<tr>
                                        <td>' . $row_number . '</td>
                                        <td>' . $row['inovice_id'] . '</td>
                                        <td>' . $row['invoice_amount'] . '</td>
                                        <td>' . $row['invoice_date'] . '</td>
                                        <td>
                                            <a href="invoice_menu.php?update=' . $row['inovice_id'] . '" class="btn btn-light">View</a>
                                        </td>
                                    </tr>';
                                    $row_number++;
                                }
                            } else {
                                echo '<tr><td colspan="5">No invoices found</td></tr>';
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
  var content = document.querySelector(".content");

  overlay.style.display = "flex";
  content.classList.add("blur");
}    
    </script>
</body>
</html>