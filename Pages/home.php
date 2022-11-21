<?php
session_start();

if($_SESSION["iduser"] == null){
    header('Location:'. '../index.php');
}

$_SESSION["previouspage"] = 'home.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="divflexc">
    
    <div class="header">
        <div class="divflexr">
        <a href="#"><button class="butlogo"> <img class="logo" src="../Images/logo.png"  width=90 height=70></button></a>
        <a href="home.php"><button class="butlogo"> <img class="logo" src="../Images/Iconhome.png"  width=70 height=70></button></a>
        <div class="divflexr">
            <h1 class="title">Inicio</h1>

        </div>
        <a href="perfil.php"><button class="butlogo"> <img class="logo" src="../Images/iconperfil.png"  width=70 height=70></button></a>
        <a href="createcomunity.php"><button class="butlogo"> <img class="logo" src="../Images/iconpata.png"  width=70 height=70></button></a>
        </div>

    </div>
    <div class="divflexr">


    <?php
    
    include '../Components/petgrid.php';
    
    ?>
    

    <div class="mediumbackground">
    
        <a href="createpost.php">Novo Post</a><br>

    <?php
        include '../System/getposts.php';
    ?><br>
    
    </div>

    <?php
    
    include '../Components/comunitygrid.php';

    ?>

</div>
</div>
</body>
</html>