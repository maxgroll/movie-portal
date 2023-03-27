<?php
require_once "tConnection.php";

class User
{
	use Connection;
	
	// attributes
	public $id;
	public $username;
	private $password;
	private $email;
	
	// Constructor
	function __construct($daten) // konstruktor führt die funktion setDaten auf
	{
		$this->setDaten($daten);
	}
	
	public function setDaten(array $daten) // funktion prüft ob in einem übergebenen $array passende werte zu passenden settern der klasse admin befinden
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
	
	function setEmail($email)
	{
		$this->email = $email;
	}
	
	function getEmail()
	{
		return $this->email;
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
	
	//////////////////////////////////////////
	/////// insert
	// speichert die attribute einer instanz der klasse User in die Tabelle users und legt somit einen neun user an
	public function insert($db)
	{
		try
		{
			$data = 
			[
				"username" => $this->username,
				"password" => password_hash($this->password, PASSWORD_DEFAULT),
				"email" => $this->email				
			];
		
			$stmt = $db->prepare("INSERT INTO users(username, password, email) VALUES(:username, :password, :email)");
			$stmt->execute($data);
			
			return true;
		}
		
		catch(PDOException $e)
		{
			return false;
		}
	}
	
	public function update()
	{
	
	}
	
	public function delete()
	{
	
	}
	
	//////////////////////////////////////////
	/////// selectPassword
	// holt das password zu einer user_id aus der datenabnk
	private function selectPassword($db)
	{
		try 
		{	
			$stmt = $db->query("SELECT password FROM users WHERE username = '$this->username' ");
			$result = $stmt->fetch();
			return $result;
		}
		catch(PDOException $e)
		{
			// echo "Connecting Error!";
			return false;
		}
		
	}
	
	//////////////////////////////////////////
	/////// select
	// holt daten zu einem username aus der tabelle users
	private function select($db)
	{
		try 
		{
			$stmt = $db->query("SELECT id, username FROM users WHERE username = '$this->username' ");
			$result = $stmt->fetch();
			return $result;
		}
		catch(PDOException $e)
		{
			// echo "Connecting Error!";
			return false;
		}
	}
	
	//////////////////////////////////////////
	/////// login
	// loin() überprüft nach login form ob usernamen und password übereinstimmen und trägt user id und namen in $_SESSION
	public function login($db)
	{
		try 
		{	
			$result = $this->selectPassword($db);
			
			if($result)
			{
				$hash = $result['password'];
			
				if(password_verify($this->password, $hash))
				{
					$result = $this->select($db);
					
					$id = $result['id'];
					$username = $result['username'];
					
					$this->setId($id);
				
					$this->sessionInsert('user_id', $id, 'username', $username);
					
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
			// echo "Connecting Error!";
			return false;
		}
	}
}	
	
	
?>