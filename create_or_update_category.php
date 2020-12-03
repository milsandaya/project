<?php
    require('Connect.php');
       
    if ($_POST && isset($_POST['category_name'])) { 

        //  Sanitize user input to escape HTML entities and filter out dangerous characters.
        $category_name = filter_input(INPUT_POST, 'category_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        //proceed if more than one character
        if (!empty($category_name)){

        //  Build the parameterized SQL query and bind to the above sanitized values.
        $query = "INSERT INTO categories (category_name) VALUES (:category_name)";
        $statement = $db->prepare($query);
        
        //  Bind values to the parameters
        $statement->bindValue(':category_name', $category_name);
        $statement->execute();
        $insert_id = $db->lastInsertId();

        header("Location: categories.php");
    
        } else {
            header("Location: error.php"); 
        }
    }

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
</head>

<body>
    <?php 
        session_start();
        include_once './nav.php';
    ?>

    <section class="container w-50 mt-5">
        <div>
            <div>
            <div class="card card-body shadow">
                <h1 class="text-center mb-3"><i class="fas fa-sign-in-alt"></i>Create New Category</h1>
                <form method="post" action="create_or_update_category.php">
                <div class="form-group">
                    <label for="admission">Name of Category</label>
                    <input class="form-control" id="category_name" name="category_name">
                </div>
                <button type="submit" name="signIn-btn" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
            </div>
        </div>
    </section>
</body>
</html>