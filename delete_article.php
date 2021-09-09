<?php

if(isset($_GET['article'])){
	require_once 'ArticleManager.php';

	$p = ArticleManager::delete($_GET['article']);
	if($p > 0){
		header('Location: http://localhost/09-09-2021_PHP/index.php');
	}
	else{
		echo "<p>article introuvable</p>";
	}
}
else{
	echo "<p>article introuvable</p>";
}
