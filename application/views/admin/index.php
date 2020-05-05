<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>


<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
</div>
<div class="container-fluid">

	<div class="row">

		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Device</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->db->count_all_results('data_device'); ?></div>
						</div>
						<div class="col-auto">
							<i class="far fa-chart-bar fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total User</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->db->count_all_results('user'); ?></div>
						</div>
						<div class="col-auto">
							<i class="far fa-chart-bar fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Visitor</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php foreach ($visitor as $v) {
																					echo $v['hitung'];
																				} ?></div>
						</div>
						<div class="col-auto">
							<i class="far fa-chart-bar fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class=" col-xl">
			<div id="map" class="card"></div>
		</div>

	</div>

</div>


<?php $this->load->view('templates/footer'); ?>
<script>
	var base_url = '<?= base_url() ?>';
</script>
<script src="<?= base_url(); ?>/assets/vendor/leaflet/leaflet.js"></script>
<script src="<?= base_url(); ?>/assets/js/map_dashboard.js"></script>
<?php $this->load->view('templates/end_footer'); ?>
