<?php
if(isset($_POST['submit']))  
{	
	if($_POST['antwort'] == "ja")
	{	
		$result = $film->deleteFilm($db, $comments_ids); // methode deleteFilm() der Klasse Film wird ausgeführt
		
		
		if($result == true) // falls die Rückgabe true ist
		{
			$message = "<p class='message'>Der Film $title wurde aus der Datenbank gelöscht!</p>";	
			redirect("start.php?message=$message&action=show_films_admin"); // umleitung zur start.php mit action show_films_admin und $_GET['message']
		}
		else
		{
			echo "etwas ist schief gelaufen!";
		}
	}
	else
	{	
		redirect("start.php?action=show_films_admin");
	}
}
?>