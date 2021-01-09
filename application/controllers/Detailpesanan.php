<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detailpesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pesanan_model');
        $this->load->library('form_validation');
        $this->load->helper('file');
        $this->load->library('PHPExcel');
        $this->load->library('PHPExcel/IOFactory');

    }

    public function index()
    {
        $data['title'] = 'Detail Pesanan';
        $data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
        $data['dpesanan'] = $this->db->get('detailpesanan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pesanan/detailpesanan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function updatedp($IdDPesanan)
    {
        $data = array(
            'Jumlah' => $_POST['jumlah']
        );

        $this->db->where('IdDPesanan', $IdDPesanan);
        $this->db->update('detailpesanan', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulation!</strong> Your account has been registration.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');

        redirect('detailpesanan');
    }

    public function hapuspesanan()
    {

        

        $IdDPesanan = $_POST['idp'];
        $this->db->where('IdDPesanan', $IdDPesanan);
        $this->db->delete('detailpesanan');
        $data['redirect'] = 'detailpesanan';
        echo json_encode($data);
    }

    public function excel()
    {
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setTitle("Laporan Data Penjualan");
        $objPHPExcel->setActiveSheetIndex(0);

        // Header laporan
        $objPHPExcel->getActiveSheet()->setCellValue('A1','Laporan Data Penjualan');
        $objPHPExcel->getActiveSheet()->mergeCells('A1:C1');
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        // Tanggal laporan
        $today = date("d-m-Y");
        $objPHPExcel->getActiveSheet()->setCellValue('C3','Tanggal: '.$today);
        $objPHPExcel->getActiveSheet()->getStyle('C3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $objPHPExcel->getActiveSheet()->getStyle('C3')->getFont()->setBold(true);

        // Header tabel produk
        

        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);

        $objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(15);

        $objPHPExcel->getActiveSheet()->setCellValue('B5','ID Detail Pesanan');
        $objPHPExcel->getActiveSheet()->setCellValue('C5','ID Pesanan');
        $objPHPExcel->getActiveSheet()->setCellValue('D5','ID Pemesan');
        $objPHPExcel->getActiveSheet()->setCellValue('E5','Nama');
        $objPHPExcel->getActiveSheet()->setCellValue('F5','Nama Barang');
        $objPHPExcel->getActiveSheet()->setCellValue('G5','Ukuran');
        $objPHPExcel->getActiveSheet()->setCellValue('H5','Harga');
        $objPHPExcel->getActiveSheet()->setCellValue('I5','Jumlah Pesanan');
        $objPHPExcel->getActiveSheet()->setCellValue('J5','Sub Total');
        
        $objPHPExcel->getActiveSheet()->setCellValue('K5','Tgl Pesan');
        $objPHPExcel->getActiveSheet()->setCellValue('L5','Total Harga');

        $objPHPExcel->getActiveSheet()->getStyle('B5:L5')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('B5:L5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        // Border header tabel
        $styleArray = array(
                'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb'=>'E1E0F7'),
                    ),
                'borders' => array(
                    'outline' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                    ),
                ),
                );
                
                $objPHPExcel->getActiveSheet()->getStyle('B5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('C5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('D5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('E5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('F5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('G5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('H5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('I5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('J5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('K5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('L5')->applyFromArray($styleArray);

                // $query = $this->Pesanan_model->get_report();
                // $fields = $query->list_fields();
                // $row = 6;
                // foreach($query->result() as $data)
                // {
                //     $col = 1;
                //     foreach ($fields as $field)
                //     {

                //         $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                //                         $objPHPExcel->getActiveSheet()->getStyle("B".($row).":L".($row))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);              
                //                 $col++;
                //     }
                //     $row++;
                // }

                // Menuliskan skrip pada file yang telah dibuat.
                $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel2007');

                // Mendefinisikan header dan melakukan unggah secara otomatis.
                $filename='Laporan'.$today.'.xlsx';

                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="'.$filename.'"');
                header('Cache-Control: max-age=0');
                
                $objWriter->save('php://output');
    }
}
