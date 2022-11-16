<?php 
include_once("../System/conn.php");

session_start();


$id = filter_input(INPUT_GET, 'iduser', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM contas WHERE iduser = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição perfil</title>
    <link rel="stylesheet" href="styleedit.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

    

    <header class="header">
    <a href="#"><button class="butlogo" type="button"> <img class="logo" src="../Images/logo.png"  width=90 height=70></button></a>
            <h1 class="texto">Editar Perfil</h1>
        <a href="perfil.php"><button class="butvoltar" type="button"> <img class="icon2" src="../Images/icon2.png"  width=75 height=65></button></a>
       

        </span>
    </header>
   
        <div class="smallbackground">

        

        <form method="POST" action="../System/proc_edit.php" enctype="multipart/form-data">



        <input type="file" name="input_user" id="input_user" class="input_user" onchange="previewImagem()"><br><br>
        <div class="perfil" ><img name="img_user" id="img_user" style="width: 135px; height: 135px;" class="img_user"></div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
		<script>
			function previewImagem(){
				var imagem = document.querySelector('input[name=input_user]').files[0];
				var preview = document.querySelector('img[name=img_user]');
				
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



			<input type="hidden" name="inp_id" value='1'>

            <input class="name" type="text" value="<?php echo $_SESSION['name']; ?>" name="inp_name" id="inp_name" class="inputs" minlength="3" required ><br><br>

            <input class="nickname" type="text" value="<?php echo $_SESSION['nickname']; ?>" name="inp_nickname" id="inp_nickname" class="inputs" minlength="3" required><br><br>


        

      <input type="submit" value="Salvar" class="submits"><br>

      </form>
    
    </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>