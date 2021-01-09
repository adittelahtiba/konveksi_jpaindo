<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pola_model extends CI_Model
{
	
	function get_kode()
	{
	    $this->db->select('RIGHT(pola.KdPola,4) as kode', FALSE);
	    $this->db->order_by('KdPola','DESC');    
	    $this->db->limit(1);
		$query = $this->db->get('pola');
		if($query->num_rows() <> 0){      
			$data = $query->row();      
			$kode = intval($data->kode) + 1;    
		}else {      
			$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = "KDP-".$kodemax;
		return $kodejadi;  
    }

    function get_jenispakaian()
	{	
    	return $this->db->get('jenispakaian')->result_array();
	}

	function get_all_pola()
	{	
    	return $this->db->get('pola')->result_array();
	}

	function get_by_id($id)
	{	
		$this->db->where('KdPola', $id);
    	return $this->db->get('pola')->row_array();
	}

	function insert($data)
	{	
		$this->db->insert('pola', $data);
	}

	function update($id, $data)
    {
        $this->db->where('KdPola', $id);
        $this->db->update('pola', $data);
    }

    function delete($id)
    {
    	$this->db->where('KdPola', $id);
        $this->db->delete('pola');
    }

}