<?php 
include '../System/conn.php';

session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações</title>
    <link rel="stylesheet" href="styleconf.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

    

    <header class="header">
        <a href="#"><button class="butlogo" type="button"> <img class="logo" src="../Images/logo.png"  width=90 height=70></button></a>
            <h1 class="texto">Configurações</h1>
            <a href="perfil.php"><button class="butvoltar" type="button"> <img class="icon2" src="../Images/icon2.png"  width=75 height=65></button></a>

              </div>
            </li>
   
            
        </span>
    </header>


            
        <div class="smallbackground">

        
        <form method="POST" action="../System/proc_conf.php">
        <label>Email:</label><br>
            <input class="email" type="text" value="<?php echo $_SESSION['email']; ?>" name="inp_email" id="inp_email" class="inputs" required ><br><br>
                
            <label>Senha:</label><br>
            <input class="senha" type="password" value="<?php echo $_SESSION['nickname']; ?>" name="inp_password" id="inp_nickname" class="inputs" minlength="3" required><br><br>

            <input type="submit" value="Salvar" class="submits"><br>
        </div>
     
 


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>