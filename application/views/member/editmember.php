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
					<form class="user" method="POST" action="<?= base_url('member/update') ?>">
						<div class="form-group">
							<input type="hidden" value="<?php echo $data_member->id_user ?>" name="id">
							<input type="text" class="form-control " id="iddevice" name="iddevice" value="<?php echo $data_member->id_user ?>">
						</div>
						<div class="form-group">
							<input type="text" class="form-control " id="name" name="name" placeholder="Full Name" value="<?= $data_member->name; ?>">
							<?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
						</div>
						<div class="form-group">
							<input type="text" class="form-control " id="email" name="email" placeholder="Email Address" value="<?= $data_member->email; ?>">
							<?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
						</div>
						<div class="form-group row">
							<div class="col-sm-6 mb-3 mb-sm-0">
								<input type="password" class="form-control" id="password1" name="password1" placeholder="New Password">
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
