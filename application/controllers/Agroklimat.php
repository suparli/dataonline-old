<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agroklimat extends CI_Controller

{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Agro_model', 'agro');
	}

	public function jsonMap()
	{
		$json = $this->agro->getMap();
		echo json_encode($json);
	}

	public function jsonData()
	{
		$json = $this->agro->getCurrent();
		echo json_encode($json);
	}

	public function jsonTable()
	{
		echo $this->agro->getDataTables();
	}

	public function jsonChart()
	{
		$json =  $this->agro->getDataCharts();
		echo json_encode($json);
	}

	public function dashboard()
	{
		$data['title'] = 'Dashboard  ';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['map']	= $this->agro->getCurrent();
		$this->load->view('agroklimat/dashboard', $data);
	}

	public function tabel()
	{
		$data['title'] = 'Tabel ';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('agroklimat/index', $data);
	}


	public function charts()
	{
		$data['title'] = 'Charts ';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('agroklimat/charts', $data);
	}

	public function report()
	{
		$data['title']		= 'Report';
		$data['user']		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if (isset($_POST['submit'])) {
			$part =  explode(' - ', $this->input->post('date_filter'));
			$datea = $part[0];
			$dateb = $part[1];
			$data['dataaaws'] =  $this->agro->filterData($datea, $dateb);
			$this->load->view('agroklimat/report', $data);
		} else {
			$this->load->view('agroklimat/report', $data);
		}
	}
}
