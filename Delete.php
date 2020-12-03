<?php
	require('Connect.php');

	if (isset($_POST['id'])){
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    	$query = "DELETE FROM forumpost WHERE id = :id LIMIT 1";
    	$statement = $db->prepare($query);
    	$statement->bindValue(':id', $id, PDO::PARAM_INT);
    	$statement->execute();
	}

	//Go back to index once post is deleted.
	header('Location: Forum.php');

?>