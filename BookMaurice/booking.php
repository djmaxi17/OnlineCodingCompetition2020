<?php include "includes/header.inc.php"?> 
<div class ="container">
          <div class="jumbotron jumbotron-fluid">
            <div class="container">
<?php
include "includes/database.inc.php";
$querysql = "SELECT * FROM shops WHERE sId = '".$_GET['id']."';";
$result = mysqli_query($conn, $querysql);
if(mysqli_num_rows($result)>0){
  while($rows = mysqli_fetch_assoc($result)){

    ?>
      <h1 class="display-4"><?php echo $rows['sName'];?></h1>
      <p class="lead">Address : <?php echo $rows['sAddress']; ?></p>
    <?php
  }
}
?>
            </div>
            </div>  
              <h1 class="text-center"><span class="badge badge-success">Available Time Slots: </span></h1>
                <p class="text-center">Click on a time slot to make your booking!</p>
                <br/>
        <div class ="row">
            <div class="col-sm-6">
              <div class="list-group">
                  <!-- for loops -->
<?php
include "includes/database.inc.php";
$querysql = "SELECT * FROM timeslots WHERE sId = '".$_GET['id']."';";
$result = mysqli_query($conn, $querysql);
if(mysqli_num_rows($result)>0){
  while($rows = mysqli_fetch_assoc($result)){

    ?>

<a href="code.php" class="list-group-item list-group-item-action"><?php echo $rows['startTime']." to ".$rows['finishTime']?></a>
    <?php
  }
  }
?>
                </div>
            </div>
            <div class="col-sm-6">
              <div class="list-group">
                <!-- for loops -->
<?php
include "includes/database.inc.php";
$querysql = "SELECT * FROM timeslots WHERE sId = '".$_GET['id']."';";
$result = mysqli_query($conn, $querysql);
if(mysqli_num_rows($result)>0){
  while($rows = mysqli_fetch_assoc($result)){

    ?>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item list-group-item-success"><?php echo $rows['maxPeople']?> Bookings Available</li>
    <?php
  }
}
?>
                    </ul>
                </div>
            </div>
         </div>
      </div>

  </body>
