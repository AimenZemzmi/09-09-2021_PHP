<?php

if(isset($_GET['article'])){
	require_once 'CommentManager.php';
	require_once 'ArticleManager.php';

	$comments = CommentManager::findAllByArticleId(intval($_GET['article']));
	$article = ArticleManager::findOneById(intval($_GET['article']));
	if($comments != false && $article != false){
		?>
		<h1><?= $article[0]->getNom(); ?></h1>
		<p><?= $article[0]->getDescription(); ?></p>
		<label for="nom">Les commentaires :</label>
		<br>
		<?php
			foreach ($comments as $c) {
			?>
				<input type="text" name="nom" id="nom" value="<?= $c->getComment(); ?>">
				<a href="edit_comment.php?comment=<?= $c->getId(); ?>&article=<?= $c->getArticleId(); ?>">Editer</a>
				<a href="delete_comment.php?comment=<?= $c->getId(); ?>&article=<?= $c->getArticleId(); ?>">Supprimer</a>
			<?php
			}
		?>
		<?php
	}
	else{
		echo "<p>article introuvable</p>";
	}
}
else{
	echo "<p>article introuvable</p>";
}
