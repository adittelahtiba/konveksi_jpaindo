<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model
{
	
	function get_kode()
	{
	    $this->db->select('RIGHT(Barang.KdBarang,4) as kode', FALSE);
	    $this->db->order_by('KdBarang','DESC');    
	    $this->db->limit(1);
		$query = $this->db->get('Barang');
		if($query->num_rows() <> 0){      
			$data = $query->row();      
			$kode = intval($data->kode) + 1;    
		}else {      
			$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = "KDB-".$kodemax;
		return $kodejadi;  
    }

    function get_desain()
	{	
    	return $this->db->get('desain')->result_array();
	}

	function get_all_Barang()
	{	
    	return $this->db->get('Barang')->result_array();
	}

	function get_by_id($id)
	{	
		$this->db->where('KdBarang', $id);
    	return $this->db->get('Barang')->row_array();
	}

	function insert($data)
	{	
		$this->db->insert('Barang', $data);
	}

	function update($id, $data)
    {
        $this->db->where('KdBarang', $id);
        $this->db->update('Barang', $data);
    }

    function delete($id)
    {
    	$this->db->where('KdBarang', $id);
        $this->db->delete('Barang');
    }

}