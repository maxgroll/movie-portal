<h2>Neue Sprache eintragen</h2>
<form method="post" action="start.php?action=new_language">
	
<label for ="language">Sprache</label>
<input type="text" id="language" name="language" required="required" value="<?php setDefaultValue('language');?>">
<br>
<input type="submit" name="submit" value="Sprache speichern">

<?php require_once "_new_language.tpl.php"; ?>
</form>