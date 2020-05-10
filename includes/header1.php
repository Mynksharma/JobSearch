<nav class="navbar navbar-expand-lg navbar-light bg-light">
<?php if(!isset($_SESSION['id'])){?>
  <a class="navbar-brand" href="index.php" style="font-family: 'Bangers';color:red;font-size:30px;">JobSearch</a>
<?php } else{?>
<?php if($_GET['per']=='jobseeker'){?> 
  <a class="navbar-brand" href="jobs.php?per=jobseeker" style="font-family: 'Bangers';color:red;font-size:30px;">JobSearch</a>
<?php } ?>
<?php if($_GET['per']=='employer'){?> 
  <a class="navbar-brand" href="employersection.php?per=employer" style="font-family: 'Bangers';color:red;font-size:30px;">JobSearch</a>
<?php }} ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-lg-end" id="navbarNavDropdown" style="padding-right:70px;">
    <ul class="navbar-nav">
    <?php if(!isset($_SESSION['id'])){?>
      <li class="nav-item">
        <a class="nav-link" href="jobs.php"> Jobs</a>
    </li> <?php } else{?>
      <li class="nav-item">
      <?php if($_GET['per']=='jobseeker'){?>
        <a class="nav-link" href="jobs.php?per=jobseeker">Home</a>
    <?php } if($_GET['per']=='employer'){?>
        <a class="nav-link" href="employersection.php?per=employer">Home</a>
    <?php } }?>
      <?php if(!isset($_SESSION['id'])){?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownloginLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > Login</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="login.php?per=jobseeker"> As Jobseeker</a>
          <a class="dropdown-item" href="login.php?per=employer"> As Employer</a>
        </div>
      </li><?php } else{ if($_GET['per']=='jobseeker'){?>
        <li class="nav-item">
        <a class="nav-link" href="profile.php?per=jobseeker&id=<?php echo $_SESSION['id']; ?>"> My profile</a>
      </li>
      <?php } }?>
      <?php if(!isset($_SESSION['id'])){?>
      <li class="nav-item dropdown dropdown-menu-left">
        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownsignupLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Signup
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="signup.php?per=jobseeker"> As Jobseeker</a>
          <a class="dropdown-item" href="signup.php?per=employer"> As Employer</a>
        </div>
      </li><?php }else{?>
        <li class="nav-item">
        <a class="nav-link" href="logout.php"> Logout</a>
      </li>
      <?php } ?>
    </ul>
  </div>
</nav>