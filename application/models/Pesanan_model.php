<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pesanan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getbahanbaku($IdPesanan)
    {
        $query = $this->db->query("select pesanan.IdPesanan,StatusPesanan,bahanbaku.KdBBaku,NamaBBaku,Jenis,TersediaM2,ukuranbbdm2,sum(jumlah) as jumlah,
        (truncate(ukuranbbdm2*sum(jumlah),3))as digunakan,(tersediam2-ukuranbbdm2*sum(jumlah)) as sisa, 
        if((tersediam2-ukuranbbdm2*jumlah)>=0,'Y','T')as StatusBB from bahanbaku,bahanbakudesain,
        desain,barang,detailpesanan,pesanan where bahanbaku.kdbbaku=bahanbakudesain.kdbbaku and 
        desain.kddesain=bahanbakudesain.kddesain and barang.kddesain=desain.kddesain and detailpesanan.kdbarang=
        barang.kdbarang and detailpesanan.idpesanan=pesanan.idpesanan and pesanan.idpesanan='" . $IdPesanan . "' GROUP by bahanbaku.KdBBaku");
        return $query->result_array();
    }

    function get_report()
    {   
        $this->db->select("IdDPesanan, detailpesanan.IdPesanan, pesanan.IdPemesan, Nama, NamaBrg, Ukuran, Harga, Jumlah, SubTotal, TglPesan, TglPesan");

        $this->db->join('pesanan', 'detailpesanan.IdPesanan = pesanan.IdPesanan');
        $this->db->join('pemesan', 'pesanan.IdPemesan = pemesan.IdPemesan');
        $this->db->join('barang', 'detailpesanan.KdBarang = barang.KdBarang');
        $this->db->join('desain', 'barang.KdDesain = desain.KdDesain');
        $this->db->join('pola', 'desain.KdPola = pola.KdPola');
        $this->db->join('jenispakaian', 'pola.KodeJenis = jenispakaian.KodeJenis');
        $this->db->from('detailpesanan');
        $this->db->order_by('pesanan.IdPesanan', 'DESC');
        
        return $this->db->get();
    }
}
