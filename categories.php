<?php
    require('Connect.php');
    
    $query = "SELECT * FROM categories";
    $statement = $db->prepare($query); 
    $statement->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forums</title>
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
    
    <?php
        if (isset($_SESSION['userlogin'])) {
            $login = $_SESSION['userlogin'];
            if ($login == 1) {
              echo '
                <a href="create_or_update_category.php" class="btn btn-primary float-right m-4">Create a Category</a>
              ';  
            } 
          } 
    ?>

    <br />
    <section class="container mt-4">
        <h2 class="font-weight-bold">
            Categories
        </h2>
        <div class="list-group">
        <?php
            while ($row = $statement->fetch()) {
                echo '
                    <a href="update_category.php?id='.$row['id'].'" class="list-group-item list-group-item-action">'.$row['category_name'].'</a>
                ';
            }
        ?>
    </div>
    </section>

    


    
</body>
</html> 
