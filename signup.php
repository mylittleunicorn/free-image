<?php
  session_start();
 
  if (isset($_SESSION['login'])) {
      header("Location: beranda.php");
  }
  include "db/koneksi.php";
  if (isset($_POST["daftar"])) {
    $username = $_POST['username'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $tanggallahir = $_POST['tanggallahir'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $daftar   = mysqli_query($koneksi, "INSERT INTO tb_user VALUES ('', '$username', '$email', '$jeniskelamin', '', '$tanggallahir', '', '$password', '')");
    if ($daftar) {
      echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Pendaftaran Berhasil, Klik OK untuk Login')
          window.location.href='signin.php';
          </SCRIPT>");
    }else{
      echo "gagal";
    }
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
  </div>
  <div class="mb-3">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hello, world!</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="style.css">

  </head>
  <body>

  <div class="auth">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-4 col-lg-5">
          <div class="card my-5">
            <div class="card-body">
              <h3 class="mb-5">DAFTAR</h3>
              <form method="post" action="">
                <div class="form-group">
                  <label for="inputPassword5" class="form-label">Nama pengguna</label>          
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">             
                </div>
                                  
                <div class="form-group">
                  <label for="inputPassword5" class="form-label">Jenis kelamin</label>          
                    <select class="form-control" id="exampleFormControlSelect1" name="jeniskelamin">
                      <option value="laki-laki">Laki - Laki</option>
                      <option value="perempuan">Perempuan</option>
                    </select>          
                </div>

                <div class="form-group">
                  <label for="inputPassword5" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tanggallahir">         
                </div>

                <div class="form-group">
                  <label for="inputPassword5" class="form-label">Email</label>          
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">             
                </div>

                <div class="form-group">
                  <label for="inputPassword5" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password">             
                </div>              
                 
                <div class="from-group my-4">
                  <input type="submit" class="btn btn-primary" name="daftar" value="Daftar">
                </div>

                <p>Sudah Punya Akun?<a href="signin.php">Masuk!</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
    -->
  </body>
</html>
