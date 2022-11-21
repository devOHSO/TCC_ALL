<?php
session_start();

if($_SESSION["iduser"] == null){
    header('Location:'. '../index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Criando Comunidade</title>
</head>
<body><!--img	video	caption	idpet	date	coments	likes	views	content	title-->


<div class="divmaxhei">
    <div class="smallbackground"> 
    <a href="home.php">Voltar</a>
    <form action="../System/createcomunity.php" method="POST" enctype="multipart/form-data">
        <h1>Crie uma comunidade</h1>
        nome:
        <input type="text" name="inp_name" id="inp_name"><br>
        descrição:
        <input type="text" name="inp_description" id="inp_description"><br>
        Imagem:
        <input type="file" name="inp_img" id="inp_img" accept="image/*">
        <input type="submit" value="Enviar">
        
    </form>
    <form action="../System/searchcom.php" method="POST" enctype="multipart/form-data">
        <h1>Entre em uma comunidade</h1>
        nome:
        <input type="text" name="inp_name" id="inp_name"><br>
        <input type="submit" value="Pesquisar">
        
    </form>
    </div>
</div>

</body>
</html>