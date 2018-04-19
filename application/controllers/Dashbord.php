<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashbord extends CI_Controller {

    private $page = 'dashbord';
    
    public function __construct(){
        parent::__construct();  

        if(isLogin() == FALSE ){            
            redirect('auth');            
        }      

        $this->load->model('dashbord_model');        
    }    

    public function index(){        
        $data['page']    = $this->page;
        $data['sidebar'] = makeTitle($this->page);

        $data['count_kriteria']   = $this->dashbord_model->getCountKrtieria();

        $data['count_masyarakat_belum']    = $this->dashbord_model->getCountMasyarakat('Belum');
        $data['count_masyarakat_kandidat'] = $this->dashbord_model->getCountMasyarakat('Kandidat');
        $data['count_masyarakat_pilih']    = $this->dashbord_model->getCountMasyarakat('Pilih');
        $data['count_masyarakat_pernah']   = $this->dashbord_model->getCountMasyarakat('Pernah');
        $data['jumlah_bantuan_pertahun']   = $this->getJumlahBantuanPertahun();
        $data['jumlah_masyarakat_status']  = $this->getJumlahStatusMasyarkat();
        
        $this->load->view('index', $data);        
    }

    public function getJumlahBantuanPertahun(){
        $data_jumlah_bantuan_pertahun   = $this->dashbord_model->getBantuanPertahun();

        $jumlah_bantuan_pertahun = [];
        foreach ($data_jumlah_bantuan_pertahun as $value) {
            $jumlah_bantuan_pertahun[$value['tahun']] = $value['jumlah'];
        }
        return $jumlah_bantuan_pertahun;
    }

    public function getJumlahStatusMasyarkat(){
        $data_status_masyarakat = $this->dashbord_model->getStatusMasyarakat();

        $status_masyarakat = [];
        foreach ($data_status_masyarakat as $value) {
            $status_masyarakat[$value['status']] = $value['jumlah'];
        }
        return $status_masyarakat;
    }

}

/* End of file Dashbord.php */
