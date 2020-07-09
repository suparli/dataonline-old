<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Device extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Device_model', 'device');
	}

	public function index()
	{

		$data = array(
			'title'		 => 'Management Devices',
			'namadevice' => $this->device->getData(),
			'user'		 => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
		);
		$this->load->view('device/index', $data);
	}

	public function add()
	{
		$data = array(
			'title'     => 'Add Device',
			'user'		 => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
		);
		$this->load->view('device/adddevice', $data);
	}

	public function save()
	{
		$this->form_validation->set_rules('iddevice', 'Iddevice', 'required');
		$this->form_validation->set_rules('namadevice', 'Namadevice', 'required');
		$this->form_validation->set_rules('longitude', 'Longitude', 'required');
		$this->form_validation->set_rules('latitude', 'Latitude', 'required');
		$this->form_validation->set_rules('ketinggian', 'Ketinggian', 'required');
		$this->form_validation->set_rules('pemilik', 'Pemilik', 'required');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required');

		if ($this->form_validation->run() == false) {
			$this->add();
		} else {
			// UPLOAD GAMBAR
			$this->load->library('upload');
			$config['upload_path'] = './assets/img/device/'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size']     = '2000';

			$this->upload->initialize($config);
			if (!empty($_FILES['image']['name'])) {

				if ($this->upload->do_upload('image')) {
					$gbr = $this->upload->data();
					$config['image_library'] = 'gd2';
					$config['source_image'] = './assets/img/device/' . $gbr['file_name'];
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = FALSE;
					$config['quality'] = '50%';
					$config['width'] = 600;
					$config['height'] = 400;
					$config['new_image'] = './assets/img/device/' . $gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$gambar = $gbr['file_name'];
					$this->db->set('image', $gambar);
				}
			}

			$data = array(
				'id_device'           => $this->input->post("iddevice"),
				'nama_device'         => $this->input->post("namadevice"),
				'longitude'           => $this->input->post("longitude"),
				'latitude'            => $this->input->post("latitude"),
				'ketinggian'          => $this->input->post("ketinggian"),
				'pemilik'             => $this->input->post("pemilik"),
				'lokasi'              => $this->input->post("lokasi"),
				'status'              => $this->input->post("status")
			);

			$this->device->saveData($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan .
                                            </div>');
			//redirect
			redirect('device/');
		}
	}


	public function edit($id)
	{
		$id = $this->uri->segment(3);
		$data = array(
			'title'  	   	=> 'Edit Device',
			'data_device' 	=> $this->device->edit($id)
		);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('device/editdevice', $data);
		
	}

	public function update()
	{
		
		$data['data_device'] = $this->db->get_where('data_device', ['id' => $this->input->post('id')])->row_array();
		$id['id']			 = $this->input->post("id");
		// Cek Jika Ada Gambar
		$upload_image = $_FILES['image']['name'];
		if ($upload_image) {
			$config['upload_path'] = './assets/img/device/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '2048';
			$this->upload->initialize($config);
			if ($this->upload->do_upload('image')) {
				$old_image = $data['data_device']['image'];				
				if ($old_image != 'default.jpg') {
					unlink(FCPATH .'assets/img/device/' . $old_image);
				}
				$new_image = $this->upload->data('file_name');
				$this->db->set('image', $new_image);
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate .
                                                </div>');
			} else {
				$eror =  $this->upload->display_errors();
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"> Gagal! data gagal diupdate . '.$eror.'
                                                </div>');
			}
		}

		$data = array(
			'id_device'           => $this->input->post("iddevice"),
			'nama_device'         => $this->input->post("namadevice"),
			'longitude'           => $this->input->post("longitude"),
			'latitude'            => $this->input->post("latitude"),
			'ketinggian'          => $this->input->post("ketinggian"),
			'pemilik'             => $this->input->post("pemilik"),
			'lokasi'              => $this->input->post("lokasi"),
			'status'              => $this->input->post("status")
		);

		$this->device->update($data, $id);		
		redirect('device');
	}

	public function delete($iddevice)
	{
		$iddevice			 = $this->uri->segment(3);
		$data['data_device'] = $this->db->get_where('data_device', ['id_device' => $iddevice])->row_array();
		$this->device->delete($iddevice);
		$old_image 			 = $data['data_device']['image'];
		unlink(FCPATH . 'assets/img/device/' . $old_image);
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"> Success! data berhasil didelete .
                                                </div>');
		redirect('device/');
	}




	public function status()
	{
		$data = array(
			'title'		 => 'Status Devices',
			'namadevice' => $this->device->getData()
		);
		$data['status'] = $this->device->status();
		$data['user'] 	= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('device/status', $data);
	}
}
