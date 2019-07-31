<!-- Main navbar -->
<style>
	.navbar {
		text-align: center;
	}

	.navbar-brand {
		padding: 0px;
		padding-top: 5px;
	}

	.navbar-brand img {
		width: 220px;
		height: 60px;
		padding: 7px;
	}
</style>
<div class="navbar navbar-expand-md navbar-dark bg-indigo-400 navbar-static">
	<div class="navbar-brand">
		<a href="<?php echo base_url('dashboard') ?>" class="d-inline-block">
			<img src="<?php echo base_url('global_assets/images/abdurrab.png') ?>" alt="">
		</a>
	</div>

	<div class="d-md-none">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
			<i class="icon-tree5"></i>
		</button>
		<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
			<i class="icon-paragraph-justify3"></i>
		</button>
	</div>

	<div class="collapse navbar-collapse" id="navbar-mobile">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
					<i class="icon-paragraph-justify3"></i>
				</a>
			</li>
		</ul>

		<span class="navbar-text ml-md-3">
			<span class="badge badge-mark border-success mr-2"></span>
			<?php

			date_default_timezone_set("Asia/Jakarta");

			$b = time();
			$hour = date("G", $b);

			if ($hour >= 0 && $hour <= 11) {
				echo "Selamat pagi";
			} elseif ($hour >= 12 && $hour <= 14) {
				echo "Selamat siang";
			} elseif ($hour >= 15 && $hour <= 17) {
				echo "Selamat sore";
			} elseif ($hour >= 17 && $hour <= 18) {
				echo "Selamat petang";
			} elseif ($hour >= 19 && $hour <= 23) {
				echo "Selamat malam";
			}

			?>, <?php echo $this->session->userdata('nama') ?>!
		</span>

		<ul class="navbar-nav ml-md-auto">

			<li class="nav-item">
				<a href="<?php echo base_url('auth/logout') ?>" class="navbar-nav-link" data-popup="tooltip-custom" title="Logout" data-placement="bottom" data-delay="600">
					<i class="icon-switch2"></i>
					<span class="d-md-none ml-2">Logout</span>
				</a>
			</li>
		</ul>
	</div>
</div>
<!-- /main navbar -->