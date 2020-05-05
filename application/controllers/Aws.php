<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aws extends CI_Controller

{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Aws_model', 'aws');
	}

	public function jsonMap()
	{
		$json = $this->aws->getMap();
		echo json_encode($json);
	}

	public function jsonData()
	{
		$json = $this->aws->getCurrent();
		echo json_encode($json);
	}

	public function jsonTable()
	{
		echo $this->aws->getDataTables();
	}

	public function jsonChart()
	{
		$json =  $this->aws->getDataCharts();
		echo json_encode($json);
	}

	public function dashboard()
	{
		$data['title']	= 'Dashboard ';
		$data['user']	= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['map']	= $this->aws->getCurrent();

		$this->load->view('aws/dashboard', $data);
	}

	public function tabel()
	{

		$data['title']	= 'Tabel';
		$data['user']	= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('aws/index', $data);
	}

	public function charts()
	{
		$data['title']		= 'Charts';
		$data['user']		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['datacharts'] = $this->aws->getDataCharts();
		$this->load->view('aws/charts', $data);
	}

	public function report()
	{
		$data['title']		= 'Report';
		$data['user']		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if (isset($_POST['submit'])) {
			$part =  explode(' - ', $this->input->post('date_filter'));
			$datea = $part[0];
			$dateb = $part[1];
			$data['dataaws'] =  $this->aws->filterData($datea, $dateb);
			$this->load->view('aws/report', $data);
		} else {
			$this->load->view('aws/report', $data);
		}
	}
}
