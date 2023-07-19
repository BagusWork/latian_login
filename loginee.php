<?php
session_start();
// // atur koneksi ke database 
// $host_db = "localhost";
// $user_db = "root";
// $pass_db = "";
// $nama_db = "latian";
// $koneksi = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);

// //atur variabel
// $err        = "";
// $username   = "";
// $ingataku   = "";

// if (isset($POST['login'])) {
//     $username = $POST['username'];
//     $password = $POST['password'];
//     $ingataku = $POST['ingataku'];

//     if ($username == '' or $password == '') {
//         $err .= "<li>Silahkan masukan username dan juga password</li>";
//     } else {
//         $sql1 = "select * from login where username = '$username'";
//         $q1 = mysqli_query($koneksi, $sql1);
//         $r1 = mysqli_fetch_array($q1);

//         if ($r1['username'] == '') {
//             $err .= "<li>Username <b>$username</b> tidak tersedia.</li>";
//         } elseif ($r1['password'] != md5($password)) {
//             $err .= "<li>Password yang dimasukan tidak sesuai.</li>";
//         }

//         if (empty($err)) {
//             $_SESSION['session_username'] = $username; //server
//             $_SESSION['session_password'] = md5($password);

//             if ($inggataku == 1) {
//                 $cookie_name = "cookie_username";
//                 $cookie_value = $username;
//                 $cookie_time = time() + (60 * 60 * 24 * 30);
//                 setcookie($cookie_name, $cookie_value, $cookie_time, "/");

//                 $cookie_name = "cookie_password";
//                 $cookie_value = md5($password);
//                 $cookie_time = time() + (60 * 60 * 24 * 30);
//                 setcookie($cookie_name, $cookie_value, $cookie_time, "/");
//             }
//             header("location:anggota.php");
//         }
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <?php
    if (isset($_SESSION['pesan_error'])) {

    ?>
        <div class="alert alert-danger alert-dismissible">
            <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <?php
            echo $_SESSION['pesan_error']; ?>
        </div>
    <?php }
    unset($_SESSION['pesan_error'])
    ?>
    <form method="post" action="login_proses.php">
        <div class="container my-4">
            <div class=" mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </div>

</body>

</html>