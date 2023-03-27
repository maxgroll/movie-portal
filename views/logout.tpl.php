<?php
$user = new User($_SESSION);
$message = "<p class='message'>Ciao " . $user->getUsername() . "! Bis zum nächsten mal!</p>";
$user->logout(); // $_SESSION wird gelöscht
redirect("index.php?action=index&message=$message"); // Umleitung zur Startseite
?>