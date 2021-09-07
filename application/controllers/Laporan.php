<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('m_sekawan');
        
        if($this->session->userdata('role') != 1){
            $this->session->set_flashdata('messages', '<br><div class="alert alert-danger" role="alert"> <strong> Error! </strong>Silahkan login terlebih dahulu </div>');
            redirect(base_url("login"));
        }
    }
    
    public function index(){
        $data['content']    = 'laporan/v_laporan';
        $data['title']      = 'Pemesanan';
        $data['pemesanan']  = $this->m_sekawan->getLaporan()->result();

        $this->load->view('template/template', $data);
    }

    public function cari(){
        $bulan = $this->input->get('bulan');

        $data['content']    = 'laporan/v_laporan';
        $data['title']      = 'Pemesanan';
        $data['pemesanan']  = $this->m_sekawan->getLaporanByBulan($bulan)->result();

        $this->load->view('template/template', $data);
    }

    public function export(){
        $bulan = $this->input->post('bulan');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Kendaraan');
        $sheet->setCellValue('C1', 'Nama Driver');
        $sheet->setCellValue('D1', 'Nama Pemesan');
        $sheet->setCellValue('E1', 'Tanggal Pemesanan');
        
        $pemesanan  = $this->m_sekawan->getLaporanByBulan($bulan)->result();

        $no = 1;
        $x = 2;
        foreach($pemesanan as $row)
        {
            $sheet->setCellValue('A'.$x, $no++);
            $sheet->setCellValue('B'.$x, $row->nama_kendaraan);
            $sheet->setCellValue('C'.$x, $row->nama_driver);
            $sheet->setCellValue('D'.$x, $row->nama_lengkap);
            $sheet->setCellValue('E'.$x, $row->tanggal_pemesanan);
            $x++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan Pemesanan';
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

}
