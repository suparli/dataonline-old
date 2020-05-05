<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller

{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Member_model', 'member');
	}

	public function index()
	{
		$data	 	  = array(
			'title' 	 => 'Management Member',
			'namamember' => $this->member->getData(),
		);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('member/index', $data);
	}

	public function add()
	{
		$data = array(
			'title'     => 'Register Member'
		);
		$data['selectmember'] = $this->member->selectMember();
		$data['user']		  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('member/addmember', $data);
	}

	public function save()
	{

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',  ['is_unique' => 'Email sudah terdaftar!']);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', ['matches' => 'Password tidak sama!', 'min_length' => 'Password terlalu pendek!']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$this->add();
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.png',
				// 'password' => htmlspecialchars($this->input->post('password', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'rule_id' => htmlspecialchars($this->input->post('id', true)),
				'is_active' => 1,
				'date_created' => time()

			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Register Success</div>');
			redirect('member');
		}
	}


	public function edit($id)
	{
		$id = $this->uri->segment(3);
		$data = array(

			'title'     => 'Edit Member',
			'data_member' => $this->member->edit($id)
		);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('member/editmember', $data);
	}

	public function update()
	{

		$id['id_user'] = $this->input->post("id");
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', ['matches' => 'Password tidak sama!', 'min_length' => 'Password terlalu pendek!']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"> Gagal .
            </div>');
			redirect('member');
		} else {
			$data = array(

				'name'           => $this->input->post("name"),
				'email'          => $this->input->post("email"),
				'password'       => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			);

			$this->member->update($data, $id);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                    </div>');
			redirect('member');
		}
	}

	public function delete($id)
	{
		$id['id_user'] = $this->uri->segment(3);
		$data['user']  = $this->db->get_where('user', ['id_user' => $id])->row_array();
		$this->member->delete($id);
		$old_image = $data['user']['image'];
		unlink(FCPATH . 'assets/img/profile/' . $old_image);
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"> Success! data berhasil didelete didatabase.
                                                </div>');
		// redirect
		redirect('member');
	}
}
