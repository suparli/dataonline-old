<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>
<?php $userrule = $user['rule_id']; ?>


<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('message') ?>
		</div>
	</div>

	<div class="card mb-3" style="max-width: 540px;">
		<div class="row no-gutters">
			<div class="col-md-4">
				<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
			</div>
			<div class="col-md-8">
				<div class="card-body">
					<h5 class="card-title"><?= $user['name']; ?></h5>
					<p class="card-text"><?= $user['email']; ?></p>
					<p class="card-text">
						<small class="text-muted">Member Sejak
							<?= date('d F Y', $user['date_created']); ?></small>
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="card ">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Infomasi Device</h6>
		</div>
		<div class="card-body">
			<table class="table table-responsive table-hover">
				<thead>
					<tr>
						<th scope="col">No</th>
						<?php
						if ($userrule == 1) {
							echo  "<th >Kode Aws</th>";
						} ?>
						<th scope="col">Nama Device</th>
						<th scope="col">Longitude</th>
						<th scope="col">Latitude</th>
						<th scope="col">Ketinggian</th>
						<th scope="col">Pemilik</th>
						<th scope="col">Lokasi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($namadevice as $na) : ?>
						<tr>
							<td scope="row"><?= $i; ?></td>
							<?php
							if ($userrule == 1) {
								echo  "<td>" . $na['id_device'] . "</td>";
							} ?>
							<td> <?= $na['nama_device'] ?></td>
							<td> <?= $na['longitude'] ?></td>
							<td> <?= $na['latitude'] ?></td>
							<td> <?= $na['ketinggian'] ?></td>
							<td> <?= $na['pemilik'] ?></td>
							<td> <?= $na['lokasi'] ?></td>
							<?php $i++; ?>
						<?php endforeach; ?>
				</tbody>
			</table>
			<hr>
		</div>
	</div>
</div>

<?php $this->load->view('templates/footer'); ?>
<?php $this->load->view('templates/end_footer'); ?>
