<?php

class Country
{
	// attributes
	public $id;
	public $country;
		
	/////// Getter / Setter
	function setCountry($country)
	{
		$this->country = $country;
	}
	
	function getCountry()
	{
		return $this->country;
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
	// erstellt einen neuen eintrag in der tabelle countries
	public function insert($db)
	{
		try
		{
			$stmt = $db->query("SELECT id FROM countries WHERE country = '$this->country' ");
			$result = $stmt->fetch();
			
			if(!$result == false)
			{
				$id = $result['id'];
				$this->setId($id);
				return false;
			}
			else
			{
				$data = ['country' => $this->country];
				$sql = "INSERT INTO countries(country) VALUES(:country)";
		
				$stmt = $db->prepare($sql);
				$stmt->execute($data);
				$stmt = $db->query("SELECT LAST_INSERT_ID()");
				$result = $stmt->fetch();
		
				foreach ($result as $key => $value) 
				{
					$id = $value;
				}
		
				$this->setId($id);
				return true;
			}	
		}
		catch(PDOException $e) 
		{
			print $e->getMessage();
			echo "Connecting error!";
		}
	}
	
	public function update()
	{
	
	}
	
	public function delete()
	{
	
	}
	
	public function selectCountry()
	{
		
	}
	
	//////////////////////////////////////////
	/////// selectCountries
	// Folgende methode holt alle id und genres aus der Tabelle countries
	// Die Rückgabe der Abfrage liefert ein assoc Array, dieses wird in $genres gespeichert
	function selectCountries($db)
	{
		$stmt = $db->query("SELECT * FROM countries ORDER BY country ASC");
		return $countries = $stmt->fetchAll();
	}
}		
?>