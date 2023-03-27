<h2 class="title">Login</h2>

<form method="post" action="index.php?action=login">

<label for ="username">Username</label>
<input type="text" id="username" name="username" required="required" value="<?php setDefaultValue('username');?>">

<label for ="password">Password</label>
<input type="password" id="password" name="password" autocomplete ="off" required="required" value="<?php setDefaultValue('password');?>">
<br>

<input type="submit" id="submit" name="submit" value="Login">

<?php require_once "_login.tpl.php" // Logik nach submit der Login Form wird eingebunden ?>
</form>