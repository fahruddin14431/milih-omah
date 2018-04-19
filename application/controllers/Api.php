<?php 

require(APPPATH.'libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends REST_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('kriteria_model');
        $this->load->model('masyarakat_model');
        $this->load->model('transaksi_model');
    }

    public function subKriteria($id_only = true) {
        $sub_kriteria = [];

        foreach ($this->kriteria_model->getKriteriaAktif() as $value) :
            $sub_kriteria[] = $value['id_kriteria'];
        endforeach;

        return $sub_kriteria;
    }
    
    public function index_get(){

    }

    public function masyarakat_kandidat_get(){

        $data  = $this->masyarakat_model->getMasyarakat("Kandidat");
        $this->response($data,200);
    }

    public function insert_nilai_kriteria_post(){

        // get bobot kriteria aktif
        $bobot_kriteria = $this->kriteria_model->getKriteriaAktif();

        $id_perhitungan = getLastId('tb_perhitungan','id_perhitungan','PER');
        $nik            = $this->input->post('nik');

        // upload image with base64
        $getBase64    = $this->input->post('foto_rumah');
        

        $decoded    = base64_decode($getBase64);
        

        $foto_rumah  = "rumah_bagian_depan_".$nik.".jpg";
        

        $path       = './files/foto_rumah/';

        $write_img   = file_put_contents($path.$foto_rumah,$decoded);
        
        $data = array(
            'id_perhitungan' => $id_perhitungan,
            'nik'            => $nik,
            'tanggal'        => date('Y-m-d'),
            'foto_rumah'     => $foto_rumah
        );

        $data1 = array(
            'status' => 'Pilih'
        );

        $res  = $this->transaksi_model->setPerhitungan($data);
        $res1 = $this->masyarakat_model->updateStatus($nik, $data1);

        $res2;
        foreach ($this->subKriteria(true) as $key => $value):

            $data = array(
                'id_perhitungan' => $id_perhitungan,
                'id_kriteria'    => $value,
                'nilai'          => $this->input->post($value) * $bobot_kriteria[$key]['normalisasi_bobot']
            );

            $res2 = $this->transaksi_model->setDetailPerhitungan($data);

        endforeach;

        if ($res && $res1) {
            $this->response("sukses");
        }else{
            $this->response("gagal");
        }
    }
}

/* End of file Api.php */
