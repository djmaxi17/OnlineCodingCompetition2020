<?php include "includes/header.inc.php";?>

<div class="container">
  <div class="row">
    <div class="col-md-12 py-5">
      <div class="mb-5 text-center">
        <h2>REGISTER AS:</h2>
        <form action="loginpage.php" method="get">
        <button type="button" onclick="clientClick()" name="client" class="btn btn-dark btn-lg"><i class="fas fa-user"></i> &nbsp; Client</button>
        <button type="button" onclick="shopClick()" class="btn btn-primary btn-lg"><i class="fas fa-user-tie"></i> &nbsp; Shop</button>
        </form>
    </div>
  </div>
  </div>

<!--shop form-->
<div id="shopform">
<h4 class="text-center"> REGISTER A SHOP</h4>
  <form name="shopf" action="includes/processshop.inc.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <input type="text" class="form-control" id="inputEmail4" name="shopname" placeholder="Name">
    </div>
    <div class="form-group col-md-6">
      <input type="email" class="form-control" id="inputPassword4" name="shopemail" placeholder="Email">
    </div>
  </div>
    <div class="form-group">
    <input type="password" class="form-control" id="inputAddress" name="shoppassword" placeholder="Password">
  </div>
    <div class="form-group">
    <input type="password" class="form-control" id="inputAddress" name="shopconfirmpwd" placeholder="Confirm Password">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="inputAddress" name="shopaddress" placeholder="Address">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <input type="text" class="form-control" id="retailspacearea" name="shopspace" placeholder="Retail Space Area">
    </div>
  <div class="form-group col-md-6">
      <input type="int" class="form-control" name="shopservicetime" placeholder="Average customer service time" id="inputZip">
    </div>
    <div class="form-group col-md-6">
      Opening Time <input type="time" class="form-control" name="shopstarttime" id="inputZip">
    </div>
    <div class="form-group col-md-6">
      Closing Time <input type="time" class="form-control" name="shopclosetime" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        I read and agree to the <a href="#">Terms & Conditions</a>
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="submit_shop">Sign in</button>
</form>
</div>
<!--shop form-->
<div id="clientform">
<h4 class="text-center"> REGISTER A CLIENT</h4>
  <form name="customerf" action="includes/processclient.inc.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <input type="text" class="form-control" id="clientfname" name="clientfname" placeholder="First Name">
    </div>
        <div class="form-group col-md-6">
      <input type="text" class="form-control" id="clientlname" name="clientlname" placeholder="Last Name">
    </div>
    <div class="form-group col-md-12">
      <input type="email" class="form-control" id="inputPassword4" name="clientemail" placeholder="Email">
    </div>
  </div>
    <div class="form-group">
    <input type="password" class="form-control" id="inputAddress" name="clientpassword" placeholder="Password">
  </div>
    <div class="form-group">
    <input type="password" class="form-control" id="inputAddress" name="clientconfirmpassword" placeholder="Confirm Password">
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        I read and agree to the <a href="#">Terms & Conditions</a>
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="submit_client">Sign in</button>
</form>
</div>
</div>

<script>
  var getClient = document.getElementById("clientform");
  var getShop = document.getElementById("shopform");
  function clientClick(){
    getShop.style.display = "none";
    getClient.style.display = "block";
  }
  function shopClick(){
    getClient.style.display = "none";
    getShop.style.display = "block";

  }
</script>