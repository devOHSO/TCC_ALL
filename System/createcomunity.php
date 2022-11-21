<?php
session_start();

$iduser = $_SESSION["iduser"];
$newname = $_POST["inp_name"];
$date = date("y/m/d");
$description = $_POST["inp_description"];
$img = $_FILES["inp_img"];

include "conn.php";

$sql = "INSERT INTO comunities (creator, name, data, description)
VALUES ('$iduser', '$newname', '$date', '$description')";

if (mysqli_query($conn, $sql)) {
    
    include "conn.php";

    $sql = "SELECT * FROM comunities WHERE creator='$iduser' AND name='$newname'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $comid = $row["comunityid"];

        $sql = "INSERT INTO comuuser (comid, type, userid)
        VALUES ('$comid', '10', '$iduser')";

        include 'upimg.php';
        upimg('Comunityimages', $comid);
        $extimg = strtolower(substr($_FILES['inp_img']['name'],-4));

        if (mysqli_query($conn, $sql)) {

            $sql = "UPDATE comunities SET extimg='$extimg' WHERE comunityid='$comid'";

            if (mysqli_query($conn, $sql)) {



            
                echo "imagem posta";
                
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }


            echo "nova comunidade entrada mas img nao upada";

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }



    }
    } else {
    echo "0 results";
    }


} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

header('Location: '. '../Pages/home.php');
mysqli_close($conn);


?>