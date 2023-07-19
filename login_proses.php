<?php
include 'crudbasic/koneksi.php';
session_start();
// atur koneksi ke database 


$username = $_POST['username'];
$password = md5($_POST['password']);
if (empty($username)  || empty($password)) {
    echo '<script language="javascript">';
    echo 'alert("masukan username atau password")';
    echo '</script>';
    $_SESSION['pesan_login'] = "masukan username atau password";
    header("location:login.php");
} else {
    $sql1 = "select * from user where username = '$username' and password='$password'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);

    if (!empty($r1['username'])) {
        // print_r($r1);
        // die;
        $_SESSION['username'] = $r1['username'];
        header("location:dashboard.php?page=beranda");
    } else {
        echo '<script language="javascript">';
        echo 'alert("username atau password masih salah")';
        echo '</script>';
        $_SESSION['pesan_login'] = "username atau password masih salah";
        header("location:login.php");
    }
}
