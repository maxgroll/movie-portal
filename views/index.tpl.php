<h1 id="entry_title" class="title">Willkommen zum M&G Filmportal</h1>
<div id="image_div">
<?php

// printTable($daten, "datatable", "film", $show = "aus", $edit = "aus", $delete = "aus"); // die Daten zu den Filmen werden gedruckt

foreach ($data as $index => $array)  // schleife formartiert die rückgabe von Film::selectRand()
{
	$id = $array['id'];
	$poster = $array['poster'];
	
	// je film wird ein a href mit img element erstellt
	echo "<a href='index.php?action=show_film&id=$id'><img class='image' src='$poster' alt='logo'></a>";
}

?>
</div>