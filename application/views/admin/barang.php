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
            <div class="content">

                <!-- Basic datatable -->
                <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success border-0 alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php
                } ?>
                <!-- Basic datatable -->
                <div class="card">
                    <div class="card-header bg-slate-300 text-white header-elements-inline">
                        <h4 class="card-title">Data Aset</h4>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a href="javascript:void(0);" class="btn btn-success btn-sm bttambah" data-toggle="modal" data-target="#modalTambah"><span class="icon-plus-circle2 mr-1"></span>Tambah Data Aset</a>
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>


                    <table class="table datatable-basic">
                        <thead>
                            <tr>
                                <th width="5%">No.</th>
                                <th>Kode Aset</th>
                                <th>Nama Aset</th>
                                <th>Jenis Aset</th>
                                <th>Tgl. Perolehan</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($dataAset as $aset) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $aset->id_aset ?></td>
                                <td><?php echo $aset->nama_aset ?></td>
                                <td><?php echo $aset->nama_jenis ?></td>
                                <td><?php echo date('d-m-Y', strtotime($aset->tgl_beli)) ?></td>
                                <td width="14%">
                                    <div class="btn-group"> <?php $id1 = ekrip("$aset->id_aset") ?>
                                        <a href="<?= base_url('admin/barang/detail/' . $id1) ?>" class="btn btn-sm btn-success" data-popup="tooltip-custom" title="Detail" data-placement="bottom" data-delay="600"><i class="icon-eye"></i></a>
                                        <a href="#" class="btn btn-sm btn-primary btedit" data-popup="tooltip-custom" title="Edit" data-placement="bottom" data-delay="600" data-toggle="modal" data-target="#modalEdit" data-id="<?php echo $id1 ?>"><i class="icon-pencil"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger bthapus" data-popup="tooltip-custom" title="Hapus" data-placement="bottom" data-delay="600" data-toggle="modal" data-target="#modalHapus" data-id="<?php echo $id1 ?>"><i class="icon-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /content area -->
            <!-- Modal Simpan -->
            <div id="modalTambah" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h4 class="modal-title">Tambah Data Aset</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form action="<?php echo base_url('admin/barang/input') ?>" method="post">
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="id_aset">Kode Aset<span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="id_aset" placeholder="Masukkan kode aset..." required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="nama_aset">Nama Aset<span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="nama_aset" placeholder="Masukkan nama aset..." required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="merk">Mer <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="merk" placeholder="Masukkan merk..." required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="tipe">Tip <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="tipe" placeholder="Masukkan tipe..." required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="jenis_aset">Jenis Aset<span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <select data-placeholder="Pilih jenis aset..." name="jenis_aset" class="form-control select" id="show_data" data-fouc required>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="tgl_beli">Tanggal Pembelian<span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                            </span>
                                            <input type="text" name="tgl_beli" class="form-control pickadate-accessibility" placeholder="Pilih tanggal...">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="harga_beli">Harga Pembelian<span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="harga_beli" placeholder="Masukkan harga beli..." id="rupiah" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="nilai_residu">Nilai Resid <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="nilai_residu" placeholder="Masukkan nilai residu..." id="rupiah2" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="lab">Laboratorium<span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <select data-placeholder="Pilih laboratorium..." name="lab" class="form-control select" id="idlab" data-fouc required>

                                        </select>
                                    </div>
                                </div>
                                <span class="text-danger">* <i>wajib diisi!</i></span>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn bg-info">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Modal Simpan -->

            <!-- Modal Edit -->
            <div id="modalEdit" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h4 class="modal-title">Edit Data Aset</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form action="<?php echo base_url('admin/barang/edit') ?>" method="post">
                                <div class="form-group row">
                                    <!-- <label class="col-form-label col-lg-2" for="id_aset">Kode Aset</label> -->
                                    <div class="col-lg-10">
                                        <input type="hidden" class="form-control" name="id_aset" id="id_aset">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="nama_aset">Nama Aset</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="nama_aset" id="nama_aset">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="merk">Merk</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="merk" id="merk" placeholder="Masukkan nama aset...">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="tipe">Tipe</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="tipe" id="tipe" placeholder="Masukkan nama aset...">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="jenis_aset">Jenis Aset</label>
                                    <div class="col-lg-10">
                                        <select name="jenis_aset" id="show_data" class="form-control select jenis_aset" data-fouc>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="tgl_beli">Tanggal Pembelian</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                            </span>
                                            <input type="text" name="tgl_beli" id="tgl_beli" class="form-control pickadate-accessibility">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="harga_beli">Harga Pembelian</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control aa" name="harga_beli" id="rupiah3">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="nilai_residu">Nilai Residu</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control ab" name="nilai_residu" id="rupiah4">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2" for="lab">Laboratorium</label>
                                    <div class="col-lg-10">
                                        <select name="lab" class="form-control select lab" data-fouc>
                                        </select>
                                    </div>
                                </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn bg-info">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Modal Edit -->

            <!-- Modal Hapus -->
            <div id="modalHapus" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title">Konfirmasi Hapus Data</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form action="<?php echo base_url('admin/barang/hapus') ?>" method="post">
                                <input type="hidden" name="id" id="idh">
                                <h6>Apakah anda yakin ingin menghapus?</h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn bg-info">Iya</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Modal Hapus -->

            <!-- Footer -->
            <?php include 'includes/footer.php' ?>
            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->
    <?php include 'includes/js.php' ?>

    <script type="text/javascript">
        $(document).ready(function() {
            jenisAset();
            getLab();

            function jenisAset() {
                $.ajax({
                    type: 'ajax',
                    url: "<?php echo site_url('admin/barang/jenisAset') ?>",
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html += '<option></option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].id_jenis + '>' + data[i].nama_jenis + '</option>';
                        }
                        $('#show_data').html(html);
                    }

                });
            }

            function getLab() {
                $.ajax({
                    type: 'ajax',
                    url: "<?php echo site_url('admin/barang/lab') ?>",
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html += '<option></option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].id_lab + '>' + data[i].nama_lab + '</option>';
                        }
                        $('#idlab').html(html);
                    }

                });
            }
            $('.bthapus').on('click', function() {
                const id = $(this).data('id');

                $.ajax({
                    url: "<?php echo site_url('admin/barang/getByID') ?>",
                    data: {
                        id: id
                    },
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        $('#idh').val(data[0].id_aset);
                    }
                });
            });

            $('.btedit').on('click', function() {
                const id = $(this).data('id');

                $.ajax({
                    url: "<?php echo site_url('admin/barang/getByID') ?>",
                    data: {
                        id: id
                    },
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        var html;
                        $('#id_aset').val(data[0].id_aset);
                        $('#nama_aset').val(data[0].nama_aset);
                        $('#merk').val(data[0].merk);
                        $('#tipe').val(data[0].tipe);
                        var idj = data[0].id_jenis;
                        var date = new Date(data[0].tgl_beli);
                        var dt = $.format.date(date, "dd-MM-yyyy");
                        // console.log(date.toLocaleDateString('dd-MM-yyyy'));
                        $('#tgl_beli').val(dt);
                        $('.aa').val(formatRupiah(data[0].harga_beli, "Rp. "));
                        $('.ab').val(formatRupiah(data[0].nilai_residu, "Rp. "));
                        var idl = data[0].id_lab;
                        $.ajax({
                            type: 'ajax',
                            url: "<?php echo site_url('admin/barang/jenisAset') ?>",
                            async: false,
                            dataType: 'json',
                            success: function(data) {
                                var html = '';
                                var i;
                                var sel;
                                html += '<option></option>';
                                for (i = 0; i < data.length; i++) {
                                    if (idj == data[i].id_jenis) {
                                        sel = 'selected';
                                    } else {
                                        sel = '';
                                    }
                                    html += '<option value=' + data[i].id_jenis + ' ' + sel + '>' + data[i].nama_jenis + '</option>';
                                }
                                $('.jenis_aset').html(html);
                            }

                        });

                        $.ajax({
                            type: 'ajax',
                            url: "<?php echo site_url('admin/barang/lab') ?>",
                            async: false,
                            dataType: 'json',
                            success: function(data) {
                                var html = '';
                                var i;
                                var sel;
                                html += '<option></option>';
                                for (i = 0; i < data.length; i++) {
                                    if (idl == data[i].id_lab) {
                                        sel = 'selected';
                                    } else {
                                        sel = '';
                                    }
                                    html += '<option value=' + data[i].id_lab + ' ' + sel + '>' + data[i].nama_lab + '</option>';
                                }
                                $('.lab').html(html);
                            }

                        });
                    }
                });
            });
        });

        var rupiah = document.getElementById("rupiah");
        rupiah.addEventListener("keyup", function(e) {
            rupiah.value = formatRupiah(this.value, "Rp. ");
        });

        var rupiah2 = document.getElementById("rupiah2");
        rupiah2.addEventListener("keyup", function(e) {
            rupiah2.value = formatRupiah(this.value, "Rp. ");
        });


        var rupiah3 = document.getElementById("rupiah3");
        rupiah3.addEventListener("keyup", function(e) {
            rupiah3.value = formatRupiah(this.value, "Rp. ");
        });

        var rupiah4 = document.getElementById("rupiah4");
        rupiah4.addEventListener("keyup", function(e) {
            rupiah4.value = formatRupiah(this.value, "Rp. ");
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        }
    </script>

</body>

</html>