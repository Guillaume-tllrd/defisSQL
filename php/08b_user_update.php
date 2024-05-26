<?php
require_once("./src/connect.php");

// Requête SQL pour modifier l'adresse e-mail du nouvel utilisateur
$sql = "UPDATE users SET email = 'armanddupont@google.com' WHERE id = 1001";


// Préparation de la requête
$query = $db->prepare($sql);
// Exécution de la requête
$query->execute();
if ($query->execute()) {
    echo "Nouvel utilisateur modifié avec succès";
} else {
    echo "Erreur lors de la modification de l'utilisateur";
}
require_once("./src/close.php");

// Redirection vers la page d'accueil
header('Location: ./index.php');
?>
