<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prediksi extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Mahasiswa_model','Fakultas_model','Prodi_model','Sekolah_model']);
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        
        if(!empty($this->input->post('submitted'))){
            if ($this->input->post('submitted')=="global") {
                $tahun = $this->input->post('tahun');
                $cek = $this->db->get_where('tbl_mahasiswa',['ta'=>$tahun]);
                $cekmax = $this->db->select_max('ta')->get('tbl_mahasiswa')->row();
                if ($cek->num_rows() > 0) {
                    $max = $tahun;
                }else{
                    $max = $cekmax->ta+1;
                }
                $x = [
                    'tot' => $this->db->query("select count(distinct ta) as total from tbl_mahasiswa")->row_array(),
                    'maxi' => $this->db->query("select count(nim) as qty from tbl_mahasiswa")->row_array(),
                    'prodi' => $this->db->order_by('id_prodi')->get('tbl_prodi')->result(),
                    'distribusi' => $this->db->get_where('v_prediksi_global'),
                    'total' => $this->db->query('select ta as tahun, count(nim) as dist from tbl_mahasiswa group by id_prodi order by id_prodi asc')->result(),
                    'ti' => $this->db->query('select id_prodi, count(nim) as dist from tbl_mahasiswa where id_prodi=1')->row(),
                    'sika' => $this->db->query('select id_prodi, count(nim) as dist from tbl_mahasiswa where id_prodi=2')->row(),
                    'dkv' => $this->db->query('select id_prodi, count(nim) as dist from tbl_mahasiswa where id_prodi=3')->row(),
                    'ta_max' => $max,
                    'global' => $this->db->query("SELECT ta as tahun, count(nim) AS dist FROM tbl_mahasiswa GROUP BY ta")->result_array(),
                ];
                
            }elseif($this->input->post('submitted')=="hitung"){
                $tahun = $this->input->post('tahun');
                $cek = $this->db->get_where('tbl_mahasiswa',['ta'=>$tahun]);
                $cekmax = $this->db->select_max('ta')->get('tbl_mahasiswa')->row();
                if ($cek->num_rows() > 0) {
                    $max = $tahun;
                }else{
                    $max = $cekmax->ta+1;
                }
                $x = [
                    'tot' => $this->db->query("select count(distinct ta) as total from tbl_mahasiswa")->row_array(),
                    'maxi' => $this->db->query("select count(nim) as qty from tbl_mahasiswa")->row_array(),
                    'prodi' => $this->db->order_by('id_prodi')->get('tbl_prodi')->result(),
                    'distribusi' => $this->db->get_where('v_prediksi_global'),
                    'total' => $this->db->query('select ta as tahun, count(nim) as dist from tbl_mahasiswa group by id_prodi order by id_prodi asc')->result(),
                    'ti' => $this->db->query('select id_prodi, count(nim) as dist from tbl_mahasiswa where id_prodi=1')->row(),
                    'sika' => $this->db->query('select id_prodi, count(nim) as dist from tbl_mahasiswa where id_prodi=2')->row(),
                    'dkv' => $this->db->query('select id_prodi, count(nim) as dist from tbl_mahasiswa where id_prodi=3')->row(),
                    'ta_max' => $max,
                    'prodi_' => $this->db->query("SELECT ta as tahun, count(nim) AS dist FROM tbl_mahasiswa GROUP BY id_prodi")->result_array(),
                ];
            }
            $this->template('content/prediksi/prediksi',$x);
        }else{
            $x = [
            'prodi' => $this->db->order_by('id_prodi')->get('tbl_prodi')->result(),
            'distribusi' => $this->db->get_where('v_prediksi_global'),
            'total' => $this->db->query('select ta as tahun, count(nim) as dist from tbl_mahasiswa group by id_prodi order by id_prodi asc')->result(),
            'ti' => $this->db->query('select id_prodi, count(nim) as dist from tbl_mahasiswa where id_prodi=1')->row(),
            'sika' => $this->db->query('select id_prodi, count(nim) as dist from tbl_mahasiswa where id_prodi=2')->row(),
            'dkv' => $this->db->query('select id_prodi, count(nim) as dist from tbl_mahasiswa where id_prodi=3')->row(),
        ];
            $this->template('content/prediksi/prediksi',$x);   
        }

    }
    function simpan(){
        $data = [
            'tahun' => $this->input->post('tahun'),
            'prediksi' => $this->input->post('prediksi'),
            'prodi' => $this->input->post('prodi'),
        ];
        $this->db->insert('lap_prediksi', $data);
        redirect('prediksi');
    }

}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-09 01:00:06 */
/* http://harviacode.com */