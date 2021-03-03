<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Pendaftaran</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/main.css">
    </head>
    <body>
        <div class="row justify-content-center m-5">
            <?php 
                require_once("config.php");
                if (isset($_POST['daftar'])){
                    $nama = $_POST['nama'];
                    $email = $_POST['email'];
                    $password = md5($_POST['password']);
                    $tlp = $_POST['tlp'];
                    $tglLahir = $_POST['tglLahir'];

                    $daftar = $config->query("INSERT INTO users (nama, email, password, tlp, tglLahir) 
                    VALUES ('$nama', '$email', '$password', '$tlp', '$tglLahir')");

                    if ($daftar) {
                        echo "Berhasil di input";
                    } else {
                        echo "Gagal di input";
                    }
                }
            ?>
            <form action="" method="POST" class="col-md-5 container-login p-5 rounded">
                <div class="form-group">
                    <h1>Form Pendaftaran</h1>
                </div>
                <div class="form-group">
                    <label for=""> Nama</label>
                    <input class="form-control" type="text" name="nama" placeholder="Input Nama">
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
                    <label for=""> Nomor Hp</label>
                    <input class="form-control" type="number" name="tlp" placeholder="Input Nomor Hp">
                </div>
                <div class="form-group">
                    <label for=""> Tanggal Lahir</label>
                    <input class="form-control" type="date" name="tglLahir" plceholder="Input Tanggal Lahir">
                </div>
                <div class="form-group">
                    <button class="form-control c-green" name="daftar" type="submit">Daftar</button>
                    <button class="form-control btn-danger" type="reset">Reset</button>
                </div>
            </form>
        </div>

        <!-- SCRIPT JS bootstrap -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>
</html>