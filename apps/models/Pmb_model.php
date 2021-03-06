<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pmb_model extends CI_Model
{

    public $table = 'tbl_pmb';
    public $id = 'id_pmb';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_pmb,ta,fakultas,prodi,jenjang,jml_pendaftar');
        $this->datatables->from('tbl_pmb');
        //add this line for join
        $this->datatables->join('tbl_fakultas', 'tbl_pmb.id_fakultas = tbl_fakultas.id_fakultas');
        $this->datatables->join('tbl_prodi', 'tbl_pmb.id_fakultas = tbl_prodi.id_prodi');
        $this->datatables->join('tbl_jenjang', 'tbl_pmb.id_jenjang = tbl_jenjang.id_jenjang');
        $this->datatables->add_column('action', anchor('pmb#update$1','Update', array('class'=>'btn btn-info btn-xs', 'data-toggle'=>'modal'))." ".anchor('pmb#delete$1','Delete',array('class'=>'btn btn-danger btn-xs', 'data-toggle'=>'modal')), 'id_pmb');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_pmb', $q);
	$this->db->or_like('ta', $q);
	$this->db->or_like('id_fakultas', $q);
	$this->db->or_like('id_prodi', $q);
	$this->db->or_like('id_jenjang', $q);
	$this->db->or_like('jml_pendaftar', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pmb', $q);
	$this->db->or_like('ta', $q);
	$this->db->or_like('id_fakultas', $q);
	$this->db->or_like('id_prodi', $q);
	$this->db->or_like('id_jenjang', $q);
	$this->db->or_like('jml_pendaftar', $q);
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

/* End of file Pmb_model.php */
/* Location: ./application/models/Pmb_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-12 00:00:02 */
/* http://harviacode.com */