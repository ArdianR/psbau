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
							<li><a href="<?php echo base_url(); ?>admin/referensi">Referensi</a></li>
							<li class="active">Kelompok</li>
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
									<center><h4 class="panel-title"><strong>Kelompok</strong></h4></center>
			                	</div>
			                	<div class="panel-body">									
			                		<div class=col-md-3></div>
									<div class=col-md-9>
									<div class="form-group">
										<label class="control-label col-lg-2">Lembaga</label>
										<div class="col-lg-5">
										<select class="form-control" name="inputLembaga" id="inputLembaga">
											<?php foreach($_lembaga->result() as $row) {
							                    echo '<option value="'.$row->lembaga.'">'.$row->lembaga.'</option>';
							                }?>
										</select>
										</div>
									</div>
									<div class="form-group">
										<br><br>
										<label class="control-label col-lg-2">Proses Penerimaan</label>
										<div class="col-lg-5">
										<input class="form-control" name="inputProsesPenerimaan" value="<?php echo ($proses ? $proses : ""); ?>" readonly>
										<input type="hidden" name="inputIdProses" id="inputIdProses" value="<?php echo $idprosespenerimaan; ?>">
										</div>
									</div>
									</div>
									<div id="kelompok_calonsiswa"></div>
								</div>
			                </div>
						</div>
					</div>


<script type="text/javascript"> 
$(document).ready(function(){ 
	$("#inputLembaga").change(function(){ 
		var lembaga = $("#inputLembaga").val(); 
		$.ajax({ 
			type	: 'POST', 
			url	: "<?php echo base_url(); ?>admin/referensi_kelompok", 
			data	: "lembaga="+lembaga, 
			cache	: false,
			success	: function(data){ 
				$("#kelompok_calonsiswa").html(data); 
			} 
		}); 
	}).change();


	$("#inputIdProses").change(function(){ 
		var idproses = $("#inputIdProses").val(); 
		$.ajax({ 
			type	: 'POST', 
			url	: "<?php echo base_url(); ?>admin/referensi_kelompok", 
			data	: "idproses="+idproses, 
			cache	: false,
			success	: function(data){ 
				$("proses_penerimaan").html(data); 
		}); 
	});

}); 
</script>
<!-- Footer -->
<?php require_once('layout/footer.php'); ?>
<!-- /footer -->