<h2 class="title">Films</h2>
<?php

printTable($data, "datatable", "film", "show"); // Tabelle aus den Daten vom Film::selectFilms() werden in eine tabelle formatiert	
echo '<div class="pagination">';

if ($page == 1) // bestimmt auf welcher seite der besucher sich grade befindet
{  	
	$next_page = $page + 1;
	
	for($page = 1; $page<= $number_of_page; $page++) // schleife generiert links zu einzelnen seite der Showfilms ansicht
	{  
		echo '<a href = "index.php?action=show_films&page=' . $page . '">' . $page . ' </a>';  
	}
	
	echo '<a href = "index.php?action=show_films&page=' . $next_page . '">  >>> ' . $next_page . '</a>';
}
else if($page == $number_of_page)
{
	$previous_page = $page - 1;
	
	echo '<a href = "index.php?action=show_films&page=' . $previous_page . '">' . $previous_page . ' <<<  </a>';
	
	for($page = 1; $page<= $number_of_page; $page++) // schleife generiert links zu einzelnen seite der Showfilms ansicht
	{  
		echo '<a href = "index.php?action=show_films&page=' . $page . '">' . $page . ' </a>';  
	}
} 
else 
{  
    $next_page = $page + 1;
	$previous_page = $page - 1;
	
	echo '<a href = "index.php?action=show_films&page=' . $previous_page . '">' . $previous_page . ' <<<  </a>';
	
	for($page = 1; $page<= $number_of_page; $page++) // schleife generiert links zu einzelnen seite der Showfilms ansicht
	{  
		echo '<a href = "index.php?action=show_films&page=' . $page . '">' . $page . ' </a>';  
	}
	
	echo '<a href = "index.php?action=show_films&page=' . $next_page . '">  >>> ' . $next_page . '</a>';
}
    
// for($page = 1; $page<= $number_of_page; $page++) // schleife generiert links zu einzelnen seite der Showfilms ansicht
// {  
//	echo '<a href = "index.php?action=show_films&page=' . $page . '">' . $page . ' </a>';  
// } 
echo '</div>';
?>
<div id="spacer">
	
</div>