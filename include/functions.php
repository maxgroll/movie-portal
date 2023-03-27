<?php
//////////////////////////////////////////
// autoload lädt automatisch alle klassen
function autoloader(string $param)
{
	if(file_exists("models/" . $param . ".php"))
	{
		require_once "models/" . $param . ".php";
	}
}
spl_autoload_register('autoloader');

//////////////////////////////////////////
// logout zerstört die session zwecks ausloggen
function logout()
{
	session_unset();
	session_destroy();
}

//////////////////////////////////////////
// redirect leitet den besucher zu einer beliebigen seite
// $url = url der seite zu der der besucher umgeleitet werden soll
function redirect($url)
{
	header("Location: $url");
	exit;
}

//////////////////////////////////////////
// redirect_java wie funktion umleite bloß per javascript
// $url = url der seite zu der der besucher umgeleitet werden soll
function redirect_java($url)
{
	echo '<script type="text/javascript"> window.location=" '.$url.' ";</script>';
}

//////////////////////////////////////////
// clean stellt HTML-Entities als text dar. HTML Code kann nicht eingeschleust werden
// entfernt HTML-, XML- oder PHP-Tags
// entfernt vorangestellte oder hinterstehende leerzeichen
function clean($param)
{
	return htmlspecialchars(strip_tags(trim($param)));
}

//////////////////////////////////////////
/////// Funktion printTable
//// $daten(assoziatives array) = Assoziatives Array (z.B. aus einem SQL SELECT *), 
//// es kann ein eindimensionales oder zweidimensionales array übergeben werden (fetch oder fetchAll)
//// $class(string) =  CSS klassenname für table, tr, td, th elemente
//// $param(string) = wert für die action im ahref siehe letzte drei zeilen
//// $show(string), $edit(string), $delete(string) = optionale parameter. wenn diese nicht initialisiert werden, wird eine einfache tabelle gedruckt
// falls $show mit "show" initialisiert wird, wird vor ende jeder zeile ein 
// ahref mit link zum controller mit zusatz action=show_$param gedruckt
// falls $edit mit "edit" initialisiert wird, wird vor ende jeder zeile ein 
// ahref mit link zum controller mit zusatz action=edit_$param gedruckt
// falls $delete mit "delete" initialisiert wird, wird vor ende jeder zeile ein 
// ahref mit link zum controller mit zusatz action=delete_$param gedruckt
// wenn nur einer oder zwei von den optionalen paramtern initialisiert werden soll, 
// dann müssen die anderen auf Grund der festgelegten reihenfolge ausdrücklich mit "aus" initialisiert werden
function printTable($daten, $class, $param, $show = "aus", $edit = "aus", $delete = "aus")
{
	if (!isset($daten[0])) // es wird gepürft ob, das übergebene array 1d oder 2d ist. Falls es nur eine dimension hat, wird es in ein zweidimensionales umgewandelt
	{
		$temp = array();
		$temp[] = $daten;
		$daten = $temp;
	}
	
	echo "<table class=$class>"; // openning tag der tabelle wird erstellt
	
	// Tabellenzeile mit Köpfen und Überschriften($key) wird erstellt
	foreach ($daten as $index => $array) 
	{
		echo "<tr class=$class>"; 
		foreach ($array as $key => $value) 
		{
			if($key == "id"); // falls $key wert ID entspricht, wird hierfür kein Tabellenkopf erstellt
			else
			{
				echo "<th class=$class>" . ucwords($key) . "</th>";
			}
		}
		echo "</tr>";
		break;
	}

	// Tabellenzeilen werden erstellt
	foreach ($daten as $index => $array) 
	{
		echo "<tr class=$class>";
		foreach ($array as $key => $value) 
		{
			if($key == "id"); // falls $key wert ID entspricht, wird hierfür kein Tabellenkopf erstellt
			else
			{
				$value = ucwords(str_replace(","," / ",$value));
				echo "<td class=$class>" . $value . "</td>"; // falls der $key nicht dem übergebenem parameter &genre entspricht werden tabellen spalten erstellt
			}
		}
		
		// vor ende jeder tabellenzeile werden drei letzte spalten erstellt mit je einem anker element und href attribut
		// dem href wird die url des controllers übergeben
		// zusätzlich wird der url die jeweilige action und id des eintrag aus der jeweiligen tabellenzeile mitgegeben
		// die id lässt sich auf der folgeseite somit über $_GET['id'] abrufen und weiterverwenden
		if(isset($array['id']))
		{
			$id = $array['id'];
		}
		if ($show == "show") // falls $show als "show" initialisiert wurde
		{
			echo "<td class=$class> <a href='index.php?action=show_{$param}&id=$id'>show</a> </td>";
		}
		if ($edit == "edit") // falls $edit als "edit" initialisiert wurde
		{
			echo "<td class=$class> <a href='index.php?action=edit_{$param}&id=$id'>edit</a> </td>";
		}
		if ($delete == "delete") // falls $delete als "delete" initialisiert wurde
		{
			echo "<td class=$class> <a href='index.php?action=delete_{$param}&id=$id'>delete</a> </td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}

//////////////////////////////////////////
// setDefaultValue setzt defaultwerte für Inputelemente in Formularen
// bei Falscheingabe nach submit, bleiben eigegebene Daten bestehen
// $param1 = ID des jeweiligen Inputelements
function setDefaultValue($param1):void
{
	if(!empty($_POST[$param1]))
	{
		echo $_POST[$param1];
		return;
	}
	else 
	{
		echo "";
		return;
	}
}

//////////////////////////////////////////
// showError zeigt in formularen zu einem bestimmten html den fehler an
// $param(string) = name des html tags zu dem der Error angezeigt werden soll
// $class(string) = name der CSS klasse
function showError(string $param, string $class):void
{
	if(isset($_SESSION['errors'][$param]))
	{
		echo "<span class=$class>" . $_SESSION['errors'][$param] . "</span>";
		unset($_SESSION['errors']);
		return;
	}
}

//////////////////////////////////////////
// createError hinterlegt in dem array $_SESSION['errors'][$param]
// eine message, welche dann mit showError() ausgegeben werden kann
// $param(string) = name des html tags zu dem der Error angezeigt werden soll
// $message(string) = die message als string
function createError(string $param, string $message):void
{
	$_SESSION['errors'][$param] = $message;
	return;
}


//////////////////////////////////////////
// create_table_films 
// $param (assoc array)
// $class (string) = name der css klasse 
function create_table_films($param, $class)
{
	echo "<tr class=$class>";
	
    foreach($param as $k=>$v) 
    {
   	  	foreach($v AS $key=> $value)
   	  	{
	  	  	if ($key !== 'id') 
	  	  	{ 
 		 		if ($k % 2 == 0) 
 		 		{
					$value = ucwords(str_replace(","," / ",$value));
   		  			echo "<td id='w' class=$class>" . $value . "</td>";
 		 		}
	 			else 
	 			{
					$value = ucwords(str_replace(","," / ",$value));
	   		  		echo "<td id='g' class=$class>" . $value . "</td>";
	 			}	
			}
   	 	} 
	
	 	if ($k % 2 == 0) 
	 	{
				echo "<td id='w' class=$class><a class=$class href='index.php?action=show_film&id=" .$v['id']. "'>show</a></td>";
	 	}
	 	else 
	 	{
				echo "<td id='g' class=$class><a class=$class href='index.php?action=show_film&id=" .$v['id']. "'>show</a></td>";
	 	}
		echo "</tr>";
	}  
}

//////////////////////////////////////////
// printCheckbox
// erstellt anhand eines übergebenen 2d assoc array (z.B. aus einer sql abfrage)
// checkbox elemente. (z.B. sprachen, laender, genres etc.)
// $param = sollte die zeile aus der Tabelle sein, deren werte angezeigt werden sollen 
// (z.B. bei tabelle sprachen wäre es 'sprache')
// $class (string) = name der css klasse
// $old_values = 
function printCheckbox($assocArray2d, $param, $old_values = "aus")
{
	foreach ($assocArray2d as $index => $array) 
	{
		$name = ucfirst($array[$param]);
		$name_low = $array[$param];
		$id = $array['id'];
		
		if($old_values == "aus")
		{
			if(isset($_POST[$param]) AND in_array($id, $_POST[$param]))
			{
				echo "<label id=$name for=$name>$name</label>";
				echo "<input id=$name type='checkbox' name=' ". $param ."[]' value=$id checked='checked'>";
			}
			echo "<label id=$name for=$name>$name</label>";
			echo "<input id=$name type='checkbox' name=' ". $param ."[]' value=$id>";
		}
		else if(in_array($name_low, $old_values))
		{
			echo "<label id=$name for=$name>$name</label>";
			echo "<input id=$name type='checkbox' name=' ". $param ."[]' value=$id checked='checked'>";
		}
		else
		{
			echo "<label id=$name for=$name>$name</label>";
			echo "<input id=$name type='checkbox' name=' ". $param ."[]' value=$id>";
		}
	}	
}

//////////////////////////////////////////
// printOptions
// erstellt anhand eines übergebenen 2d assoc array (z.B. aus einer sql abfrage)
// option elemente füt einen select. (z.B. sprachen, laender, genres etc.)
// $param = sollte die zeile aus der Tabelle sein, deren werte angezeigt werden sollen 
// (z.B. bei tabelle sprachen wäre es 'sprache')
// $country = hier sollte im edit_film.tpl.php der name des landes übergeben werden, welches bisher eingetragen worden war
// $name(string) = bezeichnung des name attributes eines select tags in welchem die options erzeugt werden
function printOptions($assocArray2d, $param, $name, $country = "aus")
{	
	foreach ($assocArray2d as $index => $array) 
	{
		$id = $array['id'];
		
		if($country == "aus")
		{	
			if(isset($_POST[$name]) AND $_POST[$name] == $id)
			{
				echo '<option selected="selected" value="' . $array['id'] . '"> ' .ucfirst($array[$param]). '</option>';
			}
			else
			{
				echo '<option value="' . $array['id'] . '"> ' .ucfirst($array[$param]). '</option>';
			}
			
		}
		else if($array[$param] == $country)
		{
			
			echo '<option selected="selected" value="' . $array['id'] . '"> ' .ucfirst($array[$param]). '</option>';
		}
		else
		{
			echo '<option value="' . $array['id'] . '"> ' .ucfirst($array[$param]). '</option>';
		}	
	}
	echo "</select>";
	
	return true;	
}








?>