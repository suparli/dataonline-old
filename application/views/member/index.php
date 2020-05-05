<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>

<div class="container-fluid">
	<div class="col">
		<div class="card ">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">List Account</h6>
			</div>
			<div class="card-body">
				<a class="btn btn-primary mb-3" href="<?= base_url('member/add') ?>">Register Member</a>
				<?= $this->session->flashdata('message'); ?>
				<hr>
				<div class="table-responsive">
					<table id="table" class="table table-hover">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nama</th>
								<th scope="col">Email</th>
								<th scope="col">Image</th>
								<th scope="col">Action</th>
							</tr>
						</thead>

						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($namamember as $nm) : ?>
								<tr>
									<td scope="row"><?= $i; ?></td>
									<td> <?= $nm['name'] ?></td>
									<td> <?= $nm['email'] ?></td>
									<td><img src='<?= base_url() ?>assets/img/profile/<?= $nm['image'] ?>'' height="42" width="42"></td>
                                    <td>                                       
                                        <a class="badge badge-success" href="<?= base_url() ?>member/edit/<?= $nm['id_user'] ?>">edit</a>
                                        <a
                                            class="badge badge-danger"
                                            href=" <?= base_url() ?>member/delete/<?= $nm['id_user'] ?>"
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
