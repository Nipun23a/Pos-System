<?php
$database_connection = new mysqli('localhost', 'root','','pos_system_database');

if($database_connection->connect_error){
    die("Connection Failed". $database_connection->connect_error);
}


//intailize  variable
$name="";
$user_name="";
$occupation="";
$seach_term="";
$errors=array();
$register_errors=array();
$function_errors=array();
$success_messages=array();
$adding_errors=array();
$add_items=array();
$dataAddedSuccefully =true;
// registering user
if (isset($_POST["register_user"])){
    $name = mysqli_real_escape_string($database_connection,$_POST["name"]);
    $user_name = mysqli_real_escape_string($database_connection,$_POST["username"]);
    $user_password1 = mysqli_real_escape_string($database_connection,$_POST["password1"]);
    $user_password2 = mysqli_real_escape_string($database_connection,$_POST["password2"]);


    if (empty($name)){array_push($register_errors,"Name Is Required.");}
    if (empty($user_name)){array_push($register_errorss,"Username Is Required.");}
    if (empty($user_password1)){array_push($register_errors,"Password Is Required.");}
    if($user_password1 != $user_password2){
    array_push($register_errors,"The Password Doesn't Match.");
}
    $user_check_query ="SELECT * FROM user_table WHERE user_name='$user_name' LIMIT 1";
    $reuslt = mysqli_query($database_connection,$user_check_query);
    $user = mysqli_fetch_assoc($reuslt);

    if($user){
    array_push($register_errors,"Username Already Exist.");
}

    if(count($register_errors)==0){
        $register_user_query = "INSERT INTO user_table(user_name,username,user_password)
                                VALUES ('$user_name','$name','$user_password1')";
        mysqli_query($database_connection,$register_user_query);
        $_SESSION['username'] = $user_name;
        $_SESSION['success'] = "You Are Now Logged In";
        header('location: server_dashboard.php');
}
}
//login user

if(isset($_POST['login_user'])){
    $user_name =mysqli_real_escape_string($database_connection,$_POST['username']);
    $password =mysqli_escape_string($database_connection,$_POST['password']);

    if (empty($user_name)){
        array_push($errors ,"Username Is Required");
    }
    if(empty($password)){
        array_push($errors,"Password Is Required.");
    }

    if(count($errors)==0){
        $login_query = "SELECT * FROM user_table WHERE user_name='$user_name' AND user_password='$password'";
        $result =mysqli_query($database_connection,$login_query);
        if(mysqli_num_rows($result)==1){
            $_SESSION['username'] =$user_name;
            $_SESSION['success']= "You Are Now Logged In.";
            header('location:server_dashboard.php');
        }
    else{
        array_push($errors, "Username/Password Didn't Match.");
    }    
    }
}

// Function For Add Items For Database
function adding_to_database($button, $label_name, $database_connection, $table_name, $table_column, $name, &$function_errors, &$success_messages) {
    if (isset($_POST[$button])) {
        $label_variable = mysqli_real_escape_string($database_connection, $_POST[$label_name]);
        if (empty($label_variable)) {
            array_push($function_errors, "{$name} Is Required.");
        }

        $checking_query = "SELECT * FROM {$table_name} WHERE {$table_column}='$label_variable' LIMIT 1";
        $checking_result = mysqli_query($database_connection, $checking_query);
        $checking_data = mysqli_fetch_assoc($checking_result);

        if ($checking_data) {
            array_push($function_errors, "{$name} Already Exists.");
        }

        if (count($function_errors) == 0) {
            $adding_data = $database_connection->prepare("INSERT INTO {$table_name}({$table_column}) VALUES (?)");
            $adding_data->bind_param("s", $label_variable);
            if ($adding_data->execute()) {
                array_push($success_messages, "{$name} Registered Successfully");
            } else {
                array_push($function_errors, "Something went wrong");
            }
        }
    }
}

//Registering New Item
if(isset($_POST["register"])){
    $company_name = mysqli_real_escape_string($database_connection,$_POST["company_name"]);
    $category_name = mysqli_real_escape_string($database_connection,$_POST["category_name"]);
    $item_name = mysqli_real_escape_string($database_connection,$_POST["item_name"]);
    $item_code = mysqli_real_escape_string($database_connection,$_POST["qr_code"]);
    $item_description = mysqli_real_escape_string($database_connection,$_POST["item_description"]);

    if(empty($company_name)){
        array_push($adding_errors,"Company Name Must Be Filled");
    }
    if(empty($category_name)){
        array_push($adding_errors,"Category Name Must Be Filled");
    }
    if(empty($item_name)){
        array_push($adding_errors,"Item Name Must Be Filled");
    }
    if(empty($item_code)){
        array_push($adding_errors,"Item Code Must Be Filled");
    }
    if(empty($item_description)){
        array_push($adding_errors,"Item Description Must Be Filled");
    }

    $item_code_check_query="SELECT * FROM item_table WHERE qr_code='$item_code' LIMIT 1";
    $item_code_check_result = mysqli_query($database_connection, $item_code_check_query);
    $item_code_check_data = mysqli_fetch_assoc($item_code_check_result);

    if ($item_code_check_data) {
        array_push($adding_errors, "Item Already Exists.");
    }

    if (count($adding_errors) == 0) {
        $category_query = "SELECT category_id  FROM category_table WHERE category_name = '$category_name'";
        $category_result = $database_connection->query($category_query);
        $company_query ="SELECT company_id FROM company_table WHERE company_name='$company_name'";
        $company_result =$database_connection->query($company_query);
        if($category_result->num_rows > 0 and $company_result->num_rows > 0){
            $category_row = $category_result->fetch_assoc();
            $category_id =$category_row['category_id'];
            $company_row =$company_result->fetch_assoc();
            $company_id =$company_row['company_id'];

            $insert_item_query ="INSERT INTO item_table (qr_code, item_companyid,item_categoryid,item_description,item_name) VALUES ('$item_code', ' $company_id', '$category_id ','$item_description','$item_name')";
            if ($database_connection->query($insert_item_query) === TRUE) {
                $dataAddedSuccefully;
                $response = array("status"=>"success");
                if($dataAddedSuccefully){
                    echo'<script>showAlertBox();</script>';
                }
            } else {
                array_push($adding_errors,"Error Occcured");
                $dataAddedSuccefully = false;
            }
        }
    }
       
}
// Adding to new Customer
if(isset($_POST["register_customer"])){
    $customer_name = mysqli_real_escape_string($database_connection,$_POST["customer_name"]);
    $customer_telephone = mysqli_real_escape_string($database_connection,$_POST["customer_telephone"]);
    $customer_adddress = mysqli_real_escape_string($database_connection,$_POST["customer_address"]);
    $credit_limit = mysqli_real_escape_string($database_connection,$_POST["customer_credit"]);

    if(empty($customer_name)){
        array_push($adding_errors,"Customer Name Must Be Filled");
    }
    if(empty($customer_telephone)){
        array_push($adding_errors,"Customer Telephone Must Be Filled");
    }
    if(empty($customer_adddress)){
        array_push($adding_errors,"Customer Address Must Be Filled");
    }
    if(empty($credit_limit)){
        array_push($adding_errors,"Customer Credit Limit Must Be Filled");
    }
    if (count($adding_errors) == 0) {
        $insert_customer_query ="INSERT INTO customer_table (customer_name,customer_address,customer_tel,credit_limit) VALUES ('$customer_name', ' $customer_adddress', '$customer_telephone ','$credit_limit')";
            if ($database_connection->query($insert_customer_query) === TRUE) {
                $dataAddedSuccefully;
                $response = array("status"=>"success");
                if($dataAddedSuccefully){
                    echo'<script>showAlertBox();</script>';
                }
            } else {
                array_push($adding_errors,"Error Occcured");
                $dataAddedSuccefully = false;
            }
        }
    }

// Invoice Shown Algorithm

       


?>


