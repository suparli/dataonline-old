<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
				</div>
				<div class="card-body">
					<?= $this->session->flashdata('message'); ?>
					<form class="user" method="POST" action="<?= base_url('member/save') ?>">
						<div class="form-group">
							<input type="text" class="form-control " id="name" name="name" placeholder="Full Name" value="<?= set_value('name'); ?>">
							<?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
						</div>
						<div class="form-group">
							<input type="text" class="form-control " id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
							<?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
						</div>
						<div class="form-group">
							<select id="id" name="id" class="form-control">
								<option>Select Rule</option>
								<?php $i = 1; ?>
								<?php foreach ($selectmember as $sm) : ?>

									<option value="<?= $sm['id'] ?>"><?= $sm['rule'] ?></option>
									<?php $i++; ?>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group row">
							<div class="col-sm-6 mb-3 mb-sm-0">
								<input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
								<?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
							</div>
							<div class="col-sm-6">
								<input type="password" class="form-control " id="password2" name="password2" placeholder="Repeat Password">
							</div>
						</div>
						<button class="btn btn-primary btn-block">
							Register Account
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('templates/footer'); ?>
<?php $this->load->view('templates/end_footer'); ?>
