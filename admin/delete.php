<?php 
    session_start();
    if(!isset($_SESSION['email'])){
        header('location: ../login.php');
    } elseif ($_SESSION['role'] !== "Admin") {
        header('location: ../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <?php require_once("header.php") ?>

    <div class="row justify-content-center mt-5">
        <div class="col-md-5 container-login p-5 rounded">
            <h3 class="text-center mb-5">Hapus Produk</h3>

            <?php 
                require_once("../config.php");
                $param = $_GET['p'];
                $query = $config->query("SELECT * FROM produk WHERE id='$param'");
                $data = $query->fetch_assoc();

                if(isset($_POST['yes'])) {
                    $queryDelete = $config->query("UPDATE produk SET hapus='true' WHERE id='$param'");

                    if($queryDelete){
                        echo'
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Delete produk berhasil
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                    } else {
                        echo'
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Delete produk gagal
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                    }
                } elseif (isset($_POST['no'])){
                    header('location: index.php');
                }
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Apakah Anda Ingin menghapus Produk <b><?php echo $data['nama_produk'] ?></b> Ini?
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" class="form-goup">
                <button class="btn btn-danger" name="yes"> Yes</button>
                <button class="btn btn-secondary" name="no"> No</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>