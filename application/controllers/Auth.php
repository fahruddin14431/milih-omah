<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index(){        
        $this->load->view('login');        
    }

    public function login(){
        $pengguna   = $this->input->post('pengguna');
        $kata_sandi = $this->input->post('kata_sandi');

        $this->load->model('auth_model');
        
        $check_user = $this->auth_model->checkUser($pengguna);

        if ($check_user == 1) {

            $data_user = $this->auth_model->getUser($pengguna);         

            if (password_verify($kata_sandi, $data_user['kata_sandi'])) {                
                
                $data = array(
                    'pengguna' => $data_user['pengguna'],
                    'nama'     => ucwords($data_user['nama']),
                    'id_peran' => $data_user['id_peran'],
                    'peran'    => $data_user['peran']
                );
                
                $this->session->set_userdata($data);              
                redirect('dashbord');
            
            }else{            
                $this->session->set_flashdata('error_login', 'ID pengguna atau Kata sandi tidak cocok');
                redirect('auth');
            }

        }else{            
            $this->session->set_flashdata('error_login', 'ID pengguna tidak terdaftar');
            redirect('auth');           
        }     
    }

    public function logout(){
        session_destroy();
        redirect('auth');
    }

}

/* End of file Auth.php */
