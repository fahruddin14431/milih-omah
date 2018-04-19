<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_masyarakat extends CI_Controller {

    private $page = 'master_masyarakat';
    private $status;

    public function __construct() {   
        parent::__construct();

        if(isLogin() == FALSE ){            
            redirect('auth');            
        }   
        
        $this->load->model('masyarakat_model');  
        $this->load->model('transaksi_model');  
        
    }
    
    public function index(){        
        $status = $this->uri->segment('3');

        $data['page']       = $this->page;
        $data['sidebar']    = makeTitle($this->page." ".$this->status);
            
        $this->load->view('index', $data);              
        
    }

    // data table
    public function JsonMasyarakat($status) {   
          
        $length = $_POST['length']; 
        $limit  = $_POST['start'];

        if(!empty($_POST["search"]["value"]) && strlen($_POST["search"]["value"])>3){
            $this->db->select('*');
            $this->db->where("status", $status);
            $this->db->from("tb_masyarakat");

            if(isset($_POST["search"]["value"])){
                $this->db->like("nama", $_POST["search"]["value"]);
                $this->db->or_like("alamat", $_POST["search"]["value"]);
            }  
            $masyarakat_belum = $this->db->get()->result();
        }else{
            $masyarakat_belum =  $this->db->query("SELECT * FROM `tb_masyarakat` WHERE `status` = '$status' LIMIT $limit, $length")->result();
        }


        $data = array();
        $no = 1;

        if($status == "Belum" && isAdmin()){
            foreach ($masyarakat_belum as $value) {
                $sub_arr = array();
                $sub_arr[] = $no++.".";
                $sub_arr[] = $value->nik;
                $sub_arr[] = $value->nama;
                $sub_arr[] = $value->jk=="Lk"?"Laki-laki":"Perempuan";
                $sub_arr[] = $value->tempat_lahir;
                $sub_arr[] = $value->alamat." RT ".$value->rt." RW ". $value->rw;
                $sub_arr[] = "<span class='label green'>".$value->status."</span>";                
                $sub_arr[] = '<a href ='.base_url().'m_masyarakat/FormUpdate/'.$value->nik. " class='btn btn-warning' style='color:white'><i class='fa fa-edit'></i> Ubah</a>";
                $sub_arr[] = '<a href ='.base_url().'m_masyarakat/delete/'. $value->nik.   " class='btn btn-danger' style='color:white'".'onclick="return confirm(\'Hapus Data Masyarakat?\');"><i class="fa fa-trash"></i> Hapus</a>';
                $data[] = $sub_arr;            
            }
        }else if($status == "Belum" && isOperator()){
            foreach ($masyarakat_belum as $value) {
                $sub_arr = array();
                $sub_arr[] = $no++.".";
                $sub_arr[] = $value->nik;
                $sub_arr[] = $value->nama;
                $sub_arr[] = $value->jk=="Lk"?"Laki-laki":"Perempuan";
                $sub_arr[] = $value->tempat_lahir;
                $sub_arr[] = $value->alamat." RT ".$value->rt." RW ". $value->rw;
                $sub_arr[] = "<span class='label green'>".$value->status."</span>";
                $sub_arr[] = '<a href ='.base_url().'m_masyarakat/setKandidat/'.$value->nik. " class='btn btn-info' style='color:white'".'onclick="return confirm(\'Pilih Kandidat Masyarakat?\');"><i class="fa fa-gear"></i> Kandidat</a>';
                $data[] = $sub_arr;            
            }
        }else if($status == "Kandidat" && isSurveyor()){
            foreach ($masyarakat_belum as $value) {
                $sub_arr = array();
                $sub_arr[] = $no++.".";
                $sub_arr[] = $value->nik;
                $sub_arr[] = $value->nama;
                $sub_arr[] = $value->jk=="Lk"?"Laki-laki":"Perempuan";
                $sub_arr[] = $value->tempat_lahir;
                $sub_arr[] = $value->alamat." RT ".$value->rt." RW ". $value->rw;
                $sub_arr[] = "<span class='label red'>".$value->status."</span>";
                $sub_arr[] = '<a href ='.base_url().'t_pemilihan_bantuan/index/'.$value->nik. " class='btn btn-info' style='color:white'><i class='fa fa-calculator'></i> Proses</a>";
                $data[] = $sub_arr;            
            }
        }

        $output = array(
            "draw"              => intval($_POST["draw"]),
            "recordsTotal"      => $this->masyarakat_model->getAllData($status),
            "recordsFiltered"   => $this->masyarakat_model->getFiltered($status),
            "data"              => $data
        );

        echo json_encode($output);
    
    }
    // end data table

    public function listMasyrakatPilih(){

        $data['page']       = $this->page;
        $data['sidebar']    = makeTitle($this->page."Master Masyarakat Pilih");
            
        $data['masyarakat'] = $this->transaksi_model->showRank("Pilih","hasil","DESC");

        $this->load->view('index', $data);    
        
    }

    public function FormAdd() {
        $data['page']    = "form_tambah_masyarakat";
        $data['sidebar'] = makeTitle($data['page']);

        $status_kawin = array(
                            'Blm Kawin',
                            'Cerai Hidup',
                            'Cerai Mati',
                            'Kawin'
                        );

        $data['status_kawin'] = $status_kawin;

        $agama = array(
                        'Islam',
                        'Kristen',
                        'Katolik',
                        'Hindu',
                        'Buddha',
                        'Kong Hu Cu'
                    );

        $data['agama'] = $agama;

        $rt_rw = array();
        for($i=1; $i<12; $i++){
            $rt_rw[] = $i;
        }

        $data['rt_rw']        = $rt_rw;

        $this->load->view('index', $data);
    }

    public function insert(){
        $data = array(
            'nik'           => $this->input->post('nik'),
            'no_kk'         => $this->input->post('no_kk'),
            'status_hbkel'  => 'Kepala Keluarga',
            'nama'          => $this->input->post('nama'),
            'jk'            => $this->input->post('jk'),
            'tempat_lahir'  => $this->input->post('tempat_lahir'),
            'tgl_lahir'     => $this->input->post('tgl_lahir'),
            'status_kawin'  => $this->input->post('status_kawin'),
            'agama'         => $this->input->post('agama'),
            'nama_ibu'      => $this->input->post('nama_ibu'),
            'nama_ayah'     => $this->input->post('nama_ayah'),
            'alamat'        => $this->input->post('alamat'),
            'rt'            => $this->input->post('rt'),
            'rw'            => $this->input->post('rw'),
            'pekerjaan'     => $this->input->post('pekerjaan'),
            'status'        => 'Belum'
        );

        $res = $this->masyarakat_model->setMasyarakat($data);
        if ($res) {
            $this->session->set_flashdata('result', 'Tambah Data Masyarakat Sukses');
            redirect('m_masyarakat/index/Belum');
        } else {
            $this->session->set_flashdata('result', 'Tambah Data Masyarakat Gagal');
            redirect('m_kriteria');
            redirect('m_masyarakat/index/Belum');
        }
    }

    public function FormUpdate($nik) {
        $data['page']    = "form_ubah_masyarakat";
        $data['sidebar'] = makeTitle($data['page']);
        $data['masyarakat'] = $this->masyarakat_model->getMasyarakat("Belum",$nik)[0];

        $status_kawin = array(
            'Blm Kawin',
            'Cerai Hidup',
            'Cerai Mati',
            'Kawin'
        );

        $data['status_kawin'] = $status_kawin;

        $agama = array(
                    'Islam',
                    'Kristen',
                    'Katolik',
                    'Hindu',
                    'Buddha',
                    'Kong Hu Cu'
                );

        $data['agama'] = $agama;

        $rt_rw = array();
            for($i=1; $i<12; $i++){
        $rt_rw[] = $i;
        }

        $data['rt_rw']        = $rt_rw;

        $this->load->view('index', $data);
    }

    public function update(){

        $nik = $this->input->post('nik');

        $data = array(
            "no_kk"         => $this->input->post('no_kk'),
            "nama"          => $this->input->post('nama'),
            "jk"            => $this->input->post('jk'),
            "tempat_lahir"  => $this->input->post('tempat_lahir'),
            "tgl_lahir"     => $this->input->post('tgl_lahir'),
            "status_kawin"  => $this->input->post('status_kawin'),
            "agama"         => $this->input->post('agama'),
            "nama_ibu"      => $this->input->post('nama_ibu'),
            "nama_ayah"     => $this->input->post('nama_ayah'),
            "alamat"        => $this->input->post('alamat'),
            "rt"            => $this->input->post('rt'),
            "rw"            => $this->input->post('rw'),
            "pekerjaan"     => $this->input->post('pekerjaan')            
        );

        $res = $this->masyarakat_model->update($nik,$data);
        if ($res) {
            setAlert("result","Data Masyarakat Diperbaharui");
        }else{
            setAlert("result","Data Masyarakat Gagal Diperbaharui");
        }
        redirect('m_masyarakat/index/Belum');
    }

    public function delete($nik){
        $res = $this->masyarakat_model->delete($nik);
        if ($res) {
            setAlert("result","Data Masyarakat Terhapus");
        }else{
            setAlert("result","Data Masyarakat Gagal Terhapus");
        }
        redirect('m_masyarakat/index/Belum');
    }

    public function setKandidat($nik){
        $data = array(
            'status' => 'Kandidat'
        );

        $res = $this->masyarakat_model->updateStatus($nik,$data);

        if($res){
            setAlert("result","Kandidat Masyarakat Diperbaharui");    
        }else{
            setAlert("result","Kandidat Masyarakat Gagal Diperbaharui");    
        }
        redirect('m_masyarakat/index/Belum');
    }

    public function setPernah($nik){
        $data = array(
            'status' => 'Pernah'
        );

        $res = $this->masyarakat_model->updateStatus($nik,$data);

        if($res){
            setAlert("result","Masyarakat Pernah Diperbaharui");    
        }else{
            setAlert("result","Masyarakat Pernah Gagal Diperbaharui");    
        }
        redirect('m_masyarakat/listMasyrakatPilih');
    }

}

/* End of file M_masyarakat.php */
