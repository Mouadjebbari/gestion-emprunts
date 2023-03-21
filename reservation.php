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
        $date_reservation = date('Y-m-d');

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
            // Proceed with reservation
            $expire_date = date('Y-m-d H:i:s', strtotime('+3 minutes'));
            $reservation_query = "INSERT INTO reservation (id_adherent, id_ouvrage, date_reservation, date_expire) VALUES ($id_adherent, $id_ouvrage, NOW(), '$expire_date')";
            $reservation_result = mysqli_query($connexion, $reservation_query);

            if ($reservation_result) {
                echo "Votre réservation a été confirmée.";
            } else {
                echo "Erreur lors de la réservation: " . mysqli_error($connexion);
            }
        }

        // Check if any reservations have missed the 3-minute limit and delete them
        $delete_query = "DELETE FROM reservation WHERE id_adherent = $id_adherent AND id_ouvrage = $id_ouvrage AND date_expire <= NOW()";
        $delete_result = mysqli_query($connexion, $delete_query);

        if ($delete_result) {
            echo "La réservation manquée a été supprimée.";
        } else {
            echo "Erreur lors de la suppression de la réservation manquée: " . mysqli_error($connexion);
        }
    }
?>
	</body>
</html> 

    