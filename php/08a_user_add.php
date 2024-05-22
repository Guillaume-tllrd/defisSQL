<?php
require_once("./src/connect.php");

// Requête SQL pour insérer un nouvel utilisateur

$first_name= "Armand";
$last_name = "Dupont";
$email = "armanddupont@gmail.com";
$gender = "male";
$birth_date = "1958-12-28";
$country = "Brazil";

$sql = "INSERT INTO users (first_name, last_name, email, gender, birth_date, country) VALUES (':first_name', ':last_name', ':email', ':gender', ':birth_date', ':country') ;


// Préparation de la requête
$query = $db->prepare($sql);
-- $query->bindValue(':first_name', $first_name);
-- $query->bindValue(':last_name', $last_name);
// Exécution de la requête
$query->execute();

require_once("./src/close.php");

// Redirection vers la page d'accueil
header('Location: ./index.php');
?>
