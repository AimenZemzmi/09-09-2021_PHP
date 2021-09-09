<?php
	require_once 'CommentManager.php';
?>
	<form action="" method="POST">
		<label for="nom">Commentaire : </label>
		<input type="text" name="comment" id="comment">
		<br>
		<input type="submit" name="maj" value="Ajouter un commentaire">
	</form>
<?php

	if(!isset($_POST['comment']) || empty($_POST['comment'])){
		echo '';
	} else {
		$p = new CommentManager();
		$p->setComment($_POST['comment'])
			->setArticleId($_GET['article']);
		if($p->save() > 0){
			header('Location: http://localhost/09-09-2021_PHP/index.php');
		}
		else{
			echo "<p>Une erreur est survenue</p>";
		}
	}
	