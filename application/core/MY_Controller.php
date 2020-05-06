<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function template($content,$data=NULL)
	{
		$data['topheader'] = $this->load->view('themes/topheader',$data,TRUE);
		$data['sidebar'] = $this->load->view('themes/sidebar',$data,TRUE);
		$data['content'] = $this->load->view($content,$data,TRUE);
		$this->load->view('themes/index',$data);
	}
}