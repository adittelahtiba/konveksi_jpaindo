<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pesanan_model');
    }

    public function index()
    {
        $data['title'] = 'Controling Page';
        $data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
        $data['pesanan'] = $this->db->get('pesanan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pesanan/pesanan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function listpegawai()
    {
        $data['title'] = 'List Pegawai';
        $data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pesanan/pesanan', $data);
        $this->load->view('templates/footer', $data);
    }


    public function konfirmasipesanan($IdPesanan, $IdPegawai)
    {
        $data['detail'] = $this->Pesanan_model->getbahanbaku($IdPesanan);

        foreach ($data['detail'] as $dy) {

            $this->db->set('TersediaM2', $dy['sisa']);
            $this->db->where('KdBBaku', $dy['KdBBaku']);
            $this->db->update('bahanbaku');
        }

        $data = array(
            'StatusPesanan' => 'Y',
            'FeedBack' => '<br>Pesanan kamu sudah kami konfirmasi
            <br>Silahkan segera lakukan pembayaran ke nomor rekening 1234567890 <br> di bank BTS dan kirim bukti pembayaranya disini :)',
            'IdPegawai' =>  $IdPegawai
        );

        $this->db->where('IdPesanan', $IdPesanan);
        $this->db->update('pesanan', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Pesanan ' . $IdPesanan . ' berhasil di konfirmasi.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');

        redirect('pesanan');
    }

    public function tolak($IdPesanan, $IdPegawai)
    {
        $data = array(
            'StatusPesanan' => 'T',
            'FeedBack' => '<br>mohon maaf atas ketidak nyamananya, tapi saat ini kami tidak bisa menerima pesanan<br>Silahkan hubungi kami <a href="http://localhost/konveksi_jpaindo/Front/kontak">disini</a>',
            'IdPegawai' =>  $IdPegawai
        );

        $this->db->where('IdPesanan', $IdPesanan);
        $this->db->update('pesanan', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Pesanan ' . $IdPesanan . ' di tolak
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');

        redirect('pesanan');
    }
    public function batalkanpesanan($IdPesanan, $IdPegawai)
    {
        $data['detail'] = $this->Pesanan_model->getbahanbaku($IdPesanan);

        foreach ($data['detail'] as $dy) {
            $dd = $dy['TersediaM2'] + $dy['digunakan'];
            $this->db->set('TersediaM2', $dd);
            $this->db->where('KdBBaku', $dy['KdBBaku']);
            $this->db->update('bahanbaku');
        }

        $data = array(
            'StatusPesanan' => 'T',
            'FeedBack' => '<br>mohon maaf atas ketidak nyamananya, tapi saat ini kami tidak bisa menerima pesanan<br>Silahkan hubungi kami <a href="http://localhost/konveksi_jpaindo/Front/kontak">disini</a>',
            'IdPegawai' =>  $IdPegawai
        );

        $this->db->where('IdPesanan', $IdPesanan);
        $this->db->update('pesanan', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Konfirmasi pesanan ' . $IdPesanan . ' berhasil di batalkan
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');

        redirect('pesanan');
    }

    public function aktifpembayaran($IdPesanan, $IdPegawai)
    {
        $data = array(
            'StatusPembayaran' => 'Y',
            'FeedBack' => '<br>Kamu telah berhasil melakukan pembayaran<br>Pesanan akan segera kami selesaikan<br>Untuk informasi silahkan hubungi kami <a href="http://localhost/konveksi_jpaindo/Front/kontak">disini</a>',
            'IdPegawai' =>  $IdPegawai
        );

        $this->db->where('IdPesanan', $IdPesanan);
        $this->db->update('pesanan', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Pembayaran pesasnan ' . $IdPesanan . ' telah di konfirmasi.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');

        redirect('pesanan');
    }

    public function naktifpembayaran($IdPesanan, $IdPegawai)
    {
        $data = array(
            'StatusPembayaran' => 'T',
            'FeedBack' => '<br>Ada yang salah dengan bukti pembayaran<br>Untuk informasi silahkan hubungi kami <a href="http://localhost/konveksi_jpaindo/Front/kontak">disini</a>',
            'IdPegawai' =>  $IdPegawai
        );

        $this->db->where('IdPesanan', $IdPesanan);
        $this->db->update('pesanan', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Pembayaran pesanan ' . $IdPesanan . ' Berhasil dibatalkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');

        redirect('pesanan');
    }

    public function hapuspesanan()
    {
        // $IdPesanan = $_POST['id'];
        // $data['redirect'] = 'Pesanan';

        // $this->db->where('IdPesanan', $IdPesanan);
        // $this->db->delete('pesanan');
        // $this->db->where('IdPesanan', $IdPesanan);
        // $this->db->delete('detailpesanan');

        // $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        //     <strong>Congratulation!</strong> Your account has been registration.
        //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //     <span aria-hidden="true">&times;</span>
        //     </button>
        //     </div>');

        // echo json_encode($data);
        $IdPesanan = $_POST['idp'];
        $this->db->where('IdPesanan', $IdPesanan);
        $this->db->delete('pesanan');
        $this->db->where('IdPesanan', $IdPesanan);
        $this->db->delete('detailpesanan');
        $data['redirect'] = 'Pesanan';
        echo json_encode($data);
    }

    public function tampilbahanbaku($IdPesanan)
    {
        $data['detail'] = $this->Pesanan_model->getbahanbaku($IdPesanan);

        $data['title'] = 'Detail Bahanbaku';
        $data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pesanan/konfirmasipesanan', $data);
        $this->load->view('templates/footer', $data);
    }
}
