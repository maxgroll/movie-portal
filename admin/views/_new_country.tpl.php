<?php
if(isset($_POST['submit']))
{
	$country_name = clean($_POST['country']);
	$country = new Country();
	$country->setCountry($country_name);
	$insert = $country->insert($db); // methode insert() der klasse Country wird ausgeführt
	
	if($insert == true) // falls rückgabe der methode isert() true ist
	{
		$name = $country->getCountry();
		$message = "<p class='message'>Das Land $name wurde erfolgreich hinzugefügt!</p>";	
		redirect_java("start.php?action=start&message=$message"); // umleitung auf start.php inklusive $_GET['message']
	}
	else // falls rückgabe false
	{
		$name = $country->getCountry();
		echo "<p class='error'>Zu dem Land $name exestiert bereits ein Eintrag!</p>"; // fehlermeldung wird angezeigt
	}
	
}
?>