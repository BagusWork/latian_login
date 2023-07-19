<?php


include_once 'crudbasic/koneksi.php';


$username = $_POST['username'];
$password = $_POST['password'];
if (empty("$username") || empty("$password")) {
    $_SESSION['pesan_tambah'] = "masukan username atau password";
    header("location:dashboard.php?page=manajemen");
} else {
    $password = md5($_POST['password']);
    $query = mysqli_query($koneksi, "
    INSERT INTO user (username, password) VALUES ('$username','$password');
    ");
    // print_r($username);
    // print_r($password);
    // print_r($query);
    // die();

    if ($query) {
?>
        <script type="text/javascript">
            alert("Tambah Data Berhasil.");
            window.location = 'dashboard.php?page=manajemen_user'
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert("Ada Kesalahan Input ke Database.");
            window.location = 'dashboard.php?page=manajemen_user'
        </script>
<?php
    }
}
?>