<?php
include 'crudbasic/koneksi.php';

$judul_berita = $_POST['judul_berita'];
$isi_berita = $_POST['isi_berita'];
// $gambar_berita = $_POST['gambar_berita'];
// twa

if (isset($_POST['proses'])) {
    $direktori = "berkas/";
    $file_name = $_FILES['gambar_berita']['name'];
    // print_r($_FILES);
    // die();
    move_uploaded_file($_FILES['gambar_berita']['tmp_name'], $direktori . $file_name);


    $query = mysqli_query($koneksi, "INSERT INTO berita (judul_berita, isi_berita,gambar_berita) VALUES ('$judul_berita','$isi_berita', '$file_name')");



    echo "<b>file berhsil di uploade";
}
