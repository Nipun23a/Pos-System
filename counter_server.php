<?php 
session_start();
$database_connection = new mysqli('localhost', 'root','','pos_system_database');

$name="";
$user_name="";
$occupation="";
$errors=array();
$register_errors=array();

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
        $password =md5($password);
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
?>