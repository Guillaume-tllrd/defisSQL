<?php

const DBHOST = 'db'; // nom du service dans le docker-compose.yml
const DBNAME = 'introsql';
const DBUSER = 'test';
const DBPASS = 'test';

$dsn = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME . ';charset=utf8'; // pour supporter les accents

// Pour se connecter sur une base mySQL , il y a 2 façons: _ il y mysqli et PDO: PHPDataObject. PDO est universel alors que mySQLI est uniquement pour mySQL
// On essaie de se connecter

try {
  // on instencie PDO
  $db = new PDO($dsn, DBUSER, DBPASS);
}
// POSSIBILITE de mettre directement ici le mode par default PDO pour récupérer des tableaux assoc :
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
// En le mettant ici pas besoin de le mettredans la variable d'éxecution

// On capture les exceptions et on affiche le message d'erreur
catch(PDOException $e){
  echo "connection failed: " . $e->getMessage() . "</br>";
}
// Ici on est connectés, on peut récupérer la liste des utilisateurs. (users)