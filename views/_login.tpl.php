<?php
if(isset($_POST['submit']))
{	
	foreach ($_POST as $key => $value) 
	{
		$_POST[$key] = clean($_POST[$key]); // html etities werden von Eingaben aus der Login Form entfernt
	}
	
	$user = new User($_POST); // Neue Instanz der klasse User wird mit den Formueingaben erstellt
	$result = $user->login($db); // Ein login anhand Eingabedaten wird versucht
	
	if($result == true) // wenn das Ergebniss der funktion login() true ist, hat der login geklappt
	{
		$message = "<p class='message'>Willkommen " .$_SESSION['username']. "!</p>";
		redirect("index.php?action=index&message=$message");
		
	}
	else
	{
		$message = "<p class='error'>Logindaten fehlerhaft oder nicht vorhanden!</p>";
		echo $message;
		//createError('login', $message);
	}
}
?>