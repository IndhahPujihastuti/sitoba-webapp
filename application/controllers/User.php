<?php
defined('BASEPATH') or exit ('no direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class User extends CI_Controller 
{
    public function index()
    {
        $data['title'] = 'Pengguna';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->ModelSitoba->getUser()->result_array();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('pengguna/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function editUser()
    {
        $this->form_validation->set_rules('level', 'Level', 'required|trim', [
            'required' => 'Tipe Pengguna Harus Diisi!'
        ]);

        $this->form_validation->set_rules('status', 'Status', 'required|trim', [
            'required' => 'Status Harus Diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Data Pengguna';
            $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
            $data['edituser'] = $this->ModelSitoba->userWhere(['kd_pengguna' => $this->uri->segment(3)])->result_array();
    
    
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('layout/topbar', $data);
            $this->load->view('pengguna/edit', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'level' => $this->input->post('level', true),
                'status' => $this->input->post('status', true)
            ];
    
            $this->ModelSitoba->editUser($data, ['kd_pengguna' => $this->input->post('kd_pengguna')]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Pengguna Berhasil Diedit</div>');
            redirect('user');    
        }
    }

    public function deleteUser()
    {
        $where = ['kd_pengguna' => $this->uri->segment(3)];
        $this->ModelSitoba->deleteUser($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Pengguna Berhasil Dihapus</div>');
        redirect('user'); 
    }
}