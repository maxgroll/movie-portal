<?php
if(isset($_POST['submit']))
{	
	if(!isset($_POST['genre']) && !isset($_POST['language'])) // wenn ein genre und eine sprache ausgewählt ist
	{
		echo "<p class='error'>Bitte min. ein Genre und eine Sprache auswählen!</p>";
	}
	else if(!is_numeric($_POST['release_year'])) // wenn das jahr eine zahl ist
	{
		echo "<p class='error'>Das Jahr darf nur aus Zahlen bestehen</p>";
	}
	else
	{
		unset($_POST['submit']);
		$_POST['id'] = $films_id;
		
		// die funktion clean wird auf alle werte in $_POST ausgeführt
		foreach ($_POST as $key => $value) 
		{
			if(is_string($_POST[$key]))
			{
				$_POST[$key] = clean($_POST[$key]);
			}
		}
		
		$director = new Director($_POST);
		$director->insert($db); // es wird die methode insert() in der instanz $director ausgeführt
		$_POST['directors_id'] = $director->getId();
		
		// schauspieler werden instanziiert
		$actor1 = new Actor($_POST['actor1']);
		$actor2 = new Actor($_POST['actor2']);
		$actor3 = new Actor($_POST['actor3']);
		$actor1->insert($db); // je schauspieler wird die methode insert() der klasse Actor ausgeführt
		$actor2->insert($db);
		$actor3->insert($db);
		$actors_ids = ["actor1_id" => $actor1->getId(), "actor2_id" => $actor2->getId(), "actor3_id" => $actor3->getId()];
		
		$genres_ids = $_POST['genre'];
		$languages_ids = $_POST['language'];
		
		$film = new Film($_POST);
		$update = $film->update($db, $film, $actors_ids, $genres_ids, $languages_ids); // die methode update() der klasse Film wird ausgeführt
		
		if($update == true) // falls die methode update() erfolgreich war und ein true zurückgibt
		{
			$title = $film->getTitle();
			$message = "<p class='message'>Der Film $title wurde erfolgreich editiert!</p>";	
			redirect_java("start.php?action=start&message=$message");
		}
		else
		{
			echo "<p class='error'>Irgendwas läuft nicht!</p>";
		}	
	}
}
?>