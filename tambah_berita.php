<?php
include 'crudbasic/koneksi.php';

$judul_berita = $_POST['judul_berita'];
$isi_berita = $_POST['isi_berita'];
// $gambar_berita = $_POST['gambar_berita'];
// tes

if (isset($_POST['proses'])) {
    $direktori = "berkas/";
    $file_name = $_FILES['gambar_berita']['name'];
    // print_r($_FILES);
    // die();
    move_uploaded_file($_FILES['gambar_berita']['tmp_name'], $direktori . $file_name);


    $query = mysqli_query($koneksi, "INSERT INTO berit (judul_berita, isi_berita,gambar_berita) VALUES ('$judul_berita','$isi_berita', '$file_name')");


    if ($query) {
        echo "<b>file berhsil di uploade";
        header("location:dashboard.php?page=manajemen_berita");
    } else {
?>
        <script type="text/javascript">
            alert("Hapus Data Gagal.");
            window.location = 'dashboard.php?page=manajemen_berita'
        </script>
<?php
    }
}
