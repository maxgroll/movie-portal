<h2>Neues Land eintragen</h2>
<form method="post" action="start.php?action=new_country">
	
<label for ="country">Land</label>
<input type="text" id="country" name="country" required="required" value="<?php setDefaultValue('country');?>">
<br>
<input type="submit" name="submit" value="Land speichern">
<?php require_once "_new_country.tpl.php"; ?>
</form>