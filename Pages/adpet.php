
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Adicinar Pet</title>
</head>
<body>
    <div class="smallbackground">
    <form action="../System/adpet.php" method="POST" enctype="multipart/form-data">
        
    <a href="home.php">Voltar</a><br>

    <label>Foto do Pet:</label><br>
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
    
            <label>Nome:</label><br>
            <input type="text" name="inp_name" id="inp_name" class="inputs" required minlength="3"><br><br>

            <label>Data de nascimento:</label><br>
            <input type="date" name="inp_date" id="inp_date" class="inputs"><br><br>

            <label>Raça:</label><br>
            <input type="text" name="inp_raca" id="inp_raca" class="inputs"><br><br>

            <label>Castrated:</label><br>
            <input type="checkbox" name="inp_cas" id="inp_cas" class="inputs" ><br><br>
            
            <input type="submit" value="Adicionar">

    </form>
    </div>
</body>
</html>