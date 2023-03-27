<h2 class="title">Regiestrierung</h2>
<form method="post" action="index.php?action=register">

<label for="username">Username</label>
<input type="text" id="username" name="username" placeholder="Username" required="required" value="<?php setDefaultValue('username');?>"> 
<!-- <?php showError('username', 'errors') ?> -->

<label for="password">Password</label>
<input type="password" id="password" name="password" placeholder="Password1!" autocomplete ="off" required="required" value="<?php setDefaultValue('password');?>"> 

<!-- <?php showError('password', 'errors') ?> -->

<label for="email">Email</label>
<input type="text" id="email" name="email" placeholder="max.muster@muster.de" required="required" value="<?php setDefaultValue('email');?>"> 
<?php showError('email', 'errors') ?>
<br>
<input type="submit" id="submit" name="submit" value="registrieren">
<?php require_once "_register.tpl.php" // Logik nach submit der Register Form wird eingebunden ?>
</form>