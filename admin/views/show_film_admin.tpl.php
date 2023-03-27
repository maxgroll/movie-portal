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
			echo "<h3 class='films_key'>" . ucwords($k) . ": </h3><h4 class='films_value'>" . $v . "</h4>";
		}
	}	
}
?>
</div>
<div id="show_comment">
<?php
if (!$comments_data == false) // falls die rückgabe der methode selectComments() der Klasse Comment nicht false ist
{
	echo "<h2 style='text-align:left'>Kommentare</h2>";
    foreach ($comments_data as $index => $array)
    {  
		$film_id = $array['films_id'];
        $comment_id = $array['id'];
		$comment = $array['comment'];
        unset($array['id']);
        unset($array['users_id']);
        unset($array['films_id']);
        unset($array['film']);
        
        echo "<p>" . $array['comment'] .  "</p>"."<p style='margin-left:3em; color:#9200cc'>" . $array['user'] . " \ " . strftime('%d.%m.%Y', strtotime($array['created'] )). "</p>"; "</p>";
        echo "<button ><a id='delete_comment' href='start.php?action=delete_comment&comment_id=$comment_id&comment=$comment&film_id=$film_id'>delete comment</a></button>";
    }
}
else
{
	echo "<h2 id='comment_title'>Kommentare</h2>";
    echo "<p> Kein Kommentar vorhanden für diesen Film</p>";
}   
?>
</div>