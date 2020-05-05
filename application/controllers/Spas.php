<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spas extends CI_Controller

{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Spas_model', 'spas');
	}

	public function jsonMap()
	{
		$json = $this->spas->getMap();
		echo json_encode($json);
	}

	public function jsonData()
	{
		$json = $this->spas->getCurrent();
		echo json_encode($json);
	}

	public function jsonTable()
	{
		echo $this->spas->getDataTables();
	}

	public function jsonChart()
	{
		$json =  $this->spas->getDataCharts();
		echo json_encode($json);
	}

	public function dashboard()
	{
		$data['title']	= 'Dashboard   ';
		$data['user']	= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['map']	= $this->spas->getCurrent();

		$this->load->view('spas/dashboard', $data);
	}

	public function tabel()
	{

		$data['title']	= 'Tabel   ';
		$data['user']	= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('spas/index', $data);
	}

	public function charts()
	{
		$data['title']		= 'Charts   ';
		$data['user']		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['datacharts'] = $this->spas->getDataCharts();
		$this->load->view('spas/charts', $data);
	}

	public function report()
	{
		$data['title']		= 'Report   ';
		$data['user']		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if (isset($_POST['submit'])) {
			$part =  explode(' - ', $this->input->post('date_filter'));
			$datea = $part[0];
			$dateb = $part[1];
			$data['dataaws'] =  $this->spas->filterData($datea, $dateb);
			$this->load->view('spas/report', $data);
		} else {
			$this->load->view('spas/report', $data);
		}
	}
}
