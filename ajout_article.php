<?php

require_once 'ArticleManager.php';

if(!isset($_POST['nom']) || empty($_POST['nom'])){
	echo 'Veuillez renseigner un nom de produit';
}
if(!isset($_POST['categorie']) || empty($_POST['categorie'])){
	echo 'Veuillez renseigner une catégorie de produit';
}
else{

	$p = new ArticleManager();
	$p->setNom($_POST['nom'])
		->setDescription($_POST['description'])
		->setCategorieId($_POST['categorie']);
	// Sauvegarde
	if($p->save() > 0){
		header('Location: http://localhost/09-09-2021_PHP/index.php');
	}
	else{
		echo "<p>Une erreur est survenue</p>";
	}
}