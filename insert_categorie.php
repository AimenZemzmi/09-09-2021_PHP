<?php

require_once 'database.php';

$bdd = new BDD();
$co = $bdd->connexion();

$req = $co->prepare('INSERT INTO categorie(nom) VALUES (:n)');
$req->execute(['n' => 'Catégorie 1']);