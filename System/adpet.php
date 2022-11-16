<?php
session_start();

if (isset($_POST["inp_cas"])){
    $castrated = $_POST["inp_cas"];
}else{
    $castrated = '';
}

$name = $_POST["inp_name"];
$iduser = $_SESSION["iduser"];
$birthday = $_POST["inp_date"];
$breed = $_POST["inp_raca"];

$castratedbool = false;
$idpet = 0;
if($castrated == "on"){
    $castratedbool = true;
}else{
    $castratedbool = false;
}

include 'conn.php';
include 'upimg.php';


$sql = "INSERT INTO pets (name, iduser, birthday, breed, castrated)
VALUES ('$name', '$iduser', '$birthday', '$breed', '$castratedbool')";

if (mysqli_query($conn, $sql)) {

        echo "Pet adicionado com sucesso";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$sql = "SELECT idpet FROM pets WHERE name='$name' AND iduser='$iduser'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $idpet = $row["idpet"];
    }
}



upimg('Petimages', $idpet); 
$ext = strtolower(substr($_FILES['inp_img']['name'],-4));


$sql = "UPDATE pets SET extimg='$ext' WHERE idpet='$idpet'";

if (mysqli_query($conn, $sql)) {

    echo "Foto do pet upada";
    
} else {
    echo "Error updating record: " . $conn->error;
}


header('Location: '. '../Pages/home.php');
mysqli_close($conn);
?>