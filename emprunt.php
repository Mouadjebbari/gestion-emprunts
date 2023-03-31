<?php
    require "header.php";

?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700">
		<link rel="stylesheet" href="table_reservation.css">
	</head>
	<body>

    <style>
    button {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 20px;
    }
    
    button:hover {
        background-color: #3e8e41;
    }
</style>

<?php
require('connexion.php');

if (isset($_POST['delete_reservations'])) {
    $current_date = date('Y-m-d H:i:s');
    $delete_query = "DELETE reservation FROM reservation 
        INNER JOIN ouvrage ON reservation.id_ouvrage = ouvrage.id_ouvrage 
        WHERE reservation.date_reservation < DATE_SUB('$current_date', INTERVAL 24 HOUR)";
    $result = mysqli_query($connexion, $delete_query);

    if ($result) {
        echo "All missed reservations have been deleted.";
    } else {
        echo "Error deleting missed reservations: " . mysqli_error($connexion);
    }
}
?>

<form method="post">
    <button type="submit" name="delete_reservations">Delete All Missed Reservations</button>
</form>



<table class="container">
<?php
require('connexion.php');

$current_date = date('Y-m-d H:i:s');
$missed_reservations_query = "SELECT reservation.id_adherent, reservation.id_ouvrage, reservation.date_reservation, adherent.nom, ouvrage.titre, ouvrage.image_couverture FROM reservation 
    INNER JOIN adherent ON reservation.id_adherent = adherent.id_adherent 
    INNER JOIN ouvrage ON reservation.id_ouvrage = ouvrage.id_ouvrage 
    WHERE reservation.date_reservation < DATE_SUB('$current_date', INTERVAL 24 HOUR)";
$missed_reservations_result = mysqli_query($connexion, $missed_reservations_query);

if (mysqli_num_rows($missed_reservations_result) > 0) {
    echo "<h2>Réservations manquées pendant 24 heures ou plus :</h2>";
    echo "<table>";
    echo "<tr><th>Adherent ID</th><th>Adherent Name</th><th>Ouvrage ID</th><th>Ouvrage Title</th><th>Cover Image</th><th>Reservation Date</th></tr>";
    while ($row = mysqli_fetch_assoc($missed_reservations_result)) {
        echo "<tr>";
        echo "<td>" . $row['id_adherent'] . "</td>";
        echo "<td>" . $row['nom'] . "</td>";
        echo "<td>" . $row['id_ouvrage'] . "</td>";
        echo "<td>" . $row['titre'] . "</td>";
        echo "<td><img src='" . $row['image_couverture'] . "' alt='Book Cover' height='100'></td>";
        echo "<td>" . $row['date_reservation'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No missed reservations found.";
}
?>

	</body>
</html>