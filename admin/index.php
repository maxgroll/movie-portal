<?php
session_start();
require_once "include/functions.php";
require_once 'include/database.php';
?>
<link rel="stylesheet" href="css/style.css">
   <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Permanent+Marker&family=Poppins:wght@400;500;600;700&display=swap"
       rel="stylesheet">
<h2 class="title">Login</h2>
<form method="post" action="index.php">

<label for ="username">Username</label>
<input type="text" id="username" name="username" required="required" value="<?php setDefaultValue('username');?>">

<label for ="password">Password</label>
<input type="password" id="password" name="password" required="required" value="<?php setDefaultValue('password');?>">
<br>
<input type="submit" id="submit" name="submit" value="Login">
<?php
if(isset($_POST['submit']))
{	
	foreach ($_POST as $key => $value) 
	{
		$_POST[$key] = clean($_POST[$key]);
	}
	$username = $_POST['username'];
	$password = $_POST['password'];
	$data = ["username" => $username, "password" => $password];
		
	$admin = new Admin($data);
	$result = $admin->login($db, $password);
	
	if($result == true)
	{
		$message = "Wilkommen " .$_SESSION['firstname']. "!";
		redirect("start.php?action=start&message=$message");
	}
	else
	{
		$message = "<p class='error'>Logindaten fehlerhaft oder nicht vorhanden!</p>";
		echo $message;
		//createError('login', $message);
	}
}
?>
</form>