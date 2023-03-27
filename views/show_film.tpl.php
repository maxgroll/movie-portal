<div id="show_film">
<?php
foreach($film_data as $k =>$v) // schleife formatiert die daten aus $data in eine html ansicht 
{
	if ($k != 'id') 
	{
		if($k == 'poster')
		{
			echo '<div id="poster_pic">
				
			<img src=" '.$v.'" alt="Poster" width="" height="auto"></div>';
		}
		else if ($k != 'plot' ) 
		{
			
			echo "<h3 class='films_key'>" . ucwords($k) . ": </h3><h4 class='films_value'>" . ucwords($v) . "</h4>";
				
		}
		else
		{
			echo "<h3 style='clear:both' class='films_key'>" . ucwords($k) . ": </h3><h4  class='films_value'>" . $v . "</h4>";
		}
	}	
}
?>
</div>

<div id="show_comment">
<?php
if (!$comments_data == false) // falls die Rückgabe der methode selectComments() der klasse buch nicht false ist
{
	echo "<h2 style='text-align:left'>Kommentare</h2>";
	foreach ($comments_data as $index => $array) 
	{
		unset($array['id']);
		unset($array['users_id']);
		unset($array['films_id']);
		unset($array['film']);
		
		echo "<p>" . nl2br(htmlspecialchars(strip_tags($array['comment']))) .  "</p>"."<p style='margin-left:3em; color:#9200cc'>" . $array['user'] . " \ " . strftime('%d.%m.%Y', strtotime($array['created'] )) . "</p>";
	}
}
else
{
	echo "<h2 id='comment_title'>Kommentare</h2>";
	echo "<p> Kein Kommentar vorhanden für diesen Film</p>";
}	
?>
</div>
<?php

if (isset($_SESSION['username'])) // Wenn der Besucher eingeloggt ist, wird eine Form für ein neues Kommentar erzeugt
{
	echo "<div id='make_comment'>";
	require_once "views/comment_form.tpl.php";
		
	if(isset($_POST['submit'])) // wenn submit ausgeführt wird
	{
			$user = $_SESSION['username']; 
			
			$comment = new Comment($_POST); // aus der Eingabe von comment_form.tpl.php, wird eine instanz erstellt
			
			$user_id = $_SESSION['user_id'];
			$film_id = $id;
			$comment->insert($db, $user_id, $film_id); // das kommentar wird durch einen insert in die datenbank eingetragen
	
	
			$message = "Kommentar erfolgreich gespeichert";	
			redirect("index.php?action=show_film&id=$id&message=$message");
	}
	
} 
else
{
	echo "<div id='make_comment_public'>";
	
}
echo "</div>";

?>