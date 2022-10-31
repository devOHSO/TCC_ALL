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
    <title>Criando Post</title>
</head>
<body><!--img	video	caption	idpet	date	coments	likes	views	content	title-->

    <form action="/TCC/System/post.php" method="POST" enctype="multipart/form-data">
        Título:
        <input type="text" name="inp_title" id="inp_title"><br>
        Conteúdo:
        <input type="text" name="inp_content" id="inp_content"><br>
        Permitir Comentarios:
        <input type="checkbox" name="inp_coments" id="inp_coments"><br>

        Legenda:
        <input type="text" name="inp_caption" id="inp_caption"><br>
        Video:
        <input type="file" name="inp_video" id="inp_video"><br>
        Imagem:
        <input type="file" name="inp_image" id="inp_image" accept="image/*"><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>