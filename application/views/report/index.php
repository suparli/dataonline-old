<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>

<div class="container-fluid">

	<div class="card shadow mb-3" style="max-width: 540px;">
		<div class=" card-header">
			<h6 class="m-0 font-weight-bold text-primary">Filter</h6>
		</div>
		<div class="row no-gutters">
			<div class="col-md-8">
				<div class="card-body">
				</div>
			</div>
		</div>
	</div>

	<div class="card shadow mb-4">
		<div class=" card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">View</h6>
		</div>
		<div class="card-body">
			<hr>
			<div class="table-responsive">
				<table class="table table-bordered " id="data_aws" cellspacing="0">
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
<?php $this->load->view('templates/end_footer'); ?>
