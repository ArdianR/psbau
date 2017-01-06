<div class="text-right">
			                		<a type="button" class="btn btn-primary"><i class="icon-plus-circle2"></i> Tambah Kelompok</a>
									<a type="button" class="btn btn-warning btn-xs"><i class="icon-printer2"></i> Print</a>
									</div>
									<table class="table table-bodered table striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Kelompok</th>
												<th>Kapasitas</th>
												<th>Keterangan</th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$no='1';
												foreach($query->result() as $row) { ?>
											<tr>
												<td><?php echo $no; ?></td>
												<td><?php echo $row->kelompok; ?></td>
												<td><?php echo $row->kapasitas; ?></td>
												<td><?php echo $row->keterangan; ?></td>
												<td>
												<a type="button" class="btn btn-warning btn-xs"><i class="icon-pencil"></i></a>
												<a type="button" class="btn btn-danger btn-xs"><i class="icon-trash"></i></a>
												</td>
											</tr>
											<?php $no++; } ?>
										</tbody>

									</table>