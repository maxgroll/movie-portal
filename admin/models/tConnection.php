<?php
trait Connection
{
	function logout() // methode logout() löscht $_SESSION
	{
		session_unset();
		session_destroy();
	}
	
	function sessionInsert($seesion_var, $id, $session_var2, $name) // methode sessionInsert() fügt zwei werte in eine $_SESSION
	{
		$_SESSION[$seesion_var] = $id;
		$_SESSION[$session_var2] = $name;
	}
}	
?>