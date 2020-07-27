<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Forecasting_model extends CI_model {
    function show($table){
        return $this->db->get($table);
    }
    function save_batch($table, $data){
        return $this->db->insert_batch($table, $data);
    }
}