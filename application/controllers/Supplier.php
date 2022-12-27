<?php
defined('BASEPATH') or exit ('no direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Supplier extends CI_Controller 
{
    public function index()
    {
        $data['title'] = 'Suplier';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['supplier'] = $this->ModelSitoba->getSupplier()->result_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('supplier/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function createSupplier()
    {
        $data['title'] = 'Tambah Supplier';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->form_validation->set_rules('nm_suplier', 'Nama', 'required|trim', [
            'required' => 'Nama Harus Diisi!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat Harus Diisi!'
        ]);
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim|numeric', [
            'required' => 'Nomor Telepon Harus Diisi!',
            'numeric' => 'Nomor Telepon Harus Berupa Angka'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('layout/topbar', $data);
            $this->load->view('supplier/create_supplier', $data);
            $this->load->view('layout/footer', $data);
        } else {

            $data = [
                'kd_suplier' => $this->input->post('kd_suplier', true),
                'nm_suplier' => $this->input->post('nm_suplier', true),
                'alamat' => $this->input->post('alamat', true),
                'no_telp' => $this->input->post('no_telp', true)
            ];

            $this->ModelSitoba->createSupplier($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Supplier Berhasil Ditambahkan</div>');
            redirect('supplier'); 
        }
    }

    public function formEdit()
    {
     
            $data['title'] = 'Edit Data Supplier';
            $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
            $data['editsupplier'] = $this->ModelSitoba->supplierWhere(['kd_suplier' => $this->uri->segment(3)])->result_array();
    
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('layout/topbar', $data);
            $this->load->view('supplier/edit_supplier', $data);
            $this->load->view('layout/footer', $data);

    }

    public function editSupplier()
    {
        $data['title'] = 'Setting';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        
        $data = [
            'nm_suplier' => $this->input->post('nm_suplier', true),
            'alamat' => $this->input->post('alamat', true),
            'no_telp' => $this->input->post('no_telp', true)
        ];
    
        $this->ModelSitoba->editSupplier($data, ['kd_suplier' => $this->input->post('kd_suplier')]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Supplier Berhasil Diedit</div>');
        redirect('supplier');    
        
    }

    public function deleteSupplier()
    {
        $where = ['kd_suplier' => $this->uri->segment(3)];
        $this->ModelSitoba->deleteSupplier($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Supplier Berhasil Dihapus</div>');
        redirect('supplier'); 
    }

}