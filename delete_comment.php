<?php

if(isset($_GET['comment']) && isset($_GET['article'])){
	require_once 'CommentManager.php';

	$p = CommentManager::delete($_GET['comment']);
	if($p > 0){
		header('Location: http://localhost/09-09-2021_PHP/show_comment.php?article='.$_GET['article']);
	}
	else{
		echo "<p>Commentaire introuvable</p>";
	}
}
else{
	echo "<p>Commentaire introuvable</p>";
}
