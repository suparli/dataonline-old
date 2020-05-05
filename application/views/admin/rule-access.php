<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6">

			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Role : <?= $rule['rule']; ?></h6>
				</div>
				<div class="card-body">
					<div>
						<?= $this->session->flashdata('message'); ?>
						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">No</th>
									<th scope="col">Menu</th>
									<th scope="col">Access</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($menu as $m) : ?>
									<tr>
										<th scope="row"><?= $i; ?></th>
										<td><?= $m['menu'] ?></td>
										<td>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" <?= check_access($rule['id'], $m['id']); ?> data-rule="<?= $rule['id']; ?>" data-menu="<?= $m['id']; ?>">
											</div>
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
<script>
	var base_url = '<?= base_url() ?>';
</script>
<script src="<?= base_url(); ?>assets/js/check_rule.js"></script>
<?php $this->load->view('templates/end_footer'); ?>
