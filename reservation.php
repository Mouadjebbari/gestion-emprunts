<html>
	<head>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700">
		<link rel="stylesheet" type="text/css" href="header.css" />
	</head>
	<body>
    <?php
            require_once 'connexion.php';
            session_start();
            if (!isset($_SESSION['id_adherent'])) {
                exit();
            }

            if (isset($_POST['book'])) {
                $id_adherent = $_POST['id_adherent'];
                $id_ouvrage = $_POST['id_ouvrage'];
                $date_reservation = date('Y-m-d H:i:s');
                
                $borrowed_query = "SELECT COUNT(*) as borrowed_count FROM emprunt WHERE id_adherent = $id_adherent";
                $borrowed_result = mysqli_query($connexion, $borrowed_query);
                $borrowed_count = mysqli_fetch_assoc($borrowed_result)["borrowed_count"];

                $reserved_query = "SELECT COUNT(*) as reserved_count FROM reservation WHERE id_adherent = $id_adherent";
                $reserved_result = mysqli_query($connexion, $reserved_query);
                $reserved_count = mysqli_fetch_assoc($reserved_result)["reserved_count"];

                if ($borrowed_count + $reserved_count >= 3) {
                    echo "Vous avez atteint la limite de 3 ouvrages  réservés.";
                    exit();
                }

                // Check if book is not already reserved
                $reserved_query = "SELECT COUNT(*) as count FROM reservation WHERE id_ouvrage = $id_ouvrage";
                $reserved_result = mysqli_query($connexion, $reserved_query);
                $reserved_count = mysqli_fetch_assoc($reserved_result)["count"];

                // Check if book is not "Déchiré"
                $available_query = "SELECT etat FROM ouvrage WHERE id_ouvrage = $id_ouvrage";
                $available_result = mysqli_query($connexion, $available_query);
                $etat = mysqli_fetch_assoc($available_result)["etat"];

                if ($reserved_count > 0) {
                    echo "Le livre est déjà réservé.";
                } else if ($etat == "Déchiré") {
                    echo "Le livre est déchiré et ne peut pas être réservé.";
                } else {
                    $query = "INSERT INTO reservation (id_adherent, id_ouvrage, date_reservation) VALUES ($id_adherent, $id_ouvrage, '$date_reservation')";
                    mysqli_query($connexion, $query);
                    echo "La réservation a été effectuée avec succès.";
                }
            }
        ?> 

	</body>
</html>