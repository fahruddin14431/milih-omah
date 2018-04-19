<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria_model extends CI_Model {

    public function getKriteria($id_kriteria = null){
        if($id_kriteria == null){
            $res =  $this->db->get('tb_kriteria');
            return $res->result_array();
        }else{
            $res =  $this->db->select('kriteria')
                             ->from('tb_kriteria')
                             ->where('id_kriteria',$id_kriteria)
                             ->get();
            return $res->row()->kriteria;
        }
        
    }

    public function getKriteriaAktif(){
        $res =  $this->db->get_where('tb_kriteria','status=1');
        return $res->result_array();
    }

    public function setPerhitungan($data){
        return $this->db->insert('tb_perhitungan',$data);
    }

    public function setDetailPerhitungan($data){
        return $this->db->insert('tb_detail_perhitungan',$data);
    }

    public function getDetailKriteria($id_kriteria){
        $res = $this->db->select('id_sub_kriteria,sub_kriteria,poin')
                        ->from('tb_sub_kriteria')
                        ->where("id_kriteria='$id_kriteria'")
                        ->get();
        return $res->result_array();
    }

    public function updateKriteria($data,$id_kriteria){
        $this->db->where("id_kriteria",$id_kriteria);
        $this->db->update("tb_kriteria",$data);
        return $this->db->affected_rows();
    }

    public function getDetailSubKriteria($id_sub_kriteria){
        $res = $this->db->select('id_sub_kriteria,id_kriteria,sub_kriteria,poin')
                        ->from('tb_sub_kriteria')
                        ->where("id_sub_kriteria='$id_sub_kriteria'")
                        ->get();
        return $res->result_array();
    }

    public function updateSubKriteria($id, $data){
        $this->db->where("id_sub_kriteria",$id);
        $this->db->update("tb_sub_kriteria",$data);
        return $this->db->affected_rows();
    }

    public function getMinSkor(){
        $res = $this->db->get('tb_config');
        return $res->row_array();
    }

    public function setSkor($id, $data){
        $this->db->where("id_config",$id);
        $this->db->update("tb_config",$data);
        return $this->db->affected_rows();
    }

}

/* End of file Kriteria_model.php */
