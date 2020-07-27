<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
    }
	public function index()
	{
        $x['TI'] = "TI";
        $x['sika'] = "SIKA";
        $x["dkv"] = "DKV";
        $this->template("content/dashboard/dashboard",$x);
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}