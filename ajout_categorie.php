<?php

require_once 'CategorieManager.php';

if(!isset($_POST['nomCategorie']) || empty($_POST['nomCategorie'])){
	echo 'Veuillez renseigner un nom de catégorie';
}
else{

	$p = new CategorieManager();
	$p->setNom($_POST['nomCategorie']);
	// Sauvegarde
	if($p->save() > 0){
		header('Location: http://localhost/09-09-2021_PHP/index.php');
	}
	else{
		echo "<p>Une erreur est survenue</p>";
	}
}