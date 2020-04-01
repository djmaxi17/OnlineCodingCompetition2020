<?php
	//include header
	include "includes/header.inc.php";
	
	if(isset($_SESSION['shopId'])){
?>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><?php echo $_SESSION['shopName'];?></h1>
    <p class="lead"><?php echo $_SESSION['shopAddress'];?></p>
  </div>
</div>

<div class="container">
<div class="row">
<div class="card col-md-6" style="width: 18rem;">
  <ul class="list-group list-group-flush">
    
    <?php
    include "includes/database.inc.php";
    $shopId = $_SESSION['shopId'];
    $query = "SELECT * FROM timeslots WHERE sId = '".$shopId."';";
    $results = mysqli_query($conn, $query);
	$count =0;
    if(mysqli_num_rows($results)>0){

    	while($rows = mysqli_fetch_assoc($results)){
    		if($count ==0){
    			echo "<b>Maximum number of people supported per time slot: ".$rows['maxPeople']."</b>";
    		}
    		echo "<li class='list-group-item'>".$rows['startTime']." to ".$rows['finishTime']."</li>";
    		$count++;
    	}
	}
    ?>

  </ul>
</div>

</div>
	</div>
</div>



<?php
	}
	else{
		echo "ERROR 404";
	}

?>