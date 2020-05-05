<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spascharts_model extends CI_Model
{

    public function getDataCharts()
    {
        $tgl = date("Y-m-d");
        $id_user = $this->session->userdata('id_user');
        $query = $this->db->query("SELECT  a.id_aws,DATE(a.date) as tanggal,TIME_FORMAT(TIME(a.date), '%H:%i') as time, a.curah_hujan, a.tinggi_muka_air, a.kecepatan_air, c.id_user, b.id_user, b.id_aws FROM data_spas a, user c, user_access_data b WHERE  a.id_aws= b.id_aws 
        AND c.id_user = b.id_user AND c.id_user = '$id_user' AND date LIKE '$tgl%' ORDER BY a.date ASC");
           
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
       
    }


    public function selectData($id_aws)
    {
        $tgl = date("Y-m-d");
        $id_user = $this->session->userdata('id_user');
        $query = $this->db->query("SELECT  a.id_aws,DATE(a.date) as tanggal,TIME_FORMAT(TIME(a.date), '%H:%i') as time, a.curah_hujan, a.tinggi_muka_air, a.kecepatan_air, c.id_user, b.id_user, b.id_aws FROM data_spas a, user c, user_access_data b WHERE  a.id_aws= b.id_aws 
        AND c.id_user = b.id_user AND c.id_user = '$id_user' AND  a.id_aws = '$id_aws' AND date LIKE '$tgl%' ORDER BY a.date ASC");
           
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
       
    }
}
