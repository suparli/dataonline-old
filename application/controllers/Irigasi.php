<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Irigasi extends CI_Controller

{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        // $this->load->model('Irigasi_model', 'irig');
        // $this->load->model('Irigasicharts_model', 'irigcharts');
    }

    // public function dashboard(){

    

    //     $data['title'] = 'Dashboard ';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     // Query POSISI
    //     $id_user = $this->session->userdata('id_user');
    //     $data['map']= $this->db->query("SELECT a.nama_device,a.pemilik, a.longitude, a.latitude, a.id_device, a.image  FROM data_device a, user c, user_access_data b WHERE  a.id_device= b.id_aws 
    //     AND c.id_user = b.id_user AND c.id_user = '$id_user' LIMIT 1  ")->result_array();
               

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('aws/dashboard', $data);
    //     $this->load->view('templates/footer');
    // }

    // public function tabel()
    // {
    //     $data['title'] = 'Tabel';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     if (isset($_POST['submit'])) {

    //         $datea = $this->input->post('datea');
    //         $dateb = $this->input->post('dateb');
    //         $data['dataaws'] =  $this->aws->filterData($datea,$dateb);
    //         $this->load->view('aws/index', $data);
    //     } else{

    //         $data['dataaws'] =  $this->aws->getDataUser();
    //         $this->load->view('aws/index', $data);
    //     }
    //     $this->load->view('templates/footer',$data);
    // }

    // public function export(){
    //     $data['title']= 'Export';
    //     $data['namaaws']= $this->aws->getNamaAws();
          
    //     $this->load->view('report/excel', $data);
            
       
    // }

    

    public function charts()
    {
        $data['title'] = 'Charts';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('irig/charts', $data);
        $this->load->view('templates/footer');
    }

}
