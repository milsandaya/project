
<!-- <form class="form-inline my-2 my-lg-0" name="searchbar" action="search_results.php">
      <input name = "search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit" value="Search"/>
</form> -->

<?php
      if (isset($_POST['submit'])) {
            $search = $_POST['search'];
            require('Connect.php');
            $query = "SELECT * FROM `forumpost` WHERE title LIKE '%$search%';";
            $statement = $db->prepare($query);
            $statement->execute(); 
            if ($row =  $statement->fetch()) {
                  header("Location: show.php?id=".$row['id']);
            }
      }

?>


<form class="form-inline my-2 my-lg-0" method="POST" name="searchbar" >
      <input name = "search" class="form-control mr-sm-2" type="search" placeholder="Search Forum" aria-label="Search">
      <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit" value="Search"/>
</form>