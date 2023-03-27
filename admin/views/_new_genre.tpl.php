<?php
if(isset($_POST['submit']))
{
	$genre_name = clean($_POST['genre']);
	$genre = new Genre();
	$genre->setGenre($genre_name);
	
	$insert = $genre->insert($db); // methode insert() der Klasse Genre wird ausgeführt
	 
	if($insert == true) // falls rückgabe wert der methode true ist
	{
		$name = $genre->getGenre();
		$message = "<p class='message'>Das Genre $name wurde erfolgreich hinzugefügt!</p>";	
		redirect_java("start.php?action=start&message=$message");
	}
	else // falls rückgabewert der methode false ist
	{
		$name = $genre->getGenre();
		echo "<p class='error'>Zu dem Genre $name exestiert bereits ein Eintrag!</p>";
	}
	
}
?>