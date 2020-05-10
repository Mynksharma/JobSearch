<?php 

require 'common.php';$id=$_SESSION['id'];
$email=$_SESSION['email'];

if(isset($_POST['submit'])){
    $file=$_FILES['file'];
    $fileName=$_FILES['file']['name'];
    $fileTmpname=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fleType=$_FILES['file']['type'];
$fileExt=explode('.',$fileName);

$fileActualExt=strtolower(end($fileExt));

$allowed=array('jpg','jpeg','png','pdf','docx','doc');
if(in_array($fileActualExt,$allowed)){
    $fileNameNew=uniqid($email,true).".".$fileActualExt;
        $fileDestination='resumes/'.$fileNameNew;
    move_uploaded_file($fileTmpname,$fileDestination);
    $sql="Update jobseeker set resume='$fileNameNew' where seekerid='$id'";
    mysqli_query($con,$sql);
    header("location:profile.php?per=jobseeker");   
}
}?>