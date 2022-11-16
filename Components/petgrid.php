
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
                if($row["extimg"] != ''){
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
        ?>
        

        <?php
    }
        ?>
        <form action="../Pages/pet.php" method="POST" class="pet_form">
        
        <div style="background-color: grey; background-image: url(../Images/iconplus.png); background-size: 60px; background-position: center; background-repeat: no-repeat;" class="pet_img">
            <input type="submit" class="pet_btn" name="settingspet_btn" value="#">
        </div>

        </form>
    </div>