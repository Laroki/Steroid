<?php 

// fichier de configuration principal
// (à inclure au début des pages)
// n'a rien à voir avec Bootstrap CSS ... 

// __DIR__ est une constante magique qui renvoi le chemin du dossier 
require __DIR__ . '/param.php';
require __DIR__ . '/bdd.php';

// démarage de la session, dans les cookies
session_start();
