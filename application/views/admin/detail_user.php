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
            <?php foreach ($dataUser as $user) : ?>
                <div class="content">
                    <!-- Basic card -->
                    <div class="card">
                        <div class="card-header bg-slate-300 header-elements-inline">
                            <h4 class="card-title"><?= $user->fullname ?></h4>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="reload"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Nama Lengkap</label>
                                <div class="col-lg-10">
                                    <input class="form-control" value="<?= $user->fullname ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Username</label>
                                <div class="col-lg-10">
                                    <input class="form-control" value="<?= $user->username ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Password</label>
                                <div class="col-lg-10">
                                    <input class="form-control" value="<?= $user->password ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Level</label>
                                <div class="col-lg-10">
                                    <input class="form-control" value="<?= $user->level ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /basic card -->
            <?php endforeach; ?>
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