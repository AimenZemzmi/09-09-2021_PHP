<?php

if(isset($_GET['comment']) && isset($_GET['article'])){
	require_once 'CommentManager.php';

	$p = CommentManager::findByCommentId(intval($_GET['comment']));
	if($p != false){
		$p = $p[0];

		if(isset($_POST['maj'])){
			if(!isset($_POST['nom']) || empty($_POST['nom'])){
				echo 'Veuillez renseigner un commentaire';
			}
			else{
				$p->setComment($_POST['nom'])
					->setArticleId($_GET['article']);
				$pm = new CommentManager();
				if($pm->update($p) > 0){
					header('Location: http://localhost/09-09-2021_PHP/show_comment.php?article='.$_GET['article']);
				}
				else{
					echo "<p>Une erreur est survenue</p>";
				}
			}
		}
		else{
			?>

		<form action="" method="POST">
			<label for="nom">Commentaire : </label>
			<input type="text" name="nom" id="nom" value="<?= $p->getComment(); ?>">
			<br>
			<input type="submit" name="maj" value="Mettre à jour">
		</form>
		<?php
		}
	}
	else{
		echo "<p>article introuvable</p>";
	}
}
else{
	echo "<p>article introuvable</p>";
}
