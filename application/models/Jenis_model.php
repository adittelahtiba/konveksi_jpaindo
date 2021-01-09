<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_model extends CI_Model
{
	
	function get_kode()
	{
	    $this->db->select('RIGHT(jenispakaian.KodeJenis,4) as kode', FALSE);
	    $this->db->order_by('KodeJenis','DESC');    
	    $this->db->limit(1);
		$query = $this->db->get('jenispakaian');
		if($query->num_rows() <> 0){      
			$data = $query->row();      
			$kode = intval($data->kode) + 1;    
		}else {      
			$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = "KDJ-".$kodemax;
		return $kodejadi;   
    }

	function get_all_jenis()
	{	
    	return $this->db->get('jenispakaian')->result_array();
	}

	function get_by_id($id)
	{	
		$this->db->where('KodeJenis', $id);
    	return $this->db->get('jenispakaian')->row_array();
	}

	function insert($data)
	{	
		$this->db->insert('jenispakaian', $data);
	}

	function update($id, $data)
    {
        $this->db->where('KodeJenis', $id);
        $this->db->update('jenispakaian', $data);
    }

    function delete($id)
    {
    	$this->db->where('KodeJenis', $id);
        $this->db->delete('jenispakaian');
    }

}