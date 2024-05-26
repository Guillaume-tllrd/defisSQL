<?php
require_once("./src/connect.php");

// Requête SQL pour récupérer la moyenne d'âge des utilisateurs groupés par genre
$sql = "SELECT gender, AVG(TIMESTAMPDIFF(YEAR, birth_date, CURDATE())) AS moyenne_age
FROM users GROUP BY gender";
// La fonction TIMESTAMPDIFF calcule la différence entre deux dates. Vous l'avez utilisée correctement, mais il est bon de vérifier l'ordre des arguments pour être sûr.
// La fonction YEAR(date) est utilisée pour extraire l'année d'une date donnée. Elle prend une colonne de type date ou une valeur de date et renvoie l'année sous forme de nombre entier.
// La fonction CURDATE() est une fonction SQL qui renvoie la date courante (au format YYYY-MM-DD) sans l'heure. Elle est utile lorsque vous avez besoin de la date actuelle pour des calculs ou des comparaisons dans vos requêtes SQL.

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
                echo $user['gender']. " : " .$user['moyenne_age']. "<br>";
            }
        ?>
    </div>
</body>
</html>