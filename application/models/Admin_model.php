<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model

{
	public function getInformation()
	{
		$id_user = $this->session->userdata('id_user');
		$queryuser = "SELECT  a.nama_device, a.longitude, a.latitude, a.ketinggian, a.pemilik, a.status, a.lokasi, a.id_device  FROM data_device a, user c, user_access_data b WHERE  a.id_device= b.id_aws 
        AND c.id_user = b.id_user AND c.id_user = '$id_user'  ";
		return $this->db->query($queryuser)->result_array();
	}
	public function deleteRule($id)
	{

		$this->db->delete('user_rule', array('id' => $id));
	}

	public function deleteUserRule($id_user)
	{

		$this->db->delete('user', array('id_user' => $id_user));
	}
}
