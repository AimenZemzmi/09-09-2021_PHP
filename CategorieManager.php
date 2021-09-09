<?php

require_once 'database.php';
require_once 'Categorie.php';

class CategorieManager extends Categorie{
	public static function findAll(){
		$sql = 'SELECT * FROM categorie';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute();

		return $req->fetchAll(PDO::FETCH_OBJ);
	}

	public function save(){
		$sql = 'INSERT INTO categorie(nom) VALUES (:n)';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute(['n' => $this->getNom()]);

		return $req->rowCount();
	}

	public function update(Article $p){
		$sql = 'UPDATE categorie SET nom = :n WHERE id = :id';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute([
			'n' => $p->getNom(),
			'id'=> $p->getId()
		]);

		return $req->rowCount();
	}

	public static function delete(int $id){
		$sql = 'DELETE FROM categorie WHERE id = :id';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute([
			'id' => $id
		]);

		return $req->rowCount();
	}
}