<div class="comunitygrid">
    <?php
    
    include "../System/conn.php";

    $iduser = $_SESSION["iduser"];
    $sql = "SELECT * FROM comuuser WHERE userid= '$iduser'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $comid = $row['comid'];
            
            $sql = "SELECT * FROM comunities WHERE comunityid='$comid'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    $extimg = $row['extimg'];
                    $comunityid = $row['comunityid'];
                    if ($_SESSION["idcom"] == 0){
                        $_SESSION["idcom"] = 1;
                    }
            ?>    


            <form action="../System/setcomunity.php" method="POST" class="comunity_form">
                <?php
                if($row["extimg"] = ""){
                ?>    
                <div style="background-image: url(../Comunityimages/<?php echo $comunityid. $extimg; ?>);" class="com_img">
                    <input type="submit" class="com_btn" name="stcm_btn" value="<?php echo $row['name']; ?>">
                </div>
                <?php
                }else{
                ?>
                <div style="background-color: grey;" class="pet_img">
                    <input type="submit" class="com_btn" name="stcm_btn" value="<?php echo $row["name"]; ?>">
                </div>
                <?php
                }
                ?>

            </form>
        
            <?php
                }
            }   
        }
    }
        ?>
    </div>