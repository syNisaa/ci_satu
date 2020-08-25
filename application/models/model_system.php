<?php 

    Class Model_system extends CI_Model{
        public function simpan_db(){
            $data= array(
                'id'=>"",
                'nama' => $this->input->post('namas'),
                'username' =>$this->input->post('usernames'),
                'email'=>$this->input->post('emails'), 
                'password'=>$this->input->post('passwords'),  
            );

            $this->db->insert('masyarakat', $data);
            header("location",base_url().'wel/login');
        }
// nge get
        public function get_user(){
            $data= $this->db->get('masyarakat');
            return $data->result();
        }
// ngitung 
        public function count_user(){
            $data= $this->db->get('masyarakat');
            return $data->num_rows();
        }

        public function buat_aduan(){
            $dataa = array(
                'id_pengaduan'=>"",
                'tgl_pengaduan'=>$this->input->post('tgl'),
                'id'=>$this->input->post('nik'),
                'judul'=>$this->input->post('judul'),
                'isi_laporan'=>$this->input->post('des'),
                'foto'=>$this->input->post('gambar'),
            );
            $this->db->insert('pengaduan', $dataa);
            header("location",base_url().'wel/regist');
        }

        public function get_adu(){
            $dataa = $thus->db->get('pengaduan');
            return $data->result();
        }

        public function count_adu(){
            $dataa = $this->db->get('pengaduan');
            return $dataa->num_rows();
        }

        public function cek_login($table, $log)
        {
            return $this->db->get_where($table, $log);
        }

        public function edit_data($where, $table)
        {
            return $this->db->get_where($table,$where);
        }

        function update_data($id,$data)
        {
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('masyarakat');
        }	

        function hapus_data($where,$table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }

        function get_Kata_mutiara()
	{
		# code...
		$query = $this->db->get('masyarakat');
		return $query->row();
    }
    
    }
?>