<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aaws_Davis extends CI_Controller

{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Aaws_davis_model', 'davis');
	}

	public function jsonMap()
	{
		$json = $this->davis->getMap();
		echo json_encode($json);
	}

	public function jsonData()
	{
		$json = $this->davis->getCurrent();
		echo json_encode($json);
	}

	public function jsonTable()
	{
		echo $this->davis->getDataTables();
	}

	public function jsonChart()
	{
		$json =  $this->davis->getDataCharts();
		echo json_encode($json);
	}

	public function dashboard()
	{
		$data['title'] = 'Dashboard  ';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['map']	= $this->davis->getCurrent();
		$this->load->view('agroklimat/dashboard', $data);
	}

	public function tabel()
	{
		$data['title'] = 'Tabel ';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if (isset($_POST['submit'])) {
			$part =  explode(' - ', $this->input->post('date_filter'));
			$datea = $part[0];
			$dateb = $part[1];
			$data['dataaws'] =  $this->davis->filterData($datea, $dateb);
			$this->load->view('agroklimat/index', $data);
		} else {

			$data['dataaws'] =  $this->davis->getDataUser();
			$this->load->view('agroklimat/index', $data);
		}
	}


	public function charts()
	{
		$data['title'] = 'Charts ';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('agroklimat/charts', $data);
	}
}
