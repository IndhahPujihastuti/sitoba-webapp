<?php
defined('BASEPATH') or exit ('no direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Barangkeluar extends CI_Controller 
{
    public function index()
    {
        $data['title'] = 'Barang Keluar';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['barangkeluar'] = $this->ModelSitoba->getBarangKeluarJoin()->result_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('transaksi/barang_keluar', $data);
        $this->load->view('layout/footer');
    }

    public function formBarangKeluar()
    {
        $data['title'] = 'Tambah Barang Keluar';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->ModelSitoba->getBarang()->result_array();

        $this->form_validation->set_rules('barang', 'Nama Barang', 'required|trim', [
            'required' => 'Nama Barang Harus Dipilih!'
        ]);
        $this->form_validation->set_rules('jml', 'Jumlah Barang', 'required|trim|numeric', [
            'required' => 'Jumlah Barang Harus Diisi!',
            'numeric' => 'Jumlah Harus Diisi Angka'
        ]);
        $this->form_validation->set_rules('tujuan', 'Tujuan Pengiriman', 'required|trim', [
            'required' => 'Tujuan Pengiriman Harus Diisi!'
        ]);
        $this->form_validation->set_rules('status_krm', 'Status Pengiriman', 'required|trim', [
            'required' => 'Status Pengiriman Harus Dipilih!'
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
            $this->load->view('transaksi/create_barangkeluar', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'kd_bk' => $this->input->post('kd_bk', true),
                'barang' => $this->input->post('barang', true),
                'jml' => $this->input->post('jml', true),
                /*'harga' => $this->input->post('harga', true),*/
                'tgl_keluar' => $this->input->post('tgl_keluar', true),
                'tujuan' => $this->input->post('tujuan', true),
                'tgl_pengiriman' => $this->input->post('tgl_pengiriman', true),
                'penginput' => $this->input->post('penginput', true),
                'status_krm' => $this->input->post('status_krm', true),
                //'status_pay' => $this->input->post('status_pay', true),
            ];

            //$this->db->query("UPDATE barang SET stok=stok+1 WHERE $data[barang]");
            $this->db->query("UPDATE barang SET stok=stok-$data[jml] WHERE kd_barang = '$data[barang]' ");
            $this->ModelSitoba->createBarangKeluar($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Barang Keluar Berhasil Ditambahkan</div>');
            redirect('barangkeluar'); 
        }
    }

    public function formEditBarangKeluar()
    {
        $data['title'] = 'Edit Barang Keluar';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['editbarangkeluar'] = $this->ModelSitoba->barangkeluarWhere(['kd_bk' => $this->uri->segment(3)])->result_array();
        $barang = $this->ModelSitoba->joinBarangKeluar(['barang_keluar.kd_bk' => $this->uri->segment(3)])->result_array();
        foreach ($barang as $b) {
            $data['kd_brg'] = $b['kd_barang'];
            $data['b'] = $b['nama_brg'];
        }
        $data['barang'] = $this->ModelSitoba->getBarang()->result_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('transaksi/edit_barangkeluar', $data);
        $this->load->view('layout/footer');
    }

    public function editBarangKeluar()
    {
        $data['title'] = 'Ubah Data Barang Masuk';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        
        $data = [
                'barang' => $this->input->post('barang', true),
                'kd_bk' => $this->input->post('kd_bk', true),
                //'jml' => $this->input->post('jml', true),
                //'tujuan' => $this->input->post('tujuan', true),
                'status_krm' => $this->input->post('status_krm', true),
                'tgl_pengiriman' => '0000-00-00 00:00:00',
                //'status_pay' => $this->input->post('status_pay', true)
            ];
            $this->ModelSitoba->editBarangKeluar($data, ['kd_bk' => $this->input->post('kd_bk')]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Barang Keluar Berhasil Diubah</div>');
            redirect('barangkeluar');
    }

    public function cetakBarangKeluar()
    {
        $data['title'] = 'Kwitansi Pengeluaran Barang';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        //$data['laporanbarangkeluar'] = $this->ModelSitoba->getBarangKeluarJoin()->row_array();
        $data['laporanbarangkeluar'] = $this->ModelSitoba->barangKeluarWhr(['kd_bk' => $this->uri->segment(3)])->row_array();

        $this->load->view('transaksi/print_barangkeluar', $data);

    }

    public function deleteBarangKeluar()
    {
        $where = ['kd_bk' => $this->uri->segment(3)];

        $this->ModelSitoba->deleteBarangKeluar($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Barang Keluar Berhasil Dihapus</div>');
        redirect('barangkeluar'); 
    }
}