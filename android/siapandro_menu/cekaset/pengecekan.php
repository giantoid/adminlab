<title>Data Permohonan Paten - <?php echo $judulweb; ?></title>


<?php
$id_jadwal    = $firex->dekrip($id1);

$harian     = date('D', strtotime($tgl));
$sharian    = mysqli_query($konek, "SELECT * FROM tb_hari WHERE nm_singkat = '$harian'");
$dharian    = mysqli_fetch_array($sharian);

$sdata    = mysqli_query($konek, "SELECT a.*, b.`nm_hari`, b.`nm_indo`, b.`nm_singkat`, c.`nama_lab`, LEFT(a.keluar,5) AS keluarin, LEFT(a.masuk,5) AS masukin FROM tb_jadwal a, tb_hari b, tb_lab c WHERE a.`id_hari` = b.`id_hari` AND a.`id_lab` = c.`id_lab` AND a.id_jadwal = '$id_jadwal' AND a.id_hari = '$dharian[id_hari]' ORDER BY a.`masuk` ASC");
$hdata  = mysqli_num_rows($sdata);
if ($hdata == 0) {
    include "404.php";
} else {
    $ddata  = mysqli_fetch_array($sdata);
    ?>





    <div class="content-wrapper">






        <!-- Content area -->
        <div class="content p-0">

            <?php

            if (isset($_POST['tambahin'])) {
                $id_asetx        = $_POST['id_aset'];
                $statusx         = $_POST['status'];
                $kondisix        = $_POST['kondisi'];
                $ketx            = $_POST['ket'];

                $sasetx  = mysqli_query($konek, "SELECT * FROM aset WHERE id_lab = '$ddata[id_lab]'");
                $noasetx = 1;
                while ($dasetx = mysqli_fetch_array($sasetx)) {
                    $status     = $statusx[$noasetx];
                    $kondisi    = $kondisix[$noasetx];
                    $ket        = $ketx[$noasetx];
                    $id_aset    = $id_asetx[$noasetx];
                    $masukinx   = mysqli_query($konek, "INSERT INTO p_inven (`status`, kondisi, ket, id_user, id_aset, id_jadwal) VALUE ('$status','$kondisi','$ket','$ses_user','$id_aset','$id_jadwal')");

                    $noasetx++;
                }
                if ($masukinx) {
                    echo "
                <script>
                    swal({
                        title: 'Berhasil!',
                        type: 'success',
                        text: 'Sukses menambah data',
                        confirmButtonClass: 'btn btn-primary',
                        cancelButtonClass: 'btn btn-light',
                        background: '#fff url(" . $docandro . "global/images/backgrounds/seamless.png) repeat'
                    });
                </script>
                <meta http-equiv='refresh' content='2;url=" . $docandro . "m'>
            ";
                } else {
                    echo "
                <script>
                    swal({
                        title: 'Gagal!',
                        type: 'error',
                        confirmButtonClass: 'btn btn-danger',
                        cancelButtonClass: 'btn btn-light',
                        text: 'Gagal menambah datanya',
                        background: '#fff url(" . $docandro . "global/images/backgrounds/seamless.png) repeat'
                    });
                </script>
            ";
                }
            }
            ?>

            <div class="card pb-3">
                <div class="card-header bg-dark d-flex justify-content-between" style="border-radius:0px;">
                    <span class="font-size-sm text-uppercase font-weight-semibold"><?php echo $ddata['nama_lab']; ?> : <b class="text-warning"><?php echo $ddata['masukin'] . " WIB - " . $ddata['keluarin'] . " WIB"; ?></b></span>
                </div>

                <div id="accordion-group">
                    <div class="card-body p-0 pb-3">
                        <form method="post" method="post" enctype="multipart/form-data">

                            <?php
                            $saset  = mysqli_query($konek, "SELECT * FROM aset WHERE id_lab = '$ddata[id_lab]'");
                            $noaset = 1;
                            while ($daset = mysqli_fetch_array($saset)) {

                                echo '
                                        <input type="hidden" name="id_aset[' . $noaset . ']" value="' . $daset['id_aset'] . '">
                                        
                            <div class="card mb-0 rounded-bottom-0">
                            <a data-toggle="collapse" class="text-light" href="#accordion-item-group' . $noaset . '">
								<div class="card-header bg-brown pb-2 pt-2">
									<h6 class="card-title">
										<td colspan="3" class="bg-brown"><b>' . $daset['id_aset'] . '</b> - ' . $daset['nama_aset'] . ' ' . $daset['merk'] . ' ' . $daset['tipe'] . '</td>
									</h6>
                                </div>
                                </a>
                                <div id="accordion-item-group' . $noaset . '" class="collapse" data-parent="#accordion-group">
									<div class="card-body p-0">
                                            <table class="table table-hover">
                                                <!-- <tr>
                                                    <td colspan="3" class="bg-brown"><b>' . $daset['id_aset'] . '</b> - ' . $daset['nama_aset'] . ' ' . $daset['merk'] . ' ' . $daset['tipe'] . '</td>
                                                </tr> -->
                                                <tr>
                                                    <td class="pb-1 pt-1">Status</td>
                                                    <td class="pb-1 pt-1">
                                                        <div class="form-check form-check-inline pt-1">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input-styled" value="Baik" name="status[' . $noaset . ']" required> Baik
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="pb-1 pt-1">
                                                        <div class="form-check form-check-inline pt-1">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input-styled" value="Rusak" name="status[' . $noaset . ']" required> Rusak
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pb-1 pt-1">Kondisi</td>
                                                    <td class="pb-1 pt-1">
                                                        <div class="form-check form-check-inline pt-1">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input-styled" value="Ada" name="kondisi[' . $noaset . ']" required> Ada
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="pb-1 pt-1">
                                                        <div class="form-check form-check-inline pt-1">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input-styled" value="Tidak ada" name="kondisi[' . $noaset . ']" required> Tidak Ada
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>      
                                                <tr>
                                                    <td class="pb-1 pt-1">Keterangan</td>
                                                    <td colspan="2" class="pb-1 pt-1">
                                                        <textarea class="form-control" name="ket[' . $noaset . ']" placeholder="Keterangan..."></textarea>
                                                    </td>
                                                </tr>
                                            </table>
                                </div>
                                </div>
                                </div>
                                            
                                        
                                    ';
                                $noaset++;
                            }
                            ?>
                            <hr>

                            <div class="form-group text-center m-3">
                                <div class="alert alert-warning">
                                    Pastikan anda sudah mengecek seluruh aset.
                                </div>
                                <a href="<?php echo $docandro; ?>m/" class="btn bg-danger">Batal</a>
                                <button type="submit" name="tambahin" class="btn bg-dark"><i class="icon-check pr-2"></i> Selesaikan Pengecekan</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /content area -->



    </div>
    <!-- /main content -->



<?php } ?>