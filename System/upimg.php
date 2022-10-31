<?php

 if(isset($_FILES['img']))
 {
    $ext = strtolower(substr($_FILES['img']['name'],-4)); //Pegando extensão do arquivo
    $new_name = "$idpost" . $ext; //Definindo um novo nome para o arquivo
    $dir = '../Postimages/'; //Diretório para uploads 
    move_uploaded_file($_FILES['img']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    echo("Imagen enviada com sucesso!");
 } 
?>