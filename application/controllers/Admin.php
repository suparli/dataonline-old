<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller

{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Admin_model', 'admin');
	}

	public function index()
	{
		$data['title']		= 'Dashboard';
		$data['user']		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['visitor']	= $this->db->get_where('counter', ['id' => 1])->result_array();

		$this->load->view('admin/index', $data);
	}

	public function rule()
	{
		$data['title']		= 'Accessibility Setting';
		$data['user']		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['rule']		= $this->db->get('user_rule')->result_array();
		$data['ruleuser']	= $this->db->get('user')->result_array();

		$this->form_validation->set_rules('rule', 'Rule', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/rule', $data);
		} else {
			$this->db->insert('user_rule', ['rule' => $this->input->post('rule')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Rule Added</div>');
			redirect('admin/rule');
		}
	}

	public function ruleAccess($ruleid)
	{
		$data['title']	= 'Rule Access';
		$data['user']	= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['rule']	= $this->db->get_where('user_rule', ['id' => $ruleid])->row_array();

		$this->db->where('id !=', 1);
		$data['menu'] 	= $this->db->get('user_menu')->result_array();

		$this->load->view('admin/rule-access', $data);
	}

	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId');
		$rule_id = $this->input->post('ruleId');

		$data = [
			'rule_id' => $rule_id,
			'menu_id' => $menu_id

		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed</div>');
	}

	public function deleteRule($id)
	{

		$this->admin->deleteRule($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deleted !</div>');
		redirect('admin/rule');
	}

	public function ruleUserAccess($id_user)
	{
		$data['title']		= 'Rule User Access';
		$data['user']		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['id_user']	= $this->db->get_where('user', ['id_user' => $id_user])->row_array();
		$data['namaaws']	= $this->db->get('data_device')->result_array();


		$this->load->view('admin/ruleuseraccess', $data);
	}

	public function changeUserAccess()
	{
		$id_aws		=	$this->input->post('idAws');
		$id_user 	=	$this->input->post('idUser');
		$data		=	[
			'id_aws' => $id_aws,
			'id_user' => $id_user
		];

		$result 	= 	$this->db->get_where('user_access_data', $data);
		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_data', $data);
		} else {
			$this->db->delete('user_access_data', $data);
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed</div>');
	}


	public function deleteUserRule($user_id)
	{

		$this->admin->deleteUserRule($user_id);
		$this->session->set_flashdata('messageuser', '<div class="alert alert-success" role="alert"> User Deleted !</div>');
		redirect('admin/rule');
	}
}
