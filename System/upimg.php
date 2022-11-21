<?php

   function upimg($place, $name){
      if(isset($_FILES['inp_img']))
      {
         $ext = strtolower(substr($_FILES['inp_img']['name'],-4)); //Pegando extensão do arquivo
         $new_name = "$name" . $ext; //Definindo um novo nome para o arquivo
         $dir = '../'. $place .'/'; //Diretório para uploads 
         move_uploaded_file($_FILES['inp_img']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
         echo("Imagen enviada com sucesso!");
      } 
   }  
?>