<?php
include ("database_connection.php");
$db= $database_connection;
$tableName="company_table";
if(isset($_GET['delete']))
{
  $id= validate($_GET['delete']);
  $condition =['company_id'=>$id];
  $deleteMsg=delete_data($db, $tableName, $condition);
  header("location:view_company.php");
}
function delete_data($db, $tableName, $condition){
    $conditionData='';
    $i=0;
    foreach($condition as $index => $data){
        $and = ($i > 0)?' AND ':'';
         $conditionData .= $and.$index." = "."'".$data."'";
         $i++;
    }
    $query = "DELETE FROM {$tableName} WHERE {$conditionData}";
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
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <title>Company</title>
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
    background: red;
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
<div class="overlay" id="overlay">
    <div class="form">
    <div class="form-container">
        <div class="close-button" onclick="closeForm()"></div>
        <form action="view_company.php" method="post" id="form">
            <h2 id="">Add New Company</h2>
            <div class="add-new-item-input">
            <input type="text" placeholder="Company Name" required name="company_name" class="input-box"><br>
            </div>
            <div class="button-container">
            <button type="reset" class="button" id="reset" onclick="closeForm()">Cancel</button>
            <button type="submit" class="button" id="submit" name="submit" onclick="submitForm()">Add Company</button>
            </div>
            <div id="message-container">
            <?php include("adding_new_company.php")?>
            </div>
            
        </form>
    </div>
    </div>
    </div>
    <div class="main-container ">
    <div class="upper-part col-md-6">
    <?php include("side-panel.php");?>
        <form action="view_company.php" method="post">
            <div class="input-container">
                <input type="text" name="search_company" id="input-box" placeholder="Company Name">
                <button type="submit" name="search_company_button" id="search">Search</button>
                
            </div>
            <div class="add-button-container">
            <div class="add-button" onclick="openForm()">
                <i class='bx bx-plus-circle'></i>
                
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
                    <th class="resizable">Company Id</th>
                    <th class="resizable">Company Name</th>
                    <th class="resizable">Company Register Date</th>
                    <th class="resizable">Action</th>
                </tr>
            </thead>
            <tbody>
              <?php
              $row;
              $row_number=1;
                            $company_query="SELECT * FROM company_table";
                            $company_result=mysqli_query($database_connection,$company_query);
                            if($company_result->num_rows>0){
                              while($row=$company_result->fetch_assoc()){
                                echo '<tr>
                                <td>' . $row_number . '</td>
                                <td>' . $row['company_id'] . '</td>
                                <td>' . $row['company_name'] . '</td>
                                <td>' . $row['registered_date'] . '</td>
                                <td>
                                <a href="view_company.php?delete=' . $row['company_id'] . '"class="btn btn-danger">Delete</a>
                                </td>
                                  </tr>';
                                $row_number++;
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