
<?php
	require('Connect.php');
	include('search_form.php');

	$query = "SELECT * FROM forumpost WHERE title LIKE '%".$_POST['search']."%' OR 
		content LIKE '%".$_POST['search']."%'";
	$statement = $db->prepare($query); 
    $statement->execute();

 	if(!isset($_POST['search'])){

 		header("Forum.php");
 	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search Results</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
</head>

<body>
    <?php include('nav.php'); ?>

    <?php while($row = $statement->fetch()): ?>

        <h3><a href = "show.php?id=<?php echo $row['id']?>"><?= $row['title'] ?> </a></h3> 
        <?= $formatted_date ?> <a href = "edit.php?id=<?php echo $row['id']?>"> EDIT </a>

        <?php if(strlen($row['content']) > 200 ) : ?>
            <?php $row['content'] = substr($row['content'], 0, 200); ?>
            <div class = "content"> <?= $row['content'] ?> </div>
            <a href = "show.php?id=<?php echo $row['id']?>">... Read Full Post </a>
            
        <?php else :?>
            <div class = "content"> <?= $row['content'] ?> </div>
        <?php endif ?>

    <?php endwhile ?>
    
</body>
</html> 