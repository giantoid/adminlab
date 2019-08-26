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

        <div class="card">
          <div class="card-header bg-slate-300 text-white header-elements-inline">
            <h4 class="card-title">Data Aset</h4>
            <div class="header-elements">
              <a class="list-icons-item" data-action="collapse"></a>
              <a class="list-icons-item" data-action="reload"></a>
              <a class="list-icons-item" data-action="remove"></a>
            </div>
          </div>

          <div class="card-body">
            <table class="table datatable-basic">
              <thead>
                <tr>
                  <th width="5%">No.</th>
                  <th>Kode Aset</th>
                  <th>Nama Aset</th>
                  <th>Jenis Aset</th>
                  <th>Tgl. Perolehan</th>
                  <th>Laboratorium</th>
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
                  <td><?= $aset->nama_lab ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>


        <!-- Dashboard content -->

        <!-- /dashboard content -->

      </div>
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