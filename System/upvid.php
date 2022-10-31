<?php

 if(isset($_FILES['video']))
 {
    $ext = strtolower(substr($_FILES['video']['name'],-4)); //Pegando extensão do arquivo
    $new_name = "$idpost" . $ext; //Definindo um novo nome para o arquivo
    $dir = '../Postvideos/'; //Diretório para uploads 
    move_uploaded_file($_FILES['video']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    echo("Video enviada com sucesso!");
 } 
?>