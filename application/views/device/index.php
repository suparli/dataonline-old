<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>

<div class="container-fluid">
	<div class="col">

		<div class="card ">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">List of Device</h6>
			</div>
			<div class="card-body">
				<a class="btn btn-primary mb-3" href="<?= base_url('device/add') ?>">Add Device</a>
				<?= $this->session->flashdata('message'); ?>
				<hr>
				<div class="table-responsive">
					<table id="table" class="table table-hover">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Kode Device</th>
								<th scope="col">Nama Device</th>
								<th scope="col">Longitude</th>
								<th scope="col">Latitude</th>
								<th scope="col">Pemilik</th>
								<th scope="col">Image</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($namadevice as $na) : ?>
								<tr>
									<td scope="row"><?= $i; ?></td>
									<td> <?= $na['id_device'] ?></td>
									<td> <?= $na['nama_device'] ?></td>
									<td> <?= $na['longitude'] ?></td>
									<td> <?= $na['latitude'] ?></td>
									<td> <?= $na['pemilik'] ?></td>
									<td><img src='<?= base_url() ?>assets/img/device/<?= $na['image'] ?>'' height="42" width="42"></td>
                                    <td>
                                        
                                        <a class="badge badge-success" href=" <?= base_url() ?>device/edit/<?= $na['id'] ?>">edit</a>
                                        <a
                                            class="badge badge-danger"
                                            href=" <?= base_url() ?>device/delete/<?= $na['id_device'] ?>"
                                            onclick="return confirm(' Realy ?');">delete</a>
									</td>
									<?php $i++; ?>
								<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<hr>
			</div>
		</div>
	</div>
</div>


<?php $this->load->view('templates/footer'); ?>
<?php $this->load->view('templates/end_footer'); ?>
