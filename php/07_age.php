<?php
require_once("./src/connect.php");

// Requête SQL pour récupérer la moyenne d'âge des utilisateurs groupés par genre
$sql = "SELECT * FROM users";
// "SELECT gender, AVG(TIMESTAMPDIFF(YEAR, date_naissance, CURDATE())) AS moyenne_age
// FROM users GROUP BY genre;";


// Préparation de la requête
$query = $db->prepare($sql);
// Exécution de la requête
$query->execute();
// Stockage du résultat dans un tableau associatif [personne1, personne2, ...]
$result = $query->fetchAll(PDO::FETCH_ASSOC);

require_once("./src/close.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palmers</title>
</head>
<body>
    <?php include_once('./components/nav.php') ?>
    <pre><?= print_r($result) ?></pre>

    <div>
        <?php
            foreach ($result as $user) {
                // afficher la moyenne d'âge des utilisateurs groupés par genre
            }
        ?>
    </div>
</body>
</html>