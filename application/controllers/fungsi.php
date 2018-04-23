<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Fungsi extends MY_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('M_Crud', 'master'); //include ke model dan definisi nama ke string ke2 dan nama url direktori ('hygiene') dan  file M_master
    }
    
    function simpan(){
        $data['data1'] = $this->input->post('data1');
        $data['data2'] = $this->input->post('data2');
        $data['data3'] = $this->input->post('data3');
        $data['data4'] = $this->input->post('data4');
        $result = $this->master->insert_data($data);
        if($result){
            echo $this->response(200, $result);
        }else{
            echo $this->response(400, $result);
        }
    }
    
    function edit(){
        $data['id'] = $this->input->post('id');
        $result = $this->master->ambil_data($data);
        if($result){
            echo $this->response(200, $result);
        }else{
            echo $this->response(400, $result);
        }
        
    }
    function ubah(){
        $where['id'] = $this->input->post('id');
        $data['data1'] = $this->input->post('data1');
        $data['data2'] = $this->input->post('data2');
        $data['data3'] = $this->input->post('data3');
        $data['data4'] = $this->input->post('data4');
        $result = $this->master->ubah_data($where, $data);
        if($result){
            echo $this->response(200, $result);
        }else{
            echo $this->response(400, $result);
        }
        
    }
    function hapus(){
        $where['id'] = $this->input->post('id');
        $result = $this->master->hapus_data($where);
        if($result){
            echo $this->response(200, $result);
        }else{
            echo $this->response(400, $result);
        }
        
    }
}      