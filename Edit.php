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

    // Edit post if title, content and id are present in POST.
     if ($_POST && isset($_POST['title']) && isset($_POST['content']) && isset($_POST['id'])) {

        // Sanitize user input.
        $title  = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $content = filter_input(INPUT_POST, 'content');
        $id      = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        // Build the parameterized SQL query and bind to the above sanitized values.
        $query     = "UPDATE forumpost SET title = :title, content = :content WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);        
        $statement->bindValue(':content', $content);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        

        if (!empty($title) && !empty($content)) {

            // Execute the edit.
            $statement->execute();
        
            // Redirect to index.php after edit.
            header("Location: Forum.php");
            exit;

        } else {

            header("Location: error.php");
        }
        

        // Retrieve post to be edited, if id GET parameter is in URL.
    } else if (isset($_GET['id'])) { 
        // Sanitize the id. 
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        // Build the parametrized SQL query using the filtered id.
        $query = "SELECT * FROM forumpost WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        
        // Execute the SELECT and fetch the single row returned.
        $statement->execute();
        $forumpost = $statement->fetch();

    } else if (empty($_GET['id']) && (is_int($_GET['id']))) {
        header("Location: Forum.php");
         exit;

    } else {
        // False if we are not editing.
        $id = false; 
        header("Location: Forum.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Post</title>
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
        <?php if ($id): ?>
            <form method="post">
                <!-- Hidden input for the forumpost primary key. -->
                <input type="hidden" name="id" value="<?= $forumpost['id'] ?>">

                <h3>Edit Post</h3>
                <!-- forumpost table title and content are echoed into the input value attributes. -->
                <div class="form-group row">
                    <label for="title" class="col-sm-3 col-form-label">Title</label>
                    <div class="col-lg-6">
                        <input class="form-control" id="title" name="title" 
                        value="<?= $forumpost['title'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="content">What would you like to say?</label>
                    <textarea class="form-control" id="content" name="content" rows="3"> 
                        <?php echo $forumpost['content'] ?>
                    </textarea>
                    <script>
                        ClassicEditor
                        .create( document.querySelector( '#content' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>
                </div>
                <div class="row">
                    <div class="col">
                        <input class="btn btn-info" type="submit" value = "Update"> 
                    </div>
                    <div class="col">

                    </div>
                </div>
            </form>
        <?php endif ?>
                <!-- Delete specific post.-->
        <?php if ($id): ?>
            <form action="Delete.php" method="post">
                    <input type="hidden" name="id" value="<?= $forumpost['id'] ?>">
                    <br><input class="btn btn-danger" type="submit" value = "Delete">
            </form>
        <?php endif ?>
    </section>
</body>
</html>