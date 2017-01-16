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
						<li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="icon-home2 position-left"></i> Home</a></li>
						<li class="active">Pencarian Siswa</li>
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
								<center><h5 class="panel-title"><strong>Pencarian Siswa</strong></h5></center>
							</div>
							<div class="panel-body">
								<div class=col-md-3></div>
								<div class=col-md-9>
									<div class="form-group">
										<label class="control-label col-lg-2">Lembaga</label>
										<div class="col-lg-5">
											<select class="form-control">
												<option >Alaska</option>
											</select>
										</div>
									</div>
									<br>
									<div class="form-group">
										<label class="control-label col-lg-2">Pencarian</label>
										<div class="col-lg-5">
											<select class="form-control">
												<option >Alaska</option>
											</select>
											<input type="text" class="form-control">
										</div>
										
									</div>
									<br><br><br>
								</div>
								<center><button type="submit" class="btn btn-primary btn-lg">Cari</button></center>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<div class="text-right">
									<div class="panel-body">
										<a type="button" class="btn btn-success btn-xs"><i class="icon-file-excel"></i> Cetak Excel</a>
										<a type="button" class="btn btn-warning btn-xs"><i class="icon-printer2"></i> Print</a>
									</div>
								</div>
								<table class="table datatable-responsive">
									<thead>
										<tr>
											<th>No</th>
											<th>No Daftar</th>
											<th>NISN</th>
											<th>Nama</th>
											<th>Kelompok</th>
											<th class="text-center">Actions</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>PSBMAUG10003</td>
											<td>123456789</td>
											<td>Jabir Al Hayyan</td>
											<td>Gelombang 1</td>
											<td class="text-center">
												<a type="button" class="btn btn-warning btn-xs"><i class="icon-search4"></i></a>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<!-- /basic datatable -->
						</div>
					</div>
				</div>
			</div>

			<!-- Footer -->
			<?php require_once('layout/footer.php'); ?>
<!-- /footer -->