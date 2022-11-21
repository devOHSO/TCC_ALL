<?php
session_start();

include 'conn.php';

$iduser = $_SESSION["iduser"];
$name = $_POST["namecom"];
$comid = 0;

$sql = "SELECT * FROM comunities WHERE name='$name'";
$result = mysqli_query($conn, $sql);
  
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

    $comid = $row["comunityid"];

  }
} else {
  echo 'nenhuma comunidade com esse nome foi achada';
  header('Location: '. '../Pages/home.php');
}


  $sql = "INSERT INTO comuuser (comid, type, userid)
  VALUES ('$comid', '10', '$iduser')";

  if (mysqli_query($conn, $sql)) {

    echo "nova comunidade entrada";
    header('Location: '. '../Pages/home.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

      
?>