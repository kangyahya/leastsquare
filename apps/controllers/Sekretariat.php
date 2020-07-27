<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sekretariat extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        $this->load->model('global_model', 'gm');
    }
	public function index()
	{   
        if($this->admin->logged_id())
        {

            $this->template("content/sekretariat/fakultas");         

        }else{

            //jika session belum terdaftar, maka redirect ke halaman login
            redirect("login");

        }
    }
    public function fakultas($p=null){
        if(empty($p)){
            header('Content-Type: application/json');
            $data = $this->gm->getData('tbl_fakultas');
            echo json_encode($data);
        }elseif($p=="get"){
            $id = $this->input->get('id');
            $data = $this->gm->getDataById($id);
            echo json_encode($data);
        }elseif($p=="update"){
            $data = [
                'fakultas'=>$this->input->post('fakultas')
            ];
            $id = $this->input->post('id_fakultas');
            $data = $this->gm->update('tbl_fakultas',$data, ['id_fakultas'=>$id]);
            echo json_encode($data);
        }elseif($p=="add"){
            $dataarray = [
                'fakultas'=>$this->input->post('fakultas')
            ];
            $data = $this->gm->insert('tbl_fakultas', $dataarray);
            echo json_encode($data);
        }
        

    }
    public function get_fakultas(){
        

    }
    function update_fakultas(){
        if($this->input->post('type')==3){
            $id=$this->input->post('id_fakultas');
            $name=$this->input->post('fakultas');
            $data = ['fakultas'=>$name];
            $this->gm->update('fakultas',$data,['id_fakultas'=>$id]);
            echo json_encode(["statusCode"=>200]);
        }
    }
}