<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{

 //    private $table='jenispakaian';
	// private $db;

	// public function __construct()
	// {
	// 	$this->db = new Database;
	// }
    
 //    public function getAllJenisPakaian()
	// {
	// 	$this->db->query('select * from '.$this->table);
	// 	return $this->db->resultSet();
	// }

	function get_chart()
	{
        $query = $this->db->query("SELECT DATE_FORMAT(TglPesan, '%b') AS 'bulan', count(IdPesanan) AS jumlah FROM pesanan where DATE_FORMAT(TglPesan, '%Y') = DATE_FORMAT(now(), '%Y') GROUP BY DATE_FORMAT(TglPesan, '%b')");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}