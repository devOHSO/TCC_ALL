<?php

$comname = $_POST["inp_name"];

include 'conn.php';

$sql = "SELECT * FROM comunities WHERE name='$comname'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "aqui aparecerão";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);

?>