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
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://kit.fontawesome.com/ae907cd8df.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
        require_once("header.php");
        if(isset($_POST['keranjang'])){
            $id_produk = $_POST['id'];
            if(isset($_SESSION['cart'][$id_produk])){
                $_SESSION['cart'][$id_produk]+=1;
                echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Produk Berhasil Masuk Keranjang!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                ';
            } else {
                $_SESSION['cart'][$id_produk] = 1;
                echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Produk Berhasil Masuk Keranjang!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                ';
            }
        }
    ?>
    <div class="row m-5">
        <?php  
            require_once("config.php");
            
            foreach ($_SESSION['cart'] as $id_produk => $jumlah):      
                $query = $config->query("SELECT * FROM produk WHERE id = '$id_produk'");
                $data = $query->fetch_assoc();
                $subTotal = $data['harga']*$jumlah
        ?>
            <div class="col-md-4 p-3">
                <div class="border p-3 bg-white rounded">
                    <img src="<?php echo 'assets/image/'.$data['gambar'] ?>" width="350px">
                    <div class="mb-3">
                        <h3 class="text-center"><?php echo $data['nama_produk'] ?></h3>
                        <div class="float-left">
                            <p>Jumlah : <button class="btn btn-light text-primary" type="submit"><i class="fas fa-plus"></i></button> <?php echo $jumlah ?> <button class="btn btn-light text-primary" type="submit"><i class="fas fa-minus"></i></button></p>
                        </div>
                        <div class="float-right">
                            <p class="c-green"><?php echo 'Rp. '.number_format($subTotal,0,',','.').',-'?></p>
                        </div>
                    </div><br>
                    <form action="" method="POST" class="mb-4">
                        <input type="text" name="id" value="<?php echo $data['id']?>" hidden>
                        <button type="submit" class="form-control btn btn-primary" name="checkout">Checkout</button>
                    </form>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <!-- SCRIPT JS bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>