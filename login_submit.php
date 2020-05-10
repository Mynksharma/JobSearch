<?php 
require 'common.php';
if($_SERVER['REQUEST_METHOD']=="POST"){
$email=$_POST['email'];
$password=md5($_POST['password']);
if($_GET['per']=='jobseeker'){
$sql="SELECT seekerid,email FROM jobseeker WHERE email='$email' AND password='$password'";  }
else{
    $sql="SELECT empid,email FROM employer_details WHERE email='$email' AND password='$password'"; 
}
$query=mysqli_query($con,$sql);
if(!$query){die("connection failed:".mysqli_error());}
if(mysqli_num_rows($query)==0){
    if($_GET['per']=='jobseeker'){
header('location:login.php?login=0&per=jobseeker');}
else if($_GET['per']=='employer'){
    header('location:login.php?login=0&per=employer');}
}
else{
    $row=mysqli_fetch_array($query);
    if($_GET['per']=='jobseeker'){
	$_SESSION['id']= $row['seekerid'];
	$_SESSION['email']= $row['email'];
    header('Location:jobs.php?per=jobseeker');}

    else if($_GET['per']=='employer'){
        $_SESSION['id']= $row['empid'];
        $_SESSION['email']= $row['email'];
        header('Location:employersection.php?per=employer');
    }
}}
?>