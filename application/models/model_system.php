<?php 

    Class Model_system extends CI_Model{
        // pagination 
        function get_user_list($limit, $start){
            $query = $this->db->get('petugas', $limit, $start);
            return $query;
        }
        function data($number,$offset){
            return $query = $this->db->get('petugas',$number,$offset)->result();		
        }
     
        function jumlah_data(){
            return $this->db->get('petugas')->num_rows();
        }

        // ajax
        public function getuser()
        {
            return $this->db->get('petugas')->result();
        }

        // Tutorial 2
        public function insertuser($data)
        {
            return $this->db->insert('petugas', $data);  
        }

        public function inputData()
        {
            $data = [
                "nama" => $this->input->post('nama', true), 
                "username" => $this->input->post('username', true), 
                "password" => $this->input->post('password', true),
                "telp" => $this->input->post('telpon', true),             
                "lavel" => $this->input->post('lavel', true)
            ];
            return $this->db->insert('petugas', $data);
        }

        function updateData()
        {
            $id_petugas = $this->input->post('id_petugas'); 
            $namaa = $this->input->post('nama');
            $usernamee= $this->input->post('username');
            $telpp = $this->input->post('telp');             
            $lavell = $this->input->post('lavel');
            $this->db->set('nama', $namaa);
            $this->db->set('username', $usernamee);
            $this->db->set('telp', $telpp);
            $this->db->set('lavel', $lavell);
            $this->db->where('id_petugas', $id_petugas);
            return $this->db->update('petugas');
        }

        public function hapusData()
        {
        $id_petugas = $this->input->post('id_petugas');
        $this->db->where('id_petugas', $id_petugas);
        return $this->db->delete('petugas');
        }

        // API 

        public function getmasyarakat()
        {
            return $this->db->count_all_results('masyarakat', FALSE);
        }

        public function getmasyarakatid($page, $size)
        {
            return $this->db->get('masyarakat', $size, $page);
        }

        // Login
        function auth_masyarakat($username, $password)
        {
            $query=$this->db->query("SELECT * FROM masyarakat WHERE username='$username' AND password='$password' LIMIT 1");
            return $query;
        }

        function auth_admin($username, $password)
        {
            $query=$this->db->query("SELECT * FROM petugas WHERE username='$username' AND password='$password' LIMIT 1
            ");
            return $query;
        }

        // Registrasi Masyarakat
        public function simpan_db()
        {
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


        public function get_user()
        {
            $data= $this->db->get('masyarakat');
            return $data->result();
        }

        public function count_user()
        {
            $data= $this->db->get('masyarakat');
            return $data->num_rows();
        }

        // Ngeget data buat nyetak 
        public function view_row()
        {
            return $this->db->get('masyarakat')->result();
        }
        
        public function get_all()
        {
        $data = $this->db->get('masyarakat')->result();
            return $data;
        }

        // Crud Masyarakat
        public function edit_data($where, $table)
        {
            return $this->db->get_where($table,$where);
        }
        
        public function data_Aduu($where, $table)
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

        // Pengaduan
        public function buat_aduan(){
            $foto = $_FILES['foto_report']['tmp_name'];
            if ($foto = '') {
            // kosong
            } else {
                $config['upload_path'] = FCPATH .'./gambar';
                $config['allowed_types'] = 'jpg|png|gif';
                $config['max_size']  = '2048';

                $this->upload->initialize($config);
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('berkas')) {
                    echo "gagal upload"; 
                    die();
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }
            $dataa = array(
                'id_pengaduan'=>"",
                'tgl_pengaduan'=>$this->input->post('tgl'),
                'id'=>$this->input->post('nik'),
                'judul'=>$this->input->post('judul'),
                'isi_laporan'=>$this->input->post('des'),
                'foto' => $foto,
            );
            $this->db->insert('pengaduan', $dataa);
            header("location",base_url().'wel/acc');
        }

        function updateprose($id_pengaduan,$data)
        {
                $this->db->set($data);
                $this->db->where('id_pengaduan', $id_pengaduan);
                $this->db->update('pengaduan');
            
        }	

        public function get_adu()
        {
            $dataa = $this->db->get('pengaduan');
            return $dataa->result();
        }

        public function count_adu()
        {
            $dataa = $this->db->get('pengaduan');
            return $dataa->num_rows();
        }
        function hapus_adu($where,$table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }

        public function view_rows()
        {
            return $this->db->get('pengaduan')->result();
        }

        public function get_crud()
        {
            $data= $this->db->get('petugas');
            return $data->result();
        }

        public function count_crud()
        {
            $data= $this->db->get('petugas');
            return $data->num_rows();
        }

        public function saveProduct($data){
            $this->db->insert('petugas', $data);
            header("location",base_url().'wel/crudadmin');
        }

        public function savetanggap($data){
            $this->db->insert('tanggapan', $data);
            header("location",base_url().'wel/tangadmin');
        }

        public function get_tanggap()
        {
            $data= $this->db->get('tanggapan');
            return $data->result();
        }
        public function count_tanggap()
        {
            $data= $this->db->get('tanggapan');
            return $data->num_rows();
        }

        // Sum
        public function hitungJumlahMasyarakat(){
            $query = $this->db->get('masyarakat');
            if ($query->num_rows()>0) {
                return $query->num_rows();
            } else {
                return 0;
            }
        }

        public function hitungJumlahAduan(){
            $query = $this->db->get('pengaduan');
            if ($query->num_rows()>0) {
                return $query->num_rows();
            } else {
                return 0;
            }
        }  
        
        public function hitungJumlahAdmin(){
            $query = $this->db->get('petugas');
            if ($query->num_rows()>0) {
                return $query->num_rows();
            } else {
                return 0;
            }
        }  

        
    }