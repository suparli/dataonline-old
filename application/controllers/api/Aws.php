<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Aws extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Aws_model', 'aws');
	}
	public function index_post()
	{

		$data = [
			'id_aws' 		=> $this->input->post('id_aws'),
			'date' 			=> $this->input->post('date'),
			'radiasi' 		=> $this->input->post('radiasi'),
			'suhu' 			=> $this->input->post('suhu'),
			'tekanan_udara' => $this->input->post('tekanan_udara'),
			'kecepatan_angin' => $this->input->post('kecepatan_angin'),
			'arah_angin' 	=> $this->input->post('arah_angin'),
			'curah_hujan' 	=> $this->input->post('curah_hujan'),
			'kelembaban' 	=> $this->input->post('kelembaban'),
		];

		$success = [
			'status' => true,
			'message' => 'Added a resource'
		];
		$fail = [
			'status' => true,
			'message' => 'Failed'
		];

		if ($this->aws->addData($data) > 0) {
			$this->response($success, REST_Controller::HTTP_CREATED);
		} else {
			$this->response($fail, REST_Controller::HTTP_BAD_REQUEST);
		}
	}
}
