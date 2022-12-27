<?php
defined('BASEPATH') or exit ('no direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Barang extends CI_Controller 
{
    public function index()
    {
        $data['title'] = 'Barang';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->ModelSitoba->getBarangJoin()->result_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('barang/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function deleteBarang()
    {
        $where = ['kd_barang' => $this->uri->segment(3)];
        $this->ModelSitoba->deleteBarang($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Barang Berhasil Dihapus</div>');
        redirect('barang'); 
    }

    public function formEditBarang()
    {
        $data['title'] = 'Ubah Data Barang';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['editbarang'] = $this->ModelSitoba->barangWhere(['kd_barang' => $this->uri->segment(3)])->result_array();
        $kategori = $this->ModelSitoba->joinKategoriBarang(['barang.kd_barang' => $this->uri->segment(3)])->result_array();
        foreach ($kategori as $k) {
            $data['kd_kat'] = $k['kd_kategori'];
            $data['k'] = $k['nm_kategori'];
        }
        $data['kategori'] = $this->ModelSitoba->getKategori()->result_array();

        /*
        $supplier = $this->ModelSitoba->joinSupplierBarang(['barang.kd_barang' => $this->uri->segment(3)])->result_array();
        foreach ($supplier as $s) {
            $data['kd_sup'] = $s['kd_suplier'];
            $data['s'] = $s['nm_suplier'];
        }
        $data['supplier'] = $this->ModelSitoba->getSupplier()->result_array();
        */

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('barang/edit_barang', $data);
        $this->load->view('layout/footer');
    }

    public function editBarang()
    {
        $data['title'] = 'Ubah Data Barang';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        
        $data = [
                'kd_barang' => $this->input->post('kd_barang', true),
                'nama_brg' => $this->input->post('nama_brg', true),
                'kategori' => $this->input->post('kategori', true),
                'satuan' => $this->input->post('satuan', true),
                'harga' => str_replace('.', '', $this->input->post('harga', true)),
                'stok' => $this->input->post('stok', true),
                //'nm_suplier' => $this->input->post('nm_suplier', true),
                'tgl_input' => $this->input->post('tgl_input', true),
                'nm_penginput' => $this->input->post('nm_penginput', true)
            ];
            $this->ModelSitoba->editBarang($data, ['kd_barang' => $this->input->post('kd_barang')]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Barang Berhasil Diubah</div>');
            redirect('barang');
     }

    public function addBarang()
    {
        $data['title'] = 'Tambah Barang';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->ModelSitoba->getBarang()->result_array();
        $data['kategori'] = $this->ModelSitoba->getKategori()->result_array();
        $data['supplier'] = $this->ModelSitoba->getSupplier()->result_array();
        
        $this->form_validation->set_rules('nama_brg', 'Nama Barang', 'required|trim', [
            'required' => 'Nama Barang Harus Diisi!'
        ]);
        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim', [
            'required' => 'Kategori Harus Diisi!'
        ]);
        $this->form_validation->set_rules('satuan', 'Satuan', 'required|trim', [
            'required' => 'Satuan Harus Diisi!'
        ]);
        $this->form_validation->set_rules('stok', 'Stok Barang', 'required|trim|numeric', [
            'required' => 'Stok Barang Harus Diisi!',
            'numeric' => 'Stok Harus Berupa Angka'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric', [
            'required' => 'Harga Harus Diisi!',
            'numeric' => 'Harga Harus Berupa Angka'
        ]);
        
        //$this->form_validation->set_rules('nm_suplier', 'Nama Supplier', 'required|trim', [
            //'required' => 'Nama Supplier Harus Dipilih!'
        //]);

        $this->form_validation->set_rules('tgl_input', 'Tanggal Input', 'required|trim', [
            'required' => 'Tanggal Input Harus Diisi!'
        ]);
        $this->form_validation->set_rules('nm_penginput', 'Nama Penginput', 'required|trim', [
            'required' => 'Nama Penginput Harus Diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('layout/topbar', $data);
            $this->load->view('barang/create_barang', $data);
            $this->load->view('layout/footer', $data);
        } else {

            $data = [
                'kd_barang' => $this->input->post('kd_barang', true),
                'nama_brg' => $this->input->post('nama_brg', true),
                'kategori' => $this->input->post('kategori', true),
                'satuan' => $this->input->post('satuan', true),
                'harga' => str_replace('.', '', $this->input->post('harga', true)),
                'stok' => $this->input->post('stok', true),
                //'nm_suplier' => $this->input->post('nm_suplier', true),
                'tgl_input' => $this->input->post('tgl_input', true),
                'nm_penginput' => $this->input->post('nm_penginput', true)
            ];

            $this->ModelSitoba->createBarang($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Barang Berhasil Ditambahkan</div>');
            redirect('barang'); 
        }
    }

    public function kategoriBarang()
    {
        $data['title'] = 'Kategori';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->ModelSitoba->getKategori()->result_array();

        $this->form_validation->set_rules('nm_kategori', 'Kategori', 'required|trim', [
            'required' => 'Kategori Harus Diisi!'
        ]);

       
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('layout/topbar', $data);
            $this->load->view('barang/kategori', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'kd_kategori' => $this->input->post('kd_kategori', true),
                'nm_kategori' => $this->input->post('nm_kategori', true)
            ];

            $this->ModelSitoba->createCategory($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Kategori Berhasil Ditambahkan</div>');
            redirect('barang/kategoriBarang'); 
        }
    }

    public function editCategory()
    {
            $data['title'] = 'Edit Data Kategori';
            $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
            $data['kategori'] = $this->ModelSitoba->categoryWhere(['kd_kategori' => $this->uri->segment(3)])->result_array();
    
            $data = [
                'nm_kategori' => $this->input->post('nm_kategori', true)
            ];
    
            $this->ModelSitoba->editCategory($data, ['kd_kategori' => $this->input->post('kd_kategori')]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Kategori Berhasil Diedit</div>');
            redirect('barang/kategoriBarang');    
    }

    public function deleteCategory()
    {
        $where = ['kd_kategori' => $this->uri->segment(3)];
        $this->ModelSitoba->deleteCategory($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Kategori Berhasil Dihapus</div>');
        redirect('barang/kategoriBarang'); 
    }
    
    function ajaxBarang()
    {
        $nama_brg=$this->input->post('nama_brg');
        $data=$this->ModelSitoba->getBarangMasukByKode($nama_brg);
        echo json_encode($data);
    }
}