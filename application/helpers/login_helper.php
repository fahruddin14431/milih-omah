<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

    function isLogin(){
        $CI =& get_instance();
        if($CI->session->has_userdata('pengguna')) {          
            return TRUE;
        }
        return FALSE;
    }

    function isAdmin(){
        $CI =& get_instance();
        return $CI->session->userdata('id_peran')=='PER1001';
    }

    function isOperator(){
        $CI =& get_instance();
        return $CI->session->userdata('id_peran')=='PER1002';
    }

    function isSurveyor(){
        $CI =& get_instance();
        return $CI->session->userdata('id_peran')=='PER1003';
    }

    function isLurah(){
        $CI =& get_instance();
        return $CI->session->userdata('id_peran')=='PER1004';
    }

?>