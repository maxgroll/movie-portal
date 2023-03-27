<?php

class Director
{
	// attributes
	public $id;
	public $director;
	
	// Constructor
	function __construct(array $daten) // konstruktor führt die funktion setDaten auf
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
	function setDirector($director)
	{
		$this->director = $director;
	}
	
	function getDirector()
	{
		return $this->director;
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
	// erstellt einen neun director in der tabelle directors
	// vorher wird geschaut ob der director bereits exestiert
	// in beiden fällen wird zum schluss die id der instanz director gesetzt
	public function insert($db)
	{	
		try
		{
			$stmt = $db->query("SELECT id FROM directors WHERE director = '$this->director' ");
			$result = $stmt->fetch();
			
			if($result !== false)  // falls der director bereits vorhanden ist in der DB
			{
				$id = $result['id'];
				$this->setId($id);
			}
			else // falls noch kein eintrag zu dem director vorliegt
			{
				$stmt = $db->query("INSERT INTO directors(director) VALUES('$this->director')");
				$stmt = $db->query("SELECT LAST_INSERT_ID()");
				$result = $stmt->fetch();
				
				foreach ($result as $key => $value) 
				{
					$id = $value;
				}
				
				$this->setId($id);
			}
			return true;
		}
		catch(PDOException $e) 
		{
			// print $e->getMessage();
			echo "Connecting error!";
			return false;
		}
	}
	
	public function update()
	{
	
	}
	
	public function delete()
	{
	
	}
}		
?>