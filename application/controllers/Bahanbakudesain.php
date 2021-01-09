<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahanbakudesain extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Bahanbakudesain_model');
	}

	public function index()
	{
		$data['title'] = 'Bahan Baku Desain';
		$data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
		$data['Bahanbakudesain'] = $this->Bahanbakudesain_model->get_all_Bahanbakudesain();
		$data['desain'] = $this->Bahanbakudesain_model->get_desain();
		$data['bahanbaku'] = $this->Bahanbakudesain_model->get_bahanbaku();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Bahanbakudesain/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function getubah()
	{
		echo json_encode($this->Bahanbakudesain_model->get_by_id($_POST['id']));
	}

	public function delete()
	{
		$data['id'] = $_POST['id'];
		$data['redirect'] = 'Bahanbakudesain';
		$this->Bahanbakudesain_model->delete($_POST['id']);
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
			$kode = $this->Bahanbakudesain_model->get_kode();
			
			$data['success'] = true;
	    	$data['redirect'] = 'Bahanbakudesain';
	    	
	    	$datainsert['KodeBBakuDesain'] = $kode;
	    	$datainsert['UkuranBBDM2'] = $this->input->post('UkuranBBDM2',TRUE);
	    	$datainsert['KdBBaku'] = $this->input->post('KdBBaku',TRUE);
	    	$datainsert['KdDesain'] = $this->input->post('KdDesain',TRUE);
			$result = $this->Bahanbakudesain_model->insert($datainsert);
			$this->session->set_flashdata('message', 'Berhasil ditambah!');
        	echo json_encode($data);
		}
		
	}

	public function edit()
	{
		$this->_rules();
		if ($this->form_validation->run()) {
			
			$data['success'] = true;
        	$data['redirect'] = 'Bahanbakudesain';
        	
        	$dataip['UkuranBBDM2'] = $this->input->post('UkuranBBDM2');
        	$dataip['KdDesain'] = $this->input->post('KdDesain');
        	$dataip['KdBBaku'] = $this->input->post('KdBBaku');
        	$this->session->set_flashdata('message', 'Berhasil diubah!');
        	$result= $this->Bahanbakudesain_model->update($this->input->post('KodeBBakuDesain'), $dataip);

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
		$this->form_validation->set_rules('KdBBaku', 'KdBBaku', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
    	$this->form_validation->set_rules('UkuranBBDM2', 'UkuranBBDM2', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
    	$this->form_validation->set_rules('KdDesain', 'KdDesain', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
    	
    	$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
    }

}