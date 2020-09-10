<?php
session_start();
error_reporting(0);
include("include/config.php");

if(isset($_POST['submit']))
{
$ret=mysqli_query($con,"SELECT * FROM patient WHERE email='".$_POST['username']."' ");
$num=mysqli_fetch_array($ret);
if($num>0){
$password_hash =$row['password'];

$extra="check-result.php";//
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$status=1;
// For storing log if user login successfull
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
// For storing log if user login unsuccessfull
$_SESSION['login']=$_POST['username'];
$status=0;
$_SESSION['errmsg']="Invalid username or password";
$extra="patient-login.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Patient-Login</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta content="" name="description" />
<meta content="" name="author" />
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">

<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/plugins.css">
<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
</head>
<body class="login">
<div class="row">
<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
<div class="logo margin-top-30">
<h3> OCRAS | Registered Patients </h3>
</div>

<div class="box-login">
<form class="form-login" method="post">
<fieldset>
<legend>
Patient Login
</legend>
<p>
Please enter your name and password to log in.<br />
<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
</p>
<div class="form-group">
<span class="input-icon">
<input type="text" class="form-control" name="username" placeholder="Username">
<i class="fa fa-user"></i> </span>
</div>
<div class="form-group form-actions">
<span class="input-icon">
<input type="password" class="form-control password" name="password" placeholder="Password">
<i class="fa fa-lock"></i>
 </span><a href="forgot-password.php">
Forgot Password ?
</a>
</div>
<div class="form-actions">

<button type="submit" class="btn btn-primary pull-right" name="submit">
Login <i class="fa fa-arrow-circle-right"></i>
</button>
<a href="../index.php" class="btn btn-default">Cancel</a>
</div>

</fieldset>
</form>

<div class="copyright">
&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> OCRAS</span>. <span>All rights reserved</span>
</div>
</div>
</div>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/modernizr/modernizr.js"></script>
<script src="vendor/jquery-cookie/jquery.cookie.js"></script>

<script src="vendor/switchery/switchery.min.js"></script>
<script src="vendor/jquery-validation/jquery.validate.min.js"></script>

<script src="assets/js/main.js"></script>

<script src="assets/js/login.js"></script>
<script>
jQuery(document).ready(function() {
Main.init();
Login.init();
});
</script>

<style>
body{
background-image:url("/OCRAS/images/headerlogo/background3.jpg");
background-size:100vw 100vh;
background-attachment: fixed;
}
</style>
</body>
<!-- end: BODY -->
</html>
