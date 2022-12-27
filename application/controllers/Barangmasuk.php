<?php
defined('BASEPATH') or exit ('no direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Barangmasuk extends CI_Controller 
{
    public function index()
    {
        $data['title'] = 'Barang Masuk';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['barangmasuk'] = $this->ModelSitoba->getBarangMasukJoin()->result_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('transaksi/barang_masuk', $data);
        $this->load->view('layout/footer');
    }

    public function formBarangMasuk()
    {
        $data['title'] = 'Tambah Barang Masuk';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->ModelSitoba->getBarang()->result_array();
        $data['kategori'] = $this->ModelSitoba->getKategori()->result_array();
        $data['supplier'] = $this->ModelSitoba->getSupplier()->result_array();

        $this->form_validation->set_rules('barang', 'Nama Barang', 'required|trim', [
            'required' => 'Nama Barang Harus Dipilih!'
        ]);
        $this->form_validation->set_rules('jml', 'Jumlah Barang', 'required|trim|numeric', [
            'required' => 'Jumlah Barang Harus Diisi!',
            'numeric' => 'Jumlah Harus Diisi Angka'
        ]);
        
        $this->form_validation->set_rules('suplier', 'Nama Suplier', 'required|trim', [
            'required' => 'Nama Suplier Harus Dipilih!'
        ]);
        
        $this->form_validation->set_rules('status_brg', 'Status Barang', 'required|trim', [
            'required' => 'Status Barang Harus Dipilih!'
        ]);
        /*
        $this->form_validation->set_rules('status_pay', 'Status Pembayaran', 'required|trim', [
            'required' => 'Status Pembayaran Harus Dipilih!'
        ]);
        */

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('layout/topbar', $data);
            $this->load->view('transaksi/create_barangmasuk', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'kd_bm' => $this->input->post('kd_bm', true),
                'barang' => $this->input->post('barang', true),
                'jml' => $this->input->post('jml', true),
                'jml_kurang' => $this->input->post('jml_kurang', true),
                /*'harga' => $this->input->post('harga', true),*/
                'tgl_masuk' => $this->input->post('tgl_masuk', true),
                'suplier' => $this->input->post('suplier', true),
                'nm_penerima' => $this->input->post('nm_penerima', true),
                'status_brg' => $this->input->post('status_brg', true),
                //'status_pay' => $this->input->post('status_pay', true),
            ];

            //$this->db->query("UPDATE barang SET stok=stok+1 WHERE $data[barang]");
            $this->db->query("UPDATE barang SET stok=stok+$data[jml] WHERE kd_barang = '$data[barang]' ");
            $this->ModelSitoba->createBarangMasuk($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Barang Masuk Berhasil Ditambahkan</div>');
            redirect('barangmasuk'); 
        }

    }

    public function formEditBarangMasuk()
    {
        $data['title'] = 'Tambah Barang Masuk';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['editbarangmasuk'] = $this->ModelSitoba->barangmasukWhere(['kd_bm' => $this->uri->segment(3)])->result_array();
        
        /*
        $supplier = $this->ModelSitoba->joinSuplierBarangMasuk(['barang_masuk.kd_bm' => $this->uri->segment(3)])->result_array();
        foreach ($supplier as $s) {
            $data['kd_sup'] = $s['kd_suplier'];
            $data['s'] = $s['nm_suplier'];
        }
        $data['supplier'] = $this->ModelSitoba->getSupplier()->result_array();
        */

        $barang = $this->ModelSitoba->joinBarangMasuk(['barang_masuk.kd_bm' => $this->uri->segment(3)])->result_array();
        foreach ($barang as $b) {
            $data['kd_brg'] = $b['kd_barang'];
            $data['b'] = $b['nama_brg'];
        }
        $data['barang'] = $this->ModelSitoba->getBarang()->result_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('transaksi/edit_barangmasuk', $data);
        $this->load->view('layout/footer');
    }

    public function editBarangMasuk()
    {
        $data['title'] = 'Ubah Data Barang Masuk';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        
        $data = [
                'barang' => $this->input->post('barang', true),
                'kd_bm' => $this->input->post('kd_bm', true),
                'jml_kurang' => $this->input->post('jml_kurang', true),
                //'suplier' => $this->input->post('suplier', true),
                'status_brg' => $this->input->post('status_brg', true),
                //'status_pay' => $this->input->post('status_pay', true)
            ];
        $kurang == 0;
            $this->db->query("UPDATE barang SET stok=stok+$data[jml_kurang] WHERE kd_barang = '$data[barang]' ");
            $this->db->query("UPDATE barang_masuk SET jml=jml+$data[jml_kurang] WHERE kd_bm = '$data[kd_bm]' ");
            //$this->db->query("UPDATE barang_masuk SET jml_kurang=jml_kurang-$data[jml_kurang] WHERE kd_bm = '$data[kd_bm]' ");
            $this->ModelSitoba->editBarangMasuk($data, ['kd_bm' => $this->input->post('kd_bm')]);
            $this->db->query("UPDATE barang_masuk SET jml_kurang=jml_kurang-$data[jml_kurang] WHERE kd_bm = '$data[kd_bm]' ");
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Barang Masuk Berhasil Diubah</div>');
            redirect('barangmasuk');
    }

    public function deleteBarangMasuk()
    {
        $where = ['kd_bm' => $this->uri->segment(3)];

        $this->ModelSitoba->deleteBarangMasuk($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Barang Masuk Berhasil Dihapus</div>');
        redirect('barangmasuk'); 
    }

    
    public function addBarangMasuk()
    {
        $data['title'] = 'Tambah Barang Masuk';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->ModelSitoba->getBarang()->result_array();
        $data['kategori'] = $this->ModelSitoba->getKategori()->result_array();
        $data['supplier'] = $this->ModelSitoba->getSupplier()->result_array();

           $data = [
                'kd_bm' => $this->input->post('kd_bm', true),
                'barang' => $this->input->post('barang', true),
                'jml' => $this->input->post('jml', true),
                /*'harga' => $this->input->post('harga', true),*/
                'tgl_masuk' => $this->input->post('tgl_masuk', true),
                'suplier' => $this->input->post('suplier', true),
                'nm_penerima' => $this->input->post('nm_penerima', true),
                'status_brg' => $this->input->post('status_brg', true),
                'status_pay' => $this->input->post('status_pay', true),
            ];

            //$this->db->query("UPDATE barang SET stok=stok+1 WHERE $data[barang]");
            $this->db->query("UPDATE barang SET stok=stok+$data[jml] WHERE kd_barang = '$data[barang]' ");
            $this->ModelSitoba->createBarangMasuk($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Barang Masuk Berhasil Ditambahkan</div>');
            redirect('barangmasuk'); 
    }
    
    
}