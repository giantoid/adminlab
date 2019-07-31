<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Laboratorium - Admin</title>

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

<?php
if ($this->session->userdata('authenticated')) { } else {

	redirect(base_url('auth'));
}
?>