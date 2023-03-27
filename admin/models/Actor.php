<?php

class Actor
{
	// Attributes
	public $id;
	public $actor;
	
	// Constructor
	function __construct($actor)
	{
		$this->setActor($actor);
	}
	
	/////// Getter / Setter
	
	function setActor($actor)
	{
		$this->actor = $actor;
	}
	
	function getActor()
	{
		return $this->actor;
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
	// erstellt einen neuen actor in der tabelle actors
	// vorher wird geschaut ob der director bereits exestiert
	// in beiden fällen wird zum schluss die id der instanz director gesetzt
	public function insert($db)
	{	
		try
		{
			$stmt = $db->query("SELECT id FROM actors WHERE actor = '$this->actor' ");
			$result = $stmt->fetch();
			
			if(!$result == false)
			{
				$id = $result['id'];
				$this->setId($id);
			}
			else
			{
				$stmt = $db->query("INSERT INTO actors(actor) VALUES('$this->actor')");
				$stmt = $db->query("SELECT LAST_INSERT_ID()");
				$result = $stmt->fetch();
				
				foreach ($result as $key => $value) 
				{
					$id = $value;
				}
				
				$this->setId($id);
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
}		
?>