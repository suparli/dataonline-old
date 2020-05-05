<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Device_model extends CI_Model

{

	public function getData()
	{
		$query = $this->db->select("*")->from('data_device')->order_by('id_device', 'DESC')->get();
		return $query->result_array();
	}

	public function saveData($data)
	{

		$query = $this->db->insert("data_device", $data);

		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function edit($id)
	{

		$query = $this->db->where("id", $id)
			->get("data_device");

		if ($query) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function update($data, $id)
	{

		$query = $this->db->update("data_device", $data, $id);

		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function delete($iddevice)
	{

		$query = $this->db->delete('data_device', array('id_device' => $iddevice));

		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function status()
	{


		$queryaws = "SELECT a.id, a.id_aws, a.date, b.id_device, b.nama_device 
		                FROM data_aws a,data_device b 
		                WHERE a.id_aws = b.id_device 
		                AND a.date 
		                IN ( SELECT MAX(date) FROM data_aws GROUP BY id_aws ) ";
		return $this->db->query($queryaws)->result_array();



	}
}
