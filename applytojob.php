<?php require 'common.php';
$seekerid=$_SESSION['id'];
$jobid=$_GET['jobid'];
$apply="INSERT INTO `appliedjobs` (`jobseekerid`, `jobpostid`) VALUES ('$seekerid','$jobid')";
mysqli_query($con,$apply);
header('location:jobs.php?per=jobseeker');
?>