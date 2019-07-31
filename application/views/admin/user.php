<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/css.php' ?>
</head>

<body>

    <!-- Main navbar -->
    <?php include 'includes/navbar.php' ?>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <?php include 'includes/sidebar.php' ?>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <?php include 'includes/header.php' ?>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">

                <!-- Basic datatable -->
                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success border-0 alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php
                } ?>
                <!-- Basic datatable -->
                <div class="card">
                    <div class="card-header bg-slate-300 text-white header-elements-inline">
                        <h4 class="card-title">Data User</h4>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a href="javascript:void(0);" class="btn btn-success btn-sm bttambah" data-toggle="modal" data-target="#modalTambah"><span class="icon-plus-circle2 mr-1"></span>Tambah User</a>
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <table class="table datatable-basic">
                        <thead>
                            <tr>
                                <th width="5%">No.</th>
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Level</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($dataUser as $user) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $user->fullname ?></td>
                                    <td><?php echo $user->username ?></td>
                                    <td><?php echo $user->password ?></td>
                                    <td><?php echo $user->level ?></td>
                                    <td width="14%">
                                        <div class="btn-group"> <?php $id1 = ekrip("$user->id_user") ?>
                                            <a href="<?= base_url('admin/user/detail/' . $id1) ?>" class="btn btn-sm btn-success" data-popup="tooltip-custom" title="Detail" data-placement="bottom" data-delay="600"><i class="icon-eye"></i></a>
                                            <a href="#" class="btn btn-sm btn-primary btedit" data-popup="tooltip-custom" title="Edit" data-placement="bottom" data-delay="600" data-toggle="modal" data-target="#modalEdit" data-id="<?php echo $id1 ?>"><i class="icon-pencil"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger bthapus" data-popup="tooltip-custom" title="Hapus" data-placement="bottom" data-delay="600" data-toggle="modal" data-target="#modalHapus" data-id="<?php echo $id1 ?>"><i class="icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /content area -->
            <!-- Modal Simpan -->
            <div id="modalTambah" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h4 class="modal-title">Tambah Data User</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form action="<?php echo base_url('admin/user/input') ?>" method="post">
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="fullname">Nama Lengkap</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="fullname" placeholder="Masukkan nama lengkap..." required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="username">Username</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="username" placeholder="Masukkan username..." required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="password">Password</label>
                                    <div class="col-lg-10">
                                        <input type="password" class="form-control" name="password" placeholder="Masukkan password..." required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="level">Level</label>
                                    <div class="col-lg-10">
                                        <select data-placeholder="Pilih level..." name="level" class="form-control select" id="show_data" data-fouc required>
                                        </select>
                                    </div>
                                </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn bg-info">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Modal Simpan -->

            <!-- Modal Edit -->
            <div id="modalEdit" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h4 class="modal-title">Edit Data User</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form action="<?php echo base_url('admin/user/edit') ?>" method="post">
                                <input type="hidden" name="id_user" id="id_user">
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="fullname">Nama Lengkap</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="fullname" id="fullname">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="username">Username</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="username" id="username">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="password">Password</label>
                                    <div class="col-lg-10">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan nama aset...">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="level">Level</label>
                                    <div class="col-lg-10">
                                        <select name="level" class="form-control select level" data-fouc>
                                        </select>
                                    </div>
                                </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn bg-info">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Modal Edit -->

            <!-- Modal Hapus -->
            <div id="modalHapus" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title">Konfirmasi Hapus Data</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form action="<?php echo base_url('admin/user/hapus') ?>" method="post">
                                <input type="hidden" name="id" id="idh">
                                <h6>Apakah anda yakin ingin menghapus?</h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn bg-info">Iya</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Modal Hapus -->

            <!-- Footer -->
            <?php include 'includes/footer.php' ?>
            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->
    <?php include 'includes/js.php' ?>

    <script type="text/javascript">
        $(document).ready(function() {

            var opt = ['1', '2', '3'];

            function level() {
                var html = '';
                var i;
                html += '<option></option>';
                for (i = 0; i < opt.length; i++) {
                    html += '<option value=' + opt[i] + '>' + opt[i] + '</option>';
                }
                $('#show_data').html(html);
            }

            $('.bthapus').on('click', function() {
                const id = $(this).data('id');

                $.ajax({
                    url: '<?php echo site_url('admin/user/getByID') ?>',
                    data: {
                        id: id
                    },
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        $('#idh').val(data[0].id_user);
                    }
                });
            });

            $('.btedit').on('click', function() {
                const id = $(this).data('id');

                $.ajax({
                    url: '<?php echo site_url('admin/user/getByID') ?>',
                    data: {
                        id: id
                    },
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        var html;
                        $('#id_user').val(data[0].id_user);
                        $('#fullname').val(data[0].fullname);
                        $('#username').val(data[0].username);
                        $('#password').val(data[0].password);
                        var idj = data[0].level;
                        var html = '';
                        var i;
                        var sel;
                        html += '<option></option>';
                        for (i = 0; i < opt.length; i++) {
                            if (idj == opt[i]) {
                                sel = 'selected';
                            } else {
                                sel = '';
                            }
                            html += '<option value=' + opt[i] + ' ' + sel + '>' + opt[i] + '</option>';
                        }
                        $('.level').html(html);
                    }

                });
            });
            level();
        })
    </script>

</body>

</html>