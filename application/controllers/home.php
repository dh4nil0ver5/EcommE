<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');
 
class Home extends MY_Controller {
	function __construct(){
            parent::__construct();
            $this->load->model('M_login', 'master'); //include ke model dan definisi nama ke string ke2 dan nama url direktori ('hygiene') dan  file M_master
        }
        
	function cek_user(){
            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');
            if($data['password'] == ""){
                $where['email'] = $data["email"];
                $result = $this->master->cek_login($where);
            }else{
                $result = $this->master->cek_login($data);
            }
                if($result){
                    echo $this->response(200, $result);
                }else{
                    echo $this->response(400, $result);
                }
	}
        
        function login(){
            $this->load->view("login");
        }
}