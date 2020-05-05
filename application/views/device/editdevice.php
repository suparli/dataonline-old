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
					<?php echo form_open_multipart('device/update'); ?>
					<div class="form-group">
						<input type="hidden" value="<?php echo $data_device->id ?>" name="id">
						<input type="text" class="form-control " id="iddevice" name="iddevice" value="<?php echo $data_device->id_device ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control " id="namadevice" name="namadevice" value="<?php echo $data_device->nama_device ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control " id="longitude" name="longitude" value="<?php echo $data_device->longitude ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control " id="latitude" name="latitude" value="<?php echo $data_device->latitude ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control " id="ketinggian" name="ketinggian" value="<?php echo $data_device->ketinggian ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control " id="pemilik" name="pemilik" value="<?php echo $data_device->pemilik ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control " id="lokasi" name="lokasi" value="<?php echo $data_device->lokasi ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control " id="status" name="status" value="<?php echo $data_device->status ?>">
						<div class="form-group row">
							<div class="col-sm-2">Picture</div>
							<div class="col-sm-10">
								<div class="row">
									<div class="col-sm-9">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="image" name="image" value="<?php echo $data_device->image ?>">
											<label class="custom-file-label" for="image">Choose file</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary btn-block">
							Edit Device
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
