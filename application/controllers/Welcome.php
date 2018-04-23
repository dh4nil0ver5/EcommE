<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {
    
    function __construct()
    {
        parent::__construct();

        $this->load->model('', 'master'); //include ke model dan definisi nama ke string ke2 dan nama url direktori ('hygiene') dan  file M_master
    }
    
    public function index()
	{
            $this->load->helper('url');
            $this->load->view('welcome_message');
	}
}
