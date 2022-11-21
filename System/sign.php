<?php
session_start();

//$foto = $_POST["inp_foto"];
$name = $_POST["inp_name"];
$nickname = $_POST["inp_nickname"];//verificar
$email = $_POST["inp_email"];//verificar
$telefone = $_POST["inp_tel"];//verificar
$nascimento = $_POST["inp_date"];
$vpassword = $_POST["inp_password"];
$ext = strtolower(substr($_FILES['inp_img']['name'],-4));

include 'conn.php';

$sql = "SELECT * FROM contas WHERE nickname='$nickname'";
$result = mysqli_query($conn, $sql);

if (($name) ==  null){
$_SESSION['vazio_nome'] = "Campo nome é obrigatório";
$url = 'http://localhost/tcc/Pages/signscreen.php';
    echo "
    <META HTTP-EQUIV=REFRESH CONTENT = 'O;URL=form'>
    ";  
}
if (($nickname) ==  null){
    $_SESSION['vazio_nickname'] = "Campo nickname é obrigatório";
    $url = 'http://localhost/tcc/Pages/signscreen.php';
        echo "
        <META HTTP-EQUIV=REFRESH CONTENT = 'O;URL=form'>
        ";  
    }
if (($email) ==  null){
        $_SESSION['vazio_email'] = "Campo email é obrigatório";
        $url = 'http://localhost/tcc/Pages/signscreen.php';
            echo "
            <META HTTP-EQUIV=REFRESH CONTENT = 'O;URL=form'>
            ";  
        }

if (($nascimento) ==  null){
       $_SESSION['vazio_nascimento'] = "Campo é obrigatório";
        $url = 'http://localhost/tcc/Pages/signscreen.php';
            echo "
                <META HTTP-EQUIV=REFRESH CONTENT = 'O;URL=form'>
                ";  
}
if (($vpassword) ==  null){
    $_SESSION['vazio_senha'] = "Campo senha é obrigatório";
     $url = 'http://localhost/tcc/Pages/signscreen.php';
         echo "
             <META HTTP-EQUIV=REFRESH CONTENT = 'O;URL=form'>
             ";  
}


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
     
        
        //!Apelido existente
        echo "<div><script>alert('apelido ja em uso!');</script> <a href='../Pages/signscreen.php'>VOLTAR</a> </div>";

    }
} else {

    $sql = "SELECT * FROM contas WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
    
        //!email sendo usado
        echo "<div><script>alert('email ja em uso!');</script> <a href='../Pages/signscreen.php'>VOLTAR</a> </div>";
    
        }
    } else {
            

        //!isso vai acontecer se tudo for verificado certo!
        $sql = "INSERT INTO contas (name, nickname, email, userpassword, birthday, telnumber, extimg)
        VALUES ('$name', '$nickname', '$email', '$vpassword', '$nascimento', '$telefone', '$ext')";

        if (mysqli_query($conn, $sql)) {

            include 'upimg.php';

            upimg('UserImages', $nickname); 

            echo "Conta criada com sucesso <a href='../index.php'>Entrar</a>";
            header('Location: '. '../index.php');
                        
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
    }   
}

$conn->close();

?>