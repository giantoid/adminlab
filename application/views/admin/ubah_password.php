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
                <div class="card">
                    <div class="card-header bg-slate-300 text-white header-elements-inline">
                        <h4 class="card-title">Ubah Password</h4>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger border-0 alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php
                        } else if ($this->session->flashdata('success')) {
                            ?>
                            <div class="alert alert-success border-0 alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php
                        } ?>
                        <form action="<?= site_url('admin/user/upPassword') ?>" method="post">
                            <div class="form-group row">
                                <label for="passlama" class="col-lg-2">Password Lama</label>
                                <div class="col-lg-10">
                                    <input type="password" name="passlama" class="form-control" placeholder="Masukkan password lama..." required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="passbaru" class="col-lg-2">Password Baru</label>
                                <div class="col-lg-10">
                                    <input type="password" name="passbaru" class="form-control" placeholder="Masukkan password baru..." required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="konfpass" class="col-lg-2">Konfirmasi Password</label>
                                <div class="col-lg-10">
                                    <input type="password" name="konfpass" class="form-control" placeholder="Ketik ulang password baru..." required>
                                </div>
                            </div>
                            <div class="button-group pull-right">
                                <button type="submit" class="btn bg-info">Ubah Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /content area -->

            <!-- Footer -->
            <?php include 'includes/footer.php' ?>
            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->
    <?php include 'includes/js.php' ?>

</body>

</html>