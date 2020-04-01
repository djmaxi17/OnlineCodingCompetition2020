<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script type="text/javascript" src="js/jquery.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<title>BookMaurice</title>
	<link rel="icon" href="images/logo.png">
</head>
<body>
<header id="mainheader">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">
  	<img src="images/logo.png" class="img-fluid" width="40" height="40">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>

    <form class="form-inline my-2 my-lg-0">
      <?php if(isset($_SESSION['customerId']) || isset($_SESSION['shopId'])){

          echo "<a class='nav-link' href='includes/logout.inc.php' id='displogin'>Log Out</a>";

        }else {

          echo "<a class='nav-link ' href='#' id='displogin'>Log In</a>";
        }
        ?>
      	<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</header>
<div id="popuplogin">
<div id="loginpopupcard" class="card border-primary mb-3" style="max-width: 30rem;">
  <div class="card-header text-center">
    <img src="images/logo.png" class="img-fluid" width="50"height="50">
    <spam class="float-right" id="closepopuplogin" style="font-size: 25px; cursor: pointer;">&#120;</spam>
  </div>
  <div class="card-body text-center">
    <h5 class="card-title">Log Into Your Account</h5>
    <div class="form-input">
      <form name="FrmLogin" action="includes/processlogin.inc.php" method="POST"> 
        <input type="email" class="form-control" name="email" id="emailfield" placeholder="Email">
        <br>
        <input type="password" class="form-control" name="password" id="passwordfield" placeholder="Password">
        <br>
        Customer<input type="radio" class="form-control-radio" name="type" value="Customer"> 
        <br>
        Supermarket / Shop<input type="radio" class="form-control-radio" name="type" value="Supermarket / Shop"> 
        <br> <br>
        <button type="submit" id="loginbutton" name="loginbutton" class="btn btn-danger btn-block">Sign in</button>
        <hr>
        <p style="font-size:12px;"><b>New To BookMaurice? <a href="loginpage.php"> SIGN UP!</a></b></p>
    </div>
    </form>

    <?php

      if (isset($_SESSION['customerId'])) {

        echo "<h4>" . ($_SESSION['customerFirstName']) . ($_SESSION['customerLastName']) . "</h4>";

      } 


      if (isset($_SESSION['shopId'])){

           echo "<h4>" . ($_SESSION['shopName']) . "</h4>";
      }

    ?>
  </div>
</div>
</div>
<?php
$_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];
?>
