	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="<?php echo base_url(); ?>assets2/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo $namaadmin; ?></span>
									<div class="text-size-mini text-muted">
										admin
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->

					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">
								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li <?php echo $dashboard_active; ?>><a href="<?php echo base_url(); ?>admin/dashboard"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li <?php echo $datasiswa_active; ?>>
									<a href="<?php echo base_url(); ?>admin/datasiswa"><i class="icon-stack2"></i> <span>Data Siswa</span></a>
								</li>
								<li <?php echo $pencariansiswa_active; ?>>
									<a href="<?php echo base_url(); ?>admin/pencariansiswa"><i class="icon-search4"></i> <span>Pencarian Siswa</span>
									<span class="label label-warning">Coming Soon</span>
									</a>
								</li>
								<li <?php echo $referensi_active; ?>>
									<a href="<?php echo base_url(); ?>admin/referensi"><i class="icon-list-unordered"></i> <span>Referensi</span>
									<span class="label label-warning">Coming Soon</span>
									</a>
								</li>
								<li <?php echo $admin_active; ?>>
									<a href="<?php echo base_url(); ?>admin/dataadmin"><i class="icon-user"></i> <span>Admin</span>
									<span class="label label-warning">Coming Soon</span>
									</a>
									<ul>
										<li <?php echo $admin_active; ?>><a href="<?php echo base_url(); ?>admin/dataadmin">Semua Admin</a></li>
										<li <?php echo $tambahadmin_active; ?>><a href="<?php echo base_url(); ?>admin/tambahadmin">Tambah Admin</a></li>
										<li <?php echo $profil_active; ?>><a href="<?php echo base_url(); ?>admin/profil">Profil</a></li>
									</ul>
								</li>
								<li <?php echo $resetpassword_active; ?>>
									<a href="<?php echo base_url(); ?>admin/resetpassword"><i class="icon-key"></i> <span>Reset Password Siswa</span>
									</a>
								</li>

								<!-- /main -->
							</ul>
						</div>
					</div>
					<!-- /main navigation -->
				</div>
			</div>
			<!-- /main sidebar -->