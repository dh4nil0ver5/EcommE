<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Karyawan extends MY_Model
{
    private $tb_karyawan = 'karyawan';
    

    function __construct(){
        parent::__construct();
    }
    
    function index($id = null){
        $where = "`b`.`salary` > '2000' AND `b`.`tunjangan` > '1000000'";
        $data = $this->db->select('*')
                    ->from('karyawan as a')
                    ->where($where)
                    ->join('golongan as b', 'a.id = b.id_karyawan')
                    ->group_by("a.id")
                    ->get();
        return $data->result();
    }
    
    function cari($id = null){
        $where = "a.nama = '".$id."'";
        $data = $this->db->select('*')
                    ->from('karyawan as a')
                    ->where($where)
                    ->join('golongan as b', 'a.id = b.id_karyawan')
                    ->group_by("a.id")
                    ->get();
//            echo $this->db->last_query();
        return $data->result();
        
    }
}