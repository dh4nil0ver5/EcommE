<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Login extends MY_Model
{
    private $tb_login = 'login';
    private $tb_isi = 'data';
    
    function __construct(){
        parent::__construct();
    }
    
    public function ambil($param = null) {
        $data = $this->db->get($this->tb_isi);
        return $data->result();
    }
    
    public function cek_login($data = array()) {
        $data = $this->db->get_where($this->tb_login,$data);
        if(!$data){
            return $data->result_array();
        }else{
            return $data->result_array();
        }
    }
    
}