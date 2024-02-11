<?php include('counter_server.php')?>
<!DOCTYPE html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <title>Login For POS Counter.</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@500&display=swap');
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Open Sans', sans-serif;
            }

            body{
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                background: url(image/login_regin_background.jpg) no-repeat;
                background-size: cover;
                background-position: center;
            }
            .login_container{
                width: 420px;
                background: transparent;
                color: #fff;
                border-radius: 10px;
                padding: 30px 40px;
                border: 2px solid rgba(255, 255, 255,.2);
                backdrop-filter: blur(20px);
                box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            }
            .login_container h1{
               font-size: 36px;
               text-align: center;
               font-family: 'Poppins', sans-serif;
            }

            .login_container .input_group{
                position: relative;
                width: 100%;
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
                margin-bottom: 10px;
            }

            .input_group input::placeholder{
                color: #fff;}
            .input_group i{
                position: absolute;
                right: 20px;
                top: 50%;
                transform: translateY(-50%);
                font-size: 20px;
            }
            
            .login_container .btn{
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
            .login_container .register-link{
                font-size: 14.5px;
                text-align: center;
                margin-top: 20px;
            }
            .register-link p a{
                color: #fff;
                text-decoration: none;
                font-weight:600 ;
            }
            .register-link p a:hover{
                text-decoration: underline;
            }
            
            
             </style>
    </head>
    <body>
         <div class="login_container"> 
        <form method="post" action="login.php">
            <h1>Login</h1>
            
            <div class="input_group">
                <input type="text" name="username" id="input_box" placeholder="Username"  >
                <i class='bx bx-user'></i>
            </div>
            <div class="input_group">
                <input type="password" name="password" id="input_box" placeholder="Password" >
                <i class='bx bxs-lock' ></i>
            </div>
            <?php include('error.php');?><br>
            <div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
    <div class="register-link">
        <p>Don't have a account? <a href="register.php">Register</a></p>
    </div>
    
        </form>
        </div>
    </body>
</html>