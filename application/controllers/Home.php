<?php


class Home extends Controller{

	public function index()
	{
		$data['judul']='Halaman Home';
		$data['jnspkian']=$this->model('Home_model')->getAllJenisPakaian();
		$data['dpsnn']=$this->model('Daftarpesanan_model')->getAllPesanan();
		$this->view('template/Header',$data);
		$this->view('home/index',$data);
		$this->view('pesanpakaian/index',$data);
		$this->view('daftarpesanan/index',$data);
		$this->view('template/Footer');
	}
}