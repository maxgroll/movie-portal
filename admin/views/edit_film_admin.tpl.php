<h2>Film editieren</h2>
<form method="post" action="start.php?action=edit_film_admin&id=<?= $films_id ?>">
	
<label for ="title">Title</label>
<input type="text" id="title" name="title" required="required" value="<?= ucfirst($data['title']);?>">

<label for ="director">Director</label>
<input type="text" id="director" name="director" required="required" value="<?= ucfirst($data['director']);?>">

<label for ="release_year">Jahr</label>
<input type="text" id="release_year" name="release_year" required="required" value="<?= ucfirst($data['release_year']);?>">

<label for ="runtime">Runtime</label>
<input type="text" id="runtime" name="runtime" required="required" value="<?= ucfirst($data['runtime']);?>">

<label for ="poster">Poster(URL)</label>
<input type="text" id="poster" name="poster" required="required" value="<?= $data['poster'];?>">

<label for ="actor1">Hauptdarsteller</label>
<input type="text" id="actor1" name="actor1" required="required" value="<?= ucfirst($actors[2]);?>">

<label for ="actor2">Nebendarsteller</label>
<input type="text" id="actor2" name="actor2" value="<?= ucfirst($actors[1]);?>">

<label for ="actor3">Nebendarsteller</label>
<input type="text" id="actor3" name="actor3" value="<?= ucfirst($actors[0]);?>">

<label for ="imdbID">imdbID</label>
<input type="text" id="imdbID" name="imdbID" value="<?= $data['imdbID'];?>">
<br>

<label for="countries_id">Land</label>
<select name="countries_id" required="required">
<?php printOptions($countries, 'country', 'countries_id',$data['country']); // option elemente für alle länder werden erstellt ?>
</select>
<br>
<?php printCheckbox($genres, "genre", $genres_old); // ceckbox elemente werden für alle genres ersellt ?>
<hr>
<?php printCheckbox($languages, "language", $languages_old); // checkbox elemente werden für alle sprachen erstellt?>
<label for="plot">Plot</label>
<br>
<textarea cols="35" rows="10" name="plot" id="plot" placeholder="maximal 1024 Zeichen erlaubt..." required="required">
<?= ucfirst($data['plot']);?>
</textarea>

<input type="submit" id="submit" name="submit" value="Film editieren">

<?php require_once "_edit_film_admin.tpl.php"; ?>
</form>
