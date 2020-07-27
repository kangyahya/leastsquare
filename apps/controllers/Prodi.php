<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prodi extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Prodi_model');
        $this->load->model('Fakultas_model');
        $this->load->model('Jenjang_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $x = [
            'prodi' => $this->Prodi_model->get_all(),
            'fakultas' => $this->Fakultas_model->get_all(),
            'jenjang' => $this->Jenjang_model->get_all()
        ];
        $this->template('content/prodi/tbl_prodi_list',$x);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Prodi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Prodi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_prodi' => $row->id_prodi,
		'prodi' => $row->prodi,
		'id_fakultas' => $row->id_fakultas,
		'id_jenjang' => $row->id_jenjang,
	    );
            $this->load->view('prodi/tbl_prodi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prodi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('prodi/create_action'),
	    'id_prodi' => set_value('id_prodi'),
	    'prodi' => set_value('prodi'),
	    'id_fakultas' => set_value('id_fakultas'),
	    'id_jenjang' => set_value('id_jenjang'),
	);
        $this->load->view('prodi/tbl_prodi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'prodi' => $this->input->post('prodi',TRUE),
		'id_fakultas' => $this->input->post('id_fakultas',TRUE),
		'id_jenjang' => $this->input->post('id_jenjang',TRUE),
	    );

            $this->Prodi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect('prodi');
        }
    }
    
    public function update($id) 
    {
        $row = $this->Prodi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('prodi/update_action'),
		'id_prodi' => set_value('id_prodi', $row->id_prodi),
		'prodi' => set_value('prodi', $row->prodi),
		'id_fakultas' => set_value('id_fakultas', $row->id_fakultas),
		'id_jenjang' => set_value('id_jenjang', $row->id_jenjang),
	    );
            $this->load->view('prodi/tbl_prodi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prodi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_prodi', TRUE));
        } else {
            $data = array(
		'prodi' => $this->input->post('prodi',TRUE),
		'id_fakultas' => $this->input->post('id_fakultas',TRUE),
		'id_jenjang' => $this->input->post('id_jenjang',TRUE),
	    );

            $this->Prodi_model->update($this->input->post('id_prodi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect('prodi');
        }
    }
    
    public function delete() 
    {
        $id = $this->input->post('id_prodi');
        $row = $this->Prodi_model->get_by_id($id);

        if ($row) {
            $this->Prodi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect('prodi');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('prodi');
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('prodi', 'prodi', 'trim|required');
	$this->form_validation->set_rules('id_fakultas', 'id fakultas', 'trim|required');
	$this->form_validation->set_rules('id_jenjang', 'id jenjang', 'trim|required');

	$this->form_validation->set_rules('id_prodi', 'id_prodi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_prodi.xls";
        $judul = "tbl_prodi";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Prodi");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Fakultas");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Jenjang");

	foreach ($this->Prodi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->prodi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_fakultas);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_jenjang);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_prodi.doc");

        $data = array(
            'tbl_prodi_data' => $this->Prodi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('prodi/tbl_prodi_doc',$data);
    }

}

/* End of file Prodi.php */
/* Location: ./application/controllers/Prodi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-08 11:30:48 */
/* http://harviacode.com */