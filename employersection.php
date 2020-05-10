<?php require 'common.php';
$sql="select name,email,company from employer_details where empid=".$_SESSION['id'];
$result=mysqli_query($con,$sql);
$r=mysqli_fetch_row($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>JobSearch</title>
    <style>
body{margin:0;padding:0;}
#Brand{font-family: 'Pacifico','cursive';color:white;font-size:30px;}
.columnstyle{padding:20px;font-family: 'Pacifico','cursive';}
.columnstyle:hover{background-color:rgba(255, 160, 122,0.7)}
.columndiv{background-color:#e6b0d2;height:200px;width:100%;position:relative;border-radius:5px;cursor:pointer;}
.columndivinner{position:absolute;margin:auto;top:0;bottom:0;left:0;right:0;width:200px;height:50px;text-align:center;}
#brandname{padding-top:10px;padding-bottom:10px;}
#brandname h1{font-family:'Pacifico','cursive'}
#resname{margin-bottom:10px;margin-top:20px;border-radius:50px;}
#resnamerow{background-color:#dee9fb;width:90%;margin:0 auto;border-radius:5px;}
    </style>
</head>
<body>
<?php include 'includes/header1.php' ?>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="modal-head"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" id="modcontent">
       
        </div>
        <div class="modal-footer" id="modfooter">
        <button type="button" class="btn btn-success" id="savemodalform">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  <div id="resname">
 <div class="row" id="resnamerow">
 <div class="col-lg-2 col-sm-4 col-xs-12" style="padding-top:10px;padding-bottom:10px;">
 <img src="images/default.png" alt="" style="width:150px;height:150px;">
 </div>
 <div class="col-lg-10  col-sm-8 col-xs-12" id="brandname">
 <div style="float:left;">
 <h1><?php echo $r[0]; ?></h1>
<p style="margin:0;"><i>Company:</i><span style="color:red;font-weight:bold;margin-left:5px;"><?php echo $r[2]; ?></span></p>
<p style="margin:0;"><i>Mail:</i><span style="color:red;font-weight:bold;margin-left:5px;"><?php echo $r[1]; ?></span></p>
 </div>
 </div></div></div>
<div class="container">
<div class="row" id="row1">
</div>
</div>
</div>
<script>
var row1=document.getElementById('row1');
for(let i=0;i<2;i++){
var col=document.createElement('div');
col.classList.add('columnstyle');
col.classList.add('col-lg-6');
col.classList.add('col-sm-6');
col.setAttribute('data-toggle','modal');
col.setAttribute('data-target','#myModal');
var col_div=document.createElement('div');
col_div.classList.add('columndiv');
col_div_inner=document.createElement('div');
col_div_inner.classList.add('columndivinner');
col_div.appendChild(col_div_inner);
var h5=document.createElement('h5');
col_div_inner.appendChild(h5);
col.appendChild(col_div);
switch(i){
   case 0: row1.appendChild(col);
   col.addEventListener('click',additem);
    h5.innerHTML="Post new job";break;
    case 1:row1.appendChild(col);col.addEventListener("click",function(){location.href="viewapplicants.php?per=employer";});
    h5.innerHTML="View posted jobs & applicants";break;
}
}
function additem(){
  var modcontent=document.getElementById('modcontent');
  document.getElementById('modal-head').innerHTML="Add new Job";
    modcontent.style.height="initial";
    document.getElementById('modfooter').style.display="initial";
      while(modcontent.firstChild){
          modcontent.removeChild(modcontent.firstChild);
      }
      var form=document.createElement('form');
      form.style.height="400px";
      form.style.overflowY="scroll";
      form.setAttribute('method','GET');
      form.setAttribute('action','addnewjob.php');
      var formitems=[{name:'job',field:'Job Designation'},{name:'location',field:'Location'},{name:'description',field:'Job Description'},{name:'salary',field:'Salary'},{name:'vacancy',field:'Vacancy'},{name:'type',field:'Job type[Full-Time,Internship,Fresher]'},{name:'experience',field:'Experience'},{name:'lastdate',field:'Last Date to apply'},{name:'skills',field:'Skills required'}];
      for(var j of formitems){
        var div=document.createElement('div');
      div.classList.add('form-group');
      var label=document.createElement('label');
      label.innerHTML=j.field;
      label.setAttribute('for','name');
      var input=document.createElement('input');
      if(j.name!='lastdate')
      input.setAttribute('type','text');
      else       input.setAttribute('type','date');
      input.setAttribute('name',j.name);
      input.classList.add('form-control');
      div.appendChild(label);
      div.appendChild(input);
      form.appendChild(div);
      }
      var submit=document.createElement('input');
      submit.setAttribute('type','submit');submit.style.display="none";submit.setAttribute('id','editsubmit1');
      form.appendChild(submit);
      modcontent.appendChild(form);
    document.getElementById('savemodalform').addEventListener('click',function(){
        submit.click();
    });
  
}
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>