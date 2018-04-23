<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MY_Controller extends CI_Controller {
    
    public function response($kode, $data = array()) {
        if($kode == 200){
            $output['status'] = 200;
            $output['message'] = "OK";
            $output['jumlah'] = count($data);
            $output['data'] = $data;
            return json_encode($output);
        }else{
            $output['status'] = 400;
            $output['message'] = "ERROR";
            $output['jumlah'] = count($data);
            $output['data'] = $data;
            return json_encode($output);
        }
    }
    
    public function request($data = NULL, $unset = false){
        $out = array();

        //$data NULL => ambil semua parameter post kecuali token

        //$data is array ambil data sesuai yg ada di array


        //$data is array dan $ unset true, ambil data yg tidak ada di array
        if ($unset) {
          foreach ($_POST as $key => $value) {

              if (in_array($key, $data)) {

              }else{
                $out[$key] = $value;

              }
          }
          $out = array_change_key_case(  $out, CASE_UPPER );

          return $out;
        }

        if (is_array($data)) {
            foreach ($_POST as $key => $value) {

                if (in_array($key, $data)) {

                    $out[$key] = $value;
                }
            }
            $out = array_change_key_case(  $out, CASE_UPPER );
        }else{
            $temp = $_POST;

            unset($temp['token']);
            $out = array_change_key_case(  $temp, CASE_UPPER );
        }

        return $out;
    }
}