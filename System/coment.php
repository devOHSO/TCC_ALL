<?php
session_start();

    $comcon = $_POST["com_inp"];
    $iduser = $_SESSION["iduser"];
    $idpet = $_SESSION["idpet"];
    $idpost = $_POST["num_inp"];

    include 'conn.php';

    $sql = "INSERT INTO coments (iduser, idpost, content, idpet)
    VALUES ('$iduser', '$idpost', '$comcon', '$idpet')";

    if (mysqli_query($conn, $sql)) {
        echo "Comentario adicionado com sucesso";
        header('Location: '. '../Pages/home.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>