<?php 
include '../System/conn.php';

session_start();

$_SESSION["previouspage"] = 'perfil.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <div class="divflexc">

    <div class="header">
        <div class="divflexr">
        <a href="#"><button class="butlogo"> <img class="logo" src="../Images/logo.png"  width=90 height=70></button></a>
        <a href="home.php"><button class="butlogo"> <img class="logo" src="../Images/Iconhome.png"  width=70 height=70></button></a>
        <div class="divflexr">
            <h1 class="title">Perfil</h1>
        
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
            <div style="display: grid;"></div>

            <a href="edit.php" class="btnedit"><button class="butlogo"> <img class="logo" src="../Images/iconedicao.png"  width=60 height=60></button></a>
            <?php
            if ($_SESSION["extimg"] != ''){
            ?>

            <div class="perfil">
                <img src='../UserImages/<?php echo $_SESSION['nickname'] . $_SESSION['extimg']; ?>'  alt="" width="135px" height="135px" class="perfilimg">
            </div>
            
            <?php
            }else{
            ?>

            <div class="perfil">
                <img src='../Images/iconperfil.png'  alt="" width="135px" height="135px" class="perfilimg">
            </div>

            <?php
            }
            ?>

                <h2><?php echo $_SESSION['name']; ?></h2><br>
                <h3>@<?php echo $_SESSION['nickname']; ?></h3><br>
                <button class="butcomun" type="button"><h1 class="com">X Comunidades</h1></button><br><br>
                <a href="../System/unlogin.php">Sair</a>
                <?php
                include '../System/getpostsperfil.php';
                ?>
        </div>

        <?php
        include '../Components/comunitygrid.php';
        ?>
</div>
</div>


</body>
</html>