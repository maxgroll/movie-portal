<h2 class="title">Suchergebnisse</h2>
<?php
if(isset($_POST['search'])) // fall direkt nach submit vom search input
{
	$q = $_POST["search"]; // Die Eingabe vom Formular aus der search.tpl.php wird in der Variabel $q gespeichert
	$q_length = strlen($q); // Anzahl der Zeichen von der Abgabe werden gezählt und in der variabel $q_lenght gespeichert
	
	// lookup all hints from array if $q is different from ""
	if ($q_length > 2) // wenn die Sucheingabe länger als 3 Zeichen lang ist 
	{
		$results_per_page = 5; // anzahl der agezeigten filme pro seite
		$result = Film::searchFilms($db, $q); // liefert alle Filme in deren eigenschaften der Suchbegriff vorkommmt
	
		$empty = array();
		if($result !== $empty)
		{	
			$amount_of_films = count($result); // anzahl der suchergebnisse
			$number_of_page = ceil($amount_of_films / $results_per_page); // bestimmt die gesamtanzahl der benötigten seiten
			
			if (!isset($_GET['page'])) // bestimmt auf welcher seite der besucher sich grade befindet
			{  
			    $page = 1;  
			} 
			else 
			{  
			    $page = $_GET['page'];  
			}
			
			$page_first_result = ($page-1) * $results_per_page; // bestimmt SQL Limit start wert ab welchem die ergebnisse angezeigt werden sollen
			
			$result = Film::searchFilmsPagenation($db, $q, $page_first_result, $results_per_page);
			
		 	printTable($result, 'datatable', 'film', 'show'); // eine Tabelle mit den Suchergebnissen wird gedruckt
			
			echo '<div class="pagination">';     
			
			if ($page == 1) // bestimmt auf welcher seite der besucher sich grade befindet
			{  	
				$next_page = $page + 1;
	
				for($page = 1; $page<= $number_of_page; $page++) // schleife generiert links zu einzelnen seite der Showfilms ansicht
				{  
					echo '<a href = "index.php?action=show_search&q='.$q.'&page=' . $page . '">' . $page . ' </a>';  
				}
	
				echo '<a href = "index.php?action=show_search&q='.$q.'&page=' . $next_page . '">  >>> ' . $next_page . '</a>';
			}
			else if($page == $number_of_page)
			{
				$previous_page = $page - 1;
	
				echo '<a href = "index.php?action=show_search&q='.$q.'&page=' . $previous_page . '">' . $previous_page . ' <<<  </a>';
	
				for($page = 1; $page<= $number_of_page; $page++) // schleife generiert links zu einzelnen seite der Showfilms ansicht
				{  
					echo '<a href = "index.php?action=show_search&q='.$q.'&page=' . $page . '">' . $page . ' </a>';  
				}
			} 
			else 
			{  
			    $next_page = $page + 1;
				$previous_page = $page - 1;
	
				echo '<a href = "index.php?action=show_search&q='.$q.'&page=' . $previous_page . '">' . $previous_page . ' <<<  </a>';
	
				for($page = 1; $page<= $number_of_page; $page++) // schleife generiert links zu einzelnen seite der Showfilms ansicht
				{  
					echo '<a href = "index.php?action=show_search&q='.$q.'&page=' . $page . '">' . $page . ' </a>';  
				}
	
				echo '<a href = "index.php?action=show_search&q='.$q.'&page=' . $next_page . '">  >>> ' . $next_page . '</a>';
			}
			echo '</div>';	
		}					
	}
}
else
{
	$q = $_GET["q"];
	$q_length = strlen($q); // Anzahl der Zeichen von der Abgabe werden gezählt und in der variabel $q_lenght gespeichert
	
	// lookup all hints from array if $q is different from ""
	if ($q_length > 2) // wenn die Sucheingabe länger als 3 Zeichen lang ist 
	{
		$results_per_page = 5; // anzahl der agezeigten filme pro seite
		$result = Film::searchFilms($db, $q); // liefert alle Filme in deren eigenschaften der Suchbegriff vorkommmt
 
		$empty = array();
		if($result !== $empty)
		{
			$amount_of_films = count($result); // anzahl der suchergebnisse
			$number_of_page = ceil($amount_of_films / $results_per_page); // bestimmt die gesamtanzahl der benötigten seiten
			
			if (!isset($_GET['page'])) // bestimmt auf welcher seite der besucher sich grade befindet
			{  
			    $page = 1;  
			} 
			else 
			{  
			    $page = $_GET['page'];  
			}
			
			$page_first_result = ($page-1) * $results_per_page; // bestimmt SQL Limit start wert ab welchem die ergebnisse angezeigt werden sollen
			
			$result = Film::searchFilmsPagenation($db, $q, $page_first_result, $results_per_page);
			
		 	printTable($result, 'datatable', 'film', 'show'); // eine Tabelle mit den Suchergebnissen wird gedruckt
			
			echo '<div class="pagination">';  
			
			if ($page == 1) // bestimmt auf welcher seite der besucher sich grade befindet
			{  	
				$next_page = $page + 1;
	
				for($page = 1; $page<= $number_of_page; $page++) // schleife generiert links zu einzelnen seite der Showfilms ansicht
				{  
					echo '<a href = "index.php?action=show_search&q='.$q.'&page=' . $page . '">' . $page . ' </a>';  
				}
	
				echo '<a href = "index.php?action=show_search&q='.$q.'&page=' . $next_page . '">  >>> ' . $next_page . '</a>';
			}
			else if($page == $number_of_page)
			{
				$previous_page = $page - 1;
	
				echo '<a href = "index.php?action=show_search&q='.$q.'&page=' . $previous_page . '">' . $previous_page . ' <<<  </a>';
				
				for($page = 1; $page<= $number_of_page; $page++) // schleife generiert links zu einzelnen seite der Showfilms ansicht
				{  
					echo '<a href = "index.php?action=show_search&q='.$q.'&page=' . $page . '">' . $page . ' </a>';  
				}
			} 
			else 
			{  
			    $next_page = $page + 1;
				$previous_page = $page - 1;
	
				echo '<a href = "index.php?action=show_search&q='.$q.'&page=' . $previous_page . '">' . $previous_page . ' <<<  </a>';
	
				for($page = 1; $page<= $number_of_page; $page++) // schleife generiert links zu einzelnen seite der Showfilms ansicht
				{  
					echo '<a href = "index.php?action=show_search&q='.$q.'&page=' . $page . '">' . $page . ' </a>';  
				}
	
				echo '<a href = "index.php?action=show_search&q='.$q.'&page=' . $next_page . '">  >>> ' . $next_page . '</a>';
			}
			echo '</div>';	
		}					
	}
}
?>