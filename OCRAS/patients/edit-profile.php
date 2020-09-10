<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$Address=$_POST['address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$gender=$_POST['gender'];

$sql=mysqli_query($con,"Update patient set fname='$fname',address='$Address',phone='$phone',email='$email',gender='$gender' where id='".$_SESSION['id']."'");
if($sql)
{
$msg="Your Profile updated Successfully";
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Patient | Edit Profile</title>
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
<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/plugins.css">
<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />


</head>
<body>
<div id="app">
<?php include('include/sidebar.php');?>
<div class="app-content">

<?php include('include/pheader.php');?>

<!-- end: TOP NAVBAR -->
<div class="main-content" >
<div class="wrap-content container" id="container">
<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8"><hr>
<h1 class="mainTitle">Patient | Edit Profile</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Patient </span>
</li>
<li class="active">
<span>Edit Profile</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 style="color: green; font-size:18px; ">
<?php if($msg) { echo htmlentities($msg);}?> </h5>
<div class="row margin-top-30">
<div class="col-lg-8 col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h5 class="panel-title">Edit Profile</h5>
</div>
<div class="panel-body">
<?php
$sql=mysqli_query($con,"select * from patient where id='".$_SESSION['id']."'");
while($data=mysqli_fetch_array($sql))
{
?>
<h4><?php echo htmlentities($data['fname']);?>'s Profile</h4>
<p><b>Profile Reg. Date: </b><?php echo htmlentities($data['regDate']);?></p>
<?php if($data['updationDate']){?>
<p><b>Profile Last Updation Date: </b><?php echo htmlentities($data['updationDate']);?></p>
<?php } ?>
<hr />													<form role="form" name="edit" method="post">


<div class="form-group">
<label for="fname">
User Name
</label>
<input type="text" name="fname" class="form-control" value="<?php echo htmlentities($data['fname']);?>" >
</div>


<div class="form-group">
<label for="address">
Address
</label>
<textarea name="address" class="form-control"><?php echo htmlentities($data['Address']);?></textarea>
</div>
<div class="form-group">
<label for="city">
Phone Number
</label>
<input type="text" name="city" class="form-control" required="required"  value="<?php echo htmlentities($data['phone']);?>" >
</div>

<div class="form-group">
<label for="gender">
Gender
</label>

<select name="gender" class="form-control" required="required" >
<option value="<?php echo htmlentities($data['gender']);?>"><?php echo htmlentities($data['gender']);?></option>
<option value="male">Male</option>
<option value="female">Female</option>
<option value="other">Other</option>
</select>

</div>

<div class="form-group">
<label for="fess">
User Email
</label>
<input type="email" name="uemail" class="form-control"  readonly="readonly"  value="<?php echo htmlentities($data['email']);?>">
<a href="change-emaild.php">Update your email id</a>
</div>
<button type="submit" name="submit" class="btn btn-o btn-primary">
Update
</button>
</form>
<?php } ?>
</div>
</div>
</div>

</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="panel panel-white">


</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- start: FOOTER -->
<?php include('include/footer.php');?>
</div>
<!-- start: MAIN JAVASCRIPTS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/modernizr/modernizr.js"></script>
<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="vendor/switchery/switchery.min.js"></script>
<!-- end: MAIN JAVASCRIPTS -->

<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="vendor/autosize/autosize.min.js"></script>
<script src="vendor/selectFx/classie.js"></script>
<script src="vendor/selectFx/selectFx.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<script src="assets/js/main.js"></script>
<!-- start: JavaScript Event Handlers for this page -->
<script src="assets/js/form-elements.js"></script>
<script>
jQuery(document).ready(function() {
Main.init();
FormElements.init();
});
</script>

</body>
</html>
