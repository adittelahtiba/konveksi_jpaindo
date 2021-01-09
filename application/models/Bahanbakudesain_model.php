<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahanbakudesain_model extends CI_Model
{
	
	function get_kode()
	{
	    $this->db->select('RIGHT(Bahanbakudesain.KodeBBakuDesain,4) as kode', FALSE);
	    $this->db->order_by('KodeBBakuDesain','DESC');    
	    $this->db->limit(1);
		$query = $this->db->get('Bahanbakudesain');
		if($query->num_rows() <> 0){      
			$data = $query->row();      
			$kode = intval($data->kode) + 1;    
		}else {      
			$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = "KDBBD-".$kodemax;
		return $kodejadi;  
    }

    function get_desain()
	{	
    	return $this->db->get('desain')->result_array();
	}

	function get_bahanbaku()
	{	
    	return $this->db->get('bahanbaku')->result_array();
	}

	function get_all_Bahanbakudesain()
	{	
    	return $this->db->get('Bahanbakudesain')->result_array();
	}

	function get_by_id($id)
	{	
		$this->db->where('KodeBBakuDesain', $id);
    	return $this->db->get('Bahanbakudesain')->row_array();
	}

	function insert($data)
	{	
		$this->db->insert('Bahanbakudesain', $data);
	}

	function update($id, $data)
    {
        $this->db->where('KodeBBakuDesain', $id);
        $this->db->update('Bahanbakudesain', $data);
    }

    function delete($id)
    {
    	$this->db->where('KodeBBakuDesain', $id);
        $this->db->delete('Bahanbakudesain');
    }

}