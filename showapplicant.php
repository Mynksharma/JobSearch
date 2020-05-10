<?php require 'common.php';
$jobid=$_GET['jobid'];
$sql="select jobseeker.name,jobseeker.seekerid from jobseeker,appliedjobs where jobseeker.seekerid=appliedjobs.jobseekerid and appliedjobs.jobpostid='$jobid'";
$res=mysqli_query($con,$sql);
$arr=array();
while($row=mysqli_fetch_array($res)){
    $arr[]=$row;
}
print_r(json_encode($arr));
?>