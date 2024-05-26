<?php
require_once("./src/connect.php");

// Requête SQL pour supprimer le nouvel utilisateur
$sql = "DELETE FROM users WHERE id = 1001";


// Préparation de la requête
$query = $db->prepare($sql);
// Exécution de la requête
$query->execute();
// if ($query->execute()) {
//     echo "Nouvel utilisateur supprimé avec succès";
// } else {
//     echo "Erreur lors de la suppression de l'utilisateur";
// }
require_once("./src/close.php");

// Redirection vers la page d'accueil
header('Location: ./index.php');
?>
