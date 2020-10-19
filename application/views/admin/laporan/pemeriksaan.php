<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin/includes/css.php') ?>
</head>

<body>

    <!-- Main navbar -->
    <?php $this->load->view('admin/includes/navbar.php') ?>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <?php $this->load->view('admin/includes/sidebar.php') ?>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <?php $this->load->view('admin/includes/header.php') ?>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">

                <!-- Basic datatable -->
                <div class="card">
                    <div class="card-header bg-slate-300 text-white header-elements-inline">
                        <h4 class="card-title">Laporan Pemeriksaan</h4>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- <form action="" method="POST"> -->
                        <div class="form-group row container">
                            <label class="col-form-label" for="tgl_dari">Dari tanggal</label>
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                    </span>
                                    <input type="text" name="tgl_dari" id="tgl_dari" class="form-control pickadate-accessibility">
                                </div>
                            </div>
                            <label class="col-form-label" for="tgl_ke">ke tanggal</label>
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                    </span>
                                    <input type="text" name="tgl_ke" id="tgl_ke" class="form-control pickadate-accessibility">
                                </div>
                            </div>
                            <button id="filterin" class="btn btn-success">Filter</button>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2" for="lab">Laboratorium</label>
                            <div class="col-lg-10">
                                <select data-placeholder="Pilih laboratorium..." name="lab" class="form-control select" id="idlab" data-fouc required>

                                </select>
                            </div>
                        </div>
                        <!-- </form> -->
                        <table id="tabelku" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Aset</th>
                                    <th>Mata Kuliah</th>
                                    <th>Waktu Periksa</th>
                                    <th>Status</th>
                                    <th>Kondisi</th>
                                    <th>Petugas</th>
                                    <th>laboratorium</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody id="tabelku1">
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- /content area -->

            <!-- Footer -->
            <?php $this->load->view('admin/includes/footer.php') ?>
            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->
    <?php $this->load->view('admin/includes/js.php') ?>

    <script type="text/javascript">
        $(document).ready(function() {
            // getPeriksa();
            getLab();

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
                            html += '<option value=' + data[i].nama_lab + '>' + data[i].nama_lab + '</option>';
                        }
                        $('#idlab').html(html);
                    }

                });
            }

            var table = $('#tabelku').DataTable({
                scrollY: '',
                /*'65vh'*/
                scrollCollapse: true,
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('admin/laporan/pemeriksaan/filterTable') ?>",
                    "type": "POST"
                },

                columns: [{},
                    {},
                    {},
                    {},
                    {},
                    {},
                    {},
                    {}
                ],
                "stripeClasses": ['', '']
            });

            $('#idlab').on('change', function() {
                if (!!this.value) {
                    table.column(6).search(this.value).draw();
                } else {
                    table.column(6).search(this.value).draw();
                }
            });

            $('#filterin').on('click', function() {
                table.column(1).search($('#tgl_dari').val()).draw();
                table.column(2).search($('#tgl_ke').val()).draw();
            });
        });
    </script>

</body>

</html>