    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/972f63b1c4.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="biblio.css">
        <title>Document</title>
    </head>
    <body>
      
    <main class=" flex-row justify-content-center flex-wrap" >
                <div class="row" ></div>
    <!-- SARECH -->
    <?php 
    session_start();
                require "header.php";
                // Connexion à la base de données
                require_once 'connexion.php';
                // Vérifier la connexion
                if (!$connexion) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                // Récupérer les données de la base de données
                if(isset($_POST['submit'])){
                    $search = $_POST['searchinput'];
                    $sql = "SELECT * FROM ouvrage WHERE titre = '$search'";;
                } else {
                    $sql = "SELECT * FROM ouvrage";
                }
                
                $result = mysqli_query($connexion, $sql);
                
                // Afficher le formulaire de recherche
                echo '
                <br><br>
                <center>
                    <form action="#" method="POST">
                        <div class="wrap">
                            <div class="search">
                                <input type="text" class="searchTerm" placeholder="Search by title..." name="searchinput">
                                <button type="submit" class="searchButton" name="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <br>
                    </center>
                ';
                
                        // Vérifier s'il y a des données à afficher
                        if (mysqli_num_rows($result) > 0) {
                        // Parcourir les données et afficher les cartes
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<div class='card'>
                                <img src='" . $row['image_couverture'] . "' alt='Book Cover'>
                                <div class='book-info'>
                                        <h2>" . $row['titre'] . "</h2>
                                        <p><strong>Auteur:</strong> " . $row['auteur'] . "</p>
                                        <p><strong>Etat:</strong> " . $row['etat'] . "</p>
                                        <p><strong>Type:</strong> " . $row['type'] . "</p>
                                        <p><strong>Date d'édition:</strong> " . $row['date_edition'] . "</p>
                                        <p><strong>Date d'achat:</strong> " . $row['date_achat'] . "</p>
                                        <p><strong>Nombre de pages:</strong> " . $row['nombre_pages'] . "</p>
                                        <form action='reservation.php' method='post'>
                                            <input type='hidden' name='id_adherent' value='".$_SESSION['id_adherent']."'>
                                            <input type='hidden' name='id_ouvrage' value='".$row['id_ouvrage']."'>
                                            <button class='card-link btn btn-outline-success fw-bold' name='book' type='submit'>Emprunter</button>
                                        </form>
                                    </div>
                                </div>";

                        }
                    } else {
                        echo "No results found.";
                    }
                    // Fermer la connexion
                    mysqli_close($connexion);
            
        ?>
                </div>
                </main>
        
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
    <footer>
            <div class="footer-area">
                <p>© Copyright <?php echo date('Y') ?>. All right reserved.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </html>
