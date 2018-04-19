<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

    public function setPerhitungan($data){
       return $this->db->insert('tb_perhitungan',$data);
       
    }

    public function setDetailPerhitungan($data){
        return $this->db->insert('tb_detail_perhitungan',$data);
    }

    public function showRank($status,$order,$sort){
        $res = $this->db->query("SELECT
                                    tb_masyarakat.nik,
                                    tb_masyarakat.nama,
                                    tb_masyarakat.alamat,
                                    tb_masyarakat.rt,
                                    tb_masyarakat.rw,
                                    tb_masyarakat.status,
                                    tb_perhitungan.tanggal,
                                    tb_perhitungan.foto_rumah,
                                    tb_perhitungan.foto_rumah1,
                                    ROUND(
                                        SUM(tb_detail_perhitungan.nilai),
                                        2
                                    ) AS hasil
                                FROM
                                    tb_masyarakat
                                LEFT JOIN tb_perhitungan ON tb_masyarakat.nik = tb_perhitungan.nik
                                LEFT JOIN tb_detail_perhitungan ON tb_perhitungan.id_perhitungan = tb_detail_perhitungan.id_perhitungan
                                WHERE status = '$status'
                                GROUP BY tb_perhitungan.id_perhitungan
                                HAVING hasil > (SELECT tb_config.skor_minimal FROM tb_config)
                                ORDER BY $order $sort
                                LIMIT 10"                                
                                );
        return $res->result_array();
    }

}

/* End of file Kriteria_model.php */