<?php
Class User extends CI_Model
{
	public $id;
	public $name;
	public $email;
	public $password;

	function __construct()
	{
		parent::__construct();
	}

	function initialize($id, $name, $email, $password)
	{
		self::setId($id);
		self::setName($name);
		self::setEmail($email);
		self::setPassword($password);

		return $this;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getPassword()
	{
		return $this->password;
	}
}
?>
