<?php require 'common.php'; 
if($_GET['per']=="employer" && isset($_GET['seekerid'])){
    $sql="select jobseeker.name,jobseeker.gender,jobseeker.email,jobseeker.skillset,jobseeker.phone,jobseeker.resume,education.course,education.institute,education.passingoutyear,education.coursetype,education.specialization from jobseeker left join education on jobseeker.seekerid=education.seekerid where jobseeker.seekerid= ".$_GET['seekerid'];
    $result=mysqli_query($con,$sql);
    $details=mysqli_fetch_array($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jobsearch</title>
    <style>
    .profileimg{
        padding:5px;position:relative;min-height:200px;
    }
    .profilecontent,.educationcontent{padding:5px;position:relative;margin-top:10px;}
    .profileimg img{
               position:absolute;height:98%;margin:auto;right:0;left:0;border-radius:50%;
    }
    .profilecontainer{
        margin-top:20px;background-color:#F4F5FF;padding:40px;border-radius:5px;
    }
.nojobs{
      position:absolute;margin:auto;height:100px;width:80%;text-align:center;top:0;bottom:0;right:0;left:0;
    }
    </style>
</head>
<body>
<div class="container profilecontainer">
<div class="row">
<div class="col-md-3 profileimg">
<?php if($details['gender']=="Male"){ ?>
<img src="images/default.png" alt="" /><?php }
else{?>
<img src="images/defaultf.png" alt="" />
<?php } ?>
</div>
<div class="col-md-8  profilecontent">
<h1><?php echo $details['name'];?></h1>
<p>Email: <?php echo $details['email']; ?></p>
<p>Phone: <?php echo $details['phone']; ?></p>
</div>
</div>
<div class="row">
<div class="col-md-11  educationcontent">
<h5>Education:</h1>
<h6><?php echo $details['course']."-".$details['specialization'] ;?></h1>
<p>Institute: <?php echo $details['institute']; ?></p>
<p>Passing out year: <?php echo $details['passingoutyear']; ?></p>
<p>Course type: <?php echo $details['coursetype']; ?></p>
<p>Key skills: <?php echo $details['skillset'];?> </p>
<a class="btn btn-danger" style="margin-right:10px;color:white" target="_blank" href="<?php $str=$details['email'].'*';
$path=glob('resumes/'.$str);echo $path[0];?>">
View Resume
</a>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>