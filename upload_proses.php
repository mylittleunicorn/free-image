<?php 
	include "db/koneksi.php";
	if (isset($_POST['delete'])) {
		unlink('image/'.$_POST['gambar']);

	}


	if (isset($_POST['upload'])) {
		$gambar = $_POST['gambar'];
		$judul = $_POST['judul'];
		$kategori = $_POST['kategori'];
		$user_id = $_POST['user_id'];
		$uploadgambar   = mysqli_query($koneksi, "INSERT INTO tb_gambar VALUES ('', '$gambar', '$judul', '$kategori', '$user_id')");
    if ($uploadgambar) {
      echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Pendaftaran Berhasil, Klik OK untuk Login')
          window.location.href='signin.php';
          </SCRIPT>");
    }else{
      echo "gagal";
    }
	}
?>
