<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wel extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('model_system');
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

	public function tanggapan()
	{
		$data['judul'] = "Tanggapan Admin";
		$this->load->view('tanggap');
	}

	public function laporan()
	{
		$data['judul'] = "Laporan Admin";
		$this->load->view('laporan');
	}

	public function form()
	{
		$this->load->view('from');
	}

	// Simpan_data dan simpan_Aduan function buat nambah data ke db
	public function simpan_data()
	{
		// simpandb : function , model_system :  model
		$this->model_system->simpan_db();
		$this->load->view('login');
	}

	public function simpan_aduan()
	{
		$this->model_system->buat_aduan();
		$this->load->view('tencu');
	}

	public function regist()
	{
		$data['judul'] = "Registrasi";
		$data['masyarakat'] = $this->model_system->get_user();
		$data['c_masyarakat'] = $this->model_system->count_user();
		$this->load->view('registrasi', $data);
	}

	public function v_regist()
	{
		$data['judul'] = "Registrasi";
		$this->load->view('v_regist', $data);
	}

	public function verifikasi()
	{
		$data['judul'] = "Verifikasi Admin";
		$dataa['masyarakat'] = $this->model_system->get_user();
		$dataa['c_masyarakat'] = $this->model_system->count_user();
		$this->load->view('verifikasi',$data);
	}

	public function login_yu()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$login = array(
			'username' =>$username,
			'password' =>$password
		);
		$cekdl = $this->model_system->cek_login('masyarakat', $login)->num_rows();

		if($cekdl > 0 ){
			$data_session = array(
				'username' => $username,
				'status' => 'login'
			);
			$this->session->set_userdata($data_session);
			if($this->session->userdata('status')=='login'){
				header("Location:".base_url().'wel/form');
			}else{
				header("Location:".base_url().'wel/login');
			}
		}else{
			?>	
				<script></script>
			<?php
		}
	}

	function hapus($id){
		$where = array('id' => $id);
		$this->model_system->hapus_data($where,'masyarakat');
		redirect('wel/regist');
	}

	function edit($id){
		$where = array('id' => $id);
		$data['masyarakat'] = $this->model_system->edit_data($where,'masyarakat')->result();
		$this->load->view('v_regist',$data);
	}

	function update(){
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
		redirect('wel/login');
	}

	function logout(){
		$this ->session->sess_destroy();
		redirect(base_url());
	}

}

?>