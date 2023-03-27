<?php

class Genre
{
	// attributes
	public $id;
	public $genre;
	
	/////// Getter / Setter
	function setGenre($genre)
	{
		$this->genre = $genre;
	}
	
	function getGenre()
	{
		return $this->genre;
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
	// fügt in die Tabelle genres neue einträge ein
	public function insert($db)
	{
		try
		{
			$stmt = $db->query("SELECT id FROM genres WHERE genre = '$this->genre' ");
			$result = $stmt->fetch();
			
			if(!$result == false)
			{
				$id = $result['id'];
				$this->setId($id);
				return false;
			}
			else
			{
				$data = ['genre' => $this->genre];
				$sql = "INSERT INTO genres(genre) VALUES(:genre)";
		
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
	/////// selectGenres
	// Folgende methode holt alle id und genres aus der Tabelle genres
	// Die Rückgabe der Abfrage liefert ein assoc Array, dieses wird in $genres gespeichert
	function selectGenres($db)
	{
		$stmt = $db->query("SELECT * FROM genres ORDER BY genre ASC");
		return $genres = $stmt->fetchAll();
	}
	
	function selectIds($db, $genres)
	{
		$genres_ids = array();
		try
		{
			foreach ($genres as $key => $value) 
			{
				$this->setGenre($value);
				$this->insert($db);
				$genres_ids[$key] = $this->id;
			}
			/*
			foreach ($genres as $key => $value) 
			{
				$stmt = $db->query("SELECT id FROM genres WHERE genre = '$value' ");
				$genre_id = $stmt->fetch();
			
				$genres_ids[] = $genre_id;
			} */
			return $genres_ids;
		}
		catch(PDOException $e) 
		{
			// print $e->getMessage();
			echo "Connecting error!";
		}
	}	
}		
?>