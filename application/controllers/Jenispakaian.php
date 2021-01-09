<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenispakaian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Jenis_model');
	}

	public function index()
	{
		$data['title'] = 'Jenis Pakaian';
		$data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
		$data['jenis'] = $this->Jenis_model->get_all_Jenis();
		
		// $data['edit'] = $this->Jenis_model->get_by_id($id);

		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Jenispakaian/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function getubah()
	{
		echo json_encode($this->Jenis_model->get_by_id($_POST['id']));
	}

	public function delete()
	{
		$data['id'] = $_POST['id'];
		$data['redirect'] = 'Jenispakaian';
		$this->Jenis_model->delete($_POST['id']);
		echo json_encode($data);
	}

	public function add()
	{	
		$kode = $this->Jenis_model->get_kode();
		$this->_rules();
		if (empty($_FILES['GambarJenis']['name']))
		{
		    $this->form_validation->set_rules('GambarJenis', 'GambarJenis', 'required', ['required' => '*Gambar Tidak Boleh Kosong'] );
		}
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
			$config['upload_path']="./assets/img/jenis/";
	        $config['allowed_types']='gif|jpg|png|jpeg';
	        $config['encrypt_name'] = TRUE;
	        

	        $this->load->library('upload',$config);
        	$this->upload->do_upload("GambarJenis");
    		$data['success'] = true;
	    	$data['redirect'] = 'Jenispakaian';
	    	$xx = array('upload_data' => $this->upload->data());    
	    	
	    	$datainsert['KodeJenis'] = $kode;
	    	$datainsert['NamaJenis'] = $this->input->post('NamaJenis',TRUE);
	    	$datainsert ['GambarJenis'] = $xx['upload_data']['file_name'];
			$this->Jenis_model->insert($datainsert);
			$this->session->set_flashdata('message', 'Berhasil ditambah!');
        	echo json_encode($data);
		}
		
	}

	public function edit()
	{
		$this->_rules();
		$this->form_validation->set_rules('KodeJenis', 'KodeJenis', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
		if ($this->form_validation->run()) {
			$config['upload_path']="./assets/img/jenis/";
	        $config['allowed_types']='gif|jpg|png|jpeg';
	        $config['encrypt_name'] = TRUE;
	        

	        $this->load->library('upload',$config);
        	if($this->upload->do_upload("GambarJenis")){
		    	$xx = array('upload_data' => $this->upload->data());    
		    	$dataip ['GambarJenis'] = $xx['upload_data']['file_name'];
        	}
        	$data['success'] = true;
        	$data['redirect'] = 'Jenispakaian';
        	$dataip['NamaJenis'] = $this->input->post('NamaJenis');
	        $result= $this->Jenis_model->update($this->input->post('KodeJenis'), $dataip);
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
		$this->form_validation->set_rules('NamaJenis', 'NamaJenis', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
    	$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
    }

}