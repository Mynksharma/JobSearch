<?php require 'common.php';
$as=(isset($_GET['login']) ? $_GET['login'] : '');
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
    <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1">	
	<script>
function messag(){
	var a=<?php echo $as; ?>;
if(a==0){alert("Enter valid email or password");}}
	</script>
<style>
.login{
 border:1px solid #E2E5FE;
}
.heading{
    background-color:#1F32D8;
    color:white;padding:20px;
}
.body{
    padding:10px;
}
.footer{
    background-color:#C6CBF1;padding:10px;
}
.ab{
    margin-top:20px;
}
</style>
</head>
<body onLoad="messag();">
<?php  include 'includes/header1.php'; ?>
 <div class="container ab">
 <div class="row">
 <div class="col-md-8 col-lg-5 offset-lg-4 offset-md-2">
 <div class="login">
 <div class="heading"><h2>LOGIN</h2></div>
 <div class="body">
 <?php if($person=="jobseeker"){?>
<p>Login to apply for jobs</p><?php }?>
<?php if($person=="employer"){?>
<p>Login to find job applicants</p><?php }?>
 <form method="POST" action="login_submit.php?per=<?php echo $person;?>">
 <div class="form-group">
 <input type="email" class="form-control" placeholder="Email" name="email" required /></div>
 <div class="form-group">
 <input type="password" class="form-control" placeholder="Password" name="password" required /></div>
<div class="form-group"> <input type="submit" class="btn btn-primary" value="Submit"/></div>
 </form></div>
 <div class="footer" >Don't have an account?<a href="signup.php?per=<?php echo $person ?>" style="color:red;"> Register</a></div>
 </div></div>
 </div>
 </div>

 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 </body></html>