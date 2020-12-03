<?php
require('Connect.php');

if (isset($_POST['addComment'])) {
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $docId = filter_input(INPUT_POST, 'docId', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (!empty($comment) && !empty($name)){ //&& !empty($captcha_code)) {
        $query     = "INSERT INTO comment (comment, name) VALUES (:comment, :name)";
        $comment_statement = $db->prepare($query);
        $comment_statement->bindValue(':comment', $comment);
        $comment_statement->bindValue(':name', $name);
        //$statement->bindValue(':captcha_code', $captcha_code);
        $comment_statement->execute();
        $insert_id = $db->lastInsertId();
    } 
    header("Location: ./show.php?m=s&id=".$docId);

}

if (isset($_POST['signIn-btn'])) {
    $user = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users";
    $statement = $db->prepare($query); 
    $statement->execute();

    while($row = $statement->fetch()){
        if($user == $row['username']){
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['userlogin'] = 1;
                $_SESSION['login']= $user;
                header("Location: ./login.php");
            } else {
                header("Location: ./login.php?auth=no");
            }
        }
    }
}
?>