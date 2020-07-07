<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>



<div class="col-lg-12 soilmosture" id="soilmosture">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Soil Mosture</h6>
		</div>
		<div class="card-body">
			<div class="chart-area">
				<canvas id="chartSoil"></canvas>
			</div>
			<hr>
		</div>
	</div>

</div>

<div class="col-lg-12 suhutanah" id="suhutanah">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Suhu Tanah</h6>
		</div>
		<div class="card-body">
			<div class="chart-area">
				<canvas id="chartSuhuTanah"></canvas>
			</div>
			<hr>
		</div>
	</div>

</div>

<div class="col-lg-12 leafwetnes" id="leafwetnes">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Leafwetnes</h6>
		</div>
		<div class="card-body">
			<div class="chart-area">
				<canvas id="chartLeafwetnes"></canvas>
			</div>
			<hr>
		</div>
	</div>
</div>

<div class="col-lg-12 radiasi" id="et">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">ET</h6>
		</div>
		<div class="card-body">
			<div class="chart-area">
				<canvas id="etChart"></canvas>
			</div>
			<hr>
		</div>
	</div>
</div>

<div class="col-lg-12 radiasi" id="ultraviolet">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Ultraviolet</h6>
		</div>
		<div class="card-body">
			<div class="chart-area">
				<canvas id="ultravioletChart"></canvas>
			</div>
			<hr>
		</div>
	</div>
</div>

<div class="col-lg-12 suhu" id="suhu">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Suhu & Kelembaban Udara</h6>
		</div>
		<div class="card-body">
			<div class="chart-area">
				<canvas id="chartSuhu"></canvas>
			</div>
			<hr>
		</div>
	</div>

</div>

<div class="col-lg-12 hujan" id="hujan">
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

<div class="col-lg-12 radiasi" id="radiasi">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Radiasi</h6>
		</div>
		<div class="card-body">
			<div class="chart-area">
				<canvas id="radiasiChart"></canvas>
			</div>
			<hr>
		</div>
	</div>
</div>

<div class="col-lg-12 tekanan" id="tekanan">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Tekanan Udara</h6>
		</div>
		<div class="card-body">
			<div class="chart-area">
				<canvas id="tekananChart"></canvas>
			</div>
			<hr>
		</div>
	</div>

</div>

<div class="col-lg-12 kecepatanangin" id="kecepatanangin">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Kecepatan Angin</h6>
		</div>
		<div class="card-body">
			<div class="chart-area">
				<canvas id="kecepatananginChart"></canvas>
			</div>
			<hr>
		</div>
	</div>
</div>

<div class="col-lg-12 arahangin" id="arahangin">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Arah Angin</h6>
		</div>
		<div class="card-body">
			<div class="chart-bar">
				<canvas id="arahanginChart"></canvas>
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
<script src="<?= base_url(); ?>assets/js/chart_aaws_davis.js"></script>
<?php $this->load->view('templates/end_footer'); ?>
