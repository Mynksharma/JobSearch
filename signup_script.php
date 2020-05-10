<?php
require 'common.php' ;
$a=$_POST['name'];
$c=$_POST['contact'];
$d=md5($_POST['password']);
$e=$_POST['email'];
$g=$_POST['gender'];
if($_GET['per']=='employer'){
$f=$_POST['company'];
$sql="SELECT empid FROM employer_details WHERE email='$e'";}
else{$sql="SELECT seekerid FROM jobseeker WHERE email='$e'";}
$row=mysqli_query($con,$sql);
if(mysqli_num_rows($row)>0){
header('Location:signup.php?per='.$_GET['per'].'&sign=0');
}
else{
    if($_GET['per']=='jobseeker'){
$sql="INSERT INTO jobseeker(email,name,password,gender,phone) VALUES ('$e','$a','$d','$g','$c')";}
else{
    $sql="INSERT INTO employer_details(email,name,password,gender,phone,company) VALUES ('$e','$a','$d','$g','$c','$f')";  
}
mysqli_query($con,$sql);
$pr=mysqli_insert_id($con);
$_SESSION['id']=$pr;
$_SESSION['email']=$_POST['email'];
if($_GET['per']=='employer'){
header("Location:employersection.php?per=employer");}
if($_GET['per']=='jobseeker'){
    header("Location:jobs.php?per=jobseeker");}
}
?>
