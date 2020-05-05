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
<script src="<?= base_url(); ?>assets/js/table_spas.js"></script>
<?php $this->load->view('templates/end_footer'); ?>
