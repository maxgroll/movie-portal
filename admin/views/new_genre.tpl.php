<h2>Neues Genre eintragen</h2>
<form method="post" action="start.php?action=new_genre">
	
<label for ="genre">Genre</label>
<input type="text" id="genre" name="genre" required="required" value="<?php setDefaultValue('genre');?>">
<br>
<input type="submit" name="submit" value="Genre speichern">
<?php require_once "_new_genre.tpl.php" ;?>
</form>