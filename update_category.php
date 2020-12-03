<?php
    require('Connect.php');

    // Edit post if title, content and id are present in POST.
     if ($_POST && isset($_POST['category_name']) && isset($_POST['id'])) {

        // Sanitize user input.
        $category_name  = filter_input(INPUT_POST, 'category_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id      = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        // Build the parameterized SQL query and bind to the above sanitized values.
        $query     = "UPDATE categories SET category_name = :category_name WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':category_name', $category_name); 
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        

        if (!empty($category_name)) {

            // Execute the edit.
            $statement->execute();
        
            // Redirect to index.php after edit.
            header("Location: categories.php");
            exit;

        } else {

            header("Location: error.php");
        }
        

        // Retrieve post to be edited, if id GET parameter is in URL.
    } else if (isset($_GET['id'])) { 
        // Sanitize the id. 
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        // Build the parametrized SQL query using the filtered id.
        $query = "SELECT * FROM categories WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        
        // Execute the SELECT and fetch the single row returned.
        $statement->execute();
        $categories = $statement->fetch();

    } else if (empty($_GET['id']) && (is_int($_GET['id']))) {
        header("Location: categories.php");
         exit;

    } else {
        // False if we are not editing.
        $id = false; 
        header("Location: categories.php");
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Category</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script></head>
<body>
    <?php 
        session_start();
        include_once './nav.php';
    ?>

    <?php
        if (isset($_SESSION['userlogin'])) {
            $login = $_SESSION['userlogin'];
            if ($login != 1) {
                header("Location: login.php");
            } 
        } else {
            header("Location: login.php");
        } 
    ?>



    <?php if ($id): ?>
    <section class="container w-50 mt-5">
        <div>
            <div>
            <div class="card card-body shadow">
                <h1 class="text-center mb-3"><i class="fas fa-sign-in-alt"></i>Edit the Post</h1>
                <form method="post">
                <input type="hidden" name="id" value="<?= $categories['id'] ?>">
                <div class="form-group">
                    <label for="admission">Post</label>
                    <input class="form-control" id="category_name" name="category_name" 
                    value="<?= $categories['category_name'] ?>">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Edit</button>
                </form>
            </div>
            </div>
        </div>
    </section>
    <?php endif ?>

</body>
</html>