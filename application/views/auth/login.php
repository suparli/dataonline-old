<?php $this->load->view('templates/auth_header'); ?>

<body class="bg-gradient-primary">
	<div class="container">
		<div class="row justify-content-center col-lg 4">
			<div class="col-lg-5">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<div class="row">
							<div class="col-lg">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 mb-4">Weather, Agroclimate & Water Resources Monitoring</h1>
									</div>
									<?= $this->session->flashdata('message'); ?>
									<form class="user" method="POST" action="<?= base_url('auth') ?>">
										<div class="form-group">
											<input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('name'); ?>">
											<?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
											<?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
										</div>
										<div class="form-group">
											<div class="custom-control custom-checkbox small">
												<input type="checkbox" class="custom-control-input" id="customCheck">
												<label class="custom-control-label" for="customCheck">Remember Me</label>
											</div>
										</div>
										<button class="btn btn-primary btn-user btn-block">
											Login
										</button>
									</form>
									<hr>
									<div class="text-center">
										<a class="small"> </a>
										<a class="small" onclick="return confirm('Username : guest@dataonline.co.id \nPassword : guest123');" href="#">Login Sebagai Pengunjung ?</a>
									</div>
									<hr>
									<div class="text-center">
										<a class="small">Copyright © Meteo Nusantara Instrumen 2020</a>
										<a class="small" href="http://www.meteonusantara.com">www.meteonusantara.com</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('templates/auth_footer'); ?>
