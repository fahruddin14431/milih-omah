<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

    public function getReport(){
        $res = $this->db->query("SELECT
                                    tb_masyarakat.nik,
                                    tb_masyarakat.nama,
                                    tb_masyarakat.alamat,
                                    tb_masyarakat.rt,
                                    tb_masyarakat.rw,
                                    tb_masyarakat.status,
                                    tb_perhitungan.tanggal,
                                    tb_perhitungan.foto_rumah,
                                    ROUND(
                                        SUM(tb_detail_perhitungan.nilai),
                                        2
                                    ) AS hasil
                                FROM
                                    tb_masyarakat
                                LEFT JOIN tb_perhitungan ON tb_masyarakat.nik = tb_perhitungan.nik
                                LEFT JOIN tb_detail_perhitungan ON tb_perhitungan.id_perhitungan = tb_detail_perhitungan.id_perhitungan
                                WHERE status = 'Pernah'
                                GROUP BY tb_perhitungan.id_perhitungan
                                ORDER BY tanggal DESC");
        return $res->result_array();
    }

    public function getDetail($nik){
        $res = $this->db->query("SELECT
                                    tb_perhitungan.id_perhitungan,
                                    tb_kriteria.kriteria,
                                    tb_detail_perhitungan.nilai
                                FROM
                                    tb_kriteria
                                INNER JOIN tb_detail_perhitungan ON tb_kriteria.id_kriteria = tb_detail_perhitungan.id_kriteria
                                INNER JOIN tb_perhitungan ON tb_perhitungan.id_perhitungan = tb_detail_perhitungan.id_perhitungan
                                WHERE
                                    tb_perhitungan.nik = '$nik'");
        return $res->result_array();    
    }

}

/* End of file Kriteria_model.php */