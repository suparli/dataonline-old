<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>

<div class="container-fluid">
	<div class="col">
		<div class="card ">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Status Devices</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="table" class="table table-hover">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nama Device</th>
								<th scope="col">Data Terakhir</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($status as $sa) : ?>
								<tr>
									<td scope="row"><?= $i; ?></td>
									<td> <?= $sa['nama_device'] ?></td>
									<td> <?= $sa['date'] ?></td>
									<?php $i++; ?>
								<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<hr>
			</div>
		</div>
	</div>
</div>


<?php $this->load->view('templates/footer'); ?>
<?php $this->load->view('templates/end_footer'); ?>
