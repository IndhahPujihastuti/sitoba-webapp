<?php
defined('BASEPATH') or exit ('no direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Dashboard extends CI_Controller 
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->ModelSitoba->getBarangLimit()->result_array();
        $data['barangkeluar'] = $this->ModelSitoba->getBarangKeluarLimit()->result_array();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('layout/footer', $data);

    }
}