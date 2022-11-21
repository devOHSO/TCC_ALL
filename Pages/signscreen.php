<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style.css">

    <title>Cadastrar</title>
</head>
<body>
    <div class="smallbackground">
        <h1>cadastro</h1><br>
        <form method="post" action="../System/sign.php" enctype="multipart/form-data">
            <label>Foto de usuario:</label><br>
            <input type="file" name="inp_img" id="inp_img" class="inputs" onchange="previewImagem()">
			<img style="width: 150px; height: 150px; border-radius: 100px;" class="inp_foto"><br><br>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
		<script>
			function previewImagem(){
				var imagem = document.querySelector('input[name=inp_foto]').files[0];
				var preview = document.querySelector('img');
				
				var reader = new FileReader();
				
				reader.onloadend = function () {
					preview.src = reader.result;
				}
				
				if(imagem){
					reader.readAsDataURL(imagem);
				}else{
					preview.src = "";
				}
			}
		</script>
    
            <label>Nome de usuario:</label><br>
            <input type="text" name="inp_name" id="inp_name" class="inputs" required minlength="3"><br><br>
            <?php
                if(!empty($_SESSION['vazio_nome'])){
                    echo $_SESSION['vazio_nome'];
                    unset ($_SESSION['vazio_nome']);
                }
            ?>   

            <label>Apelido:</label><br>
            <input type="text" name="inp_nickname" id="inp_nickname" class="inputs" required minlength="3"><br><br>
            <?php
                if(!empty($_SESSION['vazio_nickname'])){
                    echo $_SESSION['vazio_nickname'];
                    unset ($_SESSION['vazio_nickname']);
                }

            ?>

            <label>e-mail de usuario:</label><br>
            <input type="email" name="inp_email" id="inp_email" class="inputs" required><br><br>
            <?php
                if(!empty($_SESSION['vazio_email'])){
                    echo $_SESSION['vazio_email'];
                    unset ($_SESSION['vazio_email']);
                }

            ?>
            
            <label>Telefone:</label><br>
            <input type="tel" name="inp_tel" id="inp_tel" class="inputs" placeholder="(xx) xxxxx-xxxx" maxlength="11" minlength="11"><br><br>
            
            <label>Data de nascimento:</label><br>
            <input type="date" name="inp_date" id="inp_date" class="inputs" required><br><br>
            <?php
                if(!empty($_SESSION['vazio_nascimento'])){
                    echo $_SESSION['vazio_nascimento'];
                    unset ($_SESSION['vazio_nascimento']);
                }

            ?>
            <label>Crie uma senha:</label><br>
            <input type="password" name="inp_password" id="inp_password" class="inputs" required minlength="8"><br><br>
            <?php
                if(!empty($_SESSION['vazio_vpassword'])){
                    echo $_SESSION['vazio_vpassword'];
                    unset ($_SESSION['vazio_vpassword']);
                }

            ?>
            <label>Reinsira a senha:</label><br>
            <input type="password" name="inp_password1" id="inp_password1" class="inputs" required minlength="8"><br><br>
            <?php
                if(!empty($_SESSION['vazio_vpassword'])){
                    echo $_SESSION['vazio_vpassword'];
                    unset ($_SESSION['vazio_vpassword']);
                }

            ?>

            
            <input type="submit" value="Criar" class="submits"><br><br>
        </form>
        <a href="../index.php">Voltar</a>
    </div>
</body>
</html>