<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
   <title>fallstudie_gruppe1</title>
   <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Permanent+Marker&family=Poppins:wght@400;500;600;700&display=swap"
       rel="stylesheet">
 <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div>
	<header> <?php require_once "views/header.tpl.php"; ?> </header> 
	<nav> <?php require_once "navi.tpl.php"; ?> </nav>
	<main> 
		<?php
		 // wenn mit $_GET eine Mitteilung mitgechickt worden ist, wird diese angezeigt
		if(isset($_GET['message']))
		{
			echo "<p class='message'>" . $_GET['message'] . "</p>";
			unset($_GET['message']);
		}
		require_once "views/" . $action . ".tpl.php"; // der view zu der action aus dem controller, wird eingebunden
		?> 
	</main>		
	<footer><?php require_once "views/footer.tpl.php"; ?></footer>
	<script type="text/javascript" src="js/functions.js"></script>
</div>
</body>
</html>

