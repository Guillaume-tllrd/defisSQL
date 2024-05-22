<?php
require_once("./src/connect.php");

// Requête SQL pour récupérer tous les pays dont le nom commence par la lettre 'N'
$sql = "SELECT * FROM users WHERE country LIKE 'n%'";


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
    <title>Countries starting with 'N'</title>
</head>
<body>
    <?php include_once('./components/nav.php') ?>
    <pre><?= print_r($result) ?></pre>
    <div>
        <?php
            foreach ($result as $country) {
                // faire un echo des pays trouvés
            echo $country['country']. "<br>";
            }
        ?>
    </div>
</body>
</html>