<?php
require_once "tConnection.php";


class Admin
{
	use Connection;
	// attributes
	public $id;
	public $username;
	private $password;
	private $firstname;
	private $lastname;
	
	// Constructor
	function __construct($daten)
	{
		$this->setDaten($daten);
	}
	
	public function setDaten(array $daten)
	{
		if($daten)
		{
			foreach ($daten as $key => $value) 
			{
				$setter = "set" . ucfirst($key);
					
				if(method_exists($this, $setter))
				{
					$this->$setter($value);
				}
			}
		}
	}

	/////// Getter / Setter
	function setUsername($username)
	{
		$this->username = $username;
	}
	
	function getUsername()
	{
		return $this->username;
	}
	
	function setPassword($password)
	{
		$this->password = $password;
	}
	
	function getPassword()
	{
		return $this->password;
	}
	
	function setFirstname($firstname)
	{
		$this->firstname = $firstname;
	}
	
	private function getFirstname()
	{
		return $this->firstname;
	}
	
	function setLastname($lastname)
	{
		$this->lastname = $lastname;
	}
	
	function getLastname()
	{
		return $this->lastname;
	}
	
	function setId($id)
	{
		$this->id = $id;
	}
	
	function getId()
	{
		return $this->id;
	}
	
	// Methods
	
	private function selectPassword($db)
	{
		try 
		{	
			$stmt = $db->query("SELECT password FROM admins WHERE username = '$this->username' ");
			$result = $stmt->fetch();
			return $result;
		}
		catch(PDOException $e)
		{
			echo "Connecting Error!";
			return false;
		}
		
	}
	
	private function select($db)
	{
		try 
		{
			$stmt = $db->query("SELECT id, username, firstname, lastname FROM admins WHERE username = '$this->username' ");
			$result = $stmt->fetch();
			return $result;
		}
		catch(PDOException $e)
		{
			echo "Connecting Error!";
			return false;
		}
	}
	
	public function login($db, $password)
	{
		try 
		{	
			$this->setPassword($password);
			$result = $this->selectPassword($db);
			
			if($result)
			{
				$hash = $result['password'];
			
				if(password_verify($this->password, $hash))
				{
					$result = $this->select($db);

					$id = $result['id'];
					$username = $result['username'];
					$firstname = $result['firstname'];
					$lastname = $result['lastname'];
					
					$this->setId($id);
					$this->setFirstname($firstname);
					$this->setLastname($lastname);
				
					$this->sessionInsert('admin_id', $id, 'firstname', $firstname);
					
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}
		catch(PDOException $e)
		{
			echo "Connecting Error!";
			return false;
		}
	}
	
	public function insert()
	{
	
	}
	
	public function update()
	{
	
	}
	
	public function delete()
	{
	
	}	
}	
	
	
?>