<?php
class M_admin extends CI_Model
{

	private $username;
	private $email;
	private $password;
	private $nama;
	private $panggilan;


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function setUsername($username)
	{
		$this->username = $username;
	}
	public function setEmail($email)
	{
		$this->email = $email;
	}
	public function setPassword($password)
	{
		$this->password = $password;
	}
	public function setPanggilan($panggilan)
	{
		$this->panggilan = $panggilan;
	}


	public function getAdmin()
	{
		$query = $this->db->query
		("
			SELECT *
			FROM psb_admin
			WHERE 
				(username = '$this->username' OR email = '$this->email') AND
				password = '$this->password'  
			");
		$this->db->close();
		return $query;
	}

	// 

}