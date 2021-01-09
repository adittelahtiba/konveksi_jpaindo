<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahanbaku_model extends CI_Model
{
	
	function get_kode()
	{
	    $this->db->select('RIGHT(bahanbaku.KdBBaku,4) as kode', FALSE);
	    $this->db->order_by('KdBBaku','DESC');    
	    $this->db->limit(1);
		$query = $this->db->get('bahanbaku');
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

	function get_all_bahanbaku()
	{	
    	return $this->db->get('bahanbaku')->result_array();
	}

	function get_by_id($id)
	{	
		$this->db->where('KdBBaku', $id);
    	return $this->db->get('bahanbaku')->row_array();
	}

	function insert($data)
	{	
		$this->db->insert('bahanbaku', $data);
	}

	function update($id, $data)
    {
        $this->db->where('KdBBaku', $id);
        $this->db->update('bahanbaku', $data);
    }

    function delete($id)
    {
    	$this->db->where('KdBBaku', $id);
        $this->db->delete('bahanbaku');
    }

}