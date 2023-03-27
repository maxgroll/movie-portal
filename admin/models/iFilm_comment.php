<?php

interface iFilm_comment
{
	function insertFilm_comment($db, $films_id);
	function updateFilm_comment($db);
	function deleteFilm_comment($db);
}
?>