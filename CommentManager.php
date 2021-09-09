<?php

require_once 'database.php';
require_once 'Comment.php';

class CommentManager extends Comment {
	public static function findAllByArticleId(int $id){
		$sql = 'SELECT * FROM comment WHERE article_id = :id';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute([
			'id' => $id
		]);

		return $req->fetchAll(PDO::FETCH_CLASS, 'Comment');
	}

	public static function findByCommentId(int $id){
		$sql = 'SELECT * FROM comment WHERE id = :id';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute([
			'id' => $id
		]);

		return $req->fetchAll(PDO::FETCH_CLASS, 'Comment');
	}

	public function save(){
		$sql = 'INSERT INTO comment(comment, article_id) VALUES (:n, :a)';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute([
			'n' => $this->getComment(),
			'a' => $this->getArticleId()
		]);

		return $req->rowCount();
	}

	public function update(Comment $p){
		$sql = 'UPDATE comment SET comment = :n WHERE id = :id';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute([
			'n' => $p->getComment(),
			'id'=> $p->getId()
		]);

		return $req->rowCount();
	}

	public static function delete(int $id){
		$sql = 'DELETE FROM comment WHERE id = :id';

		$bdd = new BDD();
		$co = $bdd->connexion();
		$req = $co->prepare($sql);
		$req->execute([
			'id' => $id
		]);

		return $req->rowCount();
	}
}