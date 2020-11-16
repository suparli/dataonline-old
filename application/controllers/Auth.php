<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Admin_model', 'admin');
	}

	public function index()
	{
		
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$cookie = get_cookie('dataonline');	

		if ($this->session->userdata('logged')) {
            if ($this->session->userdata('rule_id') == 1) {
				redirect('admin');
			} else if ($this->session->userdata('rule_id') == 2) {
				$datadevice = $this->admin->getInformation();
				redirect('user');
			} 
		} 
		else if($cookie <> ''){
			$key = $this->db->get_where('user', ['key' => $cookie])->row_array();
			if ($key) {
				$session = [
					'id_user' => $key['id_user'],
					'email' => $key['email'],
					'rule_id' => $key['rule_id'],
					'logged' => TRUE

				];
				$this->session->set_userdata($session);
				$this->_login();

			}

		}
		if ($this->form_validation->run() == false) {
			

			$data['title'] = 'Login - Aws';

			$this->load->view('auth/login', $data);
		} else {
			//validasinya sukses
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$remember = $this->input->post('remember');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		//jika usernya ada
		if ($user) {

			// Jika usernya Guest
			if ($user['email'] == 'guest@dataonline.co.id') {
				counter();
			}

			//jika usernya aktif
			if ($user['is_active'] == 1) {
				//cek passwordnya
				if (password_verify($password, $user['password'])) {
					$data = [
						'id_user' => $user['id_user'],
						'email' => $user['email'],
						'rule_id' => $user['rule_id'],
						'logged' => TRUE

					];
					
					if ($remember) {
						$key = random_string('alnum', 64);
						var_dump($key);
						set_cookie('dataonline', $key, 3600*24*360); // set expired 30 hari kedepan
						// simpan key di database
						$update_key = array(
							'key' => $key
						);
						$this->db->where('id_user', $user['id_user']);
						$this->db->update('user', $update_key);
					}
					$this->session->set_userdata($data);
					
						if ($user['rule_id'] == 1) {
							redirect('admin');
						} else {


							$datadevice = $this->admin->getInformation();
							redirect('user');
						}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Aktif</div>');
				redirect('auth');
			}
		} else {

			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Salah</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('rule_id');
		$this->session->unset_userdata('logged');
		delete_cookie('dataonline');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> You has been logout </div>');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}
