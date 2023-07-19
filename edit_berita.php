<?php
include 'crudbasic/koneksi.php';

$id_berita = $_POST['id_berita'];
$judul_berita = $_POST['judul_berita'];
$isi_berita = $_POST['isi_berita'];

$direktori = "berkas/";
$file_name = $_FILES['gambar_berita']['name'];
move_uploaded_file($_FILES['gambar_berita']['tmp_name'], $direktori . $file_name);





$query = mysqli_query($koneksi, "UPDATE berita SET judul_berita='$judul_berita', isi_berita='$isi_berita', gambar_berita='$file_name' WHERE id_berita='$id_berita'");

if ($query) {
    echo "update Berhasil";
    header("location:dashboard.php?page=manajemen_berita");
} else {
    echo "Update Data Gagal:" . mysqli_error($koneksi);
}
