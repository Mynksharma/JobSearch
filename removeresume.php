<?php
require 'common.php';
$sql="Update jobseeker set resume=NULL where seekerid=".$_SESSION['id'];
mysqli_query($con,$sql);
$str=$_SESSION['email']."*";
$path=glob("resumes/".$str);
if(!unlink($path[0])){
    echo 'error';
}
else{
    header('location:profile.php?per=jobseeker&id='.$_SESSION['id']);
}

?>