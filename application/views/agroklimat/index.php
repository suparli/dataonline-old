<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>

<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class=" card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
		</div>


		<div class="card-body">
			<!-- <div class="row input-date">
				<div class="form-group col">
					<input type="text" class="form-control date-range-filter" id="min" name="min" placeholder="Dari Tanggal" autocomplete="off">
				</div>
				<div class="form-group col">
					<input type="text" class="form-control date-range-filter" id="max" name="max" placeholder="Sampai Tanggal" autocomplete="off">
				</div>
				<div class="form-group col">
					<button class="btn btn-info" type="button" id="filter">Filter</button>
					<button class="btn btn-danger" type="button" id="refresh">Refresh</button>
				</div>
			</div> -->
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
<script src="<?= base_url(); ?>assets/js/table_aaws.js"></script>
<?php $this->load->view('templates/end_footer'); ?>
