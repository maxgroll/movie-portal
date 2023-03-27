<h2 class="title">Neuen Film eintragen</h2>
<form method="post" action="index.php?action=new_film">
	
<label for ="title">Title</label>
<input type="text" id="title" name="title" placeholder="Titel" required="required" value="<?php setDefaultValue('title');?>">

<label for ="director">Director</label>
<input type="text" id="director" name="director" placeholder="Director" required="required" value="<?php setDefaultValue('director');?>">

<label for ="release_year">Jahr</label>
<input type="text" id="release_year" name="release_year" placeholder="2000" required="required" value="<?php setDefaultValue('release_year');?>">

<label for ="runtime">Runtime</label>
<input type="text" id="runtime" name="runtime" placeholder="120 min" required="required" value="<?php setDefaultValue('runtime');?>">

<label for ="poster">Poster(URL)</label>
<input type="text" id="poster" name="poster" placeholder="https://m.media-amazon.com/images/poster.jpg" required="required" value="<?php setDefaultValue('poster');?>">

<label for ="actor1">Hauptdarsteller</label>
<input type="text" id="actor1" name="actor1" placeholder="Hauptdarsteller" required="required" value="<?php setDefaultValue('actor1');?>">

<label for ="actor2">Nebendarsteller</label>
<input type="text" id="actor2" name="actor2" placeholder="Nebendarsteller" value="<?php setDefaultValue('actor2');?>">

<label for ="actor3">Nebendarsteller</label>
<input type="text" id="actor3" name="actor3" placeholder="Nebendarsteller" value="<?php setDefaultValue('actor3');?>">

<label for ="imdbID">imdbID</label>
<input type="text" id="imdbID" name="imdbID" placeholder="tt1234567" value="<?php setDefaultValue('imdbID');?>">
<br>
<label for="countries_id">Land</label>
<select name="countries_id" required="required">
<?php printOptions($countries, 'country', 'countries_id'); // Option Elemente werden zu allen Ländern erstellt ?>
</select>
<br>
<?php printCheckbox($genres, "genre"); // Option Elemente werden zu allen Genres erstellt?>
<hr>
<?php printCheckbox($languages, "language");// Option Elemente werden zu allen Sprachen erstellt?>
<br>
<label for="plot">Plot</label>
<br>
<textarea cols="35" rows="10" name="plot" id="plot" placeholder="maximal 1024 Zeichen erlaubt..." required="required">
<?php setDefaultValue('plot');?>
</textarea>

<input type="submit" id="submit" name="submit" value="neuen Film hinzufügen">
<?php require_once "_new_film.tpl.php" // Logik nach submit der new film Form wird eingebunden ?>
</form>