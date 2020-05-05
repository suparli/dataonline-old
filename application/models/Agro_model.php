<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agro_model extends CI_Model
{


	public function addData($data)
	{
		$this->db->insert('data_aaws', $data);
		return $this->db->affected_rows();
	}

	public function getMap()
	{
		$id_user = $this->session->userdata('id_user');
		$query = "SELECT a.nama_device,a.pemilik, a.longitude, a.latitude, a.id_device, a.image  FROM data_device a, user c, user_access_data b WHERE  a.id_device= b.id_aws 
		AND c.id_user = b.id_user AND c.id_user = '$id_user' AND a.nama_device LIKE 'AAWS%' LIMIT 1 ";

		return $this->db->query($query)->result_array();
	}

	public function getCurrent()
	{
		$id_user = $this->session->userdata('id_user');
		$query = "SELECT  a.id_aws, a.date , a.radiasi, a.suhu, a.tekanan_udara, a.kecepatan_angin, a.arah_angin,
		a.curah_hujan, a.kelembaban, a.soil_mosture, a.suhu_tanah , a.leafwetnes, a.aux1, a.aux2, a.aux3, c.id_user, b.id_user, b.id_aws, d.pemilik, d.image FROM data_aaws a, user c, user_access_data b, data_device d WHERE  a.id_aws= b.id_aws 
		AND c.id_user = b.id_user AND c.id_user = '$id_user' AND b.id_aws = d.id_device ORDER BY a.date DESC LIMIT 1";

		return $this->db->query($query)->result_array();
	}

	public function getDataTables()
	{
		$this->load->library('datatables');
		$id_user = $this->session->userdata('id_user');
		$this->datatables->select('a.id as id, DATE(a.date) as tanggal,TIME(a.date) as time, radiasi, suhu, tekanan_udara, kecepatan_angin, arah_angin, curah_hujan, kelembaban, soil_mosture, suhu_tanah, leafwetnes, aux1,aux2,aux3');
		$this->datatables->from('data_aaws a, user c, user_access_data b');
		$this->datatables->where("a.id_aws= b.id_aws AND c.id_user = b.id_user AND c.id_user = '$id_user' ");
		$this->db->order_by("date", "desc");
		return $this->datatables->generate();
	}

	public function filterData($datea, $dateb)
	{

		$id_user = $this->session->userdata('id_user');
		$query = "SELECT  a.id_aws,DATE(a.date) as tanggal,TIME_FORMAT(TIME(a.date), '%H:%i') as time, a.radiasi, a.suhu, a.tekanan_udara, a.kecepatan_angin, a.arah_angin,
        a.curah_hujan, a.kelembaban,  a.soil_mosture, a.suhu_tanah , a.leafwetnes, a.aux1, a.aux2, a.aux3, c.id_user, b.id_user, b.id_aws FROM data_aaws a, user c, user_access_data b WHERE  a.id_aws= b.id_aws 
        AND c.id_user = b.id_user AND c.id_user = '$id_user' AND DATE(date) >= '$datea' AND DATE(date) <= '$dateb'  ORDER BY a.date DESC ";

		return $this->db->query($query)->result_array();
	}


	public function getDataCharts()
	{
		$tgl = date("Y-m-d");
		$id_user = $this->session->userdata('id_user');
		$query = $this->db->query("SELECT  a.id_aws,DATE(a.date) as tanggal,TIME_FORMAT(TIME(a.date), '%H:%i') as time, a.suhu, a.radiasi, a.tekanan_udara, a.kecepatan_angin, a.arah_angin,
        a.curah_hujan, a.kelembaban, a.soil_mosture, a.suhu_tanah , a.leafwetnes, a.aux1, a.aux2, a.aux3, c.id_user, b.id_user, b.id_aws FROM data_aaws a, user c, user_access_data b WHERE  a.id_aws= b.id_aws 
        AND c.id_user = b.id_user AND c.id_user = '$id_user' AND date LIKE '$tgl%' ORDER BY a.date ASC");


		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
}
