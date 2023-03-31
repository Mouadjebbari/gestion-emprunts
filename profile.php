<?php
require_once 'connexion.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <link type="text/css" href="them.css" rel="stylesheet">
</head>

<body>

    <!--/.span3-->
    <div class="span9">
        <center>
            <div class="card" >
                <div class="card-body">
                <img class="card-img-top" src="img/profile2.png" alt="Card image cap">
                    <?php
                    session_start();
                    if (!isset($_SESSION['id_adherent'])) {
                        exit();
                    }
                    $id_adherent = $_SESSION['id_adherent'];
                    $sql = "SELECT * FROM adherent WHERE id_adherent='$id_adherent'";
                    $result = $connexion->query($sql);
                    $row = $result->fetch_assoc();

                    $nom = $row['nom'];
                    $email = $row['email'];
                    $adresse = $row['adresse'];
                    $telephone = $row['telephone'];
                    $cin = $row['cin'];
                    $date_naissance = $row['date_naissance'];
                    $type = $row['type'];
                    $nickname = $row['nickname'];
                    $mot_de_passe = $row['mot_de_passe'];
                    $prenom = $row['prenom'];
                    ?>
                    <i>
                        <h1 class="card-title">
                            <center><?php echo $nom ?></center>
                        </h1>
                        <br>
                        <p><b>Email ID: </b><?php echo $email ?></p>
                        <br>
                        <p><b>Address: </b><?php echo $adresse ?></p>
                        <br>
                        <p><b>Telephone: </b><?php echo $telephone ?></p>
                        <br>
                        <p><b>CIN: </b><?php echo $cin ?></p>
                        <br>
                        <p><b>Date of Birth: </b><?php echo $date_naissance ?></p>
                        <br>
                        <p><b>Type: </b><?php echo $type ?></p>
                        <br>
                        <p><b>Nickname: </b><?php echo $nickname ?></p>
                        <br>
                        <p><b>Password: </b><?php echo $mot_de_passe ?></p>
                        <br>
                        <p><b>First Name: </b><?php echo $prenom ?></p>
                    </i>
                </div>
                
            <a href="edit_profile.php" class="btn btn-primary">Edit Details</a>
            </div>
            
        </center>
    </div>
    </div>
    </div>
</body>

</html>