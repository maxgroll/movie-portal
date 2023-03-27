<h2>Upload</h2>   
<form action="start.php?action=json_db_insert" method="post" enctype="multipart/form-data">
<input type="file" name="file[]" id="file" multiple>
<input type="submit" name="submit" value="hochladen"/>
</form>
<?php
if(isset($_POST["submit"])) 
{
	echo "<pre>";
	print_r($_FILES);
	exit;
   		if ($_FILES["file"]["error"] > 0) 
		{
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";    
        }
		else 
		{     
            $filename = $_FILES["file"]["name"];
				
			
				
            // Save file in folder "upload" 
            move_uploaded_file($_FILES["file"]["tmp_name"], "data/uploads/" . $filename); // upgeloadete Datei wird in data/uploads/
            
			$dune = file_get_contents("data/uploads/$filename");

			$data = json_decode($dune, true);

			// array wird mit daten aus $data befüllt
			$filmdaten = [ 
			"title" => $data['Title'],
			"release_year" => $data['Year'],
			"plot" => $data['Plot'],
			"runtime" => $data['Runtime'],
			"director" => $data['Director'],
			"actors" => explode(",", $data['Actors']),
			"poster" => $data['Poster'],
			"countries" => $data['Country'],
			"imdbID" => $data['imdbID'],
			"languages" => explode(",", $data['Language']),
			"genres" => explode(",", $data['Genre'])
			];

			// sub arrays aus $filmdaten werden variablen zugewiesen
			$languages = $filmdaten['languages'];
			$genres = $filmdaten['genres'];
			$countries = $filmdaten['countries'];

			$imdbId = $filmdaten['imdbID'];

			// es wird geprüft ob ein eintrag zur übergebenen imdbID existiert
			$result = Film::checkImdbId($db, $imdbId);
			// $stmt = $db->query("SELECT imdbID FROM films WHERE imdbID = '$imdbId' ");
			// $result = $stmt->fetch();

			if($result == false) // falls die imdIb noch nicht existiert
			{
				$director = new Director($filmdaten); // eine instanz der Klasse Director wird erzeugt // construct setDirector
				$director->insert($db); // in der instanz wird methode insert ausgeführt
				$directors_id = $director->getId(); // der wert der eigenschaft id der instanz $director wird in einer variabel gespeichert
	
				$count_actors = count($filmdaten['actors']); // ermittelt größe des arrays $filmdaten['actor']
				$actors_ids = array(); 
	
				for ($i=0; $i < $count_actors ; $i++) 
				{ 
					$actor = new Actor($filmdaten['actors'][$i]); // instanz wird erstellt // construct setActor
					$actor->insert($db); // insert der instanz wird ausgeführt
					$actors_ids[$i] = $actor->getId(); // wert der eigenschaft id wird in ein array gespeichert
				}
	
				$count_genres = count($filmdaten['genres']);
				$genres_ids = array();
	
				for ($i=0; $i < $count_genres ; $i++) // ermittelt größe des arrays $filmdaten['genres']
				{ 
					$genre = new Genre(); // instanz wird erstellt
					$genre->setGenre($genres[$i]); // der eigenschaft genre wird ein wert übergeben
					$genre->insert($db); // insert der instanz wird ausgeführt
					$genres_ids[$i] = $genre->getId(); // wert der eigenschaft id wird in ein array gespeichert
				}
	
				$count_languages = count($filmdaten['languages']);  // ermittelt größe des arrays $filmdaten['languages']
				$languages_ids = array();
	
				for ($i=0; $i < $count_languages ; $i++) 
				{ 
					$language = new Language(); // instanz wird erstellt
					$language->setLanguage($languages[$i]); // der eigenschaft language wird ein wert übergeben
					$language->insert($db); // insert der instanz wird ausgeführt
					$languages_ids[$i] = $language->getId(); // wert der eigenschaft id wird in ein array gespeichert
				}

				$country = new Country();  // instanz wird erstellt
				$country->setCountry($countries); // der eigenschaft country wird ein wert übergeben
				$country->insert($db); // insert der instanz wird ausgeführt
				$country_id = $country->getId();  // wert der eigenschaft id wird in ein array gespeichert

				$filmdaten['countries_id'] = [$country_id][0]; // in $filmdaten werden die countriy_id und $driectors_id eingetragen
				$filmdaten['directors_id'] = [$directors_id][0];
	
				$film = new Film($filmdaten);  // instanz wird erstellt
				$insert = $film->insert($db, $film, $genres_ids, $languages_ids, $actors_ids); // insert der instanz wird ausgeführt
				$title = $film->getTitle();
					
				$message = "Der Film $title wurde eingetragen!";
				echo $message;
			}
			else
			{
				echo "Der Film mit der imdID $imdbId ist bereits vorhanden!";
			}
	}	   
}
?>