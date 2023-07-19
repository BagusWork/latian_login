<?php
include 'crudbasic/koneksi.php';


$id_berita = $_POST['id_berita'];
// mengambil data sang sesuai dengan dari id_berita yang di hapus
$query1 = mysqli_query($koneksi, "SELECT gambar_berita FROM berita WHERE id_berita='$id_berita'");
// mysqli_fetch_row = menampilkan data hanya 1 row/baris
$row = mysqli_fetch_row($query1);
// mengambil dengan nilai index 0
$file_name = $row[0];
// print_r($file_name);
// die();
$direktori = "berkas/";

// proses hapus dari folder dengan nama sesuai nama yang ad pada database
$query = mysqli_query($koneksi, "DELETE FROM berita  WHERE id_berita = '$id_berita'");
unlink($direktori . $file_name);

if ($query) {
?>
    <script type="text/javascript">
        alert("Hapus Data Berhasil.");
        window.location = 'dashboard.php?page=manajemen_berita'
    </script>
<?php
} else {
?>
    <script type="text/javascript">
        alert("Ada Kesalahan Saat Hapus ke Database.");
        window.location = 'dashboard.php?page=manajemen_berita'
    </script>
<?php
}

?>