<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashbord_model extends CI_Model {

    public function getCountKrtieria(){
        return $this->db->count_all('tb_kriteria');
    }

    public function getCountMasyarakat($status){
        $this->db->select('nik')
                 ->from('tb_masyarakat')
                 ->where('status',$status);
        return $this->db->count_all_results();
    }

    public function getBantuanPertahun(){
        $res = $this->db->query('SELECT
                                    COUNT(tb_masyarakat.nik) AS jumlah,
                                    EXTRACT(YEAR FROM tb_perhitungan.tanggal) AS tahun
                                FROM
                                    tb_masyarakat, tb_perhitungan 
                                WHERE tb_masyarakat.nik = tb_perhitungan.nik 
                                GROUP BY YEAR(tb_perhitungan.tanggal)');
        return $res->result_array();    
    }

    public function getStatusMasyarakat(){
        $res = $this->db->query('SELECT COUNT(nik) AS jumlah, status 
                                 FROM `tb_masyarakat` 
                                 GROUP BY status');
        return $res->result_array();    
    }

}

/* End of file Dashbord_model.php */
