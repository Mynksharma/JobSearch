<?php require 'common.php';
$sql="select jobid,jobname,salaryoffered from jobpost where empid='".$_SESSION['id']."' order by issueddate desc";
$result=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet'>
    <title>JobSearch</title>
    <style>
body{margin:0;padding:0;}
#content{
    width:90%;height:500px;position:absolute;margin:auto;top:90px;right:0;left:0;background-color:#e0e0e0;padding:10px;
}
#innercontent{overflow-y:scroll;height:90%;}
.applicantsdetailsclass{
display:none;
}
.jobapplicants{
  list-style-type:none;
  margin:0;padding:0;width:98%;margin:0 auto;
}
    </style>
   
</head>
<body>
<?php include 'includes/header1.php' ?>
   <div id="content">
     <h2>Posted Jobs</h2>
     <div id='innercontent'>
     <ul style="margin:10px;padding:0;list-style-type:none;">
     <?php while($r=mysqli_fetch_array($result)){?>
    <li style="margin-bottom:10px;">
      <div style="width:90%;margin:0 auto 3px;padding:10px;border:none;clear:both;height:50px;background-color:white;border-radius:5px;">
      <span style="float:left;font-weight:bold;padding:3px;font-size:18px;"><?php echo $r['jobname'] ?></span>
      <span  style="float:left;padding:3px;color:red;font-size:18px;"><?php echo $r['salaryoffered']?> P.A.</span>
      <button class="btn btn-danger btn-sm" onClick="viewapplicants(<?php echo $r['jobid'];?>,this);" style="float:right;margin-bottom:10px;">View Applications</button>
      </div>
      <div style="clear:both;background-color:#d4d3d3;overflow-y:scroll;height:200px;width:90%;margin:0 auto;padding:10px;"  class="applicantsdetailsclass">
        <ul class="jobapplicants">
        </ul>
      </div>
    </li>
     <?php } ?>
</ul>
     </div>
   </div>
   <script>
   function viewapplicants(jobid,comp){
         var applicants=comp.parentElement.parentElement.lastElementChild;
         applicants.classList.toggle('applicantsdetailsclass');
         if(!applicants.classList.contains('applicantsdetailsclass')){
            applicants.previousElementSibling.lastElementChild.innerHTML="Hide applications";
        var xhttp=new XMLHttpRequest();
	    	xhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
				var data=this.responseText;
				var parse=JSON.parse(data);
				var ul=applicants.firstElementChild;
				var ulchild=ul.children;
				while(ul.firstChild){
					ul.removeChild(ul.firstChild);
				}
				for(let i of parse){
					var li=document.createElement("li");li.style.height="40px";li.style.padding='5px';li.style.backgroundColor="#afadd0";
          li.style.clear="both";li.style.marginBottom='5px';li.style.borderRadius="3px";
					var span=document.createElement('span');
          span.innerHTML=i['name'];
          span.style.float="left";
          span.style.fontWeight="bold";span.style.fontSize="16px";
          li.appendChild(span);
          var button=document.createElement("button");
           button.classList.add("btn");
           button.classList.add("btn-sm");
           button.classList.add("btn-success");
   button.innerHTML="View Profile";
   button.style.float="right";
   button.addEventListener('click',function(){
     window.open("showprofile.php?per=employer&seekerid="+i['seekerid']);
		});li.appendChild(button);
    ul.appendChild(li);
				}
			}
		};
       xhttp.open("GET","showapplicant.php?jobid="+jobid,true);xhttp.send();
  }
  else{
    applicants.previousElementSibling.lastElementChild.innerHTML="View applications";

  }
   }
    </script>
</body>
</html>