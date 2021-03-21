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
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ae907cd8df.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php require_once("header.php") ?>

    <div class="row justify-content-center mt-5">
        <div class="col-md-7">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        require_once("../config.php");
                        
                        $query = $config->query("SELECT * FROM produk WHERE hapus='false'");
                        $no=1;
                        while ($data = $query->fetch_assoc()) {
                            $jenis = $data['jenis'];
                            $query2 = $config->query("SELECT * FROM jenis_produk WHERE id='$jenis'");
                            $data2 = $query2->fetch_assoc();
                    ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data['nama_produk'] ?></td>
                        <td><?php echo $data2['nama'] ?></td>
                        <td><?php echo $data['stok'] ?></td>
                        <td><?php echo $data['harga'] ?></td>
                        <td>
                            <a href="edit.php?p=<?php echo $data['id'] ?>"><i class="fas fa-edit"></i></a> ||
                            <a href="delete.php?p=<?php echo $data['id'] ?>"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                        $no++;
                        } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>