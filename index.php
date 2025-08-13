<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Shree Krishna Agate</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,400;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
<body>
<div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img src="image/logo.png" width="125px">
            </div>
            <!-- <nav>
                <ul id="MenuItems">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="product.php">Products</a></li>
                        <li><a href="about_us.php">About Us</a></li>
                        <li><a href="contact_us.php">Contant Us</a></li>
                        <li><a href="account.php">Account</a></li>
                </ul>
            </nav>
            <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>

            <img src="image/menu-logo.png" class="menu-icon" onclick="menutoggle()">
            <i class="fa-solid fa-heart"></i> -->
        </div>
    </div>
</div>

<!----------account-page------------>

<div class="account-page">
    <div class="container">
            <div class="row">
                <div class="col-2">
                    <img class="img" style=" max-width: 500px;
                     padding: 10px 0;
                     max-height: 500px;" src="image/1.png" >
                </div>
                <div class="col-2">
                    <div class="form-container">
                
                        <div class="form-btn">
                            <span onclick="login()">Sign In</span>
                            <span onclick="register()">Sign Up</span>
                            <hr id="Indicator">
                        </div>
                        <form action="" method="post" id="LoginForm">
                            <input type="text" name="Username" id="Username" placeholder="Email" required>
                            <input type="password" name="Password" id="Password" placeholder="password" required >
                            <button type="submit" class="btn" name="sign_In">Sign In</button>
                            <a href="">Forgot Password</a>
                        </form>
                        <form action="" method="post" id="RegForm">
                            <input type="text" name="uname" placeholder="Username" required>
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="password" name="password" placeholder="password" required>
                            <button type="submit" class="btn" name="up">Sign Up</button>
                        </form>
                    </div>
               </div>
            </div>
    </div>
</div>

<!----------footer------------>
<footer class="footer-distributed">

    

<div class="footer-left">
  <img src="image\logo.png" width="90">

  <p class="footer-links">
              <a href="main.php">Home</a>
              <a href="product.php">Products</a>
              <a href="about_us.php">About Us</a>
              <a href="contact_us.php">Contant Us</a>
              <!-- <a href="account.php">Account</a> -->
  </p>

</div>

<div class="footer-center">

  <div>
    <i class="fa fa-map-marker"></i>
    <p><span>Plot No-24,Beside Tryon Chemical(Bodat Vala) </span><span> Road,Khambhat - 388620</span> Anand, Gujarat, India.</p>
  </div>

  <div>
    <i class="fa fa-phone"></i>
    <p>+91 8347096025</p>
  </div>

  <div>
    <i class="fa fa-envelope"></i>
    <p><a href="mailto:support@company.com">chandreshska@gmail.com</a></p>
  </div>

</div>

<div class="footer-right">

  <p class="footer-company-about">
    <span>About the company</span>
    We maintain great business relations with all our customers.
  </p>

  <div class="footer-icons">

      <a href="#"><i class="fa-brands fa-facebook"></i></a>
      <a href="#"><i class="fa-brands fa-instagram"></i></a>
      <a href="#"><i class="fa-brands fa-linkedin"></i></a>
      <a href="#"><i class="fa-brands fa-twitter"></i></a>
      <a href="#"><i class="fa-brands fa-youtube"></i></a>

  </div>

</div>
<hr>
<p class="copyright">@Copyright © 2024 SKA All rights reserved</p>
</footer>
<!--------------js for toggle menu----------->
<script>
    var MenuItems = document.getElementById("MenuItems");

    MenuItems.style.maxHeight = "0px";

    function menutoggle() {
        if (MenuItems.style.maxHeight == "0px"){
            MenuItems.style.maxHeight = "200px";
        }
        else {
            MenuItems.style.maxHeight = "0px";
        }
    }
</script>
<!--------------js for toggle menu----------->
    <script>

        var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm");
        var Indicator = document.getElementById("Indicator");

            function register(){
                RegForm.style.transform = "translateX(0px)";
                LoginForm.style.transform = "translateX(0px)";
                Indicator.style.transform = "translateX(100px)";
            }

            function login(){
                RegForm.style.transform = "translateX(300px)";
                LoginForm.style.transform = "translateX(300px)";
                Indicator.style.transform = "translateX(0px)";
            }
    </script>
</body>
</html>

<?php
if(isset($_REQUEST['up']))
{
    require "database.php";
    $obj = new db();

    $username = $_REQUEST['uname'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $r = $obj->sign_up($username,$email,$password);
}
if(isset($_REQUEST['sign_In']))
{
    require "database.php";
    $obj = new db();

    $r = $obj->validate_login($_POST['Username'], $_POST['Password']);
    $adminemail = $_POST['Username'];
    $adminpassword = $_POST['Password'];
   
    if($r > 0)
    {
        if($adminemail == 'admin123@gmail.com' && $adminpassword == 'admin123')
        {
            // $_SESSION['admin'] = 'admin';
            header('Location:funda-service/admin/index.php');
            
            exit(); // Always call exit() after header redirection
        }
        else
        {
            // $_SESSION['Email'] = $r['Email'];
            $_SESSION['Username'] = $r['Username'];
            $_SESSION['id'] = $r['id'];
            header('Location:main.php');    
            exit(); // Always call exit() after ader redirection
        }   
    }    
    else
    {
        echo '<script>
        alert("Login Failed. Incorrect Username or Password");
        </script>'; 
        exit(); // Ensure the script stops after the alert
    }
}

ob_end_flush(); // Flush the output buffer
?>