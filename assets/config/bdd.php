<?php 
// on va executer le block try
// si une exception est lancé, le bloc catch sera exécuté 
try {
  // !!! instantiation PDO !!!
  $pdo = new PDO(
    DB_SGBD . ':host=' . DB_HOST . ';dbname=' . DB_DBNAME . ';',
    DB_USER,
    DB_PASS,
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    ]
    );

} catch (Exception $e) {
  // Les exceptions sont des erreurs 
  // présentées sous forme d'objet
  // die est une instruction qui permet d'arreter le script
  die('Erreur de connexion à la base de donnée' . $e->getMessage()); // get message nous envoi l'erreur associé 
}