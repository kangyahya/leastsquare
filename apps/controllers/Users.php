<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');        
	   $this->load->library('datatables');
    }

    public function index()
    {
        $this->template('content/users/users');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Users_model->json();
    }

    public function read($id) 
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_users' => $row->id_users,
        		'username' => $row->username,
        		'password' => $row->password,
        		'nickname' => $row->nickname,
        		'img' => $row->img,
        		'id_group' => $row->id_group,
        		'last_login' => $row->last_login,
        		'ip_address' => $row->ip_address,
	       );
            $this->load->view('users/tbl_users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('users/create_action'),
	    'id_users' => set_value('id_users'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'nickname' => set_value('nickname'),
	    'img' => set_value('img'),
	    'id_group' => set_value('id_group'),
	    'last_login' => set_value('last_login'),
	    'ip_address' => set_value('ip_address'),
	);
        $this->load->view('users/tbl_users_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'nickname' => $this->input->post('nickname',TRUE),
		'img' => $this->input->post('img',TRUE),
		'id_group' => $this->input->post('id_group',TRUE),
		'last_login' => $this->input->post('last_login',TRUE),
		'ip_address' => $this->input->post('ip_address',TRUE),
	    );

            $this->Users_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users/update_action'),
		'id_users' => set_value('id_users', $row->id_users),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'nickname' => set_value('nickname', $row->nickname),
		'img' => set_value('img', $row->img),
		'id_group' => set_value('id_group', $row->id_group),
		'last_login' => set_value('last_login', $row->last_login),
		'ip_address' => set_value('ip_address', $row->ip_address),
	    );
            $this->load->view('users/tbl_users_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_users', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'nickname' => $this->input->post('nickname',TRUE),
		'img' => $this->input->post('img',TRUE),
		'id_group' => $this->input->post('id_group',TRUE),
		'last_login' => $this->input->post('last_login',TRUE),
		'ip_address' => $this->input->post('ip_address',TRUE),
	    );

            $this->Users_model->update($this->input->post('id_users', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('nickname', 'nickname', 'trim|required');
	$this->form_validation->set_rules('img', 'img', 'trim|required');
	$this->form_validation->set_rules('id_group', 'id group', 'trim|required');
	$this->form_validation->set_rules('last_login', 'last login', 'trim|required');
	$this->form_validation->set_rules('ip_address', 'ip address', 'trim|required');

	$this->form_validation->set_rules('id_users', 'id_users', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-11 20:53:57 */
/* http://harviacode.com */