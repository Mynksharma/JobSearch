<?php 
require 'common.php';$user=$_SESSION['id'];
$jobname=$_GET['job'];
$loc=$_GET['location'];
$desc=$_GET['description'];
$sal=$_GET['salary'];
$vac=$_GET['vacancy'];
$type=$_GET['type'];
$exp=$_GET['experience'];
$date=$_GET['lastdate'];
$skills=$_GET['skills'];

$sql="insert into jobpost(jobname,joblocation,salaryoffered,skillsrequired,jobdescription,vacancy,lastdateapply,exprequired,jobtype,empid,issueddate) values('$jobname','$loc','$sal','$skills','$desc','$vac','$date','$exp','$type','$user',CURDATE())";
mysqli_query($con,$sql);
header('location:employersection.php?per=employer');
?>