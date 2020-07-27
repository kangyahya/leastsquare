<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Global_model extends CI_model {
    function getData($table){
        return $this->db->get($table)->result();
    }
    function getDataById($field){
        $result = $this->db->query("SELECT * FROM tbl_fakultas where id_fakultas = '$field'");
        if($result->num_rows()>0){
            foreach($result->result() as $row){
                $hasil = [
                    'id_fakultas'=> $row->id_fakultas,
                    'fakultas'=> $row->fakultas,
                ];
            }
        }
        return $hasil;
    }
    function update($table, $data, $field){
        $this->db->where($field);
        return $this->db->update($table, $data);
    }
}