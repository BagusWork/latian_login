<?php

include 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>

<body>
    <h1>CRUD</h1>

    <table border="1">
        <tr>
            <th>NO.</th>
            <th>Judul Berita</th>
            <th>Gambar Berita</th>
            <th>Isi Berita</th>
        </tr>

        <?php

        $no = 0;
        $query = mysqli_query($koneksi, "SELECT * FROM berita");
        while ($row = mysqli_fetch_assoc($query)) {
            $no++;
        ?>
            <tr>
                <th><?php echo $no ?></th>
                <th><?php echo $row['judul_berita'] ?></th>
                <th><?php echo $row['gambar_berita'] ?></th>
                <th><?php echo $row['isi_berita'] ?></th>
            </tr>
        <?php

        }

        ?>


    </table>

</body>

</html>