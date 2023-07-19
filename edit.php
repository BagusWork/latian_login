<?php

include 'crudbasic/koneksi.php';
session_start();

$id = $_POST['id'];
$username = $_POST['username'];
// print_r(empty($_POST['password']));
// die();
if (empty($_POST['password'])) {
    $_SESSION['pesan_edit'] = "masukan password baru";
    header("location:dashboard.php?page=manajemen_user");
} else {
    unset($_SESSION['pesan_edit']); //uset nyeting ulang jadi alert hilang jika sudah sukses
}
$password = md5($_POST['password']);

// print_r($password);
// die;

$query = mysqli_query($koneksi, "
UPDATE user SET username='$username', password='$password' WHERE id='$id'
");

if ($query) {
?>
    <script type="text/javascript">
        alert("Update Data Berhasil.");
        window.location = 'dashboard.php?page=manajemen_user'
    </script>
<?php
} else {
?>
    <script type="text/javascript">
        alert("Ada Kesalahan Saat Update ke Database.");
        window.location = 'dashboard.php?page=manajemen_user'
    </script>
<?php
}
?>