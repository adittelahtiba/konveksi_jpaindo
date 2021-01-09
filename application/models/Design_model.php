<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Design_model extends CI_Model
{
	
	function get_kode()
	{
	    $this->db->select('RIGHT(desain.KdDesain,4) as kode', FALSE);
	    $this->db->order_by('KdDesain','DESC');    
	    $this->db->limit(1);
		$query = $this->db->get('desain');
		if($query->num_rows() <> 0){      
			$data = $query->row();      
			$kode = intval($data->kode) + 1;    
		}else {      
			$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = "KDD-".$kodemax;
		return $kodejadi;  
    }

    function get_pola()
	{	
    	return $this->db->get('pola')->result_array();
	}

	function get_all_design()
	{	
    	return $this->db->get('desain')->result_array();
	}

	function get_by_id($id)
	{	
		$this->db->where('KdDesain', $id);
    	return $this->db->get('desain')->row_array();
	}

	function insert($data)
	{	
		$this->db->insert('desain', $data);
	}

	function update($id, $data)
    {
        $this->db->where('KdDesain', $id);
        $this->db->update('desain', $data);
    }

    function delete($id)
    {
    	$this->db->where('KdDesain', $id);
        $this->db->delete('desain');
    }

}