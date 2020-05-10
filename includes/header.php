<div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="index.php" style="font-family: 'Bangers';color:red;font-size:36px;">JobSearch</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
					<?php
                        if(isset($_SESSION['email'])){
                              ?>	 <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
                        <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>   
						<?php }
                             else{ ?>
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Login
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
          <li  class="nav-item"><a href="signup.php" class="nav-link"><span class="glyphicon glyphicon-book"></span> About us</a></li>
					 <li  class="nav-item"><a href="jobs.php" class="nav-link"><span class="glyphicon glyphicon-user"></span> Jobs</a></li>
                        <li  class="nav-item"><a href="about.php" class="nav-link"><span class="glyphicon glyphicon-book"></span> About us</a></li>
                          <?php
                                   }
                               ?>
                    </ul>
                </div>
            </div>
 </div>