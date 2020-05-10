<?php require 'common.php'; 
if($_GET['per']=="jobseeker"){
    $sql="select jobseeker.name,jobseeker.email,jobseeker.skillset,jobseeker.gender,jobseeker.phone,jobseeker.resume,education.course,education.institute,education.passingoutyear,education.coursetype,education.specialization from jobseeker left join education on jobseeker.seekerid=education.seekerid where jobseeker.seekerid= ".$_SESSION['id'];
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
    <title>Document</title>
    <style>.profileimg{
        padding:5px;position:relative;min-height:200px;
    }
    .profilecontent,.educationcontent{padding:5px;position:relative;margin-top:10px;}
    .profileimg img{
               position:absolute;height:98%;margin:auto;right:0;left:0;border-radius:50%;
    }
    .featured h2{ font-family: 'Bangers';color:red;font-size:36px;}
    .profilecontainer{
        margin-top:20px;background-color:#F4F5FF;padding:40px;border-radius:5px;
    }
    .featured{
      background-color:#EEF0F0;height:400px;overflow-y:scroll;margin-top:20px;position:relative;padding:20px;margin-bottom:20px;

    }
.edit{
    position:absolute;right:10px;top:10px;cursor:pointer;
}
.nojobs{
      position:absolute;margin:auto;height:100px;width:80%;text-align:center;top:0;bottom:0;right:0;left:0;
    }
    .hidedescription{
      display:none;
    }
    </style>
    <script>
    function uploadresume(){
       var res=document.getElementById("file");
       res.click();
       res.addEventListener('change',function(event){
    document.getElementById('upbtn').disabled=true;
           document.getElementById('btunsave').style.display="inline";
           var files=event.target.files;
           var f=files[0];
    document.getElementById('filename').innerHTML=f.name;
       });
        
    }
    function cancel(){
        document.getElementById('resform').reset();
        document.getElementById('upbtn').disabled=false;
        document.getElementById('btunsave').style.display="none";
    }
    function save(){
        document.getElementById('upbtn').disabled=false;
        document.getElementById('btunsave').style.display="none";
        document.getElementById('up').click();
        document.getElementById('resform').reset();
    }
    /*function removeresume(){
        var xhttp=new XMLHttpRequest();
       xhttp.open("GET","removeresume.php",true);xhttp.send();

    }*/
    function edit2(){
        var modcontent=document.getElementById('modcontent');
      while(modcontent.firstChild){
          modcontent.removeChild(modcontent.firstChild);
      }
      var form=document.createElement('form');
      form.setAttribute('method','POST');
      form.setAttribute('action','edit.php?which=edit2');
      var div=document.createElement('div');
      div.classList.add('form-group');
      var label=document.createElement('label');
      label.innerHTML="Course: ";
      label.setAttribute('for','course');
      var input=document.createElement('input');
      input.setAttribute('type','text');input.setAttribute('name','course');
      input.setAttribute('value','<?php echo $details['course'];?>')
      input.classList.add('form-control');
      div.appendChild(label);
      div.appendChild(input);
      form.appendChild(div);
      var div=document.createElement('div');
      div.classList.add('form-group');
      var label=document.createElement('label');
      label.innerHTML="Institute: ";
      label.setAttribute('for','institute');
      var input=document.createElement('input');
      input.setAttribute('type','text');input.setAttribute('name','institute');
      input.setAttribute('value','<?php echo $details['institute'];?>')
      input.classList.add('form-control');
      div.appendChild(label);
      div.appendChild(input);
      form.appendChild(div);
      var div=document.createElement('div');
      div.classList.add('form-group');
      var label=document.createElement('label');
      label.innerHTML="Passing out year: ";
      label.setAttribute('for','pass');
      var input=document.createElement('input');
      input.setAttribute('type','text');input.setAttribute('name','pass');
      input.setAttribute('value','<?php echo $details['passingoutyear'];?>')
      input.classList.add('form-control');
      div.appendChild(label);
      div.appendChild(input);
      form.appendChild(div);
      var div=document.createElement('div');
      div.classList.add('form-group');
      var label=document.createElement('label');
      label.innerHTML="Specialization: ";
      label.setAttribute('for','specialized');
      var input=document.createElement('input');
      input.setAttribute('type','text');input.setAttribute('name','specialized');
      input.setAttribute('value','<?php echo $details['specialization'];?>')
      input.classList.add('form-control');
      div.appendChild(label);
      div.appendChild(input);
      form.appendChild(div);
      var div=document.createElement('div');
      div.classList.add('form-group');
      var label=document.createElement('label');
      label.innerHTML="Course type: (Full Time,Part Time,Correspondence)";
      label.setAttribute('for','coursetype');
      var input=document.createElement('input');
      input.setAttribute('type','text');input.setAttribute('name','coursetype');
      input.setAttribute('value','<?php echo $details['coursetype'];?>')
      input.classList.add('form-control');
      div.appendChild(label);
      div.appendChild(input);
      form.appendChild(div);
      var div=document.createElement('div');
      div.classList.add('form-group');
      var label=document.createElement('label');
      label.innerHTML="Key skills: ";
      label.setAttribute('for','skills');
      var input=document.createElement('input');
      input.setAttribute('type','text');input.setAttribute('name','skills');
      input.setAttribute('value','<?php echo $details['skillset'];?>')
      input.classList.add('form-control');
      div.appendChild(label);
      div.appendChild(input);
      form.appendChild(div);


      var submit=document.createElement('input');
      submit.setAttribute('type','submit');submit.style.display="none";submit.setAttribute('id','editsubmit1');
      form.appendChild(submit);
      modcontent.appendChild(form);
    document.getElementById('savemodalform').addEventListener('click',function(){
        submit.click();
    });
    }
    function edit1(){
      var modcontent=document.getElementById('modcontent');
      while(modcontent.firstChild){
          modcontent.removeChild(modcontent.firstChild);
      }
      var form=document.createElement('form');
      form.setAttribute('method','POST');
      form.setAttribute('action','edit.php?which=edit1');
      var div=document.createElement('div');
      div.classList.add('form-group');
      var label=document.createElement('label');
      label.innerHTML="Name: ";
      label.setAttribute('for','name');
      var input=document.createElement('input');
      input.setAttribute('type','text');input.setAttribute('name','name');
      input.setAttribute('value','<?php echo $details['name'];?>')
      input.classList.add('form-control');
      div.appendChild(label);
      div.appendChild(input);
      form.appendChild(div);
      var div=document.createElement('div');
      div.classList.add('form-group');
      var label=document.createElement('label');
      label.innerHTML="Email: ";
      label.setAttribute('for','email');
      var input=document.createElement('input');
      input.setAttribute('type','text');input.setAttribute('name','email');
      input.setAttribute('value','<?php echo $details['email'];?>')
      input.classList.add('form-control');
      div.appendChild(label);
      div.appendChild(input);
      form.appendChild(div);
      var div=document.createElement('div');
      div.classList.add('form-group');
      var label=document.createElement('label');
      label.innerHTML="Phone: ";
      label.setAttribute('for','phone');
      var input=document.createElement('input');
      input.setAttribute('type','text');input.setAttribute('name','phone');
      input.setAttribute('value','<?php echo $details['phone'];?>')
      input.classList.add('form-control');
      div.appendChild(label);
      div.appendChild(input);
      form.appendChild(div);
      var submit=document.createElement('input');
      submit.setAttribute('type','submit');submit.style.display="none";submit.setAttribute('id','editsubmit1');
      form.appendChild(submit);
      modcontent.appendChild(form);
    document.getElementById('savemodalform').addEventListener('click',function(){
        submit.click();
    });
    }
    function viewmore(event){
   event.target.parentElement.children[5].classList.toggle("hidedescription");
if(!event.target.parentElement.children[5].classList.contains("hidedescription")){
      event.target.innerHTML="View less";   
    }
    else{
      event.target.innerHTML="View more";
    }
    }
    </script>
</head>
<body>
<?php include 'includes/header1.php' ?>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" id="modcontent">
       
        </div>
        
      
        <div class="modal-footer">
        <button type="button" class="btn btn-success" id="savemodalform">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
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
<span class="fas edit"  data-toggle='modal' data-target='#myModal' onClick="edit1();">&#xf303; Edit</span>
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
<span class="fas edit"  data-toggle='modal' data-target='#myModal' onClick="edit2();">&#xf303; Edit</span>
<?php if($details['resume']==NULL) {?>
<button class="btn btn-primary" onclick="uploadresume();" id="upbtn" style="margin-right:20px;">Upload Resume</button>
<span style="display:none;" id="btunsave">
<span id="filename"></span>
<button class="btn btn-success btn-sm" style="margin-right:10px;" onclick="save();">Save</button><button class="btn btn-danger btn-sm" onclick="cancel();">Cancel</button></span>
<form action="upload.php" method="POST" enctype="multipart/form-data" id="resform"><input type="file" name="file" id="file" style="display:none;" /><input type="submit" style="display:none;" id="up" name="submit" /></form>
<?php }else{?>
<a class="btn btn-danger" style="margin-right:10px;color:white" target="_blank" href="<?php $str=$_SESSION['email'].'*';
$path=glob('resumes/'.$str);echo $path[0];?>">
View Resume
</a>
<span style="font-size:14px;color:grey;cursor:pointer;" onClick="location.href='removeresume.php';">Delete Resume</span>
<?php } ?>
</div>
</div>
</div>
<div class="container featured">
<h2 style="text-align:center">Applied Jobs</h2>
<?php   $sql2="select jobpost.jobname,jobpost.jobdescription,jobpost.skillsrequired,jobpost.jobid,jobpost.vacancy,jobpost.jobtype,employer_details.company,jobpost.joblocation,jobpost.exprequired,jobpost.lastdateapply,jobpost.salaryoffered from jobpost,employer_details,appliedjobs where jobpost.empid=employer_details.empid and appliedjobs.jobpostid=jobpost.jobid and appliedjobs.jobseekerid=".$_SESSION['id'];
  $result2=mysqli_query($con,$sql2);
 while($r=mysqli_fetch_array($result2)){ ?>
<div class="jobdiv" style="border-radius: 5px;background-color:white; padding: 10px; border: 1px solid rgb(241, 245, 241); margin-bottom: 5px;"><h4 style="color: black;"> <?php echo $r['jobname']?>  </h4><p style="color: grey; margin-bottom: 5px;"><?php echo $r['company']?></p><span class="fas" aria-hidden="true" style="color: rgb(56, 146, 232); margin-right: 10px;">&#xf555; <?php echo $r['exprequired'].' years' ?></span><span class="fas" aria-hidden="true" style="color: rgb(255, 48, 48); margin-right: 10px;">&#xf0d6; <?php echo $r['salaryoffered'].' P.A.' ?></span><span class="fas" aria-hidden="true" style="color: rgb(10, 178, 33); margin-right: 10px;">&#xf689; <?php echo $r['joblocation'] ?></span><div class="hidedescription"><h5 style="margin-top: 10px;">Job Description</h5><p style="color: grey;"><?php echo $r['jobdescription'] ?></p><p style="font-weight: bold;">Vacancy: <?php echo $r['vacancy'] ;?></p><p style="font-weight: bold;">Jobtype: <?php echo $r['jobtype'] ;?></p></div><hr><button class="btn btn-success" style="clear: both; width: 100px; margin-right: 5px;">Applied</button><span style="color: grey; font-size: 14px; cursor: pointer; float: right;" onClick="viewmore(event);" id="viewmore">View more</span></div>
 <?php } ?>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>