<?php
if(isset($_POST['submit']))
{
	$language_name = clean($_POST['language']);
	$language = new Language();
	$language->setLanguage($language_name);
	
	$insert = $language->insert($db);
	
	if($insert == true)
	{
		$name = $language->getLanguage();
		$message = "<p class='message'>Die Sprache $name wurde erfolgreich hinzugefügt!</p>";	
		redirect_java("start.php?action=start&message=$message");
	}
	else
	{
		$name = $language->getLanguage();
		echo "<p class='error'>Zu der Sprache $name exestiert bereits ein Eintrag!</p>";
	}
	
}
?>