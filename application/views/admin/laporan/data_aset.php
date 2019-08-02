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
                        <h4 class="card-title">Laporan Data Aset</h4>
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
                            <label class="col-form-label col-lg-2" for="ftahun">Tahun</label>
                            <div class="col-lg-10">
                                <select data-placeholder="Pilih tahun..." name="ftahun" class="form-control select" id="ftahun" data-fouc required>

                                </select>
                            </div>
                        </div>
                        <!-- </form> -->
                        <table id="tabelast" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Aset</th>
                                    <th>Nama Aset</th>
                                    <th>Jenis Aset</th>
                                    <th>Kelompok</th>
                                    <th>Tgl. Pembelian</th>
                                    <th>Umur Aset</th>
                                    <th>Laboratorium</th>
                                </tr>
                            </thead>
                            <tbody>
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
            getTahun();

            function getTahun() {
                $.ajax({
                    type: 'ajax',
                    url: "<?php echo site_url('admin/barang/tahun') ?>",
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html += '<option value="">Tampil semua</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].tahun + '>' + data[i].tahun + '</option>';
                        }
                        $('#ftahun').html(html);
                    }

                });
            }

            var table = $('#tabelast').DataTable({
                scrollY: '',
                /*'65vh'*/
                scrollCollapse: true,
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('admin/laporan/data_aset/filterTable') ?>",
                    "type": "POST"
                },

                columns: [{},
                    {},
                    {},
                    {},
                    {},
                    {},
                    {}
                ],
                "stripeClasses": ['', '']
            });

            $('#ftahun').on('change', function() {
                if (!!this.value) {
                    table.column(4).search(this.value).draw();
                } else {
                    table.column(4).search(this.value).draw();
                }
            });
        });
    </script>

</body>

</html>