<?php 
require_once('layout/head.php'); 
require_once('layout/navbarmenu.php');
require_once('layout/sidebar.php');
?>

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><span class="text-semibold">Home</span>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active">Data Admin</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">
					<!--Grafik jumlah kelompok dari tiap lembaga-->
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-flat">
								<div class="panel-heading">
									<center><h4 class="panel-title"><strong>Data Admin</strong></h4></center>
			                	</div>
			                	<div class="panel-body">
			                	<div class="text-right">
			                		<a type="button" class="btn btn-primary"><i class="icon-plus-circle2"></i> Tambah Admin</a>
									</div>
									<table class="table table-bodered table striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Username</th>
												<th>Nama</th>
												<th>Email</th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>jabiralhayyan</td>
												<td>Jabir AL Hayyan</td>
												<td>jabir@gmail.com</td>
												<td>
												<a type="button" class="btn btn-warning btn-xs"><i class="icon-pencil"></i></a>
												<a type="button" class="btn btn-danger btn-xs"><i class="icon-trash"></i></a>
												</td>
											</tr>
										</tbody>

									</table>

								</div>
			                </div>
						</div>
					</div>

<!-- Footer -->
<?php require_once('layout/footer.php'); ?>
<!-- /footer -->