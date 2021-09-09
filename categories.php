<?php

require_once 'database.php';

require_once 'Categorie.php';

$bdd = new BDD();
$connexion = $bdd->connexion();

$req = $connexion->prepare('SELECT * FROM categorie');
$req->execute();

$categories = $req->fetchAll(PDO::FETCH_CLASS, 'Categorie');

echo "<p>Nombre de catégories : ".$req->rowCount()."</p>";

foreach($categories as $categorie){
	echo "<p>".$categorie->getNom()."</p>";
}