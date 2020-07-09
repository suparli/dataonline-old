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
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Index Ultraviolet</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" id="ultraviolet"></div>
						</div>
						<div class="col-auto">
							<i id="ultraviolet1" class="far fa-sun fa-2x faa-spin animated"></i>
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
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">ET</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" id="et"></div>
						</div>
						<div class="col-auto">
							<i id="et1" class="fas fa-angle-double-up fa-2x faa-float animated"></i>
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
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Suhu Tanah 1</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" id="suhutanah1"></div>
						</div>
						<div class="col-auto">
							<i id="suhutanah11" class="fas fa-temperature-high fa-2x  faa-pulse animated"></i>
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
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Suhu Tanah 2</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" id="suhutanah2"></div>
						</div>
						<div class="col-auto">
							<i id="suhutanah12" class="fas fa-temperature-high fa-2x  faa-pulse animated"></i>
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
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Suhu Tanah 3</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" id="suhutanah3"></div>
						</div>
						<div class="col-auto">
							<i id="suhutanah13" class="fas fa-temperature-high fa-2x  faa-pulse animated"></i>
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
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Suhu Tanah 4</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" id="suhutanah4"></div>
						</div>
						<div class="col-auto">
							<i id="suhutanah14" class="fas fa-temperature-high fa-2x  faa-pulse animated"></i>
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
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Soil Mosture 1</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" id="soilmosture1"></div>

						</div>
						<div class="col-auto">
							<i id="soilmosture12" class="fas fa-water fa-2x  faa-pulse animated"></i>

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
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Soil Mosture 2</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" id="soilmosture2"></div>

						</div>
						<div class="col-auto">
							<i id="soilmosture12" class="fas fa-water fa-2x  faa-pulse animated"></i>

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
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Soil Mosture 3</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" id="soilmosture3"></div>

						</div>
						<div class="col-auto">
							<i id="soilmosture13" class="fas fa-water fa-2x  faa-pulse animated"></i>

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
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Soil Mosture 4</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" id="soilmosture4"></div>

						</div>
						<div class="col-auto">
							<i id="soilmosture14" class="fas fa-water fa-2x  faa-pulse animated"></i>

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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">LeafWetnes 1</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" id="leafwetnes1"></div>
						</div>
						<div class="col-auto">
							<i id="leafwetnes11" class="fas fa-leaf fa-2x  faa-pulse animated"></i>
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
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">LeafWetnes 2</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800" id="leafwetnes2"></div>
						</div>
						<div class="col-auto">
							<i id="leafwetnes12" class="fas fa-leaf fa-2x  faa-pulse animated"></i>
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
<script src="<?= base_url(); ?>/assets/js/dashboard_aaws_davis.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/leaflet/leaflet.js"></script>
<script src="<?= base_url(); ?>/assets/js/map_aaws_davis.js"></script>
<?php $this->load->view('templates/end_footer'); ?>
