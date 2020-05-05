<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>

<div class="container-fluid">
	<div class="row">

		<div class="col-lg-6 ">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Access Device</h6>
				</div>
				<div class="card-body">
					<div>
						<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
						<?= $this->session->flashdata('message'); ?>
						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">No</th>
									<th scope="col">Rule</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($rule as $r) : ?>
									<tr>
										<th scope="row"><?= $i; ?></th>
										<td><?= $r['rule'] ?></td>
										<td>
											<a class="badge badge-warning" href="<?= base_url('admin/ruleaccess/') . $r['id'] ?> ">access</a>
											<a class="badge badge-success" href="">edit</a>
											<a class="badge badge-danger" href="<?= base_url() ?>admin/deleterule/<?= $r['id'] ?> " onclick="return confirm('Realy ?');">delete</a>
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

		<div class="col-lg-6">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Access User</h6>
				</div>
				<div class="card-body">
					<div>
						<?= $this->session->flashdata('messageuser'); ?>

						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">No</th>
									<th scope="col">Nama</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($ruleuser as $ru) : ?>
									<tr>
										<th scope="row"><?= $i; ?></th>
										<td><?= $ru['name'] ?></td>
										<td>
											<a class="badge badge-warning" href="<?= base_url('admin/ruleuseraccess/') . $ru['id_user'] ?>">access</a>
											<a class="badge badge-success" href="">edit</a>
											<a class="badge badge-danger" href="<?= base_url() ?>admin/deleteuserrule/<?= $ru['id_user'] ?>" onclick="return confirm('Realy ?');">delete</a>
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
</div>

<?php $this->load->view('templates/footer'); ?>
<?php $this->load->view('templates/end_footer'); ?>
