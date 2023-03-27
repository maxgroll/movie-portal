<?php 
if(isset($_POST['submit']))  
{	
	if($_POST['antwort'] == "ja")
	{	
		$result = Comment::deleteComment($db, $comment_id);
		
		if($result == true)
		{
			$message = "<p class='message'>Der Kommentar wurde gelöscht!</p>";	
			redirect("start.php?message=$message&action=show_film_admin&id=$film_id");
		}
	}
	else
	{	
		redirect("start.php?action=show_film_admin&id=$film_id");
	}
}
?>