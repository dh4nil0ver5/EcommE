<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Crud extends MY_Model
{
    private $tb_isi = 'data';
    

    function __construct(){
        parent::__construct();
    }
    
    public function insert_data($data = array()) {
        $data = $this->db->insert($this->tb_isi,$data);
        if(!$data){
            return $data;
        }else{
            $data = $this->db->get($this->tb_isi);
            return $data->result_array();
        }
    }
    
    public function ambil_data($data = array()) {
        $data = $this->db->get_where($this->tb_isi,$data);
        if(!$data){
            return $data;
        }else{
            return $data->result();
        }
    }
    
    public function ubah_data($where, $data = array()) {
        $this->db->where($where);
	$query = $this->db->update($this->tb_isi,$data);
        return $query;
    }
    
    public function hapus_data($where = array()) {
        $this->db->where($where);
	$query = $this->db->delete($this->tb_isi);
        return $query;
    }
}