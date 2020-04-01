<?php include "includes/header.inc.php";?>
<section>
<?php
include "includes/database.inc.php";
$query = "SELECT * FROM shops;";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result)>0){
  while($rows = mysqli_fetch_assoc($result)){
    $supermarketName =$rows['sName'];
    $superId = $rows['sId'];


    echo "<a href='booking.php?id=" . $superId . "'>";
    echo "<img src='images/intermarche.jpg' width='200' height='200'>";
    echo "<div> <h3>  " . $supermarketName . "</h3></div>";
    echo  "</a>"; 
    

  }
}

?>
</section>