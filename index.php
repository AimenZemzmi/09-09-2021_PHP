<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>PHP DEVOIR</title>
</head>
<body>
	<h1>PHP DEVOIR</h1>
	<?php

	require_once 'ArticleManager.php';

	$articles = ArticleManager::findAll();
	if(count($articles) > 0){
		?>
		<table border="1">
			<thead>
				<tr>
					<th>Article</th>
					<th>Description</th>
					<th>Catégorie</th>
					<th colspan="4">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
				foreach ($articles as $a) {
					require_once 'CategorieManager.php';
					$categories = CategorieManager::findAll();
					?>
					<tr>
						<td><?= $a->nom; ?></td>
						<td><?= $a->description; ?></td>
						<td><?= $categories[$a->categorie_id - 1]->nom; ?></td>
						<td>
							<a href="show_comment.php?article=<?= $a->id; ?>">
								Voir les commentaires
							</a>
						</td>
						<td>
							<a href="ajout_comment.php?article=<?= $a->id; ?>">
								Commenter
							</a>
						</td>
						<td>
							<a href="edit_article.php?article=<?= $a->id; ?>">
								Editer
							</a>
						</td>
						<td>
							<a href="delete_article.php?article=<?= $a->id; ?>">
								Supprimer
							</a>
						</td>
					</tr>
					<?php
				}
			?>
			</tbody>
		</table>
		<?php
	}
	else{
		echo "<p>Il n'y a aucun article</p>";
	}
	?>
	<h2>Ajouter un article</h2>
	<form action="ajout_article.php" method="POST">
		<label for="nom">Nom du article : </label>
		<input type="text" name="nom" id="nom">
		<br>
		<label for="desc">Description du article : </label>
		<input type="text" name="description" id="desc">
		<br>
		<label for="cat">Catégorie : </label>
		<select name="categorie" id="cat">
			<?php
				require_once 'CategorieManager.php';
				$categories = CategorieManager::findAll();
				foreach ($categories as $c) {
					echo "<option value='".$c->id."'>".$c->nom."</option>";
				}
			?>
		</select>
		<br>
		<input type="submit" name="ajouter" value="Ajouter">
	</form>
	<h2>Ajouter une categorie</h2>
	<form action="ajout_categorie.php" method="POST">
		<label for="nom">Nom du la categorie : </label>
		<input type="text" name="nomCategorie" id="nomCategorie">
		<br>
		<input type="submit" name="ajouterCategorie" value="Ajouter une catégorie">
	</form>
</body>
</html>
