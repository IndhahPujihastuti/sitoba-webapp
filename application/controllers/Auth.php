<?php
defined('BASEPATH') or exit ('no direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Auth extends CI_Controller 
{
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email Harus Diisi!',
            'valid_email' => 'Email Tidak Valid!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password Harus Diisi!'
        ]);
        
        if($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('layout/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('layout/auth_footer');
        } else {
            //jika validasi sukses 
            $this->_login();
        }
       
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('pengguna', ['email' => $email])->row_array();
        
        //jika usernya ada
        if($user) {
            //jika usernya aktif
            if ($user['status'] == 'Aktif') {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'level' => $user['level']
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email Belum Diaktivasi!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email Belum Terdaftar!</div>');
            redirect('auth');
        }
    }

    public function registrasi()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama Harus Diisi!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pengguna.email]', [
            'required' => 'Email Harus Diisi!',
            'valid_email' => 'Email Tidak Valid!',
            'is_unique' => 'Email Sudah Terdaftar!'
        ]);
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim|numeric', [
            'required' => 'Nomor Telepon Harus Diisi!',
            'numeric' => 'Nomor Telepon Harus Berupa Angka'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat Harus Diisi!'
        ]);
        $this->form_validation->set_rules('level', 'Level', 'required|trim', [
            'required' => 'Tipe Pengguna Harus Dipilih!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Password Harus Diisi!',
            'matches' => 'Password Tidak Sama!',
            'min_length' => 'Password Terlalu Pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'required' => 'Password Harus Diisi!',
            'matches' => 'Password Tidak Sama!'
        ]);

        //set image
        $config['upload_path'] = './assets/img/user/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '10000';
        $config['max_height'] = '10000';
        
        $config['file_name'] = 'userImg';

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi';
            $this->load->view('layout/auth_header', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('layout/auth_footer');
        } else {

            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data();
                $image = $gambar['file_name'];
            } else {
                $image = 'default.png';
            }

            $data = [
                'kd_pengguna' => $this->input->post('kd_pengguna'),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'gambar' => $image,
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat'),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'level' => $this->input->post('level'),
                'status' => $this->input->post('status'),
                'tgl_masuk' => $this->input->post('tgl_masuk')
            ];

            $this->db->insert('pengguna', $data);

            //$this->_sendEmail();

            $this->session->set_flashdata('successLogin', 'Selamat! Akun Berhasil Dibuat');
            redirect('auth');
        }
       
    }

    /*
    private function _sendEmail() 
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'indhahpuji@gmail.com',
            'smtp_pass' => 'Indhah0407',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('indhahpuji@gmail.com', 'Indhah Pujihastuti');
        $this->email->to('indhahpujihastuti4@gmail.com');
        $this->email->subject('Testing');
        $this->email->message('Hello World!');

        if($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
    */


    public function lupaPassword()
    {
        $data['title'] = 'Atur Ulang Kata Sandi';
        $this->load->view('layout/auth_header', $data);
        $this->load->view('auth/password');
        $this->load->view('layout/auth_footer');
    }

    public function resetPassword()
    {
        $data['title'] = 'Atur Ulang Kata Sandi';

        $this->form_validation->set_rules('email', 'Email', 'required|trim',[
            'required' => 'Email Harus Diisi',
        ]);
        $this->form_validation->set_rules('password1', 'Kata Sandi', 'required|trim|min_length[3]|matches[password2]',[
            'required' => 'Kata Sandi Harus Diisi',
            'matches' => 'Kata Sandi Tidak Sama',
            'min_length' => 'Kata Sandi Minimal 3 Karakter'
        ]);
        $this->form_validation->set_rules('password2', 'Ulangi Kata Sandi', 'required|trim|min_length[3]|matches[password1]', [
            'required' => 'Kata Sandi Harus Diisi',
            'matches' => 'Kata Sandi Tidak Sama',
            'min_length' => 'Kata Sandi Minimal 3 Karakter'
        ]);

        if($this->form_validation->run() == false)
        {
            $this->load->view('layout/auth_header', $data);
            $this->load->view('auth/reset_sandi');
            $this->load->view('layout/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->input->post('email');
            $user = $this->db->get_where('pengguna', ['email' => $email])->row_array();

            if($user) {
                $this->db->set('password', $password);
                $this->db->where('email', $email);
                $this->db->update('pengguna');

                $this->session->unset_userdata($email);
                $this->session->set_flashdata('successReset', 'Berhasil Atur Ulang Kata Sandi');
                redirect('auth');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email Tidak Terdaftar!</div>');
                redirect('auth/resetPassword');
            }
        }
        
    }

    public function savePassword()
    {
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $email = $this->input->post('email');

        $this->db->set('password', $password);
        $this->db->where('email', $email);
        $this->db->update('pengguna');

        $this->session->unset_userdata($email);
        $this->session->set_flashdata('successReset', 'Berhasil Atur Ulang Kata Sandi');
        redirect('auth');
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('level');
        $this->session->set_flashdata('successLogout', 'Akun Berhasil Keluar');
        redirect('auth');
    }
}