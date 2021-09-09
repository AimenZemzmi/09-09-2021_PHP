<?php

if(isset($_GET['article'])){
	require_once 'ArticleManager.php';

	$p = ArticleManager::findOneById($_GET['article']);
	if($p != false){
		$p = $p[0];

		if(isset($_POST['maj'])){
			if(!isset($_POST['nom']) || empty($_POST['nom'])){
				echo 'Veuillez renseigner un nom de article';
			}
			if(!isset($_POST['categorie']) || empty($_POST['categorie'])){
				echo 'Veuillez renseigner une catégorie de article';
			}
			else{
				$p->setNom($_POST['nom'])
					->setDescription($_POST['description'])
					->setCategorieId($_POST['categorie']);
				$pm = new ArticleManager();
				if($pm->update($p) > 0){
					header('Location: http://localhost/09-09-2021_PHP/index.php');
				}
				else{
					echo "<p>Une erreur est survenue</p>";
				}
			}
		}
		else{
			?>
		<h1><?= $p->getNom(); ?></h1>
		<p><?= $p->getDescription(); ?></p>

		<form action="" method="POST">
			<label for="nom">Nom du article : </label>
			<input type="text" name="nom" id="nom" value="<?= $p->getNom(); ?>">
			<br>
			<label for="desc">Description du article : </label>
			<input type="text" name="description" id="desc" value="<?= $p->getDescription(); ?>">
			<br>
			<label for="cat">Catégorie : </label>
			<select name="categorie" id="cat">
				<?php
					require_once 'CategorieManager.php';
					$categories = CategorieManager::findAll();
					foreach ($categories as $c) {
						?>
						<option value="<?= $c->id; ?>" <?php if($c->id == $p->getCategorieId()){ echo 'checked'; } ?>><?= $c->nom; ?></option>
						<?php
					}
				?>
			</select>
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
