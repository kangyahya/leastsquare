<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prodi_model extends CI_Model
{

    public $table = 'tbl_prodi';
    public $id = 'id_prodi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('tbl_prodi.id_prodi,prodi,tbl_prodi.id_fakultas,tbl_prodi.id_jenjang, fakultas, jenjang');
        $this->datatables->from('tbl_prodi');
        //add this line for join
        $this->datatables->join('tbl_fakultas', 'tbl_prodi.id_fakultas = tbl_fakultas.id_fakultas');
        $this->datatables->join('tbl_jenjang', 'tbl_prodi.id_jenjang = tbl_jenjang.id_jenjang');
        $this->datatables->add_column('action', anchor('prodi#update$1','Update', array('class'=>'btn btn-info btn-xs', 'data-toggle'=>'modal'))." ".anchor('prodi#delete$1','Delete',array('class'=>'btn btn-danger btn-xs','data-toggle'=>'modal')), 'id_prodi');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_by_fakultas($id){
        $this->db->where('id_fakultas',$id);
        return $this->db->get($this->table);
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_prodi', $q);
	$this->db->or_like('prodi', $q);
	$this->db->or_like('id_fakultas', $q);
	$this->db->or_like('id_jenjang', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_prodi', $q);
	$this->db->or_like('prodi', $q);
	$this->db->or_like('id_fakultas', $q);
	$this->db->or_like('id_jenjang', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

