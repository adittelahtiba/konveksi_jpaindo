<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pola extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('pola_model');
	}

	public function index()
	{
		$data['title'] = 'Pola';
		$data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
		$data['pola'] = $this->pola_model->get_all_pola();
		$data['jenispakaian'] = $this->pola_model->get_jenispakaian();
		// $data['edit'] = $this->pola_model->get_by_id($id);

		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pola/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function getubah()
	{
		echo json_encode($this->pola_model->get_by_id($_POST['id']));
	}

	public function delete()
	{
		$data['id'] = $_POST['id'];
		$data['redirect'] = 'pola';
		$this->pola_model->delete($_POST['id']);
		echo json_encode($data);
	}

	public function add()
	{	
		$this->_rules();
		if (empty($_FILES['GbrPola']['name']))
		{
		    $this->form_validation->set_rules('GbrPola', 'GbrPola', 'required', ['required' => '*Gambar Tidak Boleh Kosong'] );
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
			$kode = $this->pola_model->get_kode();
			
			$config['upload_path']="./assets/img/pola/";
	        $config['allowed_types']='gif|jpg|png|jpeg';
	        $config['encrypt_name'] = TRUE;
	        

	        $this->load->library('upload',$config);
        	$this->upload->do_upload("GbrPola");
    		$data['success'] = true;
	    	$data['redirect'] = 'pola';
	    	$xx = array('upload_data' => $this->upload->data());    
	    	
	    	$datainsert['KdPola'] = $kode;
	    	$datainsert ['GbrPola'] = $xx['upload_data']['file_name'];
			$datainsert['KodeJenis'] = $this->input->post('KodeJenis',TRUE);
			$result = $this->pola_model->insert($datainsert);
			$this->session->set_flashdata('message', 'Berhasil ditambah!');
        	echo json_encode($data);
		}
		
	}

	public function edit()
	{
		$this->_rules();
		$this->form_validation->set_rules('KdPola', 'KdPola', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
		if ($this->form_validation->run()) {
			$config['upload_path']="./assets/img/pola/";
	        $config['allowed_types']='gif|jpg|png|jpeg';
	        $config['encrypt_name'] = TRUE;
	        

	        $this->load->library('upload',$config);
        	if($this->upload->do_upload("GbrPola")){
		    	$xx = array('upload_data' => $this->upload->data());    
		    	$dataip ['GbrPola'] = $xx['upload_data']['file_name'];
        	}
        	$data['success'] = true;
        	$data['redirect'] = 'pola';
        	$dataip['KodeJenis'] = $this->input->post('KodeJenis');
        	$this->session->set_flashdata('message', 'Berhasil diubah!');
	        $result= $this->pola_model->update($this->input->post('KdPola'), $dataip);

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

    	$this->form_validation->set_rules('KodeJenis', 'KodeJenis', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
    	
    	$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
    }

}