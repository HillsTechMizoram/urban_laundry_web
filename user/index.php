<?php
session_start();
error_reporting(0);
include('include/dbconnection.php');

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $query = mysqli_query($con, "select ID from tbluser where  Email='$email' && Password='$password' ");
  $ret = mysqli_fetch_array($query);
  if ($ret > 0) {
    $_SESSION['lduid'] = $ret['ID'];
    header('location:dashboard.php');
  } else {
    $msg = "Invalid Details.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Urban Laundry User Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./assets/vendors/login/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./assets/vendors/login/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./assets/vendors/login/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./assets/vendors/login/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./assets/vendors/login/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./assets/vendors/login/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!--===============================================================================================-->
</head>

<body>

  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                echo $msg;
                                                              }  ?> </p>
        <form class="login100-form validate-form" action="" name="login" method="post">
          <span class="login100-form-title p-b-26">
            User Login
          </span>
          <span class="login100-form-title p-b-48">
            <i class="zmdi zmdi-font"></i>
          </span>

          <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
            <input class="input100" type="text" name="email" id="email" required>
            <span class="focus-input100" data-placeholder="Email"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <span class="btn-show-pass">
              <i class="zmdi zmdi-eye"></i>
            </span>
            <input class="input100" type="password" name="password" id="password" required>
            <span class="focus-input100" data-placeholder="Password"></span>
          </div>

          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn" name="login" value="login">
                Login
              </button>
            </div>
          </div>

          <div class="text-center">
            <a class="d-block small mt-3" href="register.php">New User Register!! </a>
            <a class="d-block small" href="forget-password.php">Forgot Password?</a>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div id="dropDownSelect1"></div>

  <!--===============================================================================================-->
  <script src="./assets/vendors/login/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="./assets/vendors/login/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script src="./assets/vendors/login/bootstrap/js/popper.js"></script>
  <script src="./assets/vendors/login/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="./assets/vendors/login/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="./assets/vendors/login/daterangepicker/moment.min.js"></script>
  <script src="./assets/vendors/login/daterangepicker/daterangepicker.js"></script>
  <!--===============================================================================================-->
  <script src="./assets/vendors/login/countdowntime/countdowntime.js"></script>
  <!--===============================================================================================-->
  <script src="js/main.js"></script>

  <!-- Bootstrap core JavaScript-->
  <script src="./assets/vendors/jquery/jquery.min.js"></script>
  <script src="./assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="./assets/vendors/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>