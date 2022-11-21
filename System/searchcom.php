<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <title>procurando comunidades</title>
</head>
<body>

<div class="smallbackground">

  Comunidades<br>

<?php

$comname = $_POST["inp_name"];

include 'conn.php';


$sql = "SELECT * FROM comunities WHERE name='$comname'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row

  while($row = mysqli_fetch_assoc($result)) {
    
    ?>
   
<div class="comunit">
      <form action="entercomunity.php" method="POST">
        <label ><?php  echo $row['name']; ?></label><br>
        <input type="text" name="namecom" value="<?php  echo $row['name']; ?>">
        <?php  echo $row['description']; ?>
        <input type="submit" value="Ingressar">
      </form>
</div>

<?php
  }
} else {
  echo "0 results";
}

mysqli_close($conn);

?>

</div>
  
</body>
</html>