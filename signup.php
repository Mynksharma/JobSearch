<?php require 'common.php' ; 
$person=(isset($_GET['per']) ? $_GET['per'] : '');
if($person=="employer"){
    if(isset($_SESSION['email'])){header('location:employersection.php?per=employer');}
}
if($person=="jobseeker"){
    if(isset($_SESSION['email'])){header('location:jobs.php?per=jobseeker');}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	.ab{padding-top:50px;}	
	</style>
		<?php $as=(isset($_GET['sign']) ? $_GET['sign'] : '');?>
	<script>
function messag(){
	var a=<?php echo $as; ?>;
if(a==0){alert("Email id already Registered");}}
	</script>
</head>
<body onLoad="messag();">
<?php include 'includes/header1.php' ;?>
 <div class="container ab">
 <div class="row">
 <div class=" col-md-8 offset-md-2 col-lg-4 offset-lg-4">
 <h1><b>SIGN UP</b></h1><?php if($person=="jobseeker"){?><p>For jobseekers</p><?php } if($person=="employer"){?>
 <p>For employers</p><?php } ?>

 <form method="POST" action="signup_script.php?per=<?php echo $person;?>">

 <div class="form-group">
 <input type="text" class="form-control" placeholder="Name" name="name"  required /></div>
 <div class="form-group">
 <input type="email" class="form-control" placeholder="Email" name="email"   required /></div>
  <div class="form-group">
 <input type="password" class="form-control" placeholder="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Must contain at least one number,one uppercase and lowercase letter, and at least 5 or more characters" required /></div>
 <div class="form-group">
 <input type="tel" class="form-control" placeholder="Contact" name="contact" pattern="[0-9]{10}" title="Enter 10-digit phone no. e.g.-9971099999" required /></div>
 <?php if($person=="employer"){?>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="Company" name="company" required /></div><?php } ?>
 <div class="form-group">
<select class="form-control" name="gender">
<option value="" disabled selected>Gender</option>
<option value="Male">Male</option><option value="Female">Female</option>
</select>
    </div>
<div class="form-group"> <input type="submit" class="btn btn-primary" value="Submit"/></div></form></div></div></div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 </body></html>