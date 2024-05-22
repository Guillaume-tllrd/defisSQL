<?php
require_once("./src/connect.php");

// Requête SQL pour récupérer les prénoms et noms de toutes les femmes
$sql = "SELECT * FROM users WHERE gender='female'";


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
    <title>Women</title>
</head>
<body>
    <?php include_once('./components/nav.php') ?>
    <pre><?= print_r($result) ?></pre>

    <div>
        <?php
            foreach ($result as $user) {
                // faire un écho du prénom et du nom de famille des utilisatrice
                echo $user["last_name"] . " " .$user['first_name']. " ". "est une female" ."<br>";
            }
        ?>
    </div>
</body>
</html>