 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             Halaman Manajemen User
             <small>Control panel</small>
         </h1>
         <ol class="breadcrumb">
             <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
             <li class="active">Dashboard</li>
         </ol>
     </section>
     <!-- Main content -->
     <div class="content">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-xs-12">
                     <div class="box">
                         <div class="box-header">
                             <?php
                                if (isset($_SESSION['pesan_edit'])) {

                                ?>
                                 <div class="alert alert-danger alert-dismissible">
                                     <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
                                     <h4><i></i> Alert!</h4>
                                     <?php
                                        echo $_SESSION['pesan_edit']; ?>
                                 </div>
                             <?php }
                                unset($_SESSION['pesan_edit'])
                                ?>

                             <?php
                                if (isset($_SESSION['pesan_tambah'])) {

                                ?>
                                 <div class="alert alert-danger alert-dismissible">
                                     <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
                                     <h4><i></i> Alert!</h4>
                                     <?php
                                        echo $_SESSION['pesan_tambah']; ?>
                                 </div>
                             <?php }
                                unset($_SESSION['pesan_tambah']);

                                ?>
                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                 Tambah User Baru
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
                                         <th>ID</th>
                                         <th>Username</th>
                                         <th>Password</th>
                                         <th>Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php


                                        $no = 1;
                                        $query = mysqli_query($koneksi, "SELECT * FROM user");
                                        $row = mysqli_fetch_all($query, MYSQLI_ASSOC);
                                        // print_r($row);
                                        // die();
                                        // while ($row = mysqli_fetch_assoc($query));
                                        // $no++;
                                        for ($i = 0; $i < count($row); $i++) { ?>
                                         <tr>
                                             <td><?php echo $no++ ?></td>
                                             <td><?php echo $row[$i]['username'] ?></td>
                                             <td><?php echo $row[$i]['password'] ?></td>
                                             <td>
                                                 <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?php echo $row[$i]['id'] ?>">
                                                     Edit
                                                 </button>
                                                 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-hapus<?php echo $row[$i]['id'] ?>">
                                                     Hapus
                                                 </button>
                                             </td>
                                         </tr>
                                         <div class="modal fade" id="modal-hapus<?php echo $row[$i]['id'] ?>">
                                             <div class="modal-dialog">
                                                 <form action="hapus.php" method="post">
                                                     <div class="modal-content">
                                                         <div class="modal-header">
                                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                 <span aria-hidden="true">&times;</span></button>
                                                             <h4 class="modal-title">Hapus Data User</h4>
                                                         </div>
                                                         <div class="modal-body">
                                                             <!-- form start -->
                                                             <div class="box-body">
                                                                 <div class="form-group">
                                                                     <!-- <label for="exampleInputEmail1">Username</label> -->
                                                                     <input type="hidden" name="id" value="<?php echo $row[$i]['id'] ?>">
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
                                         <div class="modal fade" id="modal-edit<?php echo $row[$i]['id'] ?>">
                                             <div class="modal-dialog">
                                                 <div class="modal-content">
                                                     <div class="modal-header">
                                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                             <span aria-hidden="true">&times;</span></button>
                                                         <h4 class="modal-title">Edit Data User</h4>
                                                     </div>
                                                     <div class="modal-body">
                                                         <!-- form start -->
                                                         <form action="edit.php" method="post">
                                                             <div class="box-body">
                                                                 <div class="form-group">
                                                                     <label for="exampleInputEmail1">Username</label>
                                                                     <input type="hidden" name="id" value="<?php echo $row[$i]['id'] ?>">
                                                                     <input type="text" class="form-control" name="username" placeholder="Enter username" value="<?php echo $row[$i]['username'] ?>">
                                                                 </div>


                                                                 <div class="form-group">
                                                                     <label for="exampleInputPassword1">Password</label>
                                                                     <input type="text" class="form-control" name="password" placeholder="Password">
                                                                 </div>

                                                             </div>
                                                             <!-- /.box-body -->

                                                             <div class="box-footer">
                                                                 <button type="submit" class="btn btn-primary">Submit</button>
                                                             </div>
                                                         </form>
                                                     </div>
                                                 </div>
                                                 <!-- /.modal-content -->
                                             </div>
                                             <!-- /.modal-dialog -->
                                         </div>
                                         <!-- /.modal -->
                                     <?php }
                                        ?>

                                     <?php

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
         </div>
     </div> <!-- container-fluid -->
 </div>



 <!-- /.Left col -->
 <!-- right col (We are only adding the ID to make the widgets sortable)-->
 <section class="col-lg-5 connectedSortable">

 </section>
 <!-- right col -->
 </div>
 <!-- /.row (main row) -->

 </section>
 <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <div class="modal fade" id="modal-default">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Tambah Data User</h4>
             </div>
             <div class="modal-body">
                 <!-- form start -->
                 <form action="tambah_user.php" method="post">
                     <div class="box-body">
                         <div class="form-group">
                             <label for="exampleInputEmail1">Username</label>
                             <input type="text" class="form-control" name="username" placeholder="Enter username">
                         </div>
                         <div class="form-group">
                             <label for="exampleInputPassword1">Password</label>
                             <input type="password" class="form-control" name="password" placeholder="Password">
                         </div>

                     </div>
                     <!-- /.box-body -->

                     <div class="box-footer">
                         <button type="submit" class="btn btn-primary">Submit</button>
                     </div>
                 </form>
             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>
 <!-- /.modal -->