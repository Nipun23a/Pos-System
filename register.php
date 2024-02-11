<?php include('server.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pos Server Login</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@500&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Open Sans', sans-serif;
            }
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                background: url(image/login_regin_background.jpg) no-repeat;
                background-size: cover;
                background-position: center;
            }
            .form-container{
                display: flex;
                gap: 250px; 
                margin-left: 50px;
            }
            .register-form{
                margin-top: 15px;
                width: 420px;
                padding: 20px;
            }
            .register h1{
                font-size: 36px;
               text-align: center;
               font-family: 'Poppins', sans-serif;
               color: #fff;
            }
        .register{
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            color: #fff;
            border-radius: 10px;
            padding: 30px 40px;
            width: 1250px;
        }
        .register-form .input_group{
            position: relative;
            color: white;
            width: 420px;
            background: transparent;
            height: 50px;
            margin: 30px 0;
        }
        .input_group input{
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255, 255, 255, .2); 
            border-radius: 40px;
            font-size: 16px;
            color: #fff;
            padding: 20px 45px 20px 20px;
        }
        .input_group input::placeholder{
            color: #fff;
        }
        .input_group i{
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;

        }
        .register-form .btn{
            width: 100%;
            height: 45px;
            background: #fff;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
        }
        h2{
            text-align: center;
            font-family: 'Poppins', sans-serif;
            
        }
       
      
           
    </style>
</head>
<body>

    

    <div class="register">
    <h1>POS Server</h1>
    <div class="form-container">
    <div class="register-form">
        <form method="post" action="register.php">
        <h2>Login To POS Server.</h2>
            <div class="input_group">
                <input type="text" name="username" id="input_box" placeholder="Username"  >
                <i class='bx bx-user'></i>
            </div>
            <div class="input_group">
                <input type="password" name="password" id="input_box" placeholder="Password" >
                <i class='bx bxs-lock' ></i>
            </div>
            <?php include('error.php');?><br>   
            <div class="input_group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
        </form>

            </div>
           
        <div class="register-form">
        <form method="post" action="register.php">
            <h2>Register New User.</h2>
            <div class="input_group">
                <input type="text" name="name" id="input_box" placeholder="Full Name"  >
                <i class='bx bxs-universal-access'></i>
            </div>
            <div class="input_group">
                <input type="text" name="username" id="input_box" placeholder="Username"  >
                <i class='bx bx-user'></i>
            </div>
            <div class="input_group">
                <input type="password" name="password1" id="input_box" placeholder="Password" >
                <i class='bx bxs-lock' ></i>
            </div>
            <div class="input_group">
                <input type="password" name="password2" id="input_box" placeholder="Re-type Password" >
                <i class='bx bxs-lock' ></i>
            </div>
            <?php include('register_error.php');?><br>   
            <div class="input_group">
  		<button type="submit" class="btn" name="register_user">Register</button>

        </div>
         
        </form>
    
        </div>
        </div>
        </div>
</body>
</html>