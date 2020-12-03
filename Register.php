<?php
    //session_start();
    require('Connect.php');
    include("functions.php");

    // if(isset($_POST['register-btn'])){

    //     //this will not be added to the database
    //     unset($_POST['register-btn'], $_POST['passwordConfirm']);
    //     $_POST['admin'] = 0; //zero means false, user will not be admin

    //     $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //     $user_id = create('users', $_POST);
    //     $user = pickOne('users', ['id' => $user_id]);
    // }

    if(isset($_POST['register-btn'])){

        //  Sanitize user input to escape HTML entities and filter out dangerous characters.
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $confirmpassword = filter_input(INPUT_POST, 'confirmpassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        //proceed if more than one character
        if (!empty($username) && !empty($email) && !empty($password)){

            if($password == $confirmpassword){

                // Hashing the password with the SALT
                $hash = password_hash($password, PASSWORD_DEFAULT);

                //  Build the parameterized SQL query and bind to the above sanitized values.
                $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hash')";
                $statement = $db->prepare($query);
        
                //  Bind values to the parameters
                $statement->bindValue(':username', $username);
                $statement->bindValue(':email', $email);
                $statement->bindValue(':password', $password);
                $statement->execute();
                $insert_id = $db->lastInsertId();


                header("Location: welcome.php");

                //user log in
                // $_SESSION['id'] = $user['id'];
                // $_SESSION['username'] = $user['username'];
    
            } else {
                $error_message = "Passwords do not match.";
                echo "<script type='text/javascript'>alert('$error_message');</script>";
            }
        }
    }   



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <?php include('nav.php'); ?>

    <section class="card card-body shadow container w-50 mt-4">
        <form action="Register.php" method="post">
            <h2 class="form-title">Register</h2>
        
        <div class="">
            <label for ="username">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="">
            <label for ="email">Email</label>
            <input type="email"class="form-control"  name="email">
        </div>
        <div class="">
            <label for ="password">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="">
            <label for ="confirmpassword">Password Confirmation</label>
            <input type="password" class="form-control" name="confirmpassword">
        </div>
        <div class="">
            <button type="submit" name="register-btn" value = "Register" class="btn btn-success btn-block mt-4" style="margin-top: 30px">Register</button>
        </div>
        <p class="lead mt-4">
        Already have an Account? <a href="login.php">Sign In</a>
        </p>
        </form>
    </section>
        
</body>
</html> 