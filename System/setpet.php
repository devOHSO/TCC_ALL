<?php
session_start();

$namepet = $_POST["stpt_btn"];
$iduser = $_SESSION["iduser"];

include 'conn.php';

$sql = "SELECT * FROM pets WHERE iduser='$iduser' and name='$namepet'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

    $_SESSION["idpet"]= $row["idpet"];
    header('Location: '. '../Pages/' . $_SESSION["previouspage"]);
  }
} else {
  echo "An error ocurred";
}

mysqli_close($conn);

echo $_SESSION["idpet"];

?>