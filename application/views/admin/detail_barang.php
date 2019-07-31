<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/css.php' ?>
</head>

<body>

    <!-- Main navbar -->
    <?php include 'includes/navbar.php' ?>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <?php include 'includes/sidebar.php' ?>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <?php include 'includes/header.php' ?>
            <!-- /page header -->


            <!-- Content area -->
            <?php foreach ($dataAset as $aset) : ?>
                <div class="content">
                    <!-- Basic card -->
                    <div class="card">
                        <div class="card-header bg-slate-300 header-elements-inline">
                            <h4 class="card-title"><?= $aset->nama_aset ?></h4>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="reload"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Kode Aset</label>
                                <div class="col-lg-10">
                                    <input class="form-control" value="<?= $aset->id_aset ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Nama Aset</label>
                                <div class="col-lg-10">
                                    <input class="form-control" value="<?= $aset->nama_aset ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Merk</label>
                                <div class="col-lg-10">
                                    <input class="form-control" value="<?= $aset->merk ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Tipe</label>
                                <div class="col-lg-10">
                                    <input class="form-control" value="<?= $aset->tipe ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Jenis Aset</label>
                                <div class="col-lg-10">
                                    <input class="form-control" value="<?= $aset->nama_jenis ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Tanggal Pembelian</label>
                                <div class="col-lg-10">
                                    <input class="form-control" value="<?= date('d-m-Y', strtotime($aset->tgl_beli)) ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Harga Pembelian</label>
                                <div class="col-lg-10">
                                    <input class="form-control" value="<?= rupiah($aset->harga_beli) ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Nilai Residu</label>
                                <div class="col-lg-10">
                                    <input class="form-control" value="<?= rupiah($aset->nilai_residu) ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Laboratorium</label>
                                <div class="col-lg-10">
                                    <input class="form-control" value="<?= $aset->nama_lab ?>" readonly>
                                </div>
                            </div>
                            <br>
                            <h5>
                                <center>Tabel Penyusutan</center>
                            </h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr align="center">
                                        <th>Akhir tahun ke</th>
                                        <th>Biaya Penyusutan</th>
                                        <th>Akumulasi Biaya Penyusutan</th>
                                        <th>Nilai Buku</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $lama = $aset->masa_manfaat;
                                    $beli = $aset->harga_beli;
                                    $susut = ($beli - $aset->nilai_residu) / $lama;
                                    for ($i = 1; $i <= $lama; $i++) {
                                        ?>
                                        <tr>
                                            <td align="right"><?= $i ?></td>
                                            <td align="right"><?= rupiah($susut) ?></td>
                                            <td align="right"><?= rupiah($susut * $i) ?></td>
                                            <td align="right"><?= rupiah($beli - ($susut * $i)) ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /basic card -->
            <?php endforeach; ?>
            <!-- /content area -->

            <!-- Footer -->
            <?php include 'includes/footer.php' ?>
            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->
    <?php include 'includes/js.php' ?>

</body>

</html>