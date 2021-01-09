<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftarpesanan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Daftarpesanan_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	public function index()
	{
		$data['judul'] = 'Daftar Pesanan';
		$data['dpsnn'] = $this->Daftarpesanan_model->getAllPesanan();
		// $this->load->view('template/Header',$data);
		$this->load->view('daftarpesanan/index', $data);
		// $this->load->view('template/Footer');
	}

	public function detail($idPsnan)
	{
		$data['judul'] = 'Detail Pesanan';
		$data['induk'] = $this->Daftarpesanan_model->getIndukDetailPesananById($idPsnan);
		$data['detail'] = $this->Daftarpesanan_model->getDetailPesananById($idPsnan);
		// $this->load->view('template/Header',$data);
		$this->load->view('daftarpesanan/detail', $data);
		// $this->load->view('template/Footer');

	}
	public function buktipembayaran($idPsnan)
	{
		// var_dump($_POST);
		// echo "<hr>";
		// var_dump($_FILES);
		$this->form_validation->set_rules('bukti', 'gggggrrrrrrrrrrrrrrr', 'required|trim');
		$upload = $_FILES['bukti']['name'];
		// echo "<hr>";
		if ($upload) {
			$config['upload_path'] = './assets/img/buktipembayaran/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '2048';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('bukti')) {
				$error = array('error' => $this->upload->display_errors());
				echo "gagal";
			} else {
				$data = array('upload_data' => $this->upload->data());
				$filebukti = $this->upload->data('file_name');
				$this->db->set('BuktiPembayaran', $filebukti);
				$this->db->set('FeedBack', '<br>Bukti Pembayaran sudah kami terima<br>Tunggu konfirmasi berikutnya');
				$this->db->where('IdPesanan', $idPsnan);
				$this->db->update('pesanan');
				redirect('Front/detail/' . $idPsnan);
			}

			// Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
			$this->upload->initialize($config);
		}
		//	if ($this->form_validation->run() == false) { } else { }

	}
}
