<?php defined('BASEPATH') OR die('No direct script access allowed');

class Export_model extends CI_Model {

     public function getAll()
     {
          $this->db->select('*');
          $this->db->from('pengguna');

          return $this->db->get();
     }

     public function view(){
        return $this->db->get('masyarakat')->result();
      }
      
      public function view_row(){
        return $this->db->get('masyarakat')->result();
      }
    

      public function listing() {
        $this->db->select('*');
        $this->db->from('masyarakat');
        $query = $this->db->get();
        return $query->result();
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

public function get_all()
{
 $data = $this->db->get('masyarakat')->result();
     return $data;
}
}