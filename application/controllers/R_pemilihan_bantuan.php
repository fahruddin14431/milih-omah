<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class R_pemilihan_bantuan extends CI_Controller {

    private $page = 'report_penerima_bantuan';

    public function __construct(){
        parent::__construct();

        if(isLogin() == FALSE ){            
            redirect('auth');            
        }   

        $this->load->model('kriteria_model');
        $this->load->model('masyarakat_model');
        $this->load->model('report_model');

    }
    
    
    public function index(){        
        $data['page']    = $this->page;
        $data['sidebar'] = makeTitle($this->page);

        $data['masyarakat'] = $this->report_model->getReport();

        $this->load->view('index', $data);        
    }

    public function detail($nik){
        $data['page']     = "report_pemilihan_bantuan_detail";
        $data['sidebar']  = makeTitle($data['page']);

        $data['masyarakat'] = $this->masyarakat_model->getNameByNIK($nik);
        $data['detail']     = !empty($this->report_model->getDetail($nik))?$this->report_model->getDetail($nik):"";
        
        if(!empty($data['detail'])){
            foreach ($data['detail'] as $value) {
                $arr_nilai[] = $value['nilai'];
            }

            $data['nilai'] = array_sum($arr_nilai);
        }   

        $this->load->view('index', $data);        
    }

}

/* End of file M_pemilihan_bantuan.php */
