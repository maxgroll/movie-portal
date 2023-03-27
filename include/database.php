<?php
	$server = 'localhost';
	$dbname = 'fallstudie_gruppe1';
	$user = 'root';
	$password = 'root';
	
	//array &options setzt die attribute für das PDO(PHP Data Object) 
	$options = array (
		PDO::ATTR_PERSISTENT => true,
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::MYSQL_ATTR_USE_BUFFERED_QUERY=>true,
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
	);
	
	//der variabel $dsn werden Serverdaten übergeben
	$dsn = "mysql:host=$server;dbname=$dbname;charset=utf8";
	
	try
	{		// in der Variabel $db wird ein neues PDO(PHP Data Object) erzeugt
			// dem PDO werden vier Parameter übergeben, die Serverdaten aus der Variabel $dsn, die Logindaten für den Server und die $options
			$db = new PDO($dsn, $user, $password, $options);
  
			  // 
			  //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
  	}
  	catch(PDOException $e) 
  	{
  		  echo "Fehler beim Verbinden";
  	}
?>