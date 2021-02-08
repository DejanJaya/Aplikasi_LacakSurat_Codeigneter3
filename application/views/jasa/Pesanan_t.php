<div class="container-fluid">
	<h4>Surat Masuk</h4>
	<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>No. AWB</th>
					<th>Consignee</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($tampil as $value) { ?>
					<tr>
						<td><?php echo $value->no_awb; ?></td>
						<td><?php echo $value->consignee; ?></td>
						<td><?php
							if ($value->foto_lokasi != null && $value->foto_penerima != null && $value->status != 'Complete') {
								echo "Menunggu Konfirmasi Admin";
							} else {
								echo $value->status;
							} ?></td>

						<td>
							<div class="" datahover="test" title="<?= ($value->tgl_deadline <= date("Y-m-d h:i:s") ? 'Sudah Deadline, Silahkan Hubungin Admin'   : null) ?>">
								<a href="<?= base_url(); ?>jasa/kurir/update/<?= $value->id_surat; ?>" class="btn btn-primary btn-sm <?= ($value->tgl_deadline <= date("Y-m-d h:i:s") ? null : null) ?> ">Update</a>
							</div>
						</td>

					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

</div>