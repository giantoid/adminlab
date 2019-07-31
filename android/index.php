<?php
	include"conf/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>loading...</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo $docroot;?>global/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $docroot;?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $docroot;?>assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $docroot;?>assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $docroot;?>assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $docroot;?>assets/css/colors.min.css" rel="stylesheet" type="text/css">
	
	
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?php echo $docroot;?>global/js/main/jquery.min.js"></script>
	<script src="<?php echo $docroot;?>global/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?php echo $docroot;?>global/js/plugins/loaders/blockui.min.js"></script>
	<script src="<?php echo $docroot;?>global/js/plugins/ui/ripple.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?php echo $docroot;?>global/js/plugins/forms/styling/uniform.min.js"></script>

	<script src="<?php echo $docroot;?>assets/js/app.js"></script>
	<script src="<?php echo $docroot;?>global/js/demo_pages/login.js"></script>
	<!-- /theme JS files -->
	
	<link href="<?php echo $docroot;?>assets/images/logo/logo.png" rel="shortcut icon">
    <link href="<?php echo $docroot;?>assets/images/logo/logo.png" rel="apple-touch-icon">

</head>

<body>




	<!-- Page content -->
	<div class="page-content bg-light">

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
								<img src="<?php echo $docroot;?>assets/images/abdurrab1.png" style="width:90%">
								
								<!--<h5 class="mb-0">Login to your account</h5>
								<span class="d-block text-muted">Discover your life travel</span>-->
								
							</div>
							<?php
								
												@session_start();
												if(empty($_SESSION['siapandro_user']) || empty($_SESSION['siapandro_level'])){
													echo"
														<meta http-equiv='refresh' content='5;url=".$docandro."masuk'>
													";
												}else{
													echo"
														<meta http-equiv='refresh' content='2;url=".$docandro."m'>
													";
												}
												
												
											
							?>
							<center><img src="<?php echo $docroot;?>assets/images/loading.svg"></center>
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
