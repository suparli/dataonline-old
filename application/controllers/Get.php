<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Get extends CI_Controller

{ 
    public function CurrentAws(){
    $id_user = $this->session->userdata('id_user');
    $currentdata = $this->db->query("SELECT  a.id_aws, a.date , a.radiasi, a.suhu, a.tekanan_udara, a.kecepatan_angin, a.arah_angin,
    a.curah_hujan, a.kelembaban, c.id_user, b.id_user, b.id_aws FROM data_aws a, user c, user_access_data b WHERE  a.id_aws= b.id_aws 
    AND c.id_user = b.id_user AND c.id_user = '$id_user' ORDER BY a.date DESC LIMIT 1")->result();
    
    echo json_encode($currentdata);
    }

    public function Currentaaws(){
        $id_user = $this->session->userdata('id_user');
        $currentdata = $this->db->query("SELECT  a.id_aws, a.date, a.radiasi, a.suhu, a.tekanan_udara, a.kecepatan_angin, a.arah_angin,
        a.curah_hujan, a.kelembaban, a.soil_mosture, a.suhu_tanah , a.leafwetnes, a.aux1, a.aux2, a.aux3, c.id_user, b.id_user, b.id_aws FROM data_aaws a, user c, user_access_data b WHERE  a.id_aws= b.id_aws 
        AND c.id_user = b.id_user AND c.id_user = '$id_user' ORDER BY a.date DESC LIMIT 1")->result();
        
        echo json_encode($currentdata);
        }

    public function Currentspas(){
        $id_user = $this->session->userdata('id_user');
        $currentdata = $this->db->query("SELECT  a.id_aws, a.date, a.curah_hujan, a.tinggi_muka_air , a.kecepatan_air, c.id_user, b.id_user, b.id_aws FROM data_spas a, user c, user_access_data b WHERE  a.id_aws= b.id_aws 
        AND c.id_user = b.id_user AND c.id_user = '$id_user' ORDER BY a.date DESC LIMIT 1")->result();
        
        echo json_encode($currentdata);
        }

    public function maps(){
        $maps = $this->db->query("SELECT a.id, a.id_aws, a.date, b.id_device, b.nama_device, b.longitude, b.latitude
        FROM data_aws a, data_device b 
        WHERE a.id_aws = b.id_device 
        AND a.id 
        IN ( SELECT MAX(id) FROM data_aws GROUP BY id_aws ) ")->result();
        
       
        echo json_encode($maps);

        }

    public function irig(){

        //ambil data jam doang cuk tapi banyak

        $get = $_GET['sta'];
        $id_user = $this->session->userdata('id_user');
        $querydate = $this->db->query("SELECT  a.idStas, a.tgl , c.id_user, b.id_user, b.id_aws FROM data_irigasi a, user c, user_access_data b WHERE a.idStas = b.id_aws AND a.idStas = $get  
        AND c.id_user = b.id_user AND c.id_user = '$id_user' ORDER BY a.tgl DESC LIMIT 1")->result_array();

        foreach ( $querydate as $qd ){
                 $nd = $qd['tgl'];
        }

        //data yang di ambil cuman tiga jam terakhir aja

        $st=date("Y-m-d H:i",strtotime('-1 hours',strtotime($nd)));

       
        //saat nya kita ambil datanya 

        $id_user = $this->session->userdata('id_user');
        $queryirig = $this->db->query("SELECT a.idData, a.idStas, a.tgl, a.kat1, a.kat2, a.irig1, a.irig2,if(irig1>0,'On','Off') AS ir1,if(irig2>0,'On','Off') AS ir2,
         a.mak, a.min
        FROM  data_irigasi a, user c, user_access_data b 
        WHERE a.idStas = b.id_aws 
        AND c.id_user = b.id_user 
        AND c.id_user = '$id_user' 
        AND a.idStas='$get' 
        AND tgl>='".$st."' 
        AND tgl<='".$nd."' 
        ORDER BY tgl ASC")->result();

     

            
            echo json_encode( $queryirig );

          
                }

    }


    


