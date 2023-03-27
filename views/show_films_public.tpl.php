<h2 class="title">Filme</h2>


<table class='datatable'>
<tr>
<th class="datatable">Titel</th><th class="datatable">Direktor</th><th class="datatable">Genre</th><th class="datatable">Jahr</th>
</tr>
 
<?php create_table_films($data, "datatable"); // Tabelle aus den Daten vom Film::selectFilms() werden in eine tabelle formatiert ?> 

</table>

<div class="pagination">
<?php
if ($page == 1) // bestimmt auf welcher seite der besucher sich grade befindet
{  	
	$next_page = $page + 1;
	
	for($page = 1; $page<= $number_of_page; $page++) // schleife generiert links zu einzelnen seite der Showfilms ansicht
	{  
		echo '<a href = "index.php?action=show_films_public&page=' . $page . '">' . $page . ' </a>';  
	}
	
	echo '<a href = "index.php?action=show_films_public&page=' . $next_page . '">  >>> ' . $next_page . '</a>';
}
else if($page == $number_of_page)
{
	$previous_page = $page - 1;
	
	echo '<a href = "index.php?action=show_films_public&page=' . $previous_page . '">' . $previous_page . ' <<<  </a>';
	
	for($page = 1; $page<= $number_of_page; $page++) // schleife generiert links zu einzelnen seite der Showfilms ansicht
	{  
		echo '<a href = "index.php?action=show_films_public&page=' . $page . '">' . $page . ' </a>';  
	}
} 
else 
{  
    $next_page = $page + 1;
	$previous_page = $page - 1;
	
	echo '<a href = "index.php?action=show_films_public&page=' . $previous_page . '">' . $previous_page . ' <<<  </a>';
	
	for($page = 1; $page<= $number_of_page; $page++) // schleife generiert links zu einzelnen seite der Showfilms ansicht
	{  
		echo '<a href = "index.php?action=show_films_public&page=' . $page . '">' . $page . ' </a>';  
	}
	
	echo '<a href = "index.php?action=show_films_public&page=' . $next_page . '">  >>> ' . $next_page . '</a>';
} 		
?>
</div>
<div id="spacer">
	
</div>
