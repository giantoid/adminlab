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

                    <div class="card-body">
                        <input type="text" id="tg_dari">
                        <input type="text" class="" id="tg_ke">
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
                                    <th>Keterangan</th>
                                    <th>lab</th>
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
            getLab();

            function stringToDate(_date, _format, _delimiter) {
                var formatLowerCase = _format.toLowerCase();
                var formatItems = formatLowerCase.split(_delimiter);
                var dateItems = _date.split(_delimiter);
                var monthIndex = formatItems.indexOf("mm");
                var dayIndex = formatItems.indexOf("dd");
                var yearIndex = formatItems.indexOf("yyyy");
                var month = parseInt(dateItems[monthIndex]);
                month -= 1;
                var formatedDate = new Date(dateItems[yearIndex], month, dateItems[dayIndex]);
                return formatedDate;
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
                    table.column(7).search(this.value).draw();
                } else {
                    table.column(7).search(this.value).draw();
                }
            });

            $("#tgl_dari").on('change', function() {
                // minDateFilter = stringToDate($('#tgl_dari').val(), "dd-mm-yyyy", "-");
                table.draw();
                // console.log('Tanggal : ' + minDateFilter)
            });

            $("#tgl_ke").on('change', function() {
                // maxDateFilter = stringToDate($('#tgl_ke').val(), "dd-mm-yyyy", "-");
                table.draw();
                // console.log('Tanggal : ' + maxDateFilter)
            });

            $('#tg_dari').on('keyup', function() {
                table.draw();
            });

            $('#tg_ke').on('keyup', function() {
                table.draw();
            });

            // // Date range filter
            // minDateFilter = "";
            // maxDateFilter = "";

            // $.fn.dataTableExt.afnFiltering.push(
            //     function(oSettings, aData, iDataIndex) {
            //         if (typeof aData._date == 'undefined') {
            //             aData._date = new Date(aData[0]).getTime();
            //         }

            //         if (minDateFilter && !isNaN(minDateFilter)) {
            //             if (aData._date < minDateFilter) {
            //                 return false;
            //             }
            //         }

            //         if (maxDateFilter && !isNaN(maxDateFilter)) {
            //             if (aData._date > maxDateFilter) {
            //                 return false;
            //             }
            //         }

            //         return true;
            //     }
            // );

            $.fn.dataTableExt.afnFiltering.push(
                function(oSettings, aData, iDataIndex) {
                    var iFini = document.getElementById('tg_dari').value;
                    var iFfin = document.getElementById('tg_ke').value;
                    var iStartDateCol = 6;
                    var iEndDateCol = 7;

                    iFini = iFini.substring(6, 10) + iFini.substring(3, 5) + iFini.substring(0, 2);
                    iFfin = iFfin.substring(6, 10) + iFfin.substring(3, 5) + iFfin.substring(0, 2);

                    var datofini = aData[iStartDateCol].substring(6, 10) + aData[iStartDateCol].substring(3, 5) + aData[iStartDateCol].substring(0, 2);
                    var datoffin = aData[iEndDateCol].substring(6, 10) + aData[iEndDateCol].substring(3, 5) + aData[iEndDateCol].substring(0, 2);

                    if (iFini === "" && iFfin === "") {
                        return true;
                    } else if (iFini <= datofini && iFfin === "") {
                        return true;
                    } else if (iFfin >= datoffin && iFini === "") {
                        return true;
                    } else if (iFini <= datofini && iFfin >= datoffin) {
                        return true;
                    }
                    return false;
                }
            );
        });
    </script>

</body>

</html>