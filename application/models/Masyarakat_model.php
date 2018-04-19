<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Masyarakat_model extends CI_Model {

    // data table 
    public function getFiltered($status){
        $query = $this->db->get_where("tb_masyarakat", "status='$status'");        
        return $query->num_rows();
    }

    public function getAllData($status){
        $query = $this->db->get_where("tb_masyarakat", "status='$status'");        
        return $query->num_rows();
    }

    // end data table

    public function getMasyarakat($status, $nik = null){
        $res;
        if ($nik == null) {
            $res =  $this->db->get_where('tb_masyarakat',"status='$status'");
        }else{
            $res =  $this->db->get_where("tb_masyarakat",array('status'=>$status,'nik'=>$nik));
        }
        return $res->result_array();
    }

    public function getNameByNIK($nik){
        $res =  $this->db->get_where('tb_masyarakat',"nik='$nik'");
        return $res->row_array();
    }

    public function updateStatus($nik,$data){
        $this->db->where('nik', $nik);        
        return $this->db->update('tb_masyarakat',$data);
    }

    public function setMasyarakat($data){
        return $this->db->insert("tb_masyarakat",$data);
    }

    public function update($nik, $data)
    {
        $this->db->where('nik',$nik);
        return $this->db->update('tb_masyarakat', $data);
    }

    public function delete($nik){
        return $this->db->delete('tb_masyarakat',"nik='$nik'");
    }

}

/* End of file Masyarakat_model.php */
