<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>



<div class="col-lg-12 suhu" id="suhu">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Curah Hujan</h6>
		</div>
		<div class="card-body">
			<div class="chart-bar">
				<canvas id="chartHujan"></canvas>
			</div>
			<hr>
		</div>
	</div>

</div>

<div class="col-lg-12 hujan" id="hujan">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tinggi Muka Air</h6>
		</div>
		<div class="card-body">
			<div class="chart-area">
				<canvas id="chartTinggiMukaAir"></canvas>
			</div>
			<hr>
		</div>
	</div>
</div>

<div class="col-lg-12 radiasi" id="radiasi">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Kecepatan Air</h6>
		</div>
		<div class="card-body">
			<div class="chart-area">
				<canvas id="chartKecepatanAir"></canvas>
			</div>
			<hr>
		</div>
	</div>
</div>


<?php $this->load->view('templates/footer'); ?>
<script>
	let base_url = '<?= base_url() ?>';
</script>
<script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url(); ?>assets/js/chart_spas.js"></script>
<?php $this->load->view('templates/end_footer'); ?>
