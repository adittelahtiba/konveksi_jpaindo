<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Pesanpakaian_model');
    }
    public function index()
    {
        $data['jnspkian'] = $this->Pesanpakaian_model->getAllJenisPakaian();
        $this->load->view('templates/headerfront');
        $this->load->view('pesanpakaian/index', $data);
        $this->load->view('templates/footerfront', $data);
    }

    public function masuk()
    {
        $this->form_validation->set_rules('id', 'Id', 'required|trim', ['required' => '*NIP tidak boleh kosong']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => '*Password tidak boleh kosong']);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {

        $id = htmlspecialchars($this->input->post('id', true));
        $password = $this->input->post('password');

        $pegawai = $this->db->get_where('pegawai', ['IdPeg' => $id])->row_array();
        if ($pegawai) {
            if ($pegawai['Aktif'] == 'T') {
                $this->session->set_flashdata('message', '<div class=" alert alert-danger" role="alert">
                NIP anda belum aktif</div>');
                redirect('auth/masuk');
            } else {
                if (password_verify($password, $pegawai['Password'])) {
                    $data = [
                        'id' => $pegawai['IdPeg'],
                        'level' => $pegawai['Level']
                    ];
                    $this->session->set_userdata($data);
                    redirect('pegawai');
                } else {
                    $this->session->set_flashdata('message', '<div class=" alert alert-danger" role="alert">
                    Password salah, silahkan ulangi!</div>');
                    redirect('auth/masuk');
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div class=" alert alert-danger" role="alert">
            NIP tidak ditemukan, coba cek kembali!</div>');
            redirect('auth/masuk');
        }
    }

    public function daftar()
    {
        $this->form_validation->set_rules('id', 'Id', 'required|trim|min_length[6]|is_unique[pegawai.IdPeg]', ['required' => '*NIP telepon tidak boleh kosong', 'is_unique' => 'NIP ini sudah terdaftar']);
        $this->form_validation->set_rules('name', 'Name', 'required|trim', ['required' => '*Nama telepon tidak boleh kosong']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pegawai.Email]', [
            'required' => '*Alamat email tidak boleh kosong',
            'valid_email' => 'Format email tidak sesuai'
        ]);
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim|is_unique[pegawai.NoTelp]', ['required' => '*Nomor telepon tidak boleh kosong']);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Pengulangan password tidak sama!',
            'min_length' => 'Minimal password terdiri dari 6 karakter!',
            'required' => '*Password tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/daftar');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'IdPeg' => htmlspecialchars($this->input->post('id', true)),
                'Nama' => htmlspecialchars($this->input->post('name', true)),
                'Email' => htmlspecialchars($this->input->post('email', true)),
                'NoTelp' => htmlspecialchars($this->input->post('phone', true)),
                'Password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'WaktuDaftar' => time()
            ];

            $this->db->insert("pegawai", $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> Akun anda berhasil didaftarkan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('auth/masuk');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('level');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Anda telah berhasil keluar
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('auth/masuk');
    }
}
