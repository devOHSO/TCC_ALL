<?php
session_start();
?>
<?php
//<!--img	video	caption	idpet	date	coments	likes	views	content	title-->
$title = $_POST["inp_title"];
$content = $_POST["inp_content"];
if (isset($_POST["inp_coments"])){
    $coments = $_POST["inp_coments"];
}else{
    $coments = '';
}
$comentsbool = false;
$date = date("y/m/d");
$idpet = $_SESSION["idpet"]; //fazer
$idcom = $_SESSION["idcom"];
$caption = $_POST["inp_caption"];
$video = $_FILES["inp_video"];
$videobool = false;
$img = $_FILES["inp_img"];
$imgbool = false;
$imgext = strtolower(substr($_FILES['inp_img']['name'],-4));

if($coments == "on"){
    $comentsbool = true;
}else{
    $comentsbool = false;
}

if($_FILES['inp_video']['name'] != ""){
    $videobool = 1;
}else{
    $videobool = 0;
}

if($_FILES['inp_img']['name'] != ""){
    $imgbool = 1;
}else{
    $imgbool = 0;
}


include "conn.php";

$sql = "INSERT INTO posts (title, content, coments, date, caption, video, img, imgext, idpet, comunity)
VALUES ('$title', '$content', '$comentsbool', '$date', '$caption', '$videobool', '$imgbool', '$imgext', $idpet, $idcom)"; /*$iduser,*/

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";

  include "conn.php";

$sql = "SELECT * FROM posts WHERE idpet='$idpet' ORDER BY idpost ASC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $idpost = $row["idpost"];
  }
}


  $_FILES['video'] = $_FILES["inp_video"];

  $_FILES['img'] = $_FILES["inp_img"];


  include 'upimg.php';
  upimg('Postimages', $idpost); 
  include 'upvid.php';

  echo $idpost;
  
  header('Location: '. '../Pages/home.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>