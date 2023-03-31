<?php
   
// Check if book is available for reservation
// $available_query = "SELECT etat FROM ouvrage WHERE id_ouvrage = $id_ouvrage";
// $available_result = mysqli_query($conn, $available_query);
// $etat = mysqli_fetch_assoc($available_result)["etat"];

// if ($etat == "déchiré") {
// return "Le livre est déchiré et ne peut pas être réservé.";
// } else if ($etat == "emprunté") {
// return "Le livre est déjà emprunté et n'est pas disponible pour réservation.";
// } else if ($etat == "réservé") {
// return "Le livre est déjà réservé et n'est pas disponible pour réservation.";
// }

// // Check if user has reached borrowing limit
// $borrowed_count = 0;
// $reserved_count = 0;

// // Count borrowed books
// $borrowed_query = "SELECT COUNT(*) as count FROM emprunt e JOIN ouvrage o ON e.id_ouvrage = o.id_ouvrage WHERE e.id_adherent = $id_adherent AND e.date_retour_effectif IS NULL AND o.etat != 'déchiré'";
// $borrowed_result = mysqli_query($conn, $borrowed_query);
// $borrowed_count = mysqli_fetch_assoc($borrowed_result)["count"];

// // Count reserved books
// $reserved_query = "SELECT COUNT(*) as count FROM reservation r JOIN ouvrage o ON r.id_ouvrage = o.id_ouvrage WHERE r.id_adherent = $id_adherent AND o.etat != 'déchiré'";
// $reserved_result = mysqli_query($conn, $reserved_query);
// $reserved_count = mysqli_fetch_assoc($reserved_result)["count"];

// if ($borrowed_count + $reserved_count >= 3) {
// return "Vous avez déjà emprunté ou réservé 3 ouvrages qui ne sont pas rendus.";
// }

// // Check if book is already reserved by user
// $existing_reservation_query = "SELECT COUNT(*) as count FROM reservation WHERE id_adherent = $id_adherent AND id_ouvrage = $id_ouvrage";
// $existing_reservation_result = mysqli_query($conn, $existing_reservation_query);
// $existing_reservation_count = mysqli_fetch_assoc($existing_reservation_result)["count"];

// if ($existing_reservation_count > 0) {
// return "Vous avez déjà réservé cet ouvrage.";
// }

// // Insert new reservation record
// $reserve_date = date("Y-m-d H:i:s");
// $expire_date = date("Y-m-d H:i:s", strtotime("+24 hours"));
// $reserve_query = "INSERT INTO reservation (id_adherent, id_ouvrage, date_reservation, date_expiration) VALUES ($id_adherent, $id_ouvrage, '$reserve_date', '$expire_date')";
// mysqli_query($conn, $reserve_query);

// return "L'ouvrage a été réservé avec succès.";



// // Check if book is available for reservation
// $available_query = "SELECT etat FROM ouvrage WHERE id_ouvrage = $id_ouvrage";
// $available_result = mysqli_query($conn, $available_query);
// $etat = mysqli_fetch_assoc($available_result)["etat"];

// if ($etat == "déchiré") {
// return "Le livre est déchiré et ne peut pas être réservé.";
// } else if ($etat == "réservé") {
// return "Le livre est déjà réservé et n'est pas disponible.";
// } else if ($etat == "emprunté") {
// return "Le livre est déjà emprunté et n'est pas disponible pour réservation.";
// }

// // Check if user has reached reservation limit
// $reserved_count = 0;
// $reserved_query = "SELECT COUNT(*) as count FROM reservation WHERE id_adherent = $id_adherent";
// $reserved_result = mysqli_query($conn, $reserved_query);
// $reserved_count = mysqli_fetch_assoc($reserved_result)["count"];

// if ($reserved_count >= 3) {
// return "Vous avez déjà réservé 3 ouvrages qui ne sont pas disponibles.";
// }

// // Insert new reservation record
// $reserve_date = date("Y-m-d");
// $reserve_expire = date("Y-m-d H:i:s", strtotime("+24 hours"));
// $reserve_query = "INSERT INTO reservation (id_adherent, id_ouvrage, date_reservation, date_expiration) VALUES ($id_adherent, $id_ouvrage, '$reserve_date', '$reserve_expire')";
// mysqli_query($conn, $reserve_query);

// return "L'ouvrage a été réservé avec succès.";



// // Count borrowed books
// $borrowed_query = "SELECT COUNT(*) as count FROM emprunt e JOIN ouvrage o ON e.id_ouvrage = o.id_ouvrage WHERE e.id_adherent = $id_adherent AND e.date_retour_effectif IS NULL AND o.etat != 'déchiré'";
// $borrowed_result = mysqli_query($conn, $borrowed_query);
// $borrowed_count = mysqli_fetch_assoc($borrowed_result)["count"];

// // Count reserved books
// $reserved_query = "SELECT COUNT(*) as count FROM reservation r JOIN ouvrage o ON r.id_ouvrage = o.id_ouvrage WHERE r.id_adherent = $id_adherent AND o.etat != 'déchiré' AND r.date_expiration > NOW()";
// $reserved_result = mysqli_query($conn, $reserved_query);
// $reserved_count


// // Check if book is available
// $available_query = "SELECT etat FROM ouvrage WHERE id_ouvrage = $id_ouvrage";
// $available_result = mysqli_query($conn, $available_query);
// $etat = mysqli_fetch_assoc($available_result)["etat"];

// if ($etat == "déchiré") {
// return "Le livre est déchiré et ne peut pas être réservé.";
// } else if ($etat == "réservé") {
// return "Le livre est déjà réservé et n'est pas disponible.";
// }

// // Check if user can reserve the book
// $borrowed_count = 0;
// $reserved_count = 0;

// // Count borrowed books
// $borrowed_query = "SELECT COUNT(*) as count FROM emprunt e JOIN ouvrage o ON e.id_ouvrage = o.id_ouvrage WHERE e.id_adherent = $id_adherent AND e.date_retour_effectif IS NULL AND o.etat != 'déchiré'";
// $borrowed_result = mysqli_query($conn, $borrowed_query);
// $borrowed_count = mysqli_fetch_assoc($borrowed_result)["count"];

// // Count reserved books
// $reserved_query = "SELECT COUNT(*) as count FROM reservation r JOIN ouvrage o ON r.id_ouvrage = o.id_ouvrage WHERE r.id_adherent = $id_adherent AND o.etat != 'déchiré'";
// $reserved_result = mysqli_query($conn, $reserved_query);
// $reserved_count = mysqli_fetch_assoc($reserved_result)["count"];

// if ($borrowed_count + $reserved_count >= 3) {
// return "Vous avez déjà emprunté ou réservé 3 ouvrages qui ne sont pas rendus.";
// }

// // Check if book is not already reserved
// $reserved_query = "SELECT COUNT(*) as count FROM reservation WHERE id_ouvrage = $id_ouvrage";
// $reserved_result = mysqli_query($conn, $reserved_query);
// $reserved_count = mysqli_fetch_assoc($reserved_result)["count"];

// if ($reserved_count > 0) {
// return "Le livre est déjà réservé.";
// }

// // Insert new reservation record
// $reserve_date = date("Y-m-d");
// $expiry_date = date("Y-m-d H:i:s", strtotime("+24 hours"));
// $reserve_query = "INSERT INTO reservation (id_adherent, id_ouvrage, date_reservation, date_expiration) VALUES ($id_adherent, $id_ouvrage, '$reserve_date', '$expiry_date')";
// mysqli_query($conn, $reserve_query);

// return "L'ouvrage a été réservé avec succès. La réservation expirera le $expiry_date.";


// // Check if book is borrowed by the user
// $borrowed_query = "SELECT COUNT(*) as count FROM emprunt WHERE id_adherent = $id_adherent AND id_emprunt = $id_emprunt";
// $borrowed_result = mysqli_query($conn, $borrowed_query);
// $borrowed_count = mysqli_fetch_assoc($borrowed_result)["count"];

// if ($borrowed_count == 0) {
// return "L'emprunt spécifié n'a pas été effectué par cet utilisateur.";
// }




// // Check if book is available for reservation
// $available_query = "SELECT etat FROM ouvrage WHERE id_ouvrage = $id_ouvrage";
// $available_result = mysqli_query($conn, $available_query);
// $etat = mysqli_fetch_assoc($available_result)["etat"];

// if ($etat == "déchiré") {
// return "Le livre est déchiré et ne peut pas être réservé.";
// } else if ($etat == "emprunté") {
// return "Le livre est déjà emprunté et n'est pas disponible pour réservation.";
// } else if ($etat == "réservé") {
// return "Le livre est déjà réservé et n'est pas disponible pour réservation.";
// }

// // Check if user has reached borrowing limit
// $borrowed_count = 0;
// $reserved_count = 0;

// // Count borrowed books
// $borrowed_query = "SELECT COUNT(*) as count FROM emprunt e JOIN ouvrage o ON e.id_ouvrage = o.id_ouvrage WHERE e.id_adherent = $id_adherent AND e.date_retour_effectif IS NULL AND o.etat != 'déchiré'";
// $borrowed_result = mysqli_query($conn, $borrowed_query);
// $borrowed_count = mysqli_fetch_assoc($borrowed_result)["count"];

// // Count reserved books
// $reserved_query = "SELECT COUNT(*) as count FROM reservation r JOIN ouvrage o ON r.id_ouvrage = o.id_ouvrage WHERE r.id_adherent = $id_adherent AND o.etat != 'déchiré'";
// $reserved_result = mysqli_query($conn, $reserved_query);
// $reserved_count = mysqli_fetch_assoc($reserved_result)["count"];

// if ($borrowed_count + $reserved_count >= 3) {
// return "Vous avez déjà emprunté ou réservé 3 ouvrages qui ne sont pas rendus.";
// }

// // Check if book is already reserved by user
// $existing_reservation_query = "SELECT COUNT(*) as count FROM reservation WHERE id_adherent = $id_adherent AND id_ouvrage = $id_ouvrage";
// $existing_reservation_result = mysqli_query($conn, $existing_reservation_query);
// $existing_reservation_count = mysqli_fetch_assoc($existing_reservation_result)["count"];

// if ($existing_reservation_count > 0) {
// return "Vous avez déjà réservé cet ouvrage.";
// }

// // Insert new reservation record
// $reserve_date = date("Y-m-d H:i:s");
// $expire_date = date("Y-m-d H:i:s", strtotime("+24 hours"));
// $reserve_query = "INSERT INTO reservation (id_adherent, id_ouvrage, date_reservation, date_expiration) VALUES ($id_adherent, $id_ouvrage, '$reserve_date', '$expire_date')";
// mysqli_query($conn, $reserve_query);





https://github.com/aragon996/Library-Management-System---PHP-MySql

?>