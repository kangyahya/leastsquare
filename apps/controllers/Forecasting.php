<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Forecasting extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
        //load model admin
		$this->load->model('admin');
		$this->load->model('forecasting_model');
	}
	public function index()
	{
		if($this->admin->logged_id())
        {
			$data['fakultas'] = $this->forecasting_model->show("tbl_fakultas");
			$data['tahun'] = $this->db->query("select distinct tahun from tbl_distribution")->result_array();
			$data['ti'] = $this->db->query("select sum(dist) as dist from tbl_distribution where id_prodi=1")->row_array();
			$data['si'] = $this->db->query("select sum(dist) as dist from tbl_distribution where id_prodi=2")->row_array();
			$data['dkv'] = $this->db->query("select sum(dist) as dist from tbl_distribution where id_prodi=3")->row_array();
			$data['mi'] = $this->db->query("select sum(dist) as dist from tbl_distribution where id_prodi=4")->row_array();
			$data['ka'] = $this->db->query("select sum(dist) as dist from tbl_distribution where id_prodi=5")->row_array();
			$data['manj'] = $this->db->query("select sum(dist) as dist from tbl_distribution where id_prodi=6")->row_array();
			$data['akun'] = $this->db->query("select sum(dist) as dist from tbl_distribution where id_prodi=7")->row_array();
			$data['mb'] = $this->db->query("select sum(dist) as dist from tbl_distribution where id_prodi=8")->row_array();
			$data['prodi'] = $this->forecasting_model->show("tbl_prodi")->result_array();
			$data["global"] = $this->db->query("SELECT tahun, SUM(dist) AS dist FROM tbl_distribution GROUP BY tahun")->result_array();
            $this->template("content/forecasting/forecasting", $data);         

        }else{
            //jika session belum terdaftar, maka redirect ke halaman login
            redirect("login");

        }
	}
	function tambah(){
		$this->template("content/forecasting/tambah");
		if(!empty($this->input->post('submitted'))){
			$tahun = $this->input->post('tahun');
			$dist = $this->input->post('dist');
			$fakultas = $this->input->post('fakultas');
			$jenjang = $this->input->post('jenjang');
			$prodi = $this->input->post('prodi');
			$data = [];
			
			for($i=1;$i<=8;$i++){
				array_push($data,[
					'tahun'=>$tahun,
					'dist'=>$dist[$i],
					'id_fakultas'=>$fakultas[$i],
					'id_jenjang'=>$jenjang[$i],
					'id_prodi'=>$prodi[$i]
				]);
			}
			$sql = $this->forecasting_model->save_batch('tbl_distribution',$data);
			if($sql){
				$this->session->set_flashdata('success',"Data Berhasil Ditambah");
				redirect('forecasting');
			}else{
				$this->session->set_flashdata('error',"Data Gagal Ditambah");
				redirect('forecasting/tambah');
			}
		}
	}
}