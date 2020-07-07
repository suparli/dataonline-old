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
							<form method="POST" action=" <?= base_url('agroklimat/tabel'); ?>">
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
				<table class="table table-bordered " id="data_aaws" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal&nbsp;&nbsp;&nbsp;&nbsp;</th>
							<th>Jam</th>
							<th>Radiasi (Wat/m<sup>2</sup>)</th>
							<th>Suhu&nbsp;Udara (&deg;C)</th>
							<th>Tekanan&nbsp;Udara (mbar)</th>
							<th>Kecepatan&nbsp;Angin (&deg;)</th>
							<th>Arah&nbsp;Angin (m/s)</th>
							<th>Curah&nbsp;Hujan (mm)</th>
							<th>Kelembaban (%)</th>
							<th>Soil Mosture</th>
							<th>Suhu Tanah</th>
							<th>Leafwetnes</th>
							<th>Aux 1</th>
							<th>Aux 2</th>
							<th>Aux 3</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($dataaws as $da) : ?>
							<tr>
								<th scope="row"><?= $i; ?></th>
								<td><?= $da['tanggal'] ?></td>
								<td><?= $da['time'] ?></td>
								<td><?= $da['radiasi'] ?></td>
								<td><?= $da['suhu'] ?></td>
								<td><?= $da['tekanan_udara'] ?></td>
								<td><?= $da['kecepatan_angin'] ?></td>
								<td><?= $da['arah_angin'] ?></td>
								<td><?= $da['curah_hujan'] ?></td>
								<td><?= $da['kelembaban'] ?></td>
								<td><?= $da['soil_mosture'] ?></td>
								<td><?= $da['suhu_tanah'] ?></td>
								<td><?= $da['leafwetnes'] ?></td>
								<td><?= $da['aux1'] ?></td>
								<td><?= $da['aux2'] ?></td>
								<td><?= $da['aux3'] ?></td>
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
<script src="<?= base_url(); ?>assets/js/table_aaws.js"></script>
<?php $this->load->view('templates/end_footer'); ?>
