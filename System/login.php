<?php
session_start();


$email = $_POST["inp_email"];
$vpassword = $_POST["inp_password"];

include 'conn.php';

$sql = "SELECT * FROM contas WHERE email='$email'";
$result = mysqli_query($conn, $sql);
  
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

    if($vpassword == $row["userpassword"]){
      //echo "email: " . $row["email"]. " - password: " . $row["userpassword"]. "<br>";
      
      $_SESSION["iduser"] = $row["iduser"];
      $_SESSION["idpet"] = 0;
      $_SESSION["idcom"] = 0;

      $_SESSION['name'] = $row["name"];
      echo $_SESSION['name']. "<br>";
      
      $_SESSION['nickname'] = $row["nickname"];
      echo $_SESSION['nickname']. "<br>";

      $_SESSION['email'] = $row["email"];
      echo $_SESSION['email']. "<br>";

      $_SESSION['userpassword'] = $row["userpassword"];
      echo $_SESSION['userpassword']. "<br>";

      $_SESSION['extimg'] = $row["extimg"];
      echo $_SESSION['extimg']. "<br>";

      header('Location: '. '../Pages/home.php');
      
    }

  }
} else {
  //perguntar se a pessoa quer criar uma conta apartir dos dados inseridos
  header('Location: '. '../index.php');
  
}

mysqli_close($conn);
?>