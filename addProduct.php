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
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <a class="navbar-brand" href="index.php">TOKO XYZ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="addProduct.php">Tambah Produk <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="logout.php">LogOut <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="row justify-content-center m-5">
            <form action="" method="POST" class="col-md-5 container-login p-5 rounded">
                <div class="form-group">
                    <h3 class="text-center">Form Tambah Produk</h3>
                </div>
                <div class="form-group">
                    <?php 
                        require_once("config.php");

                        if (isset($_POST['tambah_produk'])){
                            $nama_produk = $_POST['nama_produk'];
                            $jenis = $_POST['jenis'];
                            $stok = $_POST['stok'];
                            $harga = $_POST['harga'];
                            $tambahProduk = $config->query("INSERT INTO produk (nama_produk, jenis, stok, harga) 
                            VALUES ('$nama_produk', '$jenis', '$stok', '$harga')");
                            if ($tambahProduk) {
                                echo '
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Tambah Produk Berhasil
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                ';
                            } else {
                                echo '
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        Tambah Produk Gagal
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
                    <label for=""> Nama Produk</label>
                    <input class="form-control" type="text" name="nama_produk" placeholder="Input Nama Produk">
                </div>
                <div class="form-group">
                    <label for=""> Jenis Produk</label>
                    <select class="form-control" name="jenis" aria-label="Default select example">
                        <option selected>Pilih Kategori</option>
                        <?php
                            $query2 = $config->query("SELECT * FROM jenis_produk");
                            while ($data2 = $query2->fetch_assoc()) {?>
                                <option value="<?php echo $data2['id']?>"><?php echo $data2['nama']?></option>
                            <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for=""> Stok Produk</label>
                    <input class="form-control" type="number" name="stok" placeholder="Input Stok Produk">
                </div>
                <div class="form-group">
                    <label for=""> Harga Produk</label>
                    <input class="form-control" type="number" name="harga" placeholder="Input Harga Produk">
                </div>
                <div class="form-group">
                    <button class="form-control c-green" name="tambah_produk" type="submit">Tambah Produk</button>
                </div>
            </form>
        </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>