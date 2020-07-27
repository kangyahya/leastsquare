<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fakultas extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Fakultas_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $x['fakultas'] = $this->Fakultas_model->get_all();
        $this->template('content/fakultas/tbl_fakultas_list',$x);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Fakultas_model->json();
    }

    public function read($id) 
    {
        $row = $this->Fakultas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_fakultas' => $row->id_fakultas,
		'fakultas' => $row->fakultas,
	    );
            $this->template('fakultas/tbl_fakultas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fakultas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('fakultas/create_action'),
	        'id_fakultas' => set_value('id_fakultas'),
	        'fakultas' => set_value('fakultas'),
	    );
        $this->template('fakultas/tbl_fakultas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		    'fakultas' => $this->input->post('fakultas',TRUE),
	        );
            $this->Fakultas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect('fakultas');
        }
    }
    
    public function update($id) 
    {
        $row = $this->Fakultas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('fakultas/update_action'),
		'id_fakultas' => set_value('id_fakultas', $row->id_fakultas),
		'fakultas' => set_value('fakultas', $row->fakultas),
	    );
            $this->template('fakultas/tbl_fakultas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('fakultas');
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_fakultas', TRUE));
        } else {
            $data = array(
		    'fakultas' => $this->input->post('fakultas',TRUE),
	    );

            $this->Fakultas_model->update($this->input->post('id_fakultas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect('fakultas');
        }
    }
    
    public function delete_action() 
    {
        $id = $this->input->post('id_fakultas');
        $row = $this->Fakultas_model->get_by_id($id);

        if ($row) {
            $this->Fakultas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect('fakultas');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('fakultas');
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('fakultas', 'fakultas', 'trim|required');
	$this->form_validation->set_rules('id_fakultas', 'id_fakultas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Fakultas.php */
/* Location: ./application/controllers/Fakultas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-08 09:19:31 */
/* http://harviacode.com */