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
	<title>loading... - <?php echo $judulweb; ?></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo $docandro; ?>global/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $docandro; ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $docandro; ?>assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $docandro; ?>assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $docandro; ?>assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $docroot; ?>assets/css/colors.min.css" rel="stylesheet" type="text/css">


	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?php echo $docandro; ?>global/js/main/jquery.min.js"></script>
	<script src="<?php echo $docandro; ?>global/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?php echo $docandro; ?>global/js/plugins/loaders/blockui.min.js"></script>
	<script src="<?php echo $docandro; ?>global/js/plugins/ui/ripple.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?php echo $docandro; ?>global/js/plugins/forms/styling/uniform.min.js"></script>

	<script src="<?php echo $docandro; ?>assets/js/app.js"></script>
	<script src="<?php echo $docandro; ?>global/js/demo_pages/login.js"></script>
	<!-- /theme JS files -->

	<link href="<?php echo $docroot; ?>assets/images/logo/logo.png" rel="shortcut icon">
	<link href="<?php echo $docroot; ?>assets/images/logo/logo.png" rel="apple-touch-icon">

</head>

<body>




	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login form -->
				<div class="login-form">

					<!--<div class="card mb-0">-->
					<div class="mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<img src="<?php echo $docroot; ?>assets/images/abdurrab1.png" style="width:90%">

								<!--<h5 class="mb-0">Login to your account</h5>
								<span class="d-block text-muted">Discover your life travel</span>-->

							</div>
							<?php
							if (isset($_POST['masukin'])) {
								$username		= antixss(mysqli_real_escape_string($konek, stripslashes($_POST['username'])));
								$password		= md5(antixss(mysqli_real_escape_string($konek, stripslashes($_POST['password']))));

								$cekuser		= mysqli_query($konek, "select * from `users` where username = '$username' and password = '$password'");
								$hcekuser		= mysqli_num_rows($cekuser);
								if ($hcekuser > 0) {
									$dcekuser	= mysqli_fetch_array($cekuser);

									@session_start();
									$_SESSION['siapandro_user']		= $dcekuser['id_user'];
									$_SESSION['siapandro_level']	= $dcekuser['level'];
									echo "
													<!--<div class='alert alert-success'>
														Berhasil masuk, mohon tunggu...
													</div>-->
													<meta http-equiv='refresh' content='3;url=" . $docandro . "ses'>
												";
								} else {
									echo "
												<div class='alert alert-danger'>
													<b>Username</b> dan <b>Password</b> anda tidak cocok. Silahkan ulangi lagi.
												</div>
												<meta http-equiv='refresh' content='3;url=" . $docandro . "masuk'>
											";
								}
							}
							?>
							<center><img src="<?php echo $docandro; ?>assets/images/loading.svg"></center>
						</div>
					</div>
				</div>
				<!-- /login form -->

			</div>
			<!-- /content area -->




		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>

</html>