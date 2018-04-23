<?php

class Homepage extends MY_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('M_login', 'master'); 
    }
    
    function index() {
        $data['data'] = $this->master->ambil();
        return $this->load->view('homepage', $data);
    }
}