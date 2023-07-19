<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blank page
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                            Tambah Data Berita
                        </button>

                        <div class="box-tools">
                            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul_Berita</th>
                                    <th>Gambar Berita</th>
                                    <th>Isi Berita</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $no = 1;
                                $query = mysqli_query($koneksi, 'SELECT * FROM berita');
                                $row = mysqli_fetch_all($query, MYSQLI_ASSOC);
                                for ($i = 0; $i < count($row); $i++) {

                                ?>

                                    <tr>
                                        <th><?php echo $no++ ?></th>
                                        <th><?php echo $row[$i]['judul_berita'] ?></th>
                                        <th>
                                            <img src="berkas/<?php echo $row[$i]['gambar_berita'] ?>" width="200px" height="100px" alt="">

                                        </th>
                                        <th><?php echo $row[$i]['isi_berita'] ?></th>



                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?php echo $row[$i]['id_berita']  ?>">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-hapus<?php echo $row[$i]['id_berita']  ?>">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-edit<?php echo $row[$i]['id_berita'] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Edit Data Berita</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- form start -->
                                                    <form class="needs-validation" action="edit_berita.php" method="post" enctype="multipart/form-data">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label for="exampleInputJudulBerita1">Judul Berita</label>
                                                                <input type="hidden" name="id_berita" value="<?php echo $row[$i]['id_berita'] ?>">
                                                                <input type="text" class="form-control" name="judul_berita" value="<?php echo $row[$i]['judul_berita'] ?>" placeholder="Enter judul-berita">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputIsiBerita1">Isi Berita</label>
                                                                <textarea class="form-control" id="story" name="isi_berita" rows="5" cols="33" placeholder="Enter Isi berita"><?php echo $row[$i]['isi_berita'] ?></textarea>

                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="file">Choose file to upload</label>
                                                                <input type="file" id="file" name="gambar_berita" multiple />
                                                            </div>
                                                            <br>
                                                            <div>
                                                                <img src="berkas/<?php echo $row[$i]['gambar_berita'] ?>" width="200px" height="100px" alt="">
                                                            </div>

                                                        </div>
                                                        <!-- /.box-body -->

                                                        <div class="box-footer">
                                                            <button type="submit" name="proses" value="uploade image" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <div class="modal fade" id="modal-hapus<?php echo $row[$i]['id_berita'] ?>">
                                        <div class="modal-dialog">
                                            <form action="hapus_berita.php" method="post">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">Hapus Data User Berita</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- form start -->
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <!-- <label for="exampleInputEmail1">Username</label> -->
                                                                <input type="hidden" name="id_berita" value="<?php echo $row[$i]['id_berita'] ?>">
                                                                <!-- <input type="text" class="form-control" name="username" placeholder="Enter username" value="<?php echo $row[$i]['username'] ?>"> -->
                                                            </div>
                                                        </div>
                                                        <!-- /.box-body -->
                                                        <p class="text-center">Apakah Anda Yakin Akan Menghapus Data ?&hellip;</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-success pull-left" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->

                    </div>
                    <!-- /.content-wrapper -->


                <?php
                                }
                ?>

                </tbody>

                </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
</div>
</section>
<!-- /.content -->

<!-- /.modal -->
<!-- /.content -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Berita</h4>
            </div>
            <div class="modal-body">
                <!-- form start -->
                <form action="tambah_berita.php" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputJudulBerita1">Judul Berita</label>
                            <input type="text" class="form-control" name="judul_berita" placeholder="Enter judul-berita">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputIsiBerita1">Isi Berita</label>
                            <textarea class="form-control" id="story" name="isi_berita" rows="5" cols="33" placeholder="Enter Isi berita"></textarea>

                        </div>
                        <div>
                            <label for="file">Choose file to upload</label>
                            <input type="file" id="file" name="gambar_berita" multiple />
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="proses" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</div>
<!-- /.content-wrapper -->





</section>
<!-- /.content -->
</div>