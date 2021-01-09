<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Front_model');
        $this->load->model('Pesanpakaian_model');
    }

    public function index()
    {
        $data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
        $data['jnspkian'] = $this->Pesanpakaian_model->getAllJenisPakaian();
        $data['title'] = "Beranda";


        $this->load->view('templates/headerfront', $data);
        $this->load->view('pesanpakaian/index', $data);
        $this->load->view('templates/footerfront', $data);

        // $this->load->view('Front/templates/headerdepan', $data);
        // $this->load->view('Front/index', $data);
        // $this->load->view('Front/templates/footer');
    }


    public function daftar()
    {
        $data['jnspkian'] = $this->Pesanpakaian_model->getAllJenisPakaian();
        $data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
        $data['get_allpesanan'] = $this->Front_model->get_allpesanan();
        $data['title'] = 'daftar pesanan';

        $this->load->view('Front/templates/header', $data);
        $this->load->view('Front/daftarpesanan', $data);
        $this->load->view('Front/templates/footer');
    }

    public function detail($id)
    {
        $data['jnspkian'] = $this->Pesanpakaian_model->getAllJenisPakaian();
        $data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
        $data['get_pesananby_id'] = $this->Front_model->get_pesananby_id($id);
        $data['get_all'] = $this->Front_model->get_all($id);
        $data['idd'] = $id;
        $data['title'] = 'Detail Pesanan';
        $data['feedback'] = 'Hi ' . $data['get_pesananby_id']['Nama'] . $data['get_pesananby_id']['FeedBack'];

        if ($data['get_pesananby_id']) {
            $this->load->view('Front/templates/header', $data);
            $this->load->view('Front/detail', $data);
            $this->load->view('Front/templates/footer');
        } else { }
    }

    public function panduan()
    {
        $data['title'] = 'Panduan';
        $data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
        $data['jnspkian'] = $this->Pesanpakaian_model->getAllJenisPakaian();
        $this->load->view('Front/panduan', $data);
        $this->load->view('Front/templates/footer');
    }

    public function kontak()
    {
        $data['title'] = 'Kontak';
        $data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
        $data['jnspkian'] = $this->Pesanpakaian_model->getAllJenisPakaian();
        $this->load->view('Front/templates/header', $data);
        $this->load->view('Front/kontak');
        $this->load->view('Front/templates/footer');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('Nama', 'Nama', 'trim|required', ['required' => '*Field Tidak Boleh Kosong']);
        $this->form_validation->set_rules('Alamat', 'Alamat', 'trim|required', ['required' => '*Field Tidak Boleh Kosong']);
        $this->form_validation->set_rules('Desa', 'Desa', 'trim|required', ['required' => '*Field Tidak Boleh Kosong']);
        $this->form_validation->set_rules('Kecamatan', 'Kecamatan', 'trim|required', ['required' => '*Field Tidak Boleh Kosong']);
        $this->form_validation->set_rules('KabOrKota', 'KabOrKota', 'trim|required', ['required' => '*Field Tidak Boleh Kosong']);
        $this->form_validation->set_rules('NoTelp', 'NoTelp', 'trim|required', ['required' => '*Field Tidak Boleh Kosong']);
        $this->form_validation->set_rules('Email', 'Email', 'trim|required', ['required' => '*Field Tidak Boleh Kosong']);

        $this->form_validation->set_rules('Deskripsi', 'Deskripsi', 'trim|required', ['required' => '*Field Tidak Boleh Kosong']);
        $this->form_validation->set_rules('total', 'total', 'trim|required', ['required' => '*Field Tidak Boleh Kosong']);

        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
    }
}