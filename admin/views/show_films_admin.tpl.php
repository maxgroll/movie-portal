<h2>Films</h2>
<?php

printTable2($data, "datatable", "film_admin", $show = "show", $edit = "edit", $delete = "delete"); // formartiert aus der Rückgabe der Methode selectFilms() der Klasse Film eine Tabelle
      
echo "<div class='pagination'>";

if ($page == 1) // bestimmt auf welcher seite der besucher sich grade befindet
{  	
	$next_page = $page + 1;
	
	for($page = 1; $page<= $number_of_page; $page++) // schleife generiert links zu einzelnen seite der Showfilms ansicht
	{  
		echo '<a href = "start.php?action=show_films_admin&page=' . $page . '">' . $page . ' </a>';  
	}
	
	echo '<a href = "start.php?action=show_films_admin&page=' . $next_page . '">  >>> ' . $next_page . '</a>';
} 
else if($page == $number_of_page)
{
	$previous_page = $page - 1;
	
	echo '<a href = "start.php?action=show_films_admin&page=' . $previous_page . '">' . $previous_page . ' <<<  </a>';
	
	for($page = 1; $page<= $number_of_page; $page++) // schleife generiert links zu einzelnen seite der Showfilms ansicht
	{  
		echo '<a href = "start.php?action=show_films_admin&page=' . $page . '">' . $page . ' </a>';  
	}
}
else
{  
    $next_page = $page + 1;
	$previous_page = $page - 1;
	
	echo '<a href = "start.php?action=show_films_admin&page=' . $previous_page . '">' . $previous_page . ' <<<  </a>';
	
	for($page = 1; $page<= $number_of_page; $page++) // schleife generiert links zu einzelnen seite der Showfilms ansicht
	{  
		echo '<a href = "start.php?action=show_films_admin&page=' . $page . '">' . $page . ' </a>';  
	}
	
	echo '<a href = "start.php?action=show_films_admin&page=' . $next_page . '">  >>> ' . $next_page . '</a>';
}


// for($page = 1; $page<= $number_of_page; $page++) 
// {  
//	echo '<a href = "start.php?action=show_films_admin&page=' . $page . '">' . $page . ' </a>';  
// }
?>
</div>
<div id="spacer">
	
</div>