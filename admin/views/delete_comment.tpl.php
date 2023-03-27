<div>
<h3 class="delete">Soll der Kommentar <em>"<?= $comment ?>"</em> wirklich gelöscht werden?</h3>
<form method="post" action="">
<input type="checkbox" id="ja" name="antwort" value="ja" selected="selected">
<label for="ja">Ja</label><br>
<input type="checkbox" id="nein" name="antwort" value="nein">
<label for="nein">Nein</label><br>
<input type="submit" id="submit" name="submit" value="Auswahl bestätigen">
</form>
</div>
<?php require_once "_delete_comment.tpl.php" ?>