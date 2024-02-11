<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        .batch-container{
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
        .message-container{
            border: 1px solid #ccc;
            padding: 10px 10px 10px 10px;
            position: relative;
        }
    </style>
</head>
<body>
<div class="batch-container">
    <div class="batch-form-container" id="form">
    <h1>Add New Batch</h1>
    <div class="close-button" id="close-button"></div>
    <form action="" method="post" class="batch-form" id="batch-form">
        <div class="batch-form-row">
            <div class="batch-form-col">
                <label for="item-id">Item ID</label>
                <div class="input-container"></div>
            </div>
            <div class="batch-form-col">
                <label for="batch-id">Batch ID</label>
                <div class="input-container"></div>
            </div>
            <div class="batch-form-col">
                <label for="item-code">QR Code</label>
                <div class="input-container"></div>
            </div>
        </div>
        <div class="batch-form-row">
            <div class="batch-form-col">
                <label for="qty">QTY</label><br>
                <input type="text" name="qty" placeholder="0" class="input-container">
            </div>
            <div class="batch-form-col">
                <label for="buy-price">Buy Price</label><br>
                <input type="text" name="buy-price" placeholder="රු 0.00" class="input-container">
            </div>
            <div class="batch-form-col">
                <label for="mark-price">Mark Price</label><br>
                <input type="text" name="mark-price" placeholder="රු 0.00" class="input-container">
            </div>
        </div>
        <div class="batch-form-row">
            <div class="batch-form-col">
                <label for="retail-price">Retail Price</label><br>
                <input type="text" name="retail-price" placeholder="රු 0.00" class="input-container">
            </div>
            <div class="batch-form-col">
                <label for="wholesale-price">Wholesale Price</label><br>
                <input type="text" name="wholesale-price" placeholder="රු 0.00" class="input-container">
            </div>
            <div class="batch-form-col">
                <label for="card-price">Card Price</label><br>
                <input type="text" name="card-price" placeholder="රු 0.00" class="input-container">
            </div>
        </div>
        <div class="batch-form-row">
            <div class="batch-form-col">
            <input type="reset" value="Cancel" class="btn btn-danger" name="cancel" onclick="clearForm()">
            <input type="submit" value="Add Batch" class="btn btn-success">
            </div>
    </form>
    <script>
        function clearForm(){
            document.getElementByID("batch-form").reset();
        }
        
            document.getElementById("close-button").addEventListener("click", function() {
            document.querySelector(".batch-container").style.display = "none";
            
    });
        
    </script>

    </div>
</div>

<div class="batch-container" id="form">
    
    <div class="message-container">
    <div class="close-button" id="close-button" onclick="closeForm()"></div>
    <form action="" method="post" class="batch-form" id="batch-form">
    <h1>Batch Added Succefully</h1>
    <div class="batch-form-row">
            <div class="batch-form-col">
            <input type="reset" value="Cancel" class="btn btn-danger" id="close" name="cancel">
            <input type="submit" value="Add Batch" class="btn btn-success" id="add">
            </div>
    </div>
    <script>
        function clearForm(){
            document.getElementById("batch-form").reset();
        }
        
        function closeForm() {
            const containers = document.querySelectorAll(".batch-container");
            containers.forEach(container => {
            container.style.display = "none";
    });
}

            document.getElementById("close").addEventListener("click", closeForm);
        
            
            const btn = document.getElementById('add');

            btn.addEventListener('click', () => {
            const form = document.getElementById('form');

            if (form.style.display === 'none') {
                // 👇️ this SHOWS the form
                form.style.display = 'block';
            } else {
                // 👇️ this HIDES the form
                form.style.display = 'none';
            }
            });

            
    

    </script>
</div>

</body>
</html>


                $row;
                $row_number=1;
                            $item_query="SELECT batch_id,manufacture_date,expire_date,qty,buy_price,retail_price,wholesale_price,card_price FROM batch_table";
                            $item_result=mysqli_query($database_connection,$item_query);
                            if($item_result->num_rows>0){
                              while($row=$item_result->fetch_assoc()){
                                echo '<tr>
                                <td>' . $row_number . '</td>
                                <td>' . $row['batch_id'] . '</td>
                                <td>' . $row['manufacture_date'] . '</td>
                                <td>' . $row['expire_date'] . '</td>
                                <td>' . $row['qty'] . '</td>
                                <td>' . $row['buy_price'] . '</td>
                                <td>' . $row['retail_price'] . '</td>
                                <td>' . $row['wholesale_price'] . '</td>
                                <td>' . $row['card_price'] . '</td>
                                <td>
                                <a href="view_item.php?delete=' . $row['batch_id'] . '"class="btn btn-danger">Delete</a>
                                <a href="view_item.php?update=' . $row['batch_id'] . '"class="btn btn-primary">Update</a>
                                </td>
                                  </tr>';
                                $row_number++;
                    }
                  }