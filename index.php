<?php 
    session_start();
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    } elseif ($_SESSION['role'] !== "Customer") {
        header('location: admin/index.php');
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
    <script src="https://kit.fontawesome.com/ae907cd8df.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require_once("header.php")?>
    <div class="row m-5">
        <div class="col-md-4 p-3">
            <div class="border p-3">
                <img src="https://id-test-11.slatic.net/shop/8968f70b71080c5b82913f1cbab045c3.jpeg" width="350px">
                <div class="kolom">
                    <h3 class="text-center">Capung</h3>
                    <p>Stok : 5 <br>
                    Harga : 60000</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 p-3">
            <div class="border p-3">
                <img src="https://id-test-11.slatic.net/shop/8968f70b71080c5b82913f1cbab045c3.jpeg" width="350px">
                <div class="kolom">
                    <h3 class="text-center">Capung</h3>
                    <p>Stok : 5 <br>
                    Harga : 60000</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 p-3">
            <div class="border p-3">
                <img src="https://id-test-11.slatic.net/shop/8968f70b71080c5b82913f1cbab045c3.jpeg" width="350px">
                <div class="kolom">
                    <h3 class="text-center">Capung</h3>
                    <p>Stok : 5 <br>
                    Harga : 60000</p>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPT JS bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>