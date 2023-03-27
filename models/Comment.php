<?php

class Comment implements iFilm_comment
{
	// attributes
	public $id;
	public $comment;
	public $users_id;
	public $created;
	
	// Constructor
	function __construct($daten)  // konstruktor führt die funktion setDaten auf
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
	function setComment($comment)
	{
		$this->comment = $comment;
	}
	
	function getComment()
	{
		return $this->comment;
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
	// erstellt einen neuen eintrag in der tabelle comments
	// übergeben werden müssen $user_id = id des eingeloggten users
	// $films_id = id des films, der kommentiert wird
	public function insert($db, $user_id, $films_id)
	{
		try
		{
			$data = 
			[
				"comment" => $this->comment,
				"users_id" => $user_id				
			];
		
			$stmt = $db->prepare("INSERT INTO comments (comment, users_id) VALUES(:comment, :users_id)");
			$stmt->execute($data); 
		
			$stmt = $db->query("SELECT LAST_INSERT_ID()");
			$result = $stmt->fetch();
		
			foreach ($result as $key => $value) 
			{
				$id = $value;
			}
		
			$this->setId($id);
			$this->insertFilm_comment($db, $films_id);
			return true;
		}
		
		catch(PDOException $e) 
		{
			print $e->getMessage();
			echo "Connecting error!";
			return false;
		}
		
	}
	
	public function update()
	{
	
	}
	
	//////////////////////////////////////////
	/////// deleteComment
	// löscht einen Eintrag zu einem Kommentar aus der Tabelle comments
	// in $comment_id wird die id des zu löschenden kommentars übergeben
	public static function deleteComment($db, $comment_id)
	{
		try
		{
		
		$sql = "DELETE FROM films_comments WHERE comments_id = '$comment_id' ";
		$db->exec($sql);
		

		$sql = "DELETE FROM comments WHERE comments.id = '$comment_id'";
		$db->exec($sql);
		
		return true;
		}
		catch(PDOException $e) 
		{
			print $e->getMessage();
			echo "Connecting error!";
			return false;
		}
	}
	
	//////////////////////////////////////////
	/////// selectComments
	// selektiert alle Kommentare zu einem film
	// in $films_id wird die Id des films übergeben, zu welchem alle kommentare selektiert werden sollen
	public static function selectComments($db, $films_id)
	{
		try
		{
			$sql = "SELECT comments.id, comment, users_id, users.username as user, films.id as films_id, films.title as film, created 
					FROM comments
					JOIN users
					ON users.id=users_id
					JOIN films_comments
					ON comments.id=comments_id  
					JOIN films
					ON films_comments.films_id=films.id
					WHERE films.id= '$films_id'
					ORDER BY comments.id DESC;";

			$stmt = $db->prepare($sql);
			$stmt->execute();

			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			return $data = $stmt->fetchAll();
		}
		
		catch(PDOException $e) 
		{
			// print $e->getMessage();
			echo "Connecting error!";
			return false;
		}
	}
	
	// implemented Methods
	
	//////////////////////////////////////////
	/////// insertFilm_comment
	// fügt in die Tabelle films_comments neue einträge ein
	// $films_id = übergebene id zum film
	function insertFilm_comment($db, $films_id)
	{
		try
		{
			$data = 
			[
				"films_id" => $films_id,
				"comments_id" => $this->id
				
			];
		
			$stmt = $db->prepare("INSERT INTO films_comments (films_id, comments_id) VALUES(:films_id, :comments_id)");
			$stmt->execute($data);
			return true;	
		}
		catch(PDOException $e) 
		{
			// print $e->getMessage();
			echo "Connecting error!";
			return false;
		}
		
	}
	
	function updateFilm_comment($db)
	{
		
	}
	
	function deleteFilm_comment($db)
	{
		
	}
	
	
}		
?>