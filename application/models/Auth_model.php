<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function checkUser($pengguna){        
        $query = $this->db->get_where('tb_pengguna',array('pengguna'=>$pengguna));
        return $query->num_rows();        
    }

    public function getUser($pengguna){        
        $this->db->select('*')
                 ->from('tb_pengguna')
                 ->join('tb_peran',' tb_pengguna.id_peran = tb_peran.id_peran')
                 ->where('tb_pengguna.pengguna',$pengguna);
        $res =  $this->db->get();
        return $res->row_array();
    }

}

/* End of file Auth_model.php */
