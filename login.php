<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log in</title>
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

    <div class="background">
        <div class="m-5" >
            <div class="row">
                
            <?php
                        if (isset($_SESSION['userlogin'])) {
                            $login = $_SESSION['userlogin'];
                            if ($login != 1) {
                              echo '
                              <div style="margin-top: 2%;" class="col">
                                    <span  class="display-2 h2 font-weight-bold">Welcome</span>
                                    <br>
                                    <span class="ml-3 display-4 h3">to awesome project</span>
                                    <br>
                                </div>
                              ';  
                            } 
                          } else {
                            echo '
                                <div style="margin-top: 2%;" class="col">
                                    <span  class="display-2 h2 font-weight-bold">Welcome</span>
                                    <br>
                                    <span class="ml-3 display-4 h3">to awesome project</span>
                                    <br>
                                </div>
                              ';
                          }
                    ?>
            
                
                <div class="col">
                    <?php

                        if (isset($_GET['auth'])) {
                            if ($_GET['auth'] == 'no') {
                                echo '
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Wrong Username or Password Please Try Again!</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                ';
                            }
                        }


                        if (isset($_SESSION['userlogin'])) {
                            $login = $_SESSION['userlogin'];
                            if ($login == 1) {
                              echo '
                                <section class="container text-center">
                                    <h5 class="display-2 h2 font-weight-bold">Welcome '.$_SESSION['login'].'</h5>
                                    <a href="logout.php" class="btn btn-danger w-50 mt-4">
                                        Logout
                                    </a>    
                                </section>
                              ';  
                            } else {
                              echo '
                                <section>
                                    <div>
                                        <div>
                                        <div class="card card-body shadow">
                                            
                                            

                                            <h1 class="text-center mb-3"><i class="fas fa-sign-in-alt"></i>Login</h1>
                                            <form action="main.php" method="post">
                                            <div class="form-group">
                                                <label for="admission">User Name</label>
                                                <input class="form-control" type="text" name="username" />
                                            </div>
                                            <div class="form-group">
                                                <label for="admission">Password</label>
                                                <input class="form-control" type="password" name="password">
                                                
                                            </div>
                                            <button type="submit" name="signIn-btn" class="btn btn-primary btn-block">Login</button>
                                            </form>
                                            <p class="lead mt-4">
                                            No Account? <a href="Register.php">Register</a>
                                            </p>
                                        </div>
                                        </div>
                                    </div>
                                </section>
                              ';
                            }
                          } else {
                            echo '
                                <section>
                                    <div>
                                        <div>
                                        <div class="card card-body shadow">
                                            <h1 class="text-center mb-3"><i class="fas fa-sign-in-alt"></i>Login</h1>
                                            <form action="main.php" method="post">
                                            <div class="form-group">
                                                <label for="admission">User Name</label>
                                                <input class="form-control" type="text" name="username" />
                                            </div>
                                            <div class="form-group">
                                                <label for="admission">Password</label>
                                                <input class="form-control" type="password" name="password">
                                                
                                            </div>
                                            <button type="submit" name="signIn-btn" class="btn btn-primary btn-block">Login</button>
                                            </form>
                                            <p class="lead mt-4">
                                            No Account? <a href="Register.php">Register</a>
                                            </p>
                                        </div>
                                        </div>
                                    </div>
                                </section>
                              ';
                          }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html> 