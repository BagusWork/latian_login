<?php

include 'crudbasic/koneksi.php';

$id = $_POST['id'];

$query = mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'
");

if ($query) {
?>
    <script type="text/javascript">
        alert("Hapus Data Berhasil.");
        window.location = 'dashboard.php?page=manajemen_user'
    </script>
<?php
} else {
?>
    <script type="text/javascript">
        alert("Ada Kesalahan Saat Hapus ke Database.");
        window.location = 'dashboard.php?page=manajemen_user'
    </script>
<?php
}
?>