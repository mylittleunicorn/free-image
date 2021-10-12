<?php
  include "db/koneksi.php";
  session_start();
 
  if (isset($_SESSION['login'])) {
      header("Location: beranda.php");
  }
  if(isset($_POST['signin'])){
    $email = $_POST['email'];
    $pass  = $_POST['pass'];
    $query = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE email='$email'");
    $r = mysqli_num_rows($query);
    if ($r > 0) {
      while($row = mysqli_fetch_array($query)){
        $user_id = $row['id_user'];
        $user_name = $row['username'];
        $user_email = $row['email'];
        $user_pass = $row['password'];
      }
      if ($email == $user_email && $pass == $user_pass) {
        $_SESSION['login'] = true;
        $_SESSION['id_user'] = $user_id;
        $_SESSION['user_name'] = $user_name;
        header('location:index.php');
      }else{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('pasword salah')
            window.location.href='signin.php';
          </SCRIPT>");
      }
    }else{
       echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Akun Belum Terdaftar, Belum Punya akun? Klik OK untuk daftar')
          window.location.href='signup.php';
          </SCRIPT>");
    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
  </div>
  <div class="mb-3">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hello, world!</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
   <link real ="staylesheet"href="stayl.css">

  </head>
  <body>

  <div class="auth">
         <div class="container">
              <div class="row d-flex justify-content-center">
                   <div class="col-md-4">
                        <div class="card my-5">
                             <div class="card-body">
                                 <h3 class="mb-5">Login</h3>

                                <form method="post" action="">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" class="form-control" name="pass">
                                  </div>                             
                                  <div class="from-group my-4">
                                   <input type="submit" class="btn btn-primary" name="signin" value="Login">
                                  </div>
                                  <p>Belum Punya Akun?<a href="signup.php">Daftar!</a></p>
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
