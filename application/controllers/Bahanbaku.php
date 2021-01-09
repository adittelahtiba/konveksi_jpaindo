<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahanbaku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Bahanbaku_model');
	}

	public function index()
	{
		$data['title'] = 'Bahan Baku';
		$data['bahanbaku'] = $this->Bahanbaku_model->get_all_bahanbaku();
		$data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('BahanBaku/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function add()
	{
		$data['title'] = 'Bahan Baku';
		$data['bahanbaku'] = $this->Bahanbaku_model->get_all_bahanbaku();
		$data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();

		$this->_rules();
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('BahanBaku/add', $data);
			$this->load->view('templates/footer');
		}else{
			$kode = $this->Bahanbaku_model->get_kode();
			$data = [
				'KdBBaku' => $kode,
				'NamaBBaku' => $this->input->post('NamaBBaku',TRUE),
				'jenis' => $this->input->post('jenis',TRUE),
				'warna' => $this->input->post('warna',TRUE),
				'HargaPerM2' => $this->input->post('HargaPerM2',TRUE),
				'TersediaM2' => $this->input->post('TersediaM2',TRUE),
			];

			$this->Bahanbaku_model->insert($data);
			$this->session->set_flashdata('message', 'Berhasil ditambah!');
			redirect('Bahanbaku');
		}
		
	}

	public function edit($id)
	{
		$data['title'] = 'Bahan Baku';
		$data['bahanbaku'] = $this->Bahanbaku_model->get_by_id($id);
		$data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();

		if ($data['bahanbaku']) {
			$this->_rules();
			if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('BahanBaku/edit', $data);
				$this->load->view('templates/footer');
			}else{
				$data = [
					'NamaBBaku' => $this->input->post('NamaBBaku',TRUE),
					'jenis' => $this->input->post('jenis',TRUE),
					'warna' => $this->input->post('warna',TRUE),
					'HargaPerM2' => $this->input->post('HargaPerM2',TRUE),
					'TersediaM2' => $this->input->post('TersediaM2',TRUE),
				];

				$this->Bahanbaku_model->update($this->input->post('KdBBaku'), $data);
				$this->session->set_flashdata('message', 'Berhasil diubah!');
				redirect('Bahanbaku');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"Data tidak ada!</div>');
			redirect('Bahanbaku');
		}
		
	}

	public function delete()
	{
		$data['id'] = $_POST['id'];
		$data['redirect'] = 'BahanBaku';
		$this->Bahanbaku_model->delete($_POST['id']);
		echo json_encode($data);
	}

	public function _rules() 
    {
    	$this->form_validation->set_rules('NamaBBaku', 'NamaBBaku', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
    	$this->form_validation->set_rules('jenis', 'jenis', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
    	$this->form_validation->set_rules('warna', 'warna', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
    	$this->form_validation->set_rules('HargaPerM2', 'HargaPerM2', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
    	$this->form_validation->set_rules('TersediaM2', 'TersediaM2', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
    }

}