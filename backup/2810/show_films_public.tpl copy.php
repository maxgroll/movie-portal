<h2 class="title">Filme</h2>


<table class='datatable'>
<tr>
<th class="datatable">Titel</th><th class="datatable">Direktor</th><th class="datatable">Genre</th><th class="datatable">Jahr</th>
</tr>
 
<?php create_table_films($data, "datatable"); // Tabelle aus den Daten vom Film::selectFilms() werden in eine tabelle formatiert ?> 

</table>

<div class="pagination">
<?php
	
for($page = 1; $page<= $number_of_page; $page++) // schleife generiert links zu einzelnen seite der Showfilms ansicht
{  
	echo '<a href = "index.php?action=show_films&page=' . $page . '">' . $page . ' </a>';  
}  		
?>
</div>
<div id="spacer">
	
</div>
