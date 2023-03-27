<?php 
if(isset($_POST['submit']))
{	
	
	if(!isset($_POST['genre']) OR !isset($_POST['language'])) // falls kein genre oder keine sprache ausgewählt wurden
	{
		echo "<p class='error'>Bitte min. ein Genre und eine Sprache auswählen!</p>";
	}
	else if(!is_numeric($_POST['release_year'])) // falls das jahr nicht numerisch ist
	{
		echo "<p class='error'>Das Jahr darf nur aus Zahlen bestehen</p>";
	}
	else
	{
		unset($_POST['submit']);
	
		foreach ($_POST as $key => $value) // clean funktion wird auf alle werte in $_POST ausgeführt
		{
			if(is_string($_POST[$key]))
			{
				$_POST[$key] = clean($_POST[$key]);
			}
		}
		
		$imdbID = $_POST['imdbID'];
		
		$result = Film::checkImdbId($db, $imdbID); // prüft ob ein Filmeintrag mit der imdbId bereits vorhanden ist
		
		if($result == false) // falls imdbId noch nicht vorhanden
		{
			$director = new Director($_POST); // neue instanz der klasse Director wird erstellt
			$director->insert($db); // insert methode der klasse Director wird ausgeführt
		
			$_POST['directors_id'] = $director->getId(); // in $_POST wird der Wert der Eigenschaft Id der Instanz $director gespeichert
			
			$actor1 = new Actor($_POST['actor1']); // instanz der klasse Actor wird erstellt
			$actor2 = new Actor($_POST['actor2']); // ""
			$actor3 = new Actor($_POST['actor3']); // ""
			$actor1->insert($db); // insert Methode der klasse Actor wird in der instanz aufgerufen
			$actor2->insert($db); // ""
			$actor3->insert($db); // ""
			$actors_ids = ["actor1_id" => $actor1->getId(), "actor2_id" => $actor2->getId(), "actor3_id" => $actor3->getId()]; // id werte der instanzen werden in ein array gespeichert 
	
			$genres_ids = $_POST['genre'];
			$languages_ids = $_POST['language'];
			
	
			$film = new Film($_POST); // instanz der klasse Film wird anhand der daten aus $_POST konstruiert
			$insert = $film->insert($db, $film, $genres_ids, $languages_ids, $actors_ids); // insert methode der klasse Film wird in der instanz aufgerufen
			
			if($insert == true) // falls insert methode ein true zurückgibt
			{
				$title = $film->getTitle();
				$message = "<p class='message'>Der Film $title wurde erfolgreich hinzugefügt!</p>";	
				redirect_java("index.php?action=index&message=$message");
			}
			
		}
		else
		{
			echo "<p class='error'>Es exestiert bereits ein Eintrag mit dieser imdbID!</p>";
		}
	}
}	
?>