<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>

<div class="container-fluid">

	<div class="row">
		<div class="col">
			<div class="card shadow mb-3">
				<div class=" card-header">
					<h6 class="m-0 font-weight-bold text-primary">Filter By Date</h6>
				</div>
				<div class="row ">
					<div class="col">
						<div class="card-body">
							<form method="POST" action=" <?= base_url('spas/tabel'); ?>">
								<div class="row">
									<div class="col-8">
										<input class="form-control" id="date_filter" name="date_filter" placeholder="Filter Here" autocomplete="off">
									</div>
									<div class="col-2">
										<button type="submit" id="submit" name="submit" class="btn btn-primary">Filter</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col">
		</div>
	</div>


	<div class="card shadow mb-4">
		<div class=" card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered " id="data_spas" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal&nbsp;&nbsp;&nbsp;&nbsp;</th>
							<th>Jam</th>
							<th>Curah&nbsp;Hujan (mm)</th>
							<th>Suhu&nbsp;Muka&nbsp;Air (cm)</th>
							<th>Kecepatan&nbsp;Air (m/s)</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($dataspas as $ds) : ?>
							<tr>
								<th scope="row"><?= $i; ?></th>
								<td><?= $ds['tanggal'] ?></td>
								<td><?= $ds['time'] ?></td>
								<td><?= $ds['curah_hujan'] ?></td>
								<td><?= $ds['tinggi_muka_air'] ?></td>
								<td><?= $ds['kecepatan_air'] ?></td>
								<?php $i++; ?>
							<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('templates/footer'); ?>
<script>
	let base_url = '<?= base_url() ?>';
</script>
<script src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/buttons.flash.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/js/table_spas.js"></script>
<?php $this->load->view('templates/end_footer'); ?>
