<?php
require_once("./src/connect.php");

// Requête SQL pour insérer un nouvel utilisateur

$first_name= "Armand";
$last_name = "Dupont";
$email = "armanddupont@gmail.com";
$gender = "male";
$birth_date = "1958-12-28";
$country = "Brazil";


$sql = "INSERT INTO users (first_name, last_name, email, gender, birth_date, country ) VALUES (:first_name, :last_name, :email, :gender, :birth_date, :country)" ;


// Préparation de la requête
$query = $db->prepare($sql);
$query->bindValue(':first_name', $first_name);
$query->bindValue(':last_name', $last_name);
$query->bindValue(':email', $email);
$query->bindValue(':gender', $gender);
$query->bindValue(':birth_date', $birth_date);
$query->bindValue(':country', $country);
// Exécution de la requête
$query->execute();
if ($query->execute()) {
    echo "Nouvel utilisateur ajouté avec succès";
} else {
    echo "Erreur lors de l'ajout de l'utilisateur";
}

require_once("./src/close.php");

//Redirection vers la page d'accueil
header('Location: ./index.php');
?>
