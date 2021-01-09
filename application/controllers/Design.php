<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Design extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Design_model');
	}

	public function index()
	{
		$data['title'] = 'Design';
		$data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
		$data['design'] = $this->Design_model->get_all_design();
		$data['pola'] = $this->Design_model->get_Pola();
		// $data['edit'] = $this->Design_model->get_by_id($id);

		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Design/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function getubah()
	{
		echo json_encode($this->Design_model->get_by_id($_POST['id']));
	}

	public function delete()
	{
		$data['id'] = $_POST['id'];
		$data['redirect'] = 'Design';
		$this->Design_model->delete($_POST['id']);
		echo json_encode($data);
	}

	public function add()
	{	
		$this->_rules();
		if (empty($_FILES['GbrDesain']['name']))
		{
		    $this->form_validation->set_rules('GbrDesain', 'GbrDesain', 'required', ['required' => '*Gambar Tidak Boleh Kosong'] );
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
			$kode = $this->Design_model->get_kode();
			
			$config['upload_path']="./assets/img/design/";
	        $config['allowed_types']='gif|jpg|png|jpeg';
	        $config['encrypt_name'] = TRUE;
	        

	        $this->load->library('upload',$config);
        	$this->upload->do_upload("GbrDesain");
    		$data['success'] = true;
	    	$data['redirect'] = 'Design';
	    	$xx = array('upload_data' => $this->upload->data());    
	    	$datainsert['KdDesain'] = $kode;
	    	$datainsert ['GbrDesain'] = $xx['upload_data']['file_name'];
			$datainsert['KdPola'] = $this->input->post('KdPola',TRUE);
			$result = $this->Design_model->insert($datainsert);
			$this->session->set_flashdata('message', 'Berhasil ditambah!');
        	echo json_encode($data);
		}
		
	}

	public function edit()
	{
		$this->_rules();
		$this->form_validation->set_rules('KdDesain', 'KdDesain', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
		if ($this->form_validation->run()) {
			$config['upload_path']="./assets/img/design/";
	        $config['allowed_types']='gif|jpg|png|jpeg';
	        $config['encrypt_name'] = TRUE;
	        

	        $this->load->library('upload',$config);
        	if($this->upload->do_upload("GbrDesain")){
		    	$xx = array('upload_data' => $this->upload->data());    
		    	$dataip ['GbrDesain'] = $xx['upload_data']['file_name'];
        	}
        	$data['success'] = true;
        	$data['redirect'] = 'Design';
        	$dataip['KdPola'] = $this->input->post('KdPola');
	        $result= $this->Design_model->update($this->input->post('KdDesain'), $dataip);
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

    	$this->form_validation->set_rules('KdPola', 'KdPola', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
    	
    	$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
    }

}