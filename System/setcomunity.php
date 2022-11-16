<?php
session_start();

$namecom = $_POST["stcm_btn"];
$iduser = $_SESSION["iduser"];

include 'conn.php';


$sql = "SELECT * FROM comunities WHERE name='$namecom'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

    $comid = $row["comunityid"];

  }
} else {
  echo "An error ocurred";
}


$sql = "SELECT * FROM comuuser WHERE userid='$iduser' and comid='$comid'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

    $_SESSION["idcom"] = $row["comid"];
    
    header('Location: '. '../Pages/home.php');
  }
} else {
  echo "An error ocurred";
}

mysqli_close($conn);

?>