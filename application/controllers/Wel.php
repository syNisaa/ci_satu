<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Product_model;

require './vendor/autoload.php';

class Wel extends CI_Controller {

	public function __construct($config = 'rest')
	{
		parent:: __construct($config);
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->database();
		$this->load->model('model_system');
		$this->load->library('form_validation');
		$this->load->helper('url', 'form', 'tanggal'); 
	}

	function indexajax(){
 
        //konfigurasi pagination
        $config['base_url'] = site_url('wel/indexajax'); //site url
        $config['total_rows'] = $this->db->count_all('petugas'); //total row
        $config['per_page'] = 2;  //show record per halaman
        $config["uri_segment"] = 2;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->model_system->get_user_list($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();
 
        //load view mahasiswa view
        $this->load->view('admin/crudadminajax',$data);
    }

	//api
	public function getmasyarakat($page, $size)
	{
  
	  $response = array(
		'content' => $this->masyarakat->getmasyarakat(($page - 1) * $size, $size)->result(),
		'totalPages' => ceil($this->Mahasiswa->getmasyarakat() / $size));
  
	  $this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

    public function index()
	{
		$data['judul'] ="Dashboard";
		$this->load->view('index', $data);
	}

	public function login()
	{
		$data['judul'] = "Login";
		$this->load->view('login');
	}

	function auth()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek_admin=$this->model_system->auth_admin($username, $password);
		if (!$cek_admin) {
			$data_session = array(
				'username' => $cek_admin->username,                
				'logged_in' => true);
			$this->session->set_userdata($data_session);
		  } else {
			  print_r('User doesnt exist');
		  }
		if($cek_admin->num_rows() > 0){
			$data=$cek_admin->row_array();
			$this->session->set_userdata('masuk',TRUE);
				if($data['lavel']=='1'){
					$this->session->set_userdata('akses','1');
					$this->session->set_userdata('ses_username',$data['username']);
                    $this->session->set_userdata('ses_password',$data['password']);
                    redirect('wel/dash');
				}else{ 
                    $this->session->set_userdata('akses','2');
                    $this->session->set_userdata('ses_username',$data['username']);
                    $this->session->set_userdata('ses_password',$data['password']);
                    redirect('wel/dashboardpetugas');
                 }
		} else{ 
			$cek_masyarakat=$this->model_system->auth_masyarakat($username,$password);
			if($cek_masyarakat->num_rows() > 0){
					$data=$cek_masyarakat->row_array();
			$this->session->set_userdata('masuk',TRUE);
					$this->session->set_userdata('akses','3');
					$this->session->set_userdata('ses_id',$data['username']);
					$this->session->set_userdata('ses_nama',$data['password']);
					redirect('wel/form');
			}else{  
				$this->session->set_flashdata('message', 'Maaf Username Atau Password Yang Anda Masukan Salah!');
				redirect('wel/login');
			}
		}

	}

	// Admin 
	public function dash()
	{
		$data['totalMasyarakat'] = $this->model_system->hitungJumlahMasyarakat();
		$data['totalAduan'] = $this->model_system->hitungJumlahAduan();
		$data['totalAdmin'] = $this->model_system->hitungJumlahAdmin();
		$this->load->view('admin/indexadmin' , $data);
	}

	public function datamasyarakat()
	{
		$data['masyarakat'] = $this->model_system->get_user();
		$data['c_masyarakat'] = $this->model_system->count_user();
		$this->load->view('admin/datamasyarakat', $data);
	}

	public function dataaduan(){
		$dataa['adu'] = $this->model_system->get_adu();
		$dataa['c_adu'] = $this->model_system->count_adu();
		$this->load->view('admin/dataduan', $dataa);
	}
	public function crudadmin(){
		$this->load->view('admin/crudadminajax');
	}

	// Ajax
	public function crudadminajax(){
		$this->load->view('admin/crudadminajax');
	}

	public function tampilkanData()
    {
        $data = $this->model_system->getuser();
        echo json_encode($data);
	}
	
	// turorial 2
	public function tambahuser()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}
        $nama = $this->input->post('nama'); 
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$telp = $this->input->post('telp');
		$lavel = $this->input->post('lavel');

        $tambahuser = array (
            'nama'=>$nama,
			'username'=> $username,
			'password'=>$password,
			'telp'=>$telp,
			'lavel'=>$lavel
        );

        $data = $this->model_system->insertuser($tambahuser);

        echo json_encode($data);
	}	
	
	public function updateajax()
    {
        $data = $this->model_system->updateData();
        echo json_encode($data);
	}
	
	public function hapusUser()
    {
        $data = $this->model_system->hapusData();
        echo json_encode($data);
    }
    public function simpanData()
    {
        $data = $this->model_system->inputData();
        echo json_encode($data);
    }

	public function veriadmin()
	{
		$data['judul'] = "Verifikasi Admin";
		$dataa['verifikasi'] = $this->model_system->get_adu();
		$dataa['c_verifikasi'] = $this->model_system->count_adu();
		$this->load->view('admin/veriadmin', $dataa);
	}

	public function tangadmin()
	{
		$data['judul'] = "Verifikasi Admin";
		$dataa['tanggap'] = $this->model_system->get_tanggap();
		$dataa['c_tanggap'] = $this->model_system->count_tanggap();
		$this->load->view('admin/tangadmin', $dataa);
	}

	// Petugas
	public function dashboardpetugas()
	{
		$this->load->view('petugas/indexpetugas');
	}

	public function veripetugas()
	{
		$data['judul'] = "Verifikasi Admin";
		$dataa['masyarakat'] = $this->model_system->get_user();
		$dataa['c_masyarakat'] = $this->model_system->count_user();
		$this->load->view('petugas/veripetugas', $dataa);
	}
	// Disini 
	public function tanggap(){
		$model = new model_system();
        $data = array(
            'id_pengadu' => $this->input->Post('id'),
            'tgl_tanggapan' => $this->input->Post('tgltanggap'),
			'judul' => $this->input->Post('judul'),
			'isi_laporan' => $this->input->Post('isi'),
			'tanggapan' => $this->input->Post('isitanggap'),
        );
		$model->savetanggap($data);

		// update
			$id_pengaduan = $this->input->post('id');
		
			$data = array(
				'statuss' => 'selesai',
			);
		
			$this->model_system->updateprose($id_pengaduan,$data);
			redirect('wel/veriadmin');

		// redirect('wel/tangadmin');
	}

	function updateaduu($id_pengaduan)
		{
			$id_pengaduan = $this->input->post('id');
		
			$data = array(
				'statuss' => 'selesai',
			);
		
			$this->model_system->updateprose($id_pengaduan,$data);
			redirect('wel/veriadmin');

			// $where = array('id_pengaduan' => $id_pengaduan);
			// $data['aduan'] = $this->model_system->data_Aduu($where,'pengaduan')->result();
			// $this->model_system->hapus_adu($where,'pengaduan');
			// redirect('wel/login');
		}
	

	public function tangpetugas()
	{
		$data['judul'] = "Verifikasi Admin";
		$dataa['masyarakat'] = $this->model_system->get_tanggap();
		$dataa['c_masyarakat'] = $this->model_system->count_tanggap();
		$this->load->view('petugas/tangpetugas', $dataa);
	}

	// Masyarakat
	public function form()
	{
		$this->load->view('from');
	}

	public function register()
	{
		$data['judul'] = "Registrasi";
		$data['masyarakat'] = $this->model_system->get_user();
		$data['c_masyarakat'] = $this->model_system->count_user();
		$this->load->view('registrasi', $data);
	}


	// Registrasi 
	public function simpan_data()
	{
		$data['masyarakat'] = $this->model_system->get_user();
		$data['c_masyarakat'] = $this->model_system->count_user();
		$this->form_validation->set_rules('namas','isi','required');
		$this->form_validation->set_rules('usernames','isi','required');
		$this->form_validation->set_rules('emails','isi','required');
		$this->form_validation->set_rules('passwords','isi','required');
	
		if($this->form_validation->run() != false){
			$this->model_system->simpan_db();
			redirect('wel/form');
		}else{
			$this->session->set_flashdata('gagal', 'Mohon lengkapi data data dibawah!');
			redirect('wel/register');
		}
		
	}

	public function acc(){
		$dataa['adu'] = $this->model_system->get_adu();
		$dataa['c_adu'] = $this->model_system->count_adu();
		$this->load->view('listaduan',$dataa);
	}

	public function list(){
		$dataa['tanggap'] = $this->model_system->get_tanggap();
		$dataa['c_tanggap'] = $this->model_system->count_tanggap();
		$this->load->view('listtanggapan',$dataa);
	}

	public function simpan_aduan()
	{
		$this->model_system->buat_aduan();
		redirect('wel/acc');
	}

	public function cb(){
		$this->load->view('regist');
	}

	public function v_regist()
	{
		$data['judul'] = "Registrasi";
		$this->load->view('v_regist', $data);
	}

	function hapuss($id){
		$where = array('id_pengaduan' => $id);
		$this->model_system->hapus_data($where,'pengaduan');
		redirect('wel/dataaduan');
	}

	// Crud Untuk Masyarakat
	function hapus($id){
		$where = array('id' => $id);
		$this->model_system->hapus_data($where,'masyarakat');
		redirect('wel/datamasyarakat');
	}

	function edit($id){
		$where = array('id' => $id);
		$data['masyarakat'] = $this->model_system->edit_data($where,'masyarakat')->result();
		$this->load->view('v_regist',$data);
	}

	function tanggapadu($id_pengaduan){
		$where = array('id_pengaduan' => $id_pengaduan);
		$data['verifikasi'] = $this->model_system->get_adu();
		$data['c_verifikasi'] = $this->model_system->count_adu();
		$data['aduan'] = $this->model_system->data_aduu($where,'pengaduan')->result();
		// $this->load->view('verifikasi',$data);

		$this->load->view('jawab',$data);
		
	}

	function update($id)
	{
		$id = $this->input->post('ids');
		$name = $this->input->post('namas');
		$usernama = $this->input->post('usernames');
		$mail = $this->input->post('emails');
		$pass = $this->input->post('passwords');
	 
		$data = array(
			'nama' => $name,
			'username' => $usernama,
			'email' => $mail,
			'password' => $pass
		);
	 
		$this->model_system->update_data($id,$data);
		redirect('wel/datamasyarakat');
	}

	// Crud Untuk petugas

	public function save()
    {
        $model = new model_system();
        $data = array(
            'nama' => $this->input->Post('namas'),
            'username' => $this->input->Post('usernames'),
			'password' => $this->input->Post('passwords'),
			'telp' => $this->input->Post('telps'),
			'lavel' => $this->input->Post('lavel'),
        );
        $model->saveProduct($data);
        redirect('wel/crudadmin');
	}
	
	function hapusadmin($id_petugas){
		$where = array('id_petugas' => $id_petugas);
		$this->model_system->hapus_data($where,'petugas');
		redirect('wel/crudadmin');
	}
 

	function keluar()
	{
		$this ->session->sess_destroy();
		redirect(base_url());
	}


	// Generate Laporan (Masyarakat)
	public function cetak()
	 	{
		ob_start();
		$data['masyarakat'] = $this->model_system->get_user();
		$data['c_masyarakat'] = $this->model_system->count_user();
		$data['masyarakat'] = $this->model_system->view_row();
		$this->load->view('print', $data);

		$html = ob_get_contents();
			ob_end_clean();

		include './assets/html2pdf/autoload.php';
		
		$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
		$pdf->WriteHTML($html);
		$this->load->view('print', $data);

		$pdf->Output('lap_masyarakat'.date('d-m-Y').'.pdf','D');
	  }


	public function print_xls()
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

	// Generate lap aduan
	

		// Sum
		public function total()
		{
			$data['total_asset'] = $this->model_system->hitungJumlahAsset();
			$data['total'] = $this->model_system->kode_kriteria();
			$this->load->view('admin/indexadmin', $data);
			$this->load->view('admin/indexadmin', $total);
		}
	

}

?>