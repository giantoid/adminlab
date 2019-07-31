<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('global/css/icons/icomoon/styles.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/bootstrap_limitless.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/bootstrap_limitless.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/layout.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/components.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/colors.min.css') ?>" rel="stylesheet" type="text/css">


	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?php echo base_url('global/js/main/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('global/js/main/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?php echo base_url('global/js/plugins/loaders/blockui.min.js') ?>"></script>
	<script src="<?php echo base_url('global/js/plugins/ui/ripple.min.js') ?>"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?php echo base_url('global/js/plugins/forms/styling/uniform.min.js') ?>"></script>

	<script src="<?php echo base_url('assets/js/app.js') ?>"></script>
	<script src="<?php echo base_url('global/js/demo_pages/login.js') ?>"></script>
	<!-- /theme JS files -->

	<link href="<?php echo base_url('assets/images/icon.png" rel="shortcut icon') ?>">
	<link href="<?php echo base_url('assets/images/icon.png" rel="apple-touch-icon') ?>">
	<script>
		$(window).load(function() {
			$("#preloader").delay(5000).fadeOut();
		});
	</script>

</head>

<body>
	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login form -->
				<div class="login-form" id="preloader">

					<!--<div class="card mb-0">-->
					<div class="mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<img src="<?php echo base_url('assets/images/abdurrab.png') ?>" style="width:90%">

								<!--<h5 class="mb-0">Login to your account</h5>-->
								<!-- <span class="d-block text-muted">Discover your life travel</span> -->

							</div>
							<center><img src="<?php echo base_url('assets/images/loading.svg') ?>"></center>
						</div>
					</div>
				</div>
				<!-- /login form -->

				<?php

				redirect('auth');

				?>

			</div>
			<!-- /content area -->




		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>

</html>