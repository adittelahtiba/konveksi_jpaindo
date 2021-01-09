<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pesanan_model');
    }

    public function index()
    {
        $data['title'] = 'Order Detail Page';
        $data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
        $data['pemesan'] = $this->db->get('pemesan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pesanan/pemesan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function updatedp($IdDPesanan)
    {
        $data = array(
            'Jumlah' => $_POST['jumlah']
        );

        $this->db->where('IdDPesanan', $IdDPesanan);
        $this->db->update('detailpesanan', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulation!</strong> Your account has been registration.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');

        redirect('detailpesanan');
    }

    public function hapuspesanan($IdDPesanan)
    {
        $this->db->where('IdDPesanan', $IdDPesanan);
        $this->db->delete('detailpesanan');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulation!</strong> Your account has been registration.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');

        redirect('detailpesanan');
    }
}
