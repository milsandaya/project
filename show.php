<?php
    require('Connect.php');
    require('Authenticate.php');
    
    $query = "SELECT * FROM forumpost WHERE id = {$_GET['id']}";
    $post_statement = $db->prepare($query); 
    $post_statement->execute();



    $query = "SELECT * FROM comment ORDER BY date_create ";
    $comment_statement = $db->prepare($query);
    $comment_statement->execute(); 
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

    <section class="container">
        <?php
            if (isset($_GET['m'])) {
                if ($_GET['m'] == 's') {
                    echo '
                        <div class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
                            <strong>Comment Successfully Added</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    ';
                }
            }
        ?>
        <?php while ($row = $post_statement->fetch()): ?>
            <?php $formatted_date = date("F j, Y, g:i a", strtotime($row['timestamp'])); ?>

            <h2><?= $row['title'] ?></h2>
            <?= $formatted_date ?> <a href = "edit.php?id=<?php echo $row['id']?>"> EDIT </a>
            <p><?= $row['content'] ?></p>
        <?php endwhile ?> 
        <form method="post" action="main.php" id="cap_form">
            <input type="hidden" name="id" value="<?= $forumpost['id'] ?>">

            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="name" class="col-sm-3 col-form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <?php
                        $did = $_GET['id'];
                        echo '
                            <input type="hidden" name="docId" value="'.$did.'">
                        ';
                    ?>
                </div>
                <div class="col-sm-6">
                    <label for="comment" class="col-sm-3 col-form-label">Add Comment</label>
                    <input type="text" class="form-control" id="comment" name="comment">
                </div>
                </div>
            <input type="submit" name="addComment" name="submit" id="submit" value="Submit" class="btn btn-success">
        </form>

        <?php while($row = $comment_statement->fetch()): ?>
            <li><?= $row['name']?> said: <?= $row['comment'] ?> </li>
        <?php endwhile ?>
    </section>
    
</body>
</html> 