<?php
defined('BASEPATH') or exit ('no direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Pengaturan extends CI_Controller 
{
    public function index()
    {
        $data['title'] = 'Data Pribadi';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('layout/nav_akun', $data);
        $this->load->view('pengaturan/data_pribadi', $data);
        $this->load->view('layout/footer');
    }

    public function editData()
    {
        $data['title'] = 'Kata Sandi';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

         //set image
         $config['upload_path'] = './assets/img/user/';
         $config['allowed_types'] = 'jpg|png|jpeg';
         $config['max_size'] = '3000';
         $config['max_width'] = '1024';
         $config['max_height'] = '1000';
         $config['file_name'] = 'sitoba';
 
         $this->load->library('upload', $config);

         if ($this->upload->do_upload('gambar')) {
            $gambar = $this->upload->data();
            $image = $gambar['file_name'];
        } else {
            $image = $this->input->post('old_pict', TRUE);
        }

        $data = [
            'kd_pengguna' => $this->input->post('kd_pengguna', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            //'email' => $this->input->post('email', TRUE),
            'no_telp' => $this->input->post('no_telp', TRUE),
            'alamat' => $this->input->post('alamat', TRUE),
            'gambar' => $image,
        ];

        $this->ModelSitoba->editUser($data, ['kd_pengguna' => $this->input->post('kd_pengguna')]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Data Pribadi Berhasil Diubah</div>');
        redirect('pengaturan');
    }

    public function security()
    {
        $data['title'] = 'Kata Sandi Pengguna';
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Kata Sandi Saat Ini', 'required|trim', [
            'required' => 'Kata Sandi Harus Diisi'
        ]);
        $this->form_validation->set_rules('new_password', 'Kata Sandi Baru', 'required|trim|min_length[3]|matches[confirm_password]',[
            'required' => 'Kata Sandi Baru Harus Diisi',
            'matches' => 'Kata Sandi Tidak Sama',
            'min_length' => 'Kata Sandi Minimal 3 Karakter'
        ]);
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Kata Sandi', 'required|trim|min_length[3]|matches[new_password]', [
            'required' => 'Konfirmasi Kata Sandi Harus Diisi',
            'matches' => 'Kata Sandi Tidak Sama',
            'min_length' => 'Kata Sandi Minimal 3 Karakter'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('layout/topbar', $data);
            $this->load->view('layout/nav_akun', $data);
            $this->load->view('pengaturan/kata_sandi', $data);
            $this->load->view('layout/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');

            if (!password_verify($current_password, $data['pengguna']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Kata Sandi Saat Ini Salah</div>');
                redirect('pengaturan/security');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Kata Sandi Baru Tidak Boleh Sama Kata Sandi Saat Ini</div>');
                    redirect('pengaturan/security');
                } else {
                    //password benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('pengguna');

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Kata Sandi Berhasil Diubah</div>');
                    redirect('pengaturan/security');
                }
            }
        }
        
    }
}