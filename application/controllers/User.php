<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller

{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Admin_model', 'admin');
	}


	public function index()
	{
		$data['user']		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title']		= 'My Profile';
		$data['namadevice'] = $this->admin->getInformation();
		$this->load->view('user/index', $data);
	}

	public function edit()
	{
		$data['user']	= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title']	= 'Edit Profile';

		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('user/edit', $data);
		} else {
			$name			= $this->input->post('name');
			$email			= $this->input->post('email');
			$upload_image	= $_FILES['image']['name'];
			if ($upload_image) {
				$config['upload_path']	 = './assets/img/profile/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']   	 = '2048';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image != 'default.png') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('user');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Profile Updated</div>');
			redirect('user');
		}
	}
}
