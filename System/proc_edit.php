<?php
session_start();
include_once("../System/conn.php");



$name = $_POST["inp_name"];
$nickname = $_POST["inp_nickname"];
$id = $_POST['inp_id'];
 


	$atualizar_perfil = $conn->query(" UPDATE contas SET name = '$name', nickname = '$nickname' WHERE iduser = $id ");
	

	
           // $sql = "INSERT INTO contas (name, nickname, email, userpassword, birthday, telnumber)
            //VALUES ('$name', '$nickname', '$email', '$vpassword', '$nascimento', '$telefone')";



			if($atualizar_perfil >= '1'){
				echo"Seus dados foram atualizados com sucesso!";
			}else{
				echo "Error: " .  $atualizar_perfil . "<br>" . $conn->error;
			}

			?>





