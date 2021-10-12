<?php 
  session_start();
  include "db/koneksi.php";
  $kategori = $_GET['kategori'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
    <!-- css -->
    <link rel="stylesheet" href="style.css">


    <link rel="stylesheet" href="jquery.flex-images.css">

    
    <title>Free Image</title>
  </head>
  <body>
      <!-- NAV -->
      <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="index.php">FREE IMAGE</a> 
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Left nav -->
          <!-- <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Left</a>
              </li>
              <li class="nav-item">
                <a class="nav-link">Codeply</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
            </ul>
          </div> -->

          <!-- Right Nav -->
          <?php if (isset($_SESSION['login'])): ?>
          <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $_SESSION['user_name'] ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="profile.php?iduser=<?php echo $_SESSION['id_user'] ?>">Profil</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="signout.php">Keluar</a>
                </div>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="upload.php"><button class=""><i class="fa fa-upload mx-md-1" aria-hidden="true"></i> UPLOAD</button></a>
              </li>
            </ul>
          </div>

          <?php else: ?>
          <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="signin.php">LOGIN</a>
              </li>
              <li class="nav-item">
              <a href="signin.php" class="nav-link" href="#"><button class=""><i class="fa fa-upload mx-md-1" aria-hidden="true"></i> UPLOAD</button></a>
              </li>
            </ul>
          </div>

          <?php endif ?>
          
        </div>
      </nav>
      <!-- NAV -->
      <div class="container">
      	<div class="row">
      	<div class="judul-kategori p-md-2">
      		<h3>Kategori image <?php echo $kategori ?></h3>
      		<hr>
      	</div>
	      <div class="gallery-container">
		     <?php
            $query_user_gamabar = mysqli_query($koneksi,"SELECT * FROM tb_gambar where kategori='$kategori'");
            while ($select_user_gambar = mysqli_fetch_array($query_user_gamabar)) {
            ?>
          <div class="image">
            <a href="download.php?id=<?php echo $select_user_gambar['id_gambar'] ?>" data-lightbox="image-1">
              <img src="image/<?php echo $select_user_gambar['gambar'] ?>" data-lightbox="image-1">
            </a>
          </div>
          <div class="text">
             <h5></h5>
          </div>
          <?php 
          }
          ?>
	    	</div>
	    	</div>
    	</div>
      
    
        

    <!-- Optional JavaScript; choose one of the two! -->  
    

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="jquery.flex-images.js"></script>
    <script type="text/javascript">
          $('.flex-images').flexImages({rowHeight: 100});
        </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    
    
  </body>
</html>