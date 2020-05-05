<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>




<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800" id="pemilik"></h1>
	<h6 class="mb-3 card h-100 " id="time"></h6>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Suhu</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" id="suhu"></div>
						</div>
						<div class="col-auto">
							<i id="suhu1" class="fas fa-temperature-high faa-pulse animated fa-2x "></i>
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
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kelembaban</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" id="kelembaban"></div>
						</div>
						<div class="col-auto">
							<i id="kelembaban1" class="fas fa-tint fa-2x faa-pulse animated  "></i>

						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Curah Hujan</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="curahhujan"></div>
								</div>

							</div>
						</div>
						<div class="col-auto">
							<i id="curahhujan1"></i>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Radiasi</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" id="radiasi"></div>
						</div>
						<div class="col-auto">
							<i id="radiasi1" class="fas fa-sun fa-2x faa-spin animated"></i>
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
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tekanan Udara</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" id="tekananudara"></div>
						</div>
						<div class="col-auto">

							<i id="tekananudara1" class="fas fa-wind fa-2x faa-pulse animated  "></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kecepatan Angin</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="kecepatanangin"></div>
								</div>

							</div>
						</div>
						<div class="col-auto">
							<i id="kecepatanangin1" class="fas fa-smog fa-2x "></i>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Arah Angin</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" id="arahangin"></div>
						</div>
						<div class="col-auto">
							<i id="arahangin1" class="far fa-compass fa-2x "></i>
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
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Suhu Tanah</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" id="suhutanah"></div>
						</div>
						<div class="col-auto">
							<i id="suhutanah1" class="fas fa-temperature-high fa-2x  faa-pulse animated"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kadar Air Tanah</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" id="kadarairtanah"></div>

						</div>
						<div class="col-auto">
							<i id="kadarair1" class="fas fa-water fa-2x  faa-pulse animated"></i>

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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Leaf Wetnes</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" id="leafwetnes"></div>
						</div>
						<div class="col-auto">
							<i id="leafwetnes1" class="fas fa-leaf fa-2x  faa-pulse animated"></i>
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
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Aux 1</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" id="aux1"></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-plug fa-2x   faa-pulse animated"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Aux 2 </div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="aux2"></div>
								</div>

							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-plug fa-2x  faa-pulse animated"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>




	<div class="row">
		<div class=" col-xl-6 py-2 ">
			<div id="map" class="card"></div>
		</div>
		<div class="col-xl-6 py-2">
			<?php if (!empty($map)) {
				foreach ($map as $maps) : ?>
					<img src="<?= base_url('assets/img/device/') . $maps['image']; ?>" class="card-img" style="height:400px">
			<?php endforeach;
			} ?>
		</div>
	</div>

</div>

<?php $this->load->view('templates/footer'); ?>
<script>
	let base_url = '<?= base_url() ?>';
</script>
<script src="<?= base_url(); ?>/assets/js/moment.js"></script>
<script src="<?= base_url(); ?>/assets/js/dashboard_aaws.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/leaflet/leaflet.js"></script>
<script src="<?= base_url(); ?>/assets/js/map_aaws.js"></script>
<?php $this->load->view('templates/end_footer'); ?>
