<?php
if(isset($_POST['submit']))
{	
	unset($_POST['submit']);
	
	$username = clean($_POST['username']);
	$password = clean($_POST['password']);
	$email = clean($_POST['email']);
	
	foreach ($_POST as $key => $value) 
	{
		$_POST[$key] = clean($_POST[$key]);
	}
	
	$regex_password = "/^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/";
	$regex_username = "/^[a-zA-Z0-9][a-zA-Z0-9_]{4,16}$/";
	$regex_email = "/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/";
	
	if(!preg_match($regex_username, $username)) // Regex Prüfung zur Username Eingabe
	{
		if(strlen($username) < 6)
		{
			$message = "<p class='error'>Der Username muss min. 6 Buchstaben lang sein.</p>";
			echo $message;
			// createError('username', $message);
		}
		else if(strlen($username) > 16)
		{
			$message = "<p class='error'>Der Username darf max. 16 Buchstaben lang sein.</p>";
			echo $message;
			// createError('username', $message);
		}
		else
		{
			$message = "<p class='error'>Der Username muss ein Wort aus Buchstaben sein!</p>";
			echo $message;
			// createError('username', $message);
		}
	}
	else if(!preg_match($regex_password, $password)) // Regex Prüfung zur Password Eingabe
	{
		if(strlen($password) < 8)
		{
			$message = "<p class='error'>Das Passwort muss min. 8 Zeichen lang sein.</p>";
			echo $message;
			// createError('password', $message);
		}
		else
		{
			$message = "<p class='error'>Das Passwort muss min. einen Groß-, Kleinbuchstaben, eine Nummer und ein Sonderzeichen enthalten.</p>";
			echo $message;
			// createError('password', $message);
		}
	}
	else if(!preg_match($regex_email, $email)) // Regex Prüfung zur Email Eingabe
	{
		if(strlen($email) < 12)
		{
			$message = "<p class='error'>Die Email muss min. 12 Zeichen lang sein.</p>";
			echo $message;
			// createError('email', $message);
		}
	}
	else
	{
		$user = new User($_POST); // Eine neue Instanz der klasse User wird erstellt
		$result = $user->insert($db); // nach der Instanziierung wird eine Insert in die Tabelle Users ausgeführt
		
		if($result == true)
		{
			$message = "<p class='message'>Registrierung erfolgreich! Du kannst dich nun <a href='index.php?action=login'>einloggen</a></p>";	
			redirect("index.php?action=index&message=$message");
		}
		else
		{
			echo "<p class='error'>Username oder Email bereits vergeben!</p>";
		}
	}
}
?>