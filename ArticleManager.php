<?php

require_once 'database.php';
require_once 'Article.php';

class ArticleManager extends Article {
	public static function findAll(){
		$sql = 'SELECT * FROM article';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute();

		return $req->fetchAll(PDO::FETCH_OBJ);
	}

	public function save(){
		$sql = 'INSERT INTO article(nom, description, categorie_id) VALUES (:n, :d, :c)';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute([
			'n' => $this->getNom(),
			'd' => $this->getDescription(),
			'c' => $this->getCategorieId()
		]);

		return $req->rowCount();
	}

	public static function findOneById(int $id){
		$sql = 'SELECT * FROM article WHERE id = :id';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute([
			'id' => $id
		]);

		return $req->fetchAll(PDO::FETCH_CLASS, 'Article');
	}

	public function update(Article $p){
		$sql = 'UPDATE article SET nom = :n, description = :d, categorie_id = :c WHERE id = :id';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute([
			'n' => $p->getNom(),
			'd' => $p->getDescription(),
			'c' => $p->getCategorieId(),
			'id'=> $p->getId()
		]);

		return $req->rowCount();
	}

	public static function delete(int $id){
		$sql = 'DELETE FROM article WHERE id = :id';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute([
			'id' => $id
		]);

		return $req->rowCount();
	}
}