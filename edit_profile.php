<?php
require_once 'connexion.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>
    <link type="text/css" href="edit.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    
</head>

<body>

    <!-- /navbar -->

    <!--/.span3-->
    <div class="span9">
        <div class="module">
        
            


                <div >
                                
                            <?php 

                                session_start();
                                if (!isset($_SESSION['id_adherent'])) {
                                    exit();
                                }

                                $id_adherent = $_SESSION['id_adherent']; $sql="SELECT * FROM adherent WHERE id_adherent='$id_adherent'";
                                $result=$connexion->query($sql);
                                $row=$result->fetch_assoc();
                                $adresse=$row['adresse'];
                                $email=$row['email']; 
                                $telephone=$row['telephone'];
                                $nickname=$row['nickname'];
                                $mot_de_passe=$row['mot_de_passe'];
                            ?>
                            <center>
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                            <h3 class="card-title">Edit Ton Profile</h3>
                            <form class="form-horizontal" action="edit_adherent_details.php?id=<?php echo $id_adherent ?>" method="post">
                                <div class="control-group">
                                <label class="control-label" for="adresse"><b>Adresse:</b></label>
                                <input type="text" id="adresse" name="adresse" value="<?php echo $adresse?>" required>
                                </div>
                                <div class="control-group">
                                <label class="control-label" for="email"><b>Email:</b></label>
                                <input type="text" id="email" name="email" value="<?php echo $email?>" required>
                                </div>
                                <div class="control-group">
                                <label class="control-label" for="telephone"><b>Téléphone:</b></label>
                                <input type="text" id="telephone" name="telephone" value="<?php echo $telephone?>" required>
                                </div>
                                <div class="control-group">
                                <label class="control-label" for="nickname"><b>Nickname:</b></label>
                                <input type="text" id="nickname" name="nickname" value="<?php echo $nickname?>" required>
                                </div>
                                <div class="control-group">
                                <label class="control-label" for="mot_de_passe"><b>Mot de passe:</b></label>
                                <input type="password" id="mot_de_passe" name="mot_de_passe" value="<?php echo $mot_de_passe?>" required>
                                </div>
                                <div class="form-actions">
                                <button type="submit" name="submit" class="btn btn-success">Enregistrer les modifications</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        </div>
                        </center>
                </div>
            
        </div>
    </div>


  


    <?php
    if (isset($_POST['submit'])) {
        $id_adherent = $_GET['id'];
        $adresse = $_POST['adresse'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $type = $_POST['type'];
        $nickname = $_POST['nickname'];
        $mot_de_passe = $_POST['mot_de_passe'];
    
        $sql = "UPDATE adherent SET adresse='$adresse', email='$email', telephone='$telephone',  nickname='$nickname', mot_de_passe='$mot_de_passe' WHERE id_adherent='$id_adherent'"; 
        if ($connexion->query($sql) === TRUE) {
            echo "<script type='text/javascript' >alert('Success')</script>";           
        } else {
            echo "<script type='text/javascript'>alert('Error')</script>";
        }
    }
    ?>
</body>

</html>