<?php

interface iFilm_genre
{
	function insertFilm_genre($db, $genres_ids);
	function updateFilm_genre($db);
	function deleteFilm_genre($db);
}
?>