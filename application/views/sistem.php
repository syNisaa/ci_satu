<?php
class sistem extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('modelsistem');
    } 
public function base(){
    $data ['title']= "base";
    $data ['user'] = $this->modelsistem->get_user();
    $data ['c_user'] = $this->modelsistem->count_user();
    $this->load->view('base',$data);   
}
public function simpan_data(){
    $this->modelsistem->simpan_db();
}
public function aksi_login(){
    $usernames = $this->input->post('username');
    $passwords = $this->input->post('pw');
    $where = array(
        'usernama' => $usernames,
        'status' => md5($passwords)
    );
    $cek = $this->modelsistem->cek_login("user",$where)->num_rows();

    if($cek > 0){
        $data_session = array(
            'ussernama' => $usernames,
            'status' => 'login'
        );
        $this->session->set_userdata($data_session);
        if($this->session->userdata('status')=='login'){
            header("Location:".base_url().'sistem/home'.$this->session->userdata('usernama'));


        }else{
            echo "login gagal";
        }
    }else{
        echo "ussername dan password salah";
    }
}
function logout(){
    $this ->session->sess_destroy();
    redirect(base_url());
}
}