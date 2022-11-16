<?php
session_start();
include_once("../System/conn.php");



$name = $_POST["inp_name"];
$nickname = $_POST["inp_nickname"];
$id = $_POST['inp_id'];
if (isset($_FILES["input_user"])){
	$ext = strtolower(substr($_FILES['input_user']['name'],-4));

	unlink('../UserImages/'. $_SESSION["nickname"]. $_SESSION["extimg"]);

	include "upimg.php";
	upimg('../UserImages', $nickname);

	$atualizar_perfil = $conn->query(" UPDATE contas SET name = '$name', nickname = '$nickname' extimg='$ext' WHERE iduser = $id ");
}
else{
	$atualizar_perfil = $conn->query(" UPDATE contas SET name = '$name', nickname = '$nickname' WHERE iduser = $id ");
}

			if($atualizar_perfil >= '1'){

				echo"Seus dados foram atualizados com sucesso!";
			}else{
				echo "Error: " .  $atualizar_perfil . "<br>" . $conn->error;
			}

			?>





