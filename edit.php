<?php 
require 'common.php';$user=$_SESSION['id'];
$edit=$_GET['which'];

if($edit=="edit1"){
    $sql="update jobseeker set name='".$_POST['name']."', email='".$_POST['email']."', phone='".$_POST['phone']."' where seekerid=".$user;
}
else if($edit=="edit2"){
    $sql="select edid from education where seekerid=".$_SESSION['id'];
   $query=mysqli_query($con,$sql);
   if(mysqli_num_rows($query)==0){
    $sql="insert into education(seekerid,course,institute,passingoutyear,coursetype,specialization) values(".$_SESSION['id'].",'".$_POST['course']."','".$_POST['institute']."',".$_POST['pass'].",'".$_POST['cousetype']."','".$_POST['specialized']."')";}
    else{
        $sql="update education set course='".$_POST['course']."',institute='".$_POST['institute']."',passingoutyear=".$_POST['pass']."
        ,coursetype='".$_POST['coursetype']."',specialization='".$_POST['specialized']."' where seekerid=".$_SESSION['id'];
        $sql2="update jobseeker set skillset='".$_POST['skills']."' where seekerid=".$_SESSION['id'];mysqli_query($con,$sql2);
    }
}
mysqli_query($con,$sql);
header('Location:profile.php?per=jobseeker&id='.$_SESSION['id']);
?>