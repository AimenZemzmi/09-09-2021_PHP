<?php

class Comment {
	private $id;
	private $comment;
	private $article_id;
	
	public function getId() : int
	{
		return $this->id;
	}

	public function setComment(string $n) : self
	{
		$this->comment = $n;
		return $this;
	}
	public function getComment() : string
	{
		return $this->comment;
	}

	public function setArticleId(int $id) : self
	{
		$this->article_id = $id;
		return $this;
	}
	public function getArticleId() : int
	{
		return $this->article_id;
	}
}