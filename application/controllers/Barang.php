<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Barang_model');
	}

	public function index()
	{
		$data['title'] = 'Barang';
		$data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
		$data['barang'] = $this->Barang_model->get_all_Barang();
		$data['desain'] = $this->Barang_model->get_desain();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Barang/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function getubah()
	{
		echo json_encode($this->Barang_model->get_by_id($_POST['id']));
	}

	public function delete()
	{
		$data['id'] = $_POST['id'];
		$data['redirect'] = 'Barang';
		$this->Barang_model->delete($_POST['id']);
		echo json_encode($data);
	}

	public function add()
	{	
		$this->_rules();
		if ($this->form_validation->run() == false) {
			$data['success'] = false;
			foreach ($_POST as $key => $value) {
				$data['messages'][$key]= form_error($key);
			}
			foreach ($_FILES as $key => $value) {
				$data['messages'][$key]= form_error($key);
			}
			echo json_encode($data);
		}else{
			$kode = $this->Barang_model->get_kode();
			
			$data['success'] = true;
	    	$data['redirect'] = 'Barang';
	    	
	    	$datainsert['KdBarang'] = $kode;
	    	$datainsert['Ukuran'] = $this->input->post('Ukuran',TRUE);
	    	$datainsert['Harga'] = $this->input->post('Harga',TRUE);
	    	$datainsert['NamaBrg'] = $this->input->post('NamaBrg',TRUE);
	    	$datainsert['KdDesain'] = $this->input->post('KdDesain',TRUE);
			$result = $this->Barang_model->insert($datainsert);
			$this->session->set_flashdata('message', 'Berhasil ditambah!');
        	echo json_encode($data);
		}
		
	}

	public function edit()
	{
		$this->_rules();
		if ($this->form_validation->run()) {
			$data['success'] = true;
        	$data['redirect'] = 'Barang';
        	
        	$dataip['Ukuran'] = $this->input->post('Ukuran',TRUE);
	    	$dataip['Harga'] = $this->input->post('Harga',TRUE);
	    	$dataip['NamaBrg'] = $this->input->post('NamaBrg',TRUE);
	    	$dataip['KdDesain'] = $this->input->post('KdDesain',TRUE);
        	$result= $this->Barang_model->update($this->input->post('KdBarang'), $dataip);
        	$this->session->set_flashdata('message', 'Berhasil diubah!');
	        echo json_encode($data);
		}else{
			$data['success'] = false;
			foreach ($_POST as $key => $value) {
				$data['messages'][$key]= form_error($key);
			}
			foreach ($_FILES as $key => $value) {
				$data['messages'][$key]= form_error($key);
			}
			echo json_encode($data);

		}
		
	}

	public function _rules() 
    {
		$this->form_validation->set_rules('Harga', 'Harga', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
		$this->form_validation->set_rules('Ukuran', 'Ukuran', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
    	$this->form_validation->set_rules('NamaBrg', 'NamaBrg', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
    	$this->form_validation->set_rules('KdDesain', 'KdDesain', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
    	
    	$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
    }

}