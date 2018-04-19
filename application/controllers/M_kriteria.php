<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kriteria extends CI_Controller {

    private $page = 'master_kriteria';

    public function __construct() {   
        parent::__construct();
        
        if(isLogin() == FALSE ){            
            redirect('auth');            
        }   
        
        $this->load->model('kriteria_model');        
    }
    
    public function index() {        
        $data['page']     = $this->page;
        $data['sidebar']  = makeTitle($this->page);

        $data['kriteria'] = $this->kriteria_model->getKriteria();

        $this->load->view('index', $data);        
    }

    public function detailKriteria($id_kriteria) {
        $nama_kriteria    = $this->kriteria_model->getKriteria($id_kriteria);

        $data['page']     = 'master_detail_kriteria';
        $data['sidebar']  =  makeTitle($data['page']." ".$nama_kriteria);

        $data['sub_kriteria']   = $this->kriteria_model->getDetailKriteria($id_kriteria);

        $this->load->view('index', $data);
    }

    public function FormUpdate($id_kriteria){
        $data['page']        = 'form_ubah_kriteria';
        $data['sidebar']     = makeTitle($data['page']);
        $data['id_kriteria'] = $id_kriteria;
        $data['kriteria']    = $this->kriteria_model->getKriteria($id_kriteria);

        $this->load->view('index', $data);
    }

    public function update(){
        $id_kriteria = $this->input->post('id_kriteria');
        $data        = array(            
                            'kriteria' => $this->input->post('kriteria')
                        );

        $res = $this->kriteria_model->updateKriteria($data,$id_kriteria);

        if ($res) {
            setAlert("result","Data Kriteria Diperbaharui");            
        }else{            
            setAlert("result","Data Kriteria Gagal Diperbaharui");
        }
        
        redirect('m_kriteria');
    }

    // morning update

    public function FormUpdateSubKriteria($id_sub_kriteria){
        $data['page']               = 'form_detail_ubah_kriteria';
        $data['sidebar']            = makeTitle($data['page']);
        $data['sub_kriteria']       = $this->kriteria_model->getDetailSubKriteria($id_sub_kriteria);
        
        $this->load->view('index', $data);
        
    }

    public function updateSubKriteria(){
        $id_sub_kriteria = $this->input->post('id_sub_kriteria');
        $id_kriteria     = $this->input->post('id_kriteria');

        $data = array(
                        'sub_kriteria' => $this->input->post('sub_kriteria'), 
                        'poin'         => $this->input->post('poin')
                    );
        
        $res = $this->kriteria_model->updateSubKriteria($id_sub_kriteria,$data);

        if ($res) {
            setAlert("result","Data Sub Kriteria Diperbaharui");            
        }else{            
            setAlert("result","Data Sub Kriteria Gagal Diperbaharui");
        }
        
        redirect('m_kriteria/detailkriteria/'.$id_kriteria);
    }

    public function FormUbahSkor(){
        $data['page']     = "form_ubah_min_skor";
        $data['sidebar']  = makeTitle("Ubah Minimal Skor");
        $data['config']   = $this->kriteria_model->getMinSkor();

        $this->load->view('index', $data);
    }

    public function setMinSkor(){
        $id_config = $this->input->post('id_config');
        $data = array(
                        "skor_minimal" => $this->input->post('skor_minimal')
                    );

        $res = $this->kriteria_model->setSkor($id_config,$data);

        if ($res) {
            setAlert("result","Data Minimal Skor Diperbaharui");            
        }else{            
            setAlert("result","Data Minimal Skor Gagal Diperbaharui");
        }
        
        redirect('m_kriteria');        
    }
   

}

/* End of file M_kriteria.php */
