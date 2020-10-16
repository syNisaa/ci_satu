<?php defined('BASEPATH') OR die('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Product_model;

require './vendor/autoload.php';


class Export extends CI_Controller {

     public function __construct($config = 'rest')
     {
          parent::__construct($config);
          $this->load->library('pagination');
          $this->load->library('session');
          $this->load->database();
          $this->load->model('model_system');
          $this->load->library('form_validation');
     }

    public function cetakaduan()
	 	{
		ob_start();
		$dataa['adu'] = $this->model_system->get_adu();
		$dataa['c_adu'] = $this->model_system->count_adu();
		$dataa['pengaduan'] = $this->model_system->view_rows();
		$this->load->view('prints', $dataa);

		$html = ob_get_contents();
			ob_end_clean();

		include './assets/html2pdf/autoload.php';
		
		$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
		$pdf->WriteHTML($html);
		$this->load->view('prints', $dataa);

		$pdf->Output('lap_aduan'.date('d-m-Y').'.pdf','D');
	  }


		public function print_aduan()
		{
			$this->load->model('export_model');
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('A1', 'No');
			$sheet->setCellValue('B1', 'Nama');
			$sheet->setCellValue('C1', 'Username');
			$sheet->setCellValue('D1', 'Email');
			
			
				$data = $this->model_system->get_all();
			$x = 2;
			foreach($data as $row)
			{
				$sheet->setCellValue('A'.$x, $row->id);
				$sheet->setCellValue('B'.$x, $row->nama );
				$sheet->setCellValue('C'.$x, $row->username);
				$sheet->setCellValue('D'.$x, $row->email);
				$x++;
			}
			$writer = new Xlsx($spreadsheet);
			$filename = 'lap';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
			header('Cache-Control: max-age=0');
	
			$writer->save('php://output');
    }

}