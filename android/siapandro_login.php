<?php
@session_start();
if ($_SESSION['siapandro_level'] == 2) {
	header('Location: ' . $docandro . 'm');
}
include "conf/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $judulweb; ?></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo $docroot; ?>global/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $docroot; ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $docroot; ?>assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $docroot; ?>assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $docroot; ?>assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $docroot; ?>assets/css/colors.min.css" rel="stylesheet" type="text/css">


	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?php echo $docroot; ?>global/js/main/jquery.min.js"></script>
	<script src="<?php echo $docroot; ?>global/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?php echo $docroot; ?>global/js/plugins/loaders/blockui.min.js"></script>
	<script src="<?php echo $docroot; ?>global/js/plugins/ui/ripple.min.js"></script>
	<script src="<?php echo $docroot; ?>assets/js/jquery.mask.js"></script>
	<script src="<?php echo $docroot; ?>assets/js/jquery.inputmask.bundle.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?php echo $docroot; ?>global/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="<?php echo $docroot; ?>global/js/plugins/notifications/sweet_alert.min.js"></script>

	<script src="<?php echo $docroot; ?>assets/js/app.js"></script>
	<script src="<?php echo $docroot; ?>global/js/demo_pages/login.js"></script>
	<!-- /theme JS files -->

	<link href="<?php echo $docroot; ?>assets/images/logo/logo.png" rel="shortcut icon">
	<link href="<?php echo $docroot; ?>assets/images/logo/logo.png" rel="apple-touch-icon">

</head>

<body>




	<!-- Page content -->
	<div class="page-content bg-light">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login form -->
				<form class="login-form" method="post" action="<?php echo $docandro; ?>loading">

					<!--<div class="card mb-0">-->
					<div class="mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<a href="<?php echo $docandro; ?>" title="<?php echo $judulweb; ?>"><img src="<?php echo $docroot; ?>assets/images/abdurrab1.png" alt="<?php echo $judulweb; ?>" style="width:90%"></a>
								<!--<h5 class="mb-0">Login to your account</h5>
								<span class="d-block text-muted">Plan it do it</span>-->

							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" class="form-control" placeholder='Username' name="username" required>
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" class="form-control" placeholder="Password" name="password" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group d-flex align-items-center">
								<div class="form-check mb-0">
									<label class="form-check-label">
										<input type="checkbox" name="remember" class="form-input-styled" checked data-fouc>
										Ingat saya
									</label>
								</div>
								<a href="#" class="ml-auto" id="gegegan">Lupa password?</a>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block" name="masukin">Masuk <i class="icon-circle-right2 ml-2"></i></button>
							</div>

							<span class="form-text text-center text-muted">Dengan melanjutkan, anda setuju dan sudah membaca <a href="#">Peraturan &amp; Syarat</a> dan <a href="#">Kebijakan Privasi</a></span>

						</div>
					</div>
				</form>
				<!-- /login form -->

			</div>
			<!-- /content area -->




		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

	<script>
		$('#gegegan').on('click', function() {
			swal({
				title: 'Lupa password?',
				text: 'Hubungi administrator untuk mendapatkan kembali password anda!',
				type: 'question',
				confirmButtonClass: 'btn btn-primary',
				cancelButtonClass: 'btn btn-light',
				width: '100%'
			});
		});
	</script>
</body>

</html>