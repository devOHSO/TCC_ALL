<?php

include 'conn.php';

$idpet = $_SESSION["idpet"];
$idcomunity = $_SESSION["idcom"]; 


$sql = "SELECT * FROM posts WHERE idpet='$idpet' and comunity='$idcomunity' ORDER BY idpost DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {
    $idpost = $row["idpost"];

    if($row["img"] == 1){
      ?>
      <h1>
        <?php   
        echo $row["title"];
        ?>
      </h1><br>  
      <h3>
        <img src='../Postimages/<?php echo $row["idpost"] . $row["imgext"]; ?>' width='70%' height='auto' alt='ocorreu um erro'>
      </h3><br> 
      <h4>
        <?php echo $row["caption"] ?>
      </h4><br>
      <?php
      if($row["coments"] == 1){
      ?>
      Comente:
      <form action="../System/coment.php" method="post">
      <input type='text' name='com_inp' id='com_inp'>
      <input type="submit" name='num_inp' value="<?php echo $row['idpost']; ?>">
      <input type='submit' name='com_btn' value="Enviar">
      </form><Br>
      <?php
      include "getcoments.php";
      }
      ?>
      <div class='bar'></div>
      <?php
  
    }elseif($row["video"] == 1){
      ?>
      <h1>
        <?php
        echo $row["title"];
        ?>
      </h1><br>  
      <h3>
        <video controls><source src='../Postvideos/<?php echo $row["idpost"];?>.mp4' type='video/mp4'></video>
      </h3><br> 
      <h4>
        <?php echo $row["caption"] ?>
      </h4><br>
      <?php
      if($row["coments"] == 1){
      ?>
      Comente:
      <form action="../System/coment.php" method="post">
      <input type='text' name='com_inp' id='com_inp'>
      <input type="submit" name='num_inp' value="<?php echo $row['idpost']; ?>">
      <input type='submit' name='com_btn' value="Enviar">
      </form><Br>
      <?php
      include "getcoments.php";
      }
      ?>
      <div class='bar'></div>
      <?php

    }else{
      ?>
      <h1>
        <?php
        echo $row["title"];
        ?>
      </h1><br>  
      <h3>
        <?php
        echo $row["content"];
        ?>
      </h3><br> 
      <h4>
        <?php echo $row["caption"] ?>
      </h4><br>
      <?php
      if($row["coments"] == 1){
      ?>
      Comente:
      <form action="../System/coment.php" method="post">
      <input type='text' name='com_inp' id='com_inp'>
      <input type="submit" name='num_inp' value="<?php echo $row['idpost']; ?>">
      <input type='submit' name='com_btn' value="Enviar">
      </form><Br>
      <?php
      include "getcoments.php";
      }
      ?>
      <div class='bar'></div>
      <?php

    }
  }
} else {
  echo "<br> Ocorreu um erro, não há mais posts";
}

?>