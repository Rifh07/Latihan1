<?php 
    session_start();
    if(isset($_SESSION['email'])){
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/main.css">
    </head>
    <body>
        <div class="row justify-content-center m-5">
            <form action="" method="POST" class="col-md-5 container-login p-5 rounded">
                <div class="form-group">
                    <h1>Form Login</h1>
                </div>
                <div class="form-group">
                    <?php 
                        require_once("config.php");
                        if (isset($_POST['login'])){
                            $email = $_POST['email'];
                            $password = md5($_POST['password']);

                            $login = $config->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
                            $row = $login->num_rows;

                            if ($row > 0) {
                                $_SESSION['email'] = $email;
                                header('location: index.php');
                            } else {
                                echo '
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        Anda Gagal Login
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                ';
                            }
                        }
                    ?>
                </div>
                <div class="form-group">
                    <label for=""> Email</label>
                    <input class="form-control" type="email" name="email" placeholder="Input Email">
                </div>
                <div class="form-group">
                    <label for=""> Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Input password">
                </div>
                <div class="form-group">
                    <button class="form-control c-green" name="login" type="submit">Login</button>
                </div>
            </form>
        </div>

        <!-- SCRIPT JS bootstrap -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>
</html>