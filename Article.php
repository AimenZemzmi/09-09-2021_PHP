<?php

class Article {
	private $id;
	private $nom;
	private $description;
	private $categorie_id;
	
	public function getId() : int
	{
		return $this->id;
	}

	public function setNom(string $n) : self
	{
		$this->nom = $n;
		return $this;
	}
	public function getNom() : string
	{
		return $this->nom;
	}

	public function setDescription(?string $d) : self
	{
		$this->description = $d;
		return $this;
	}
	public function getDescription() : ?string
	{
		return $this->description;
	}

	public function setCategorieId(int $id) : self
	{
		$this->categorie_id = $id;
		return $this;
	}
	public function getCategorieId() : int
	{
		return $this->categorie_id;
	}
}