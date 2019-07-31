<?php
include "conf/config.php";

@session_start();
$ses_user	= $_SESSION['siapandro_user'];
$ses_level	= $_SESSION['siapandro_level'];

if (empty($ses_user) || empty($ses_level)) {
	@session_destroy();
	echo "<meta http-equiv='refresh' content='0;url=" . $docandro . "masuk'>";
} else {
	$suser	= mysqli_query($konek, "SELECT a.*, left(tgltambah,10) as tgldaftar, c.nm_level FROM `user` a, `level` c WHERE a.id_level = c.id_level AND a.id_user = '$ses_user'");
	$duser	= mysqli_fetch_array($suser);

	if (empty($duser['gambar'])) {
		$gambarprofil	= $docroot . "global/images/placeholders/placeholder.jpg";
	} else {
		$gambarprofil	= $docroot . "d/user/" . $duser['gambar'];
	}

	?>
	<!DOCTYPE html>
	<html lang="en">

	<?php
	if ($ses_level == 1) {
		if ($menu == "user-koor") {
			include "inc/meta_tabel.php";
		} else {
			include "inc/meta_input.php";
		}
	} else if ($ses_level == 2) {
		if ($menu == "dpt" || $menu == "tps") {
			include "inc/meta_tabel.php";
		} else {
			include "inc/meta_input.php";
		}
	}
	?>



	<body class="sidebar-main-hidden">

		<?php
		if ($ses_level == 2) {
			include "inc/nav/android.php";
		}
		?>

		<!-- Page content -->
		<div class="page-content">

			<?php

			if ($ses_level == 2) {
				include "inc/sidebar/android.php";
				if (empty($menu) || $menu == "beranda") {
					include "siapandro_menu/cekaset/beranda.php";
				} else if ($menu == "bantuan") {
					include "siapandro_menu/cekaset/bantuan/data.php";
				} else if ($menu == "bantuan-detail") {
					include "siapandro_menu/cekaset/bantuan/detail.php";
				} else if ($menu == "profil") {
					include "siapandro_menu/cekaset/profil.php";
				}
				//PENGECEKAN
				else if ($menu == "pengecekan") {
					include "siapandro_menu/cekaset/pengecekan.php";
				} else {
					include "404.php";
				}
				include "inc/footer/android.php";
			} else {
				@session_destroy();
				echo "<meta http-equiv='refresh' content='0;url=" . $docandro . "masuk'>";
			}

			?>
		</div>

	</body>

	</html>

<?php } ?>