<?php
    
    $query = "SELECT * FROM forumpost";
    $statement = $db->prepare($query); 
    $statement->execute();
    

    if ($_POST && isset($_POST['comment']) && isset($_POST['name'])){ //&& isset($_POST['captcha_code'])){

        $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // $captcha_code = filter_input(INPUT_POST, 'captcha_code', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (!empty($comment) && !empty($name)){ //&& !empty($captcha_code)) {

            $query     = "INSERT INTO comment (comment, name) VALUES (:comment, :name)";
            $statement = $db->prepare($query);

            $statement->bindValue(':comment', $comment);
            $statement->bindValue(':name', $name);
            //$statement->bindValue(':captcha_code', $captcha_code);
            $statement->execute();
            $insert_id = $db->lastInsertId();

        } 


        if (isset($_POST['submit'])){
            while($row = $statement->fetch())
            header("Location:show.php?id={$row['id']}");
        }
    }





    $query = "SELECT * FROM comment ORDER BY date_create ";
    $statement = $db->prepare($query);
    $statement->execute(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Comments</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
    <form method="post" action="show.php" id="cap_form">
        <input type="hidden" name="id" value="<?= $forumpost['id'] ?>">

        <div class="form-group row">
            <div class="col-sm-6">
                <label for="name" class="col-sm-3 col-form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="col-sm-6">
                <label for="comment" class="col-sm-3 col-form-label">Add a Comment</label>
                <input type="text" class="form-control" id="comment" name="comment">
            </div>
            <!-- <div class="col-sm-6">
                <label for="captcha_code" class="col-sm-3 col-form-label">Enter Code:</label>
                <input type="text" class="form-control" id="captcha_code" name="captcha_code">
            </div>
            <div class="col-sm-6">
                <img src ="captchaImage.php" id="captchaImage" style="margin-top: 40px"/>
            </div> -->
        </div>
        <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success">
    </form>

    <?php while($row = $statement->fetch()): ?>
        <li><?= $row['name']?> said: <?= $row['comment'] ?> </li>
    <?php endwhile ?>
</body>
</html>


<!-- <script>
    $(document).ready(function(){

        $('#cap_form').on('submit', function(event){
            event.preventDefault();
            if($('#captcha_code').val() == '')
            {
                alert('Enter Captcha Code');
                $('#submit').attr('disabled', 'disabled');
                return false;
            }
            else
            {
                $('#cap_form')[0].reset();
                $('#captcha_image').attr('src', 'captchaImage.php');
            }
        });

        $('#captcha_code').on('blur', function(){
            var code = $('#captcha_code').val();
            if(code == '')
            {
                alert('Enter Captcha Code');
                $('#submit').attr('disabled', 'disabled');
                
            }
            else
            {
                $.ajax({
                    url:"check_code.php",
                    method:"POST",
                    data:{code:code},
                    success:function(data)
                    {
                        if(data == 'success')
                        {
                            $('#submit').attr('disabled', false);

                        }
                        else
                        {
                            $('#submit').attr('disabled', 'disabled');
                            alert('Invalid Code');
                        }
                    }
                });
            }
        });
    });
</script> -->