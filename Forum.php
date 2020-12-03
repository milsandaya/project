<?php
    require('Connect.php');
    // Starting the session for the User Login
    session_start();
    // Code for Sorting by the Timestamp of the Table
    if (isset($_GET['o'])) {
        if ($_GET['o'] == 'da') {
            $query = "SELECT * FROM `forumpost` ORDER BY `timestamp` ASC;";
        } elseif ($_GET['o'] == 'dd') {
            $query = "SELECT * FROM `forumpost` ORDER BY `timestamp` DESC;";
        }
    } else {
        $query = "SELECT * FROM forumpost ORDER BY id DESC LIMIT 10 ";
    }

     // SQL is written as a String.

     // A PDO::Statement is prepared from the query.
     $statement = $db->prepare($query);

     // Execution on the DB server is delayed until we execute().
     $statement->execute(); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forums Page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
    <meta name="description" content="For my Work on the Project SEO" />
</head>

<body>
<?php include('nav.php'); ?>

    <div class="container p-4">
        <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Sort the Items
        </button>
        <div class="collapse mt-2" id="collapseExample">
            <div class="card card-body">
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Technique</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <a href="Forum.php?o=da" class="btn btn-primary btn-sm">
                                SORT BY DATE ASEC ORDER
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>
                            <a href="Forum.php?o=dd" class="btn btn-primary btn-sm">
                                SORT BY DATE DESC ORDER
                            </a>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
        <br />
        <hr />


        <!-- <a href = "Forum2.php"> Date</a> -->

        <?php while($row = $statement->fetch()): ?>
            <div class="card mb-2">
                <div class="card-body">
                <a class="btn btn-primary btn-sm float-right" href = "edit.php?id=<?php echo $row['id']?>"> EDIT </a>

                <?php $formatted_date = date("F j, Y, g:i a", strtotime($row['timestamp'])); ?>

                <h3><a href = "show.php?id=<?php echo $row['id']?>"><?= $row['title'] ?> </a></h3> 
                <?= $formatted_date ?> 

                <?php if(strlen($row['content']) > 200 ) : ?>
                    <?php $row['content'] = substr($row['content'], 0, 200); ?>
                    <div class = "content"> <?= $row['content'] ?> </div>
                    <a href = "show.php?id=<?php echo $row['id']?>">... Read Full Post </a>
                    
                <?php else :?>
                    <div class = "content"> <?= $row['content'] ?> </div>
                <?php endif ?>
                </div>
            </div>
        <?php endwhile ?>
    </div>

    
    
</body>
</html> 