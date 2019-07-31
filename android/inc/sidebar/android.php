<style>  
.artgamprof{
					display: block;
					width: 150px;
					position: relative;
					height: 150px;
					padding: 0 0 0 0;
					overflow: hidden;
					background:#000;
					border:4px solid #ccc;
				}

				.artgamprof img{
					
					-moz-transition: all 0.3s;
					-webkit-transition: all 0.3s;
					transition: all 0.3s;
					transform: scale(1.5);
				}
				.artgamprof:hover img{
					-moz-transform: scale(2.1);
					-webkit-transform: scale(2.1);
					transform: scale(2.1);
				}
				
</style>

<!-- Main sidebar -->
		<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">
		<!-- <div class="sidebar sidebar-light sidebar-main sidebar-expand-md"> -->

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				<span class="font-weight-semibold">Menu Petugas</span>
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
							<center>
							<a href="<?php echo $gambarprofil;?>" data-popup="lightbox" rel="group">
										<div class="artgamprof rounded-circle shadow-1 mb-2">
										<img src="<?php echo $gambarprofil;?>" class="shadow-1" width="100%" alt="<?php echo $duser['nm_user'];?>">
										</div>
									</a>
							</center>
							<h6 class="mb-0 text-white text-shadow-dark"><?php echo $duser['nm_user'];?></h6>
							<span class="font-size-sm text-white text-shadow-dark"><?php echo $duser['nm_level'];?></span>
						</div>
									
					</div>

				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">
						
						<li class="nav-item">
							<a href="<?php echo $docandro;?>m/profil" class="nav-link">
								<i class="icon-user"></i>
								<span>Profil</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" data-toggle="modal" data-target="#modalEditPassword" class="nav-link">
								<i class="icon-lock"></i>
								<span>Ganti Password</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo $docandro;?>keluar" class="nav-link">
								<i class="icon-switch2"></i>
								<span>Keluar</span>
							</a>
						</li>
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->
