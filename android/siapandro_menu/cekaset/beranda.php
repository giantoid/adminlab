<title>Dashboard - <?php echo $judulweb; ?></title>

<!-- Main content -->
<div class="content-wrapper" style="margin-bottom:70px;">

	<!-- Page header -->
	<div class="page-header page-header-light">
	</div>
	<!-- /page header -->

	<!-- Content area -->
	<div class="content p-0 bg-white">

		<div class="row row-tile no-gutters">

			<div class="col-12">
				<a class="btn bg-white btn-block btn-float m-0 p-2 text-center">
					DAFTAR LAB
				</a>
			</div>
			<?php
			$slayanin	= mysqli_query($konek, "SELECT * FROM tb_lab ORDER BY nama_lab ASC");
			$nolayanin	= 1;
			while ($dlayanin = mysqli_fetch_array($slayanin)) {

				echo '
					<div class="col-4">
						<a href="#" data-toggle="modal" data-target="#mod' . $nolayanin . '" class="btn bg-dark btn-block btn-float m-0 p-2 pt-3 pb-3" style="border-bottom:1px dotted #ccc;border-right:1px dotted #ccc;">
							<i class="mi-laptop text-danger-400 mi-2x"></i>
							<span style="font-size:10px;">' . $dlayanin['nama_lab'] . '</span>
						</a>
					</div>
				';


				echo '
				

			<div id="mod' . $nolayanin . '" class="modal animated bounceInRight modal-fullscreen" tabindex="-1">
				<form method="post">
					<div class="modal-dialog" style="position:absolute;min-height:100%;width:100%;margin:0px;">
						<div class="modal-content" style="position:absolute;min-height:100%;width:100%;">
							<div class="modal-header bg-dark" style="border-radius:0px;">
								<a class="modal-title text-white" href="#" data-dismiss="modal"><i class="icon-chevron-left pr-3 pl-3"></i><b class="text-uppercase"> ' . $dlayanin['nama_lab'] . '</b></a>
								<!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
							</div>

							<div class="modal-body p-3 text-center">
							<div style="text-transform:uppercase;">
								';
				$harian = date('D', strtotime($tgl));
				$sharian	= mysqli_query($konek, "SELECT * FROM tb_hari WHERE nm_singkat = '$harian'");
				$dharian	= mysqli_fetch_array($sharian);

				echo '
								<b>' . $dharian['nm_indo'] . ', ' . tgl_indo($tgl) . '</b>
							</div>
							<hr>
							
'; ?>


				<table class="table table-hover table-stripted datatable-basic mb-3">

					<tbody>
						<?php
						// $sdata	= mysqli_query($konek,"SELECT a.*, LEFT(a.tgl_permohonan, 10) AS tunggalin, b.`nm_pelayanan` FROM per_belum_nikah a, pelayanan b WHERE a.`no_pelayanan` = b.`no_pelayanan` AND a.id_user = '$ses_user'");
						$sdata	= mysqli_query($konek, "SELECT a.*, b.`nm_hari`, b.`nm_indo`, b.`nm_singkat`, c.`nama_lab`, LEFT(a.keluar,5) AS keluarin, LEFT(a.masuk,5) AS masukin FROM tb_jadwal a, tb_hari b, tb_lab c WHERE a.`id_hari` = b.`id_hari` AND a.`id_lab` = c.`id_lab` AND a.id_lab = '$dlayanin[id_lab]' AND a.id_hari = '$dharian[id_hari]' ORDER BY a.`masuk` ASC");
						$nodata	= 1;
						while ($ddata = mysqli_fetch_array($sdata)) {



							$sprojol	= mysqli_query($konek, "SELECT a.* FROM p_inven a, tb_jadwal b WHERE a.`id_jadwal` = b.`id_jadwal` AND a.id_jadwal = '$ddata[id_jadwal]'");
							$hprojol	= mysqli_num_rows($sprojol);
							$dprojol	= mysqli_fetch_array($sprojol);

							if ($hprojol == 0) {
								if (date('Y-m-d H:i:s', strtotime('+30 minute', strtotime($tgl . " " . $ddata['keluar']))) < $tgljam) {
									$statusex   = "<label class='badge badge-danger'>EXPIRED</label>";
									$warnabag		= "bg-dark";
									$tombolpesan    = "<a>";
								} else {
									if (date('Y-m-d H:i:s', strtotime('+30 minute', strtotime($tgl . " " . $ddata['masuk']))) > $tgljam) {
										$statusex   = "<label class='badge badge-warning'>BELUM MASUK JADWAL</label>";
										$warnabag		= "bg-dark";
										$tombolpesan    = "<a>";
									} else {
										$statusex   = "<label class='badge badge-dark'>BELUM DICEK</label>";
										$warnabag		= "bg-danger";
										$tombolpesan    = "<a href='" . $docroot . "m/pengecekan/" . $firex->enkrip($ddata['id_jadwal']) . "' class='text-light'>";
									}
								}
							} else {
								$sbarang	= mysqli_query($konek, "SELECT a.`id_aset` FROM aset a, tb_lab b WHERE a.`id_lab` = b.`id_lab` AND a.id_lab = '$ddata[id_lab]'");
								$hbarang	= mysqli_num_rows($sbarang);
								if ($hbarang == $hprojol) {
									$statusex   = "<label class='badge badge-dark'>SELESAI DICEK</label>";
									$warnabag		= "bg-success";
									$tombolpesan    = "<a href='#' class='text-light' data-toggle='modal' data-target='#modalPesan" . $nodata . "'>";
								} else {
									$statusex   = "<label class='badge badge-dark'>BELUM LENGKAP</label>";
									$warnabag		= "bg-warning";
									$tombolpesan    = "<a href='#' class='text-light' data-toggle='modal' data-target='#modalPesan" . $nodata . "'>";
								}
							}


							echo "
												<tr>
													<td class='" . $warnabag . "'>
														" . $tombolpesan . "
														<b style='font-size:20px;'>" . $ddata['masukin'] . " WIB</b> - <b style='font-size:20px;'>" . $ddata['keluarin'] . " WIB</b>
														" . tgl_indo($ddata['tunggalin']) . "
														<div class='text-center'>" . $statusex . "</div></td>
														</a>
													</td>
												</tr>
											";
							$nodata++;
						}
						?>
					</tbody>
				</table>



				<?php echo '
							<div class="alert alert-warning">
								Pengecekan terhadap Lab hanya bisa dilakukan minimal saat jadwal dimulai dan maksimal <b>30 MENIT</b> setelah jadwal keluar.
							</div>
							<!--<div class="text-center">

								
							
								<button type="button" class="btn bg-dark" data-dismiss="modal">TUTUP</button>
								</div>-->
							</div>
						</div>
					</div>
				</form>
			</div>

										';
				$nolayanin++;
			}
			?>

		</div>



		<!--<ul class="fab-menu fab-menu-fixed fab-menu-bottom-right">
	<li>
		<a class="fab-menu-btn btn bg-blue btn-float rounded-round btn-icon sidebar-mobile-main-toggle" >
			<i class="fab-icon-open icon-paragraph-justify3"></i>
			<i class="fab-icon-close icon-cross2"></i>
		</a>


	</li>
</ul>
<!-- /clickable menu -->

	</div>
	<!-- /content area -->




</div>
<!-- /main content -->