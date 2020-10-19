<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('global_assets/css/icons/icomoon/styles.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/bootstrap_limitless.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/layout.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/components.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/colors.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('global_assets/css/icons/fontawesome/styles.min.css') ?>" rel="stylesheet" type="text/css">
    <!-- <link href="<?php echo base_url('assets/css/animate.css') ?>" rel="stylesheet" type="text/css"> -->
    <link href="<?php echo base_url('global_assets/css/icons/material/icons.css') ?>" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="<?php echo base_url('global_assets/js/main/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('global_assets/js/main/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?php echo base_url('global_assets/js/plugins/loaders/blockui.min.js') ?>"></script>
    <script src="<?php echo base_url('global_assets/js/plugins/ui/ripple.min.js') ?>"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="<?php echo base_url('assets/js/app.js') ?>"></script>
    <!-- /theme JS files -->

</head>

<body>

    <!-- Main navbar -->

    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">

                <!-- Login form -->
                <form class="login-form" action="<?= base_url('auth/login') ?>" method="POST">
                    <div class="card mb-0">
                        <div class="card-body">
                            <?php if ($this->session->flashdata('message')) { ?>
                                <div class="alert alert-danger border-0 alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                    <?php echo $this->session->flashdata('message'); ?>
                                </div>
                            <?php
                            } ?>
                            <div class="text-center mb-3">
                                <img src="<?= base_url('assets/images/abdurrab.png') ?>" class="mb-3 mt-1" height="160px">
                                <h5 class="mb-0">Anda harus login terlebih dahulu!</h5>
                                <span class="d-block text-muted">Masukkan username dan password Anda!</span>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text" class="form-control" placeholder="Username" name="username">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Login <i class="icon-circle-right2 ml-2"></i></button>
                            </div>

                            <div class="text-center">
                                <a href="login_password_recover.html">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /login form -->

            </div>
            <!-- /content area -->


            <!-- Footer -->

            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>

</html>