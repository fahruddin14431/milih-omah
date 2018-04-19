<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

    function makeTitle($string){
        return ucwords(strtolower(str_replace('_',' ',$string)));
    }

    function getLastId($table, $field, $prefix){
        
        $ci=& get_instance();
        $ci->load->database(); 

        $sql = $ci->db->select_max($field)
                        ->get($table);
        $id = '';

        if(empty($sql->row_array()[$field])){
            $id = $prefix."1001";
        }else{
            $last_id = $sql->row_array();
            $last_id = substr($last_id[$field],3)+1;
            $id = $prefix.$last_id;
        }
        return $id;
    }

    function setAlert($title, $message)
    {
        $ci=& get_instance();
        $ci->session->set_flashdata($title, $message);
    }

    function getAlert($title)
    {
        $ci=& get_instance();
        $alert = $ci->session->flashdata($title);
        if(!empty($alert)):
            echo "<div class='alert alert-success'>";
                echo $ci->session->flashdata($title);
            echo "</div>";
        endif;
    }

?>