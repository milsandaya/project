<?php
    require('Connect.php');

    session_start();

    if ( isset( $_SESSION['login'] ) ) {
        // Grab user data from the database using the user_id
        // Let them access the "logged in only" pages
    } else {
        // Redirect them to the login page
        header("Location:login.php");
    }


    if ($_POST && isset($_POST['title']) && isset($_POST['content'])) { 

        //  Sanitize user input to escape HTML entities and filter out dangerous characters.
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $content = filter_input(INPUT_POST, 'content');
        $category = $_POST['category_select'];
        
        //proceed if more than one character
        if (!empty($title) && !empty($content)){

        //  Build the parameterized SQL query and bind to the above sanitized values.
        $query = "INSERT INTO forumpost (category_id ,title, content) VALUES ('$category', '$title', '$content')";
        $statement = $db->prepare($query);
        
        //  Bind values to the parameters
        $statement->bindValue(':title', $title);
        $statement->bindValue(':content', $content);
        $statement->execute();
        $insert_id = $db->lastInsertId();

        header("Location: Forum.php");
    
        } else {
            header("Location: error.php"); 
        }
    }

    if (isset($_POST['category'])) {

        $category = $_POST['category_select'];
        
        $query2 = "INSERT INTO forumpost (category_id) VALUES (:category)";
        $statement2 = $db->prepare($query);
        $statement2->bindValue(':category', $category);
        $statement2->execute();
        $insert_id2 = $db->lastInsertId();
        
    }

    $sqlQuery = "SELECT * FROM categories";
        $category_statement = $db->prepare($sqlQuery); 
        $category_statement->execute();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Post</title>
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

    <section class="container mt-4">
        <form method="post" action="Create.php" enctype="multipart/form-data" >
            <div class="form-group row">
                <label for="title" class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-6">
                    <input class="form-control" id="title" name="title">
                </div>
            </div>
            <div class="form-group">
                <label for="content">What would you like to say?</label>
                <textarea class="form-control" id="content" name="content" rows="8" col="10"></textarea>
                <script>
                    ClassicEditor
                    .create( document.querySelector( '#content' ) )
                    .catch( error => {
                        console.error( error );
                    } );
                </script>
            </div>
            <div>
                <label for="category">Choose a category:</label>
                <select class="form-control" name="category_select" id="category">
                <?php 
                    while ($row = $category_statement->fetch()) {
                        echo '
                            <option value='.$row['id'].'>'.$row['category_name'].'</option>
                        ';
                    }
                 
                ?>
                </select>
            </div>
            <center>
                <input class="btn btn-primary mt-4 w-50" type="submit">
            </center>
        </form>
    </section>

    

</body>
</html>