<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Daftarpesanan_model extends CI_Model
{
	private $tPesanan = 'pesanan';
	private $tDPesanan = 'detailpesanan';
	private $tPemesan = 'pemesan';
	private $tBarang = 'barang';
	private $tDesain = 'desain';
	private $tPola = 'pola';
	private $tJenis = 'jenispakaian';

	function __construct()
	{
		parent::__construct();
	}

	public function getAllPesanan()
	{
		$query = $this->db->query('select ' . "IdPesanan,Deskripsi, concat_ws('-',day(TglPesan), CASE
		WHEN Month (TglPesan)=1 THEN 'Januari'
		WHEN Month (TglPesan)=2 THEN 'Februari'
		WHEN Month (TglPesan)=3 THEN 'Maret'
		WHEN Month (TglPesan)=4 THEN 'April'
		WHEN Month (TglPesan)=5 THEN 'Mei'
		WHEN Month (TglPesan)=6 THEN 'Juni'
		WHEN Month (TglPesan)=7 THEN 'Juli'
		WHEN Month (TglPesan)=8 THEN 'Agustus'
		WHEN Month (TglPesan)=9 THEN 'September'
		WHEN Month (TglPesan)=10 THEN 'Oktober'
		WHEN Month (TglPesan)=11 THEN 'November'
		ELSE 'Desember'
		END,year(TglPesan)) as TGL, Nama" . ' from ' . $this->tPemesan . ',' . $this->tPesanan . ' where ' . $this->tPemesan . '.IdPemesan=' . $this->tPesanan . '.IdPemesan');
		return $query->result_array();
	}

	public function getDetailPesananById($idPsnan)
	{
		$query = $this->db->query('select NamaBrg,Ukuran,Harga,Jumlah,
		SubTotal,NamaJenis from ' . $this->tJenis . ' join ' . $this->tPola . ' on 
		' . $this->tJenis . '.KodeJenis=' . $this->tPola . '.KodeJenis join ' . $this->tDesain . ' on 
		' . $this->tDesain . '.KdPola=' . $this->tPola . '.KdPola join ' . $this->tBarang . ' on ' . $this->tBarang . '.KdDesain=
		' . $this->tDesain . '.KdDesain join ' . $this->tDPesanan . ' on ' . $this->tBarang . '.KdBarang=' . $this->tDPesanan . '.KdBarang 
		join ' . $this->tPesanan . ' on ' . $this->tDPesanan . '.Idpesanan=' . $this->tPesanan . '.IdPesanan 
		where ' . $this->tPesanan . ".IdPesanan='" . $idPsnan . "'");
		return $query->result_array();
	}

	public function getIndukDetailPesananById($idPsnan)
	{
		$query = $this->db->query('select * from ' . $this->tPemesan . ',' . $this->tPesanan . ' where ' . $this->tPemesan . '.IdPemesan=' . $this->tPesanan . ".IdPemesan and idPesanan='" . $idPsnan . "'");
		return $query->row_array();
	}

	
}
