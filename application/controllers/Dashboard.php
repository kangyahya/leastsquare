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
        if($this->admin->logged_id())
        {

            $this->template("content/dashboard/dashboard");         

        }else{

            //jika session belum terdaftar, maka redirect ke halaman login
            redirect("login");

        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}