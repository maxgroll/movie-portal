<?php
	
class Language
{
	// attributes
	public $id;
	public $language;
	
	/////// Getter / Setter
	function setLanguage($language)
	{
		$this->language = $language;
	}
	
	function getLanguage()
	{
		return $this->language;
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
	// fügt in die Tabelle languages neue einträge ein
	public function insert($db)
	{
		try
		{
			$stmt = $db->query("SELECT id FROM languages WHERE language = '$this->language' ");
			$result = $stmt->fetch();
			
			if(!$result == false) // falls das genre bereits vorhanden ist
			{
				$id = $result['id'];
				$this->setId($id);
				return false;
			}
			else // falls das genre noch nicht vorhanden ist
			{
				$data = ['language' => $this->language];
				$sql = "INSERT INTO languages(language) VALUES(:language)";
		
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
			// print $e->getMessage();
			echo "Connecting error!";
		}
	}
	
	public function update()
	{
	
	}
	
	public function delete()
	{
	
	}
	
	//////////////////////////////////////////
	/////// selectLanguages
	// Folgende methode holt alle id und genres aus der Tabelle languages
	// Die Rückgabe der Abfrage liefert ein assoc Array, dieses wird in $genres gespeichert
	function selectLanguages($db)
	{
		$stmt = $db->query("SELECT * FROM languages ORDER BY language ASC");
		return $languages = $stmt->fetchAll();
	}
}		
?>