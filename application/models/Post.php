<?php
class Post extends CI_Model
{

	public $id;
	public $title;
	public $description;
	public $usrId;

	function __constructor()
	{
		parent::__constructor();
	}

	function initialize($id, $usrId, $title, $description)
	{
		self::setId($id);
		self::setUsrId($usrId);
		self::setTitle($title);
		self::setDescription($description);

		return $this;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function setUsrId($usrId)
	{
		$this->usrId = $usrId;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getUsrId()
	{
		return $this->usrId;
	}
}