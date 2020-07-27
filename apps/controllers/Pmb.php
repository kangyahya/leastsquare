<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pmb extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pmb_model');
        $this->load->model('Prodi_model');
        $this->load->model('Jenjang_model');
        $this->load->model('Fakultas_model');
    }

    public function index()
    {
        $x = [
            'pmb' => $this->Pmb_model->get_all(),
            'prodi' => $this->Prodi_model->get_all(),
            'fakultas'=>$this->Fakultas_model->get_all(),
            'jenjang'=>$this->Jenjang_model->get_all()
        ];
        $this->template('content/data/data_list',$x);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pmb_model->json();
    }
    public function get_prodi(){
        $id_fakultas = $this->input->post('id',TRUE);
        $data = $this->Prodi_model->get_by_fakultas($id_fakultas)->result();
        echo json_encode($data);
    }

    public function read($id) 
    {
        $row = $this->Pmb_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pmb' => $row->id_pmb,
		'ta' => $row->ta,
		'id_fakultas' => $row->id_fakultas,
		'id_prodi' => $row->id_prodi,
		'id_jenjang' => $row->id_jenjang,
		'jml_pendaftar' => $row->jml_pendaftar,
	    );
            $this->load->view('pmb/tbl_pmb_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pmb'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pmb/create_action'),
	    'id_pmb' => set_value('id_pmb'),
	    'ta' => set_value('ta'),
	    'id_fakultas' => set_value('id_fakultas'),
	    'id_prodi' => set_value('id_prodi'),
	    'id_jenjang' => set_value('id_jenjang'),
	    'jml_pendaftar' => set_value('jml_pendaftar'),
	);
        $this->load->view('content/pmb/tbl_pmb_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'ta' => $this->input->post('ta',TRUE),
		'id_fakultas' => $this->input->post('id_fakultas',TRUE),
		'id_prodi' => $this->input->post('id_prodi',TRUE),
		'id_jenjang' => $this->input->post('id_jenjang',TRUE),
		'jml_pendaftar' => $this->input->post('jml_pendaftar',TRUE),
	    );

            $this->Pmb_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect('pmb');
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pmb_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pmb/update_action'),
		'id_pmb' => set_value('id_pmb', $row->id_pmb),
		'ta' => set_value('ta', $row->ta),
		'id_fakultas' => set_value('id_fakultas', $row->id_fakultas),
		'id_prodi' => set_value('id_prodi', $row->id_prodi),
		'id_jenjang' => set_value('id_jenjang', $row->id_jenjang),
		'jml_pendaftar' => set_value('jml_pendaftar', $row->jml_pendaftar),
	    );
            $this->load->view('pmb/tbl_pmb_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pmb'));
        }
    }

    public function get_data_edit(){
        $id_pmb = $this->input->post('id_pmb', TRUE);
        $data = $this->Pmb_model->get_by_id($id_pmb);
        echo json_encode($data);
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pmb', TRUE));
        } else {
            $data = array(
		'ta' => $this->input->post('ta',TRUE),
		'id_fakultas' => $this->input->post('id_fakultas',TRUE),
		'id_prodi' => $this->input->post('id_prodi',TRUE),
		'id_jenjang' => $this->input->post('id_jenjang',TRUE),
		'jml_pendaftar' => $this->input->post('jml_pendaftar',TRUE),
	    );

            $this->Pmb_model->update($this->input->post('id_pmb', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pmb'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pmb_model->get_by_id($id);

        if ($row) {
            $this->Pmb_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pmb'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pmb'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ta', 'ta', 'trim|required');
	$this->form_validation->set_rules('id_fakultas', 'id fakultas', 'trim|required');
	$this->form_validation->set_rules('id_prodi', 'id prodi', 'trim|required');
	$this->form_validation->set_rules('id_jenjang', 'id jenjang', 'trim|required');
	$this->form_validation->set_rules('jml_pendaftar', 'jml pendaftar', 'trim|required');

	$this->form_validation->set_rules('id_pmb', 'id_pmb', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
