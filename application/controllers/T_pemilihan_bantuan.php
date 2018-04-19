<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class T_pemilihan_bantuan extends CI_Controller {

    private $page = 'transaksi_pemilihan_bantuan';
    
    public function __construct(){
        parent::__construct();        
        if(isLogin() == FALSE ){            
            redirect('auth');            
        }   

        $this->load->model('kriteria_model');
        $this->load->model('masyarakat_model');
        $this->load->model('transaksi_model');
    }  
    
    // get array kriteria and subkriteria
    public function subKriteria($id_only = false){
        
        $sub_kriteria = [];

        if($id_only){

            foreach ($this->kriteria_model->getKriteriaAktif() as $value) :
                $sub_kriteria[] = $value['id_kriteria'];
            endforeach;

        }else{     

            foreach ($this->kriteria_model->getKriteriaAktif() as $value) :
                $sub_kriteria [] = array(
                    'id_kriteria'  => $value['id_kriteria'],
                    'kriteria'     => ucwords($value['kriteria']),
                    'sub_kriteria' => $this->kriteria_model->getDetailKriteria($value['id_kriteria'])
                );
            endforeach;
        }

        return $sub_kriteria;
    } 
    
    public function uploadFotoRumah($field, $filename)
    {
        $config['upload_path']      = './files/foto_rumah/';
        $config['allowed_types']    = 'gif|jpg|png';        
        $config['file_name']        = $filename;
        
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($field)){
            $error = array('error' => $this->upload->display_errors());
            setAlert("result",$error['error']);    
            redirect('m_masyarakat/index/Kandidat');
        } else {
            $foto_rumah = $this->upload->data()['file_name'];
        }

        return $foto_rumah;
    }

    public function index(){     
        $nik = $this->uri->segment('3');

        if ($nik==null && empty($nik)) {
            redirect('m_masyarakat/index/Kandidat');
        } 

        $data['page']    = $this->page;
        $data['sidebar'] = makeTitle($this->page);

        $data['masyarakat']   = $this->masyarakat_model->getNameByNIK($nik);
        $data['sub_kriteria'] = $this->subKriteria(false);

        $this->load->view('index', $data);        
    }

    public function insert(){

        // get bobot kriteria aktif
        $bobot_kriteria = $this->kriteria_model->getKriteriaAktif();

        $id_perhitungan = getLastId('tb_perhitungan','id_perhitungan','PER');
        $nik            = $this->input->post('nik');

        // upload foto rumah
        $foto_rumah  = $this->uploadFotoRumah('foto_rumah',"rumah_bagian_depan_".$nik);
        $foto_rumah1 = $this->uploadFotoRumah('foto_rumah1',"rumah_bagian_dalam_".$nik);
        
        $data = array(
            'id_perhitungan' => $id_perhitungan,
            'nik'             => $nik,
            'tanggal'         => date('Y-m-d'),
            'foto_rumah'      => $foto_rumah,
            'foto_rumah1'     => $foto_rumah1
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

        if ($res && $res1 && $res2) {
            setAlert("result","Detail Data Masyarakat Tersimpan");    
        }else{
            setAlert("result","Detail Data Masyarakat Gagal Tersimpan");    
        }
        redirect('m_masyarakat/index/Kandidat');
    }

}

/* End of file T_pemilihan_bantuan.php */