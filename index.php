<?php require 'common.php';
if(isset($_SESSION['id']) && ($_GET['per']=="jobseeker")){header("location:jobs.php?per=jobseeker");}
if(isset($_SESSION['id']) && ($_GET['per']=="employer")){header("location:employersection.php?per=employer");}
$sql="select jobpost.jobname,jobpost.salaryoffered from jobpost order by jobpost.salaryoffered desc LIMIT 2";
$result=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JobSearch</title>
    <style>
    body{
            margin:0;padding:0;overflow-x:hidden;}
            .para h2,.featured h2{ font-family: 'Bangers';color:red;font-size:36px;}
            .conhead{font-family: 'Bangers';word-spacing:5px;letter-spacing:4px;}
            .navb{background-color:#FFE50D;}
    .banner-image{
    background: url(images/banner.jpg) no-repeat center center; background-size: cover;  
color: #f8f8f8;
height:500px;
}
.banner-content{
    background-color:rgba(0,0,0,0.7);height:500px;width:100%;position:relative;
    color:white;
}
.banner-content h1{
    margin:auto;position:absolute;top:-100px;bottom:0;left:0;right:0;display:block;height:40px;width:100%;text-align:center;
    } 
    .banner-content form{margin:auto;
    position:absolute;top:100px;left:0;right:0;bottom:0;text-align:center;height:50px;color:black;font-size:20px;
    }
    .inp{border-radius:5px;padding:10px;border:none;margin-right:10px;width:30%;vertical-align:middle;}
    .para{text-align:center;padding:20px;}
    .para p{
        color:#A2A7A7;margin-top:10px;margin-bottom:20px;
    }
    .featured{
        background-color:#EEF0F0;text-align:center;min-height:200px;margin-top:20px;position:relative;padding:20px;
    }
    .featured-seemore{position:absolute;margin:auto;left:0;bottom:10px;right:0;height:50px;}
    </style>
</head>

<body>
<?php include 'includes/header1.php' ?>
<div class="banner-image">
<div class="banner-content">
<h1 class="conhead">Find your dream job!</h1>
<form id="formm" action="javascript:void(0);">
<select class="inp">
<option value="" disabled selected >Job types</option>
<option value="Full-Time">Full-Time</option>
<option value="Internship">Internship</option>
<option value="Fresher">Fresher</option>
</select>
<select class="inp">
<option value="" disabled selected>City or State</option>
<option value="Delhi">Delhi</option>
<option value="Mumbai">Mumbai</option>
<option value="Bangalore">Bangalore</option>
</select>
<button class="btn btn-danger btn-lg" onClick="search();">Search</button>
</form>
</div>
</div>
<div class="container para">
<h2>
Welcome to Job Search
</h2>
<p>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
</p>
<button type="button" class="btn btn-primary btn-lg" onClick="location.href='login.php?per=employer'">Employers/Recruiters</button>
</div>
<div class="container-fluid featured">
<h2>Featured Jobs</h2>
<div class="container featured">
<div>
<ul style="margin:0;padding:0;list-style-type:none;">
<?php while($row=mysqli_fetch_array($result)){ ?>
    <li style="width:90%;margin:0 auto 10px;padding:5px;border:none;clear:both;height:50px;background-color:white;">
      <span style="float:left;font-weight:bold;padding:3px;font-size:18px;"><?php echo $row['jobname']?></span>
      <span  style="float:left;padding:3px;color:red;font-size:18px;"><?php echo $row['salaryoffered']?> P.A.</span>
      <button class="btn btn-success" onClick="location.href='login.php?per=jobseeker'" style="float:right;">Apply</button>
    </li>
<?php }   ?>
</ul>
</div>
<button type="button" class="btn btn-primary btn-lg featured-seemore"  onClick="location.href='jobs.php'">See more</button>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
function search(){
    var one=document.getElementsByClassName('inp')[0].value;
    var two=document.getElementsByClassName('inp')[1].value;
     if(one && two){
   location.href="jobs.php?type="+one+"&loc="+two;
    }
    else if(one){
        location.href="jobs.php?type="+one;

    }
    else if(two){
        location.href="jobs.php?loc="+two;

    }}
</script>
</body>
</html>