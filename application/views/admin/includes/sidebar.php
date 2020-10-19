<!-- Main sidebar -->
<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

  <!-- Sidebar mobile toggler -->
  <div class="sidebar-mobile-toggler text-center">
    <a href="#" class="sidebar-mobile-main-toggle">
      <i class="icon-arrow-left8"></i>
    </a>
    <span class="font-weight-semibold">Navigation</span>
    <a href="#" class="sidebar-mobile-expand">
      <i class="icon-screen-full"></i>
      <i class="icon-screen-normal"></i>
    </a>
  </div>
  <!-- /sidebar mobile toggler -->


  <!-- Sidebar content -->
  <div class="sidebar-content">

    <!-- User menu -->
    <div class="sidebar-user-material">
      <div class="sidebar-user-material-body">
        <div class="card-body text-center">
          <a href="#">
            <img src="<?php echo base_url('global_assets/images/placeholders/placeholder.jpg') ?>" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
          </a>
          <h6 class="mb-0 text-white text-shadow-dark"><?php echo $this->session->userdata('nama') ?></h6>
          <span class="font-size-sm text-white text-shadow-dark"><?php echo $this->session->userdata('username') ?></span>
        </div>

        <div class="sidebar-user-material-footer">
          <a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>My account</span></a>
        </div>
      </div>

      <div class="collapse" id="user-nav">
        <ul class="nav nav-sidebar">
          <li class="nav-item">
            <a href="<?= base_url('admin/user/ubahpassword') ?>" class="nav-link">
              <i class="icon-lock"></i>
              <span>Ubah Password</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('auth/logout') ?>" class="nav-link">
              <i class="icon-switch2"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- /user menu -->


    <!-- Main navigation -->
    <div class="card card-sidebar-mobile">
      <ul class="nav nav-sidebar" data-nav-type="accordion">

        <!-- Main -->
        <li class="nav-item-header">
          <div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('dashboard') ?>" class="nav-link active">
            <i class="icon-home4"></i>
            <span>
              Dashboard
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('barang') ?>" class="nav-link active">
            <i class="icon-drawer3"></i>
            <span>
              Data Aset
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('user') ?>" class="nav-link active">
            <i class="icon-users"></i>
            <span>
              User
            </span>
          </a>
        </li>
        <li class="nav-item nav-item-submenu">
          <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Laporan</span></a>
          <ul class="nav nav-group-sub" data-submenu-title="Menu">
            <li class="nav-item"><a href="<?php echo base_url('laporan/pemeriksaan') ?>" class="nav-link active">Pemeriksaan</a></li>
            <li class="nav-item"><a href="<?php echo base_url('laporan/data-aset') ?>" class="nav-link">Data Aset</a></li>
          </ul>
        </li>
        <!-- <li class="nav-item">
          <a href="changelog.html" class="nav-link">
            <i class="icon-list-unordered"></i>
            <span>Changelog</span>
            <span class="badge bg-blue-400 align-self-center ml-auto">2.0</span>
          </a>
        </li> -->
      </ul>
    </div>
    <!-- /main navigation -->

  </div>
  <!-- /sidebar content -->

</div>
<!-- /main sidebar -->