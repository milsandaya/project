<!-- <nav>
    <ul>
        <li><h1><a href="Home.php">Home</a></h1></li>
        <li><h1><a href="Shop.php">Shop</a></h1></li>
        <li><h1><a href="Forum.php">Forum</a></h1></li>  
        <li><h1><a href="Register.php">Become a Member</a></h1></li> 
        <li><h1><a href="ContactUs.php">Contact Us</a></h1></li>
    </ul>
</nav> -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="Home.php">Home</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="#">Shop</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="Forum.php">Forum</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="categories.php">Categories</a>
      </li>

      <?php 
        if (isset($_SESSION['userlogin'])) {
          $login = $_SESSION['userlogin'];
          if ($login == 1) {
            echo '
              <li class="nav-item">
                <a class="nav-link" href="Create.php">+ New Discussion</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-danger" href ="logout.php"> Logout</a>
              </li>
            ';  
          } else {
            echo '
              <li> 
              <a class="nav-link" href = "login.php">Login </a> 
              </li>
              <li class="nav-item">
              <a class="nav-link" href="Register.php">Become a Member!</a>
              </li>
            ';
          }
        } else {
          echo '
              <li> 
              <a class="nav-link" href = "login.php">Login </a> 
              </li>
              <li class="nav-item">
              <a class="nav-link" href="Register.php">Become a Member!</a>
              </li>
            ';
        }
        
      
      ?>
          
          

          

    </ul>


  <?php include('search_form.php'); ?>

  </div>
</nav>