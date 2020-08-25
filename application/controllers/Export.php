<?php defined('BASEPATH') OR die('No direct script access allowed');

require('./application/third_party/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends CI_Controller {

    //  public function __construct()
    //  {
    //       parent::__construct();
    //      $this->load->model('export_model');
    //  }

    //  public function index()
    //  {
    //       $data['semua_pengguna'] = $this->export_model->getAll()->result();
    //       $this->load->view('export', $data);
    //  }

    //  public function export()
    //  {
    //       $semua_pengguna = $this->export_model->getAll()->result();

    //       $spreadsheet = new Spreadsheet;

    //       $spreadsheet->setActiveSheetIndex(0)
    //                   ->setCellValue('A1', 'No')
    //                   ->setCellValue('B1', 'Nama')
    //                   ->setCellValue('C1', 'Jenis Kelamin')
    //                   ->setCellValue('D1', 'Tanggal Lahir')
    //                   ->setCellValue('E1', 'Umur');

    //       $kolom = 2;
    //       $nomor = 1;
    //       foreach($semua_pengguna as $pengguna) {

    //            $spreadsheet->setActiveSheetIndex(0)
    //                        ->setCellValue('A' . $kolom, $nomor)
    //                        ->setCellValue('B' . $kolom, $pengguna->nama)
    //                        ->setCellValue('C' . $kolom, $pengguna->jenis_kelamin)
    //                        ->setCellValue('D' . $kolom, date('j F Y', strtotime($pengguna->tanggal_lahir)))
    //                        ->setCellValue('E' . $kolom, $pengguna->umur);

    //            $kolom++;
    //            $nomor++;

    //       }

    //       $writer = new Xlsx($spreadsheet);

    //       header('Content-Type: application/vnd.ms-excel');
    //     header('Content-Disposition: attachment;filename="Latihan.xlsx"');
    //     header('Cache-Control: max-age=0');

	  // $writer->save('php://output');
    //  }

    public function __construct(){
      parent::__construct();
      
      $this->load->model('export_model');
    }
    
    public function index(){
      $data['masyarakat'] = $this->export_model->view_row();
      $this->load->view('preview', $data);
    }
    
    public function cetak(){
      ob_start();
      $data['masyarakat'] = $this->export_model->view_row();
      $this->load->view('print', $data);
      $html = ob_get_contents();
          ob_end_clean();
          
      require './assets/html2pdf/autoload.php';
      
      $pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Data masyarakat.pdf', 'D');
    }
  
}