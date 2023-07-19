<?php
session_start();
// atur koneksi ke database 
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$nama_db = "latian";

$koneksi = new mysqli($host_db, $user_db, $pass_db, $nama_db);
