<?php
session_start();
include_once("../System/conn.php");



$email = $_POST["inp_email"];
$vpassword = $_POST["inp_password"];
$id = $_POST['inp_id'];
 


	$atualizar_perfil = $conn->query(" UPDATE contas SET email = '$email', userpassword = '$vpassword' WHERE iduser = $id ");
	

	
           // $sql = "INSERT INTO contas (name, nickname, email, userpassword, birthday, telnumber)
            //VALUES ('$name', '$nickname', '$email', '$vpassword', '$nascimento', '$telefone')";



			if($atualizar_perfil >= '1'){
				echo"Seus dados foram atualizados com sucesso!";
			}else{
				echo "Error: " .  $atualizar_perfil . "<br>" . $conn->error;
			}

			?>








