<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}
	public function _welcome_output($output = null)
	{
		$this->load->view('welcome_message.php',(array)$output);
	}
	public function tbl_jenjang()
	{
		$output = $this->grocery_crud->render();
		$this->_welcome_output($output);
	}

	public function index()
	{
		$this->_welcome_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}
	public function jenjang_management()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('tbl_jenjang');
			$crud->set_subject('Jenjang');
			$crud->required_fields('jenjang');
			$crud->columns('id_jenjang','jenjang');

			$output = $crud->render();

			$this->_welcome_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
}
