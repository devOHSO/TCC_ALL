<?php

include 'conn.php';

$sql = "SELECT * FROM coments WHERE idpost='$idpost' ORDER BY idcome DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

    ?>
    <h4><?php echo $row["content"];?></h4>
    <?php
    
  }
}
?>