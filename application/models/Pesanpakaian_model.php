<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Pesanpakaian_model extends CI_Model
{
	private $tBahanbaku = 'bahanbaku';
	private $tBahanbakudesain = 'bahanbakudesain';
	private $tPesanan = 'pesanan';
	private $tDetailpesanan = 'detailpesanan';
	private $tPemesan = 'pemesan';
	private $tBarang = 'barang';
	private $tDesain = 'desain';
	private $tJenispakaian = 'jenispakaian';
	private $tPola = 'pola';

	function __construct()
	{
		parent::__construct();
	}

	public function getAllJenisPakaian()
	{
		$query = $this->db->query("select * from " . $this->tJenispakaian);
		return $query->result_array();
	}

	public function getAllDesainByJenisPakaian()
	{
		$query = $this->db->query("SELECT KdDesain, GbrDesain, jenispakaian.KodeJenis FROM desain,pola,jenispakaian WHERE desain.KdPola=pola.KdPola and pola.KodeJenis=jenispakaian.KodeJenis");
		return $query->result_array();
	}

	public function getAllPola($JenisPakaian)
	{
		$query = $this->db->query('select*from ' . $this->tJenispakaian . '  join ' . $this->tPola . '  on ' . $this->tJenispakaian . '.KodeJenis=' . $this->tPola . '.KodeJenis where ' . $this->tJenispakaian . ".KodeJenis='" . $JenisPakaian . "'");
		return $query->result_array();
	}

	public function getAllDesain($Desain)
	{
		$query = $this->db->query('select*from ' . $this->tDesain . '  join ' . $this->tPola . '  on ' . $this->tDesain . '.KdPola=' . $this->tPola . '.KdPola where ' . $this->tDesain . ".KdPola='" . $Desain . "'");
		return $query->result_array();
	}

	public function getGambar($JenisPakaian, $Pola, $Desain)
	{
		$query = $this->db->query('select * from ' . $this->tPola . ',' . $this->tDesain . ',' . $this->tJenispakaian . ' where ' . $this->tJenispakaian . ".KodeJenis='" . $JenisPakaian . "'  and " . $this->tPola . ".KdPola='" . $Pola . "' and KdDesain='" . $Desain . "'");
		return $query->row_array();
	}

	public function getBarang($JenisPakaian, $Pola, $Desain)
	{
		$query = $this->db->query('select * from ' . $this->tBarang . ',' . $this->tPola . ',' . $this->tDesain . ',' . $this->tJenispakaian . ' where ' . $this->tJenispakaian . ".KodeJenis='" . $JenisPakaian . "'  and " . $this->tPola . ".KdPola='" . $Pola . "' and " . $this->tDesain . ".KdDesain='" . $Desain . "' and " . $this->tBarang . ".KdDesain=" . $this->tDesain . ".KdDesain order by Harga");
		return $query->result_array();
	}

	public function getNamaJenispakaian($JenisPakaian)
	{
		$query = $this->db->query('select*from ' . $this->tJenispakaian . '  where ' . $this->tJenispakaian . ".KodeJenis='" . $JenisPakaian . "'");
		return $query->row_array();
	}

	public function getHarga($Desain)
	{
		$query = $this->db->query('select * from barang where ' . $this->tBarang . ".KdDesain='" . $Desain . "'");
		return $query->result_array();
	}

	public function inputPesananBaruDB($pesananBaru, $IdBaru, $IdBaruDPS, $IdBaruDPM, $IdBaruDPL, $IdBaruDPXL, $IdBaruDPXXL, $IdPemesan)
	{
		$this->db->query("INSERT INTO pesanan
		(IdPesanan, TglPesan, Deskripsi, TotalHarga, IdPemesan) 
		VALUES 
		(" . $IdBaru . ",now(),'" . $pesananBaru['Deskripsi'] . "'," . $pesananBaru['total'] . "," . $IdPemesan . ")");
		if ($pesananBaru['jumlahS'] == '') $pesananBaru['jumlahS'] = 0;
		if ($pesananBaru['jumlahM'] == '') $pesananBaru['jumlahM'] = 0;
		if ($pesananBaru['jumlahL'] == '') $pesananBaru['jumlahL'] = 0;
		if ($pesananBaru['jumlahXL'] == '') $pesananBaru['jumlahXL'] = 0;
		if ($pesananBaru['jumlahXXL'] == '') $pesananBaru['jumlahXXL'] = 0;
		$this->db->query("INSERT INTO detailpesanan
		(IdDPesanan, Jumlah, SubTotal, IdPesanan, KdBarang) 
		VALUES 
		(" . $IdBaruDPS . "," . $pesananBaru['jumlahS'] . "," . $pesananBaru['hargaS'] . "," . $IdBaru . ",'" . $pesananBaru['barangS'] . "'),
		(" . $IdBaruDPM . "," . $pesananBaru['jumlahM'] . "," . $pesananBaru['hargaM'] . "," . $IdBaru . ",'" . $pesananBaru['barangM'] . "'),
		(" . $IdBaruDPL . "," . $pesananBaru['jumlahL'] . "," . $pesananBaru['hargaL'] . "," . $IdBaru . ",'" . $pesananBaru['barangL'] . "'),
		(" . $IdBaruDPXL . "," . $pesananBaru['jumlahXL'] . "," . $pesananBaru['hargaXL'] . "," . $IdBaru . ",'" . $pesananBaru['barangXL'] . "'),
		(" . $IdBaruDPXXL . "," . $pesananBaru['jumlahXXL'] . "," . $pesananBaru['hargaXXL'] . "," . $IdBaru . ",'" . $pesananBaru['barangXXL'] . "')");

		$this->db->query("INSERT INTO pemesan
		(IdPemesan, Nama, Alamat, Desa, Kecamatan, KabOrKota, NoTelp, Email) 
		VALUES 
		(" . $IdPemesan . ",'" . $pesananBaru['Nama'] . "','" . $pesananBaru['Alamat'] . "','" . $pesananBaru['Desa'] . "','" . $pesananBaru['Kecamatan'] . "','" . $pesananBaru['KabOrKota'] . "','" . $pesananBaru['Email'] . "','" . $pesananBaru['notelp'] . "')");
	}
}
