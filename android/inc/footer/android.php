<style>
	.wawicon {
		font-size: 7px;
		color: white;
	}

	.walahfooter {
		//background: linear-gradient(to right, orange, #d41686);
	}
</style>
<div class="navbar navbar-expand-lg navbar-dark fixed-bottom p-0 walahfooter">
	<div class="text-center w-100 btn-group btn-group-justified">
		<!--<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Credit
					</button>
					-->

		<?php
		if (empty($menu) || $menu == "beranda") {
			$tambul_beranda		= "active";
			$tambul_profil	= "";
			$tambul_bantuan		= "";
		} else if ($menu == "profil") {
			$tambul_beranda		= "";
			$tambul_profil	= "active";
			$tambul_bantuan		= "";
		} else if ($menu == "bantuan" || $menu == "bantuan-detail") {
			$tambul_beranda		= "";
			$tambul_profil	= "";
			$tambul_bantuan		= "active";
		}
		?>
		<a href="<?php echo $docandro; ?>m" class="btn btn-transparent btn-float legitRipple <?php echo $tambul_beranda; ?>" style="border-radius:0px;color:white;"><i class="icon-home"></i><span class="wawicon">Beranda</span></a>
		<a href="<?php echo $docandro; ?>m/profil" class="btn btn-transparent btn-float legitRipple <?php echo $tambul_profil; ?>" style="border-radius:0px;color:white;"><i class="icon-user"></i><span class="wawicon">Profil</span></a>
		<a href="<?php echo $docandro; ?>m/bantuan" class="btn btn-transparent btn-float legitRipple <?php echo $tambul_bantuan; ?>" style="border-radius:0px;color:white;"><i class="icon-question4"></i><span class="wawicon">Bantuan</span></a>
	</div>

	<!--<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						Copyright &copy; 2018 <a href="<?php echo $docroot; ?>"><?php echo $judulweb; ?> Program Studi Manajemen</a>. Created with love by <a href="https://sifirman.com" target="_blank" title="Firman Santosa - Jasa Web dan Aplikasi Riau">Firman Santosa</a>
					</span>

					
				</div>-->
</div>