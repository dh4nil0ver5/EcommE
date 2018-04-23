<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Karyawan extends MY_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('M_Karyawan', 'master'); //include ke model dan definisi nama ke string ke2 dan nama url direktori ('hygiene') dan  file M_master
    }
    
    function index(){
        $data['data'] = $this->master->index();
        return $this->load->view('karyawan', $data);
    }
    function cari_data(){
        $id = $this->input->post('nama');
        $result = $this->master->cari($id);
        if($result){
            echo $this->response(200, $result);
        }else{
            echo $this->response(400, $result);
        }
    }
}      