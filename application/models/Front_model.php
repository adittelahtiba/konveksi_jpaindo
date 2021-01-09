<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_model extends CI_Model
{

	function get_kodepesan()
	{
	    $this->db->select('RIGHT(pesanan.IdPesanan,4) as kode', FALSE);
	    $this->db->order_by('IdPesanan','DESC');    
	    $this->db->limit(1);
		$query = $this->db->get('pesanan');
		if($query->num_rows() <> 0){      
			$data = $query->row();      
			$kode = intval($data->kode) + 1;    
		}else {      
			$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = "ORDER-" . date("d-m-y") .$kodemax;
		return $kodejadi;  
    }

    function get_kodedetail()
	{
	    $this->db->select('RIGHT(detailpesanan.IdDPesanan,4) as kode', FALSE);
	    $this->db->order_by('IdDPesanan','DESC');    
	    $this->db->limit(1);
		$query = $this->db->get('detailpesanan');
		if($query->num_rows() <> 0){      
			$data = $query->row();      
			$kode = intval($data->kode) + 1;    
		}else {      
			$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = "ORDER-" . date("d-m-y") .$kodemax;
		return $kodejadi;  
    }

    function get_kodepemesan()
	{
	    $this->db->select('RIGHT(pemesan.IdPemesan,4) as kode', FALSE);
	    $this->db->order_by('IdPemesan','DESC');    
	    $this->db->limit(1);
		$query = $this->db->get('pemesan');
		if($query->num_rows() <> 0){      
			$data = $query->row();      
			$kode = intval($data->kode) + 1;    
		}else {      
			$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = "IdP-" .$kodemax;
		return $kodejadi;  
    }


	function get_limit_jenis()
	{	
		$this->db->order_by('jenispakaian.KodeJenis', 'ASC');
    	return $this->db->get('jenispakaian')->result_array();
	}

	function get_barang_by_kddesain($id)
	{	
		$this->db->join('desain', 'barang.KdDesain = desain.KdDesain');
		$this->db->join('pola', 'desain.KdPola = pola.KdPola');
		$this->db->join('jenispakaian', 'pola.KodeJenis = jenispakaian.KodeJenis');
		
		$this->db->where('barang.KdDesain', $id);
		return $this->db->get('barang')->result_array();
	}

	function get_jenis_by_kddesain($id)
	{	
		$this->db->join('pola', 'pola.KodeJenis = jenispakaian.KodeJenis');
		$this->db->join('desain', 'desain.KdPola = pola.KdPola');
		$this->db->join('barang', 'barang.KdDesain = desain.KdDesain');
		
		$this->db->where('barang.KdDesain', $id);
		return $this->db->get('jenispakaian')->row();
	}

	function get_pola_by_kdjenis($id)
	{	
		$this->db->where('KodeJenis', $id);
		return $this->db->get('pola')->result_array();
	}

	function get_design($id)
	{	
		$this->db->where('KdDesain', $id);
		return $this->db->get('desain')->row();
	}

	function get_allpesanan()
	{	
		$this->db->join('pemesan', 'pemesan.IdPemesan = pesanan.IdPemesan');
		return $this->db->get('pesanan')->result_array();
	}

	// function get_allpp()
 //    {
 //        $this->db->order_by('IdPesanan', 'DESC');

 //        return $this->db->get('pesanan')->result();
 //    }

	function get_pesananby_id($id)
	{	
		$this->db->join('pemesan', 'pemesan.IdPemesan = pesanan.IdPemesan');
		$this->db->where('pesanan.IdPesanan', $id);
		return $this->db->get('pesanan')->row_array();
	}

	function get_all($id)
	{	
		$this->db->join('pesanan', 'detailpesanan.IdPesanan = pesanan.IdPesanan');
		$this->db->join('pemesan', 'pesanan.IdPemesan = pemesan.IdPemesan');
		$this->db->join('barang', 'detailpesanan.KdBarang = barang.KdBarang');
		$this->db->join('desain', 'barang.KdDesain = desain.KdDesain');
		$this->db->join('pola', 'desain.KdPola = pola.KdPola');
		$this->db->join('jenispakaian', 'pola.KodeJenis = jenispakaian.KodeJenis');

		$this->db->where('detailpesanan.IdPesanan', $id);
		return $this->db->get('detailpesanan')->result_array();
	}

	function get_report()
	{	
		$this->db->join('pesanan', 'detailpesanan.IdPesanan = pesanan.IdPesanan');
		$this->db->join('pemesan', 'pesanan.IdPemesan = pemesan.IdPemesan');
		$this->db->join('barang', 'detailpesanan.KdBarang = barang.KdBarang');
		$this->db->join('desain', 'barang.KdDesain = desain.KdDesain');
		$this->db->join('pola', 'desain.KdPola = pola.KdPola');
		$this->db->join('jenispakaian', 'pola.KodeJenis = jenispakaian.KodeJenis');
		$this->db->order_by('pesanan.IdPesanan', 'DESC');
		return $this->db->get('detailpesanan')->result();
	}

	function get_desain_by_kdpola($id)
	{	
		$this->db->where('KdPola', $id);
		return $this->db->get('desain')->result_array();
	}

	function get_limit1_jenis()
	{	
		$this->db->limit(2, 0);
		$this->db->order_by('jenispakaian.KodeJenis', 'ASC');
    	return $this->db->get('jenispakaian')->result_array();
	}

	function get_limit2_jenis()
	{	
		$this->db->limit(2, 2);
		$this->db->order_by('jenispakaian.KodeJenis', 'ASC');
    	return $this->db->get('jenispakaian')->result_array();
	}

	function insertdatapesan($data)
	{	
		$this->db->insert('pesanan', $data);
	}

	function insertdatapemesan($data)
	{	
		$this->db->insert('pemesan', $data);
	}

	function insertdetailpesanan($data)
	{	
		$this->db->insert_batch('detailpesanan', $data);
	}
}