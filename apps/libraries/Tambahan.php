<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Tambahan
{
	protected $default_css_path			= null;
	protected $default_js_path			= null;
	public function set_css($css_file)
	{
		$this->css_files[sha1($css_file)] = base_url().$css_file;
	}

	public function set_js($js_file)
	{
		$this->js_files[sha1($js_file)] = base_url().$js_file;
	}

	public function set_js_lib($js_file)
	{
		$this->js_lib_files[sha1($js_file)] = base_url().$js_file;
		$this->js_files[sha1($js_file)] = base_url().$js_file;
	}

	public function set_js_config($js_file)
	{
		$this->js_config_files[sha1($js_file)] = base_url().$js_file;
		$this->js_files[sha1($js_file)] = base_url().$js_file;
	}
	public function load_js_datatable(){
		$this->set_css($this->default_css_path.'assets/datatables/dataTables.bootstrap.css');
		$this->set_js($this->default_js_path.'assets/js/jquery-1.11.2.min.js');
		$this->set_js($this->default_js_path.'assets/datatables/jquery.dataTables.js');
	}
}
?>