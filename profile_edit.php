<?php
  session_start();
 
  if (!isset($_SESSION['login'])) {
      header("Location: index.php");
  }
  include "db/koneksi.php";
  if (isset($_POST["edit"])) {
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $jenis_kelamin    = $_POST['jeniskelamin'];
    $alamat = $_POST['alamat'];
    $tanggal_lahir = $_POST['tanggallahir'];
    $photo = $_POST['photo'];

    $update   = mysqli_query($koneksi, "UPDATE tb_user SET  username='$username', email='$email', jenis_kelamin='$jenis_kelamin', alamat='$alamat', tanggal_lahir='$tanggal_lahir', photo='$photo' WHERE id_user='$id_user'");
    if ($update) {
      echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Ubah Profil Berhasil')
          window.location.href='profile.php?iduser=$id_user';
          </SCRIPT>");
    }else{
      echo "gagal";
    }
  }
  if (isset($_POST["batal"])){
    $id_user = $_POST['id_user'];
    echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.location.href='profile.php?iduser=$id_user';
          </SCRIPT>");
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
              <h3 class="mb-5">EDIT PROFILE</h3>
              <form method="post" action="">
                <?php 
                $update_user = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user='$_SESSION[id_user]'");
                while ($u=mysqli_fetch_array($update_user)) {

                ?>

                <?php if (empty($u['photo'])): ?>
                <div class="form-group d-flex justify-content-center">
                  <div class=" rounded-circle">
                    <img src="images/1.jpg" onClick="triggerClick()" id="profileDisplay" class=" rounded-circle" style="width:200px;height: 200px; object-fit: cover 50% 50% no-repeat">
                    <input type="file" name="photo" value="<?php echo $u['photo'] ?>" onChange="displayImage(this)" id="profileImage" style="display: none;" />
                  </div> 
                </div>
              <?php else: ?>
                <div class="form-group d-flex justify-content-center">
                  <div class=" rounded-circle">
                    <img src="image/<?php echo $u['photo'] ?>" onClick="triggerClick()" id="profileDisplay" class=" rounded-circle" style="width:200px;height: 200px; object-fit: cover 50% 50% no-repeat">
                    <input type="file" name="photo" onChange="displayImage(this)" id="profileImage" style="display: none;" value="<?php echo $u['photo'] ?>" />
                  </div> 
                </div>
              <?php endif ?>

                <div class="form-group">
                  <label for="inputPassword5" class="form-label">Nama pengguna</label>          
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" value="<?php echo $u['username'] ?>">  
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id_user" value="<?php echo $u['id_user'] ?>">            
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
                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tanggallahir" value="<?php echo $u['tanggal_lahir'] ?>">         
                </div>

                <div class="form-group">
                  <label for="inputPassword5" class="form-label">Email</label>          
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo $u['email'] ?>">             
                </div>

                <div class="form-group">
                  <label for="inputPassword5" class="form-label">Alamat</label>
                   <textarea class="form-control" name="alamat"><?php echo $u['alamat'] ?></textarea>             
                </div>              
                 
                <div class="from-group my-4">
                  <button class="btn btn-success" type="submit" name="batal">Kembali</button>
                  <input type="submit" class="btn btn-primary" name="edit" value="Ubah">
                </div>
                <?php 
                }

                ?>
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

    <script type="text/javascript">
      function triggerClick(e) {
          document.querySelector('#profileImage').click();
        }
        function displayImage(e) {
          if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
              document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
          }
        }
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
    -->
  </body>
</html>
