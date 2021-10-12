<?php 
	include "db/koneksi.php";
  session_start();

	$nama_gambar = $_FILES['poto']['name'];
	$tmp_gambar  = $_FILES['poto']['tmp_name'];
	move_uploaded_file($tmp_gambar, 'image/'.$nama_gambar);

  if (isset($_POST['upload'])) {
  	
  }
 
  
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
	<div class="row align-middle upload">
		
			<div class="col-md-6 d-flex justify-content-center">
				<img src="image/<?php echo $nama_gambar ?>">
			</div>
			<div class="col-md-6 ">
				<form action="upload_proses.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
				    <h3>Deskripsi</h3>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Judul Gambar</label>
				    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="judul">
				     <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $nama_gambar ?>" name="gambar">
				     <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $_SESSION['id_user'] ?>" name="user_id">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Kategori</label>
				    <select class="form-control" id="exampleFormControlSelect1" name="kategori">
				      <option value="hewan">Hewan</option>
				      <option value="gunung">Gunung</option>
				      <option value="laut">Laut</option>
				      <option value="manusia">Manusia</option>
				      <option value="teknologi">Teknologi</option>
				    </select>
				  </div>
				  <div class="form-check">
				  </div>
				  <button type="submit" class="btn btn-warning" name="delete">Batalkan</button>
				  <button type="submit" class="btn btn-success" name="upload">Posting</button>
				</form>
			</div>
	
	</div>

	<div class="container">
	      <div class="gallery-container">
	      <?php

			    $query  = "SELECT * FROM tb_gambar";
			    $run = mysqli_query($koneksi,$query);  
			    if(mysqli_num_rows($run) > 0){
						while($row = mysqli_fetch_array($run)){
							$id_gambar = $row['id_gambar'];
							$image = $row['gambar'];
							$title = $row['judul'];
				?>
	      
	      <div class="image">
	      	<a href="image/<?php echo $image ?>" data-lightbox="image-1">
						<img src="image/<?php echo $image ?>" data-lightbox="image-1">
					</a>
	      </div>
				<div class="text">
					 <h5></h5>
				</div>
				<?php 
					}
				} 
				?>
	    </div>
	  </div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
    tinymce.init({
      selector: '#mytextarea'
    });

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
  	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>