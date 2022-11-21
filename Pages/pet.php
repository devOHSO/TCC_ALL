<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seus Pets</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    
    <div class="smallbackground">
        <a href="home.php">Voltar</a>
        <h1>Seus Pets</h1> 

        <form action="adpet.php">
            <input type="submit" value="Adicionar pet">
        </form>

        <?php
        
        include '../System/conn.php';

        $iduser = $_SESSION['iduser'];

        $sql = "SELECT * FROM pets WHERE iduser='$iduser'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo $row["idpet"]. " - Name: " . $row["name"]. " | " . $row["birthday"]. " | " . $row["breed"]. " | " . $row["castrated"] . "<br>";
        }
        } else {
        echo "Não há pets registrado nessa conta, adicione um!";
        }

        mysqli_close($conn);
        
        ?>

    </div>

</body>
</html>