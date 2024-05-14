<?php
require_once("./src/connect.php");

$sql = "SELECT * FROM `users`";


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
    <title>Document</title>
</head>
<body>
    <?php include_once('./components/nav.php') ?>
    <!-- <pre><?= print_r($result) ?></pre> -->

    <?php
        foreach ($result as $user) {
            echo $user['first_name'] . " " . $user['last_name'] . " - " . $user['email'] . "<br>";
        }
    ?>
</body>
</html>