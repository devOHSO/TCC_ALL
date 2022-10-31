<?php
session_start();

if($_SESSION["iduser"] == null){
    header('Location:'. '../index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <div class="divflexc">
    
    <div class="header">
        <div class="divflexr">
            <h1>Home</h1>

            <a href="perfil.php"><button class="butvoltar" type="button"></button></a>
        </div>
    </div>
    <div class="divflexr">
    <div class="petgrid">
    <?php
    
    include "../System/conn.php";

    $iduser = $_SESSION["iduser"];
    $sql = "SELECT * FROM pets WHERE iduser= '$iduser'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            
            if ($_SESSION["idpet"] == 0){
                $_SESSION["idpet"] = 1;
            }
            
            ?>    

            <form action="../System/setpet.php" method="POST" class="pet_form">
                <?php
                if(isset($row["extimg"])){
                ?>    
                <div style="background-image: url(../Petimages/<?php echo $row["idpet"]. $row["extimg"]; ?>);" class="pet_img">
                    <input type="submit" class="pet_btn" name="stpt_btn" value="<?php echo $row["name"]; ?>">
                </div>
                <?php
                }else{
                ?>
                <div style="background-color: grey;" class="pet_img">
                    <input type="submit" class="pet_btn" name="stpt_btn" value="<?php echo $row["name"]; ?>">
                </div>
                <?php
                }
                ?>

            </form>
        
            <?php
        }
    }
        ?>
    </div>
    <div class="mediumbackground">
    

        <a href="createpost.php">Novo Post</a><br>


    <?php
        include '../System/getposts.php';
    ?><br>
    
    </div>
</div>
</div>
</body>
</html>