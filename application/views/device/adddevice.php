<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/sidebar'); ?>
<?php $this->load->view('templates/topbar'); ?>


<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6">
			<div class="card shadow">
				<div class="card-header">
					<h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
				</div>

				<div class="card-body">
					<?= $this->session->flashdata('message'); ?>
					<?= form_open_multipart('device/save'); ?>
					<div class="form-group">
						<input type="text" class="form-control " id="iddevice" name="iddevice" placeholder="Contoh 101" value="<?= set_value('iddevice'); ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control " id="namadevice" name="namadevice" placeholder="Nama Device" value="<?= set_value('namadevice'); ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control " id="longitude" name="longitude" placeholder="Longitude" value="<?= set_value('longitude'); ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control " id="latitude" name="latitude" placeholder="Latitude" value="<?= set_value('latitude'); ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control " id="ketinggian" name="ketinggian" placeholder="Ketinggian" value="<?= set_value('ketinggian'); ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control " id="pemilik" name="pemilik" placeholder="Pemilik" value="<?= set_value('pemilik'); ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control " id="lokasi" name="lokasi" placeholder="Lokasi" value="<?= set_value('lokasi'); ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control " id="status" name="status" placeholder="Keterangan" value="<?= set_value('status'); ?>">
						<div class="form-group row">
							<div class="col-sm-2">Picture</div>
							<div class="col-sm-10">
								<div class="row">
									<div class="col-sm-9">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="image" name="image">
											<label class="custom-file-label" for="image">Choose file</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary btn-block">
							Add Device
						</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php $this->load->view('templates/footer'); ?>
<?php $this->load->view('templates/end_footer'); ?>
