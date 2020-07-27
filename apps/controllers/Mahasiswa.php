<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mahasiswa extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Mahasiswa_model','Fakultas_model','Prodi_model','Sekolah_model']);
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $this->template('content/mahasiswa/tbl_mahasiswa_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Mahasiswa_model->json();
    }

    public function read($id) 
    {
        $row = $this->Mahasiswa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nim' => $row->nim,
		'nama' => $row->nama,
		'jk' => $row->jk,
		'fakultas' => $row->fakultas,
		'prodi' => $row->prodi,
		'nama_sekolah' => $row->nama_sekolah,
	    );
            $this->template('content/mahasiswa/tbl_mahasiswa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mahasiswa/create_action'),
	    'id' => set_value('id'),
	    'nim' => set_value('nim'),
	    'nama' => set_value('nama'),
	    'jk' => set_value('jk'),
	    'id_fakultas' => set_value('id_fakultas'),
	    'id_prodi' => set_value('id_prodi'),
        'id_sekolah' => set_value('id_sekolah'),
        'tahun' => set_value('tahun'),
        'fakultas' => $this->Fakultas_model->get_all(),
        'prodi' => $this->Prodi_model->get_all(),
        'sekolah' => $this->Sekolah_model->get_all(),
	);
        $this->template('content/mahasiswa/tbl_mahasiswa_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nim' => $this->input->post('nim',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'jk' => $this->input->post('jk',TRUE),
		'id_fakultas' => $this->input->post('id_fakultas',TRUE),
		'id_prodi' => $this->input->post('id_prodi',TRUE),
        'id_sekolah' => $this->input->post('id_sekolah',TRUE),
        'ta' => $this->input->post('tahun',TRUE),
	    );

            $this->Mahasiswa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect('mahasiswa');
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mahasiswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mahasiswa/update_action'),
		'id' => set_value('id', $row->id),
		'nim' => set_value('nim', $row->nim),
		'nama' => set_value('nama', $row->nama),
		'jk' => set_value('jk', $row->jk),
		'id_fakultas' => set_value('id_fakultas', $row->id_fakultas),
		'id_prodi' => set_value('id_prodi', $row->id_prodi),
        'id_sekolah' => set_value('id_sekolah', $row->id_sekolah),
        'tahun' => set_value('tahun', $row->ta),
        'fakultas' => $this->Fakultas_model->get_all(),
        'prodi' => $this->Prodi_model->get_all(),
        'sekolah' => $this->Sekolah_model->get_all(),
	    );
            $this->template('content/mahasiswa/tbl_mahasiswa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mahasiswa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nim' => $this->input->post('nim',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'jk' => $this->input->post('jk',TRUE),
		'id_fakultas' => $this->input->post('id_fakultas',TRUE),
		'id_prodi' => $this->input->post('id_prodi',TRUE),
		'id_sekolah' => $this->input->post('id_sekolah',TRUE),
	    );

            $this->Mahasiswa_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect('mahasiswa');
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mahasiswa_model->get_by_id($id);

        if ($row) {
            $this->Mahasiswa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect('mahasiswa');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('mahasiswa');
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nim', 'nim', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('jk', 'jk', 'trim|required');
	$this->form_validation->set_rules('id_fakultas', 'id fakultas', 'trim|required');
	$this->form_validation->set_rules('id_prodi', 'id prodi', 'trim|required');
    $this->form_validation->set_rules('id_sekolah', 'id sekolah', 'trim|required');
    $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    public function upload()
    {
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            //upload gagal
            $this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> '.$this->upload->display_errors().'</div>');
            //redirect halaman
            redirect('mahasiswa/');

        } else {

            $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('excel/'.$data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

            $data = array();

            $numrow = 1;
            foreach($sheet as $row){
                            if($numrow > 1){
                                array_push($data, array(
                                    'nim' => $row['A'],
                                    'nama'      => $row['B'],
                                    'jk'      => $row['C'],
                                    'id_fakultas' => $row['D'],
                                    'id_prodi' => $row['E'],
                                    'id_sekolah' => $row['F'],
                                    'ta' => $row['G'],
                                ));
                    }
                $numrow++;
            }
            $this->db->insert_batch('tbl_mahasiswa', $data);
            //delete file from server
            unlink(realpath('excel/'.$data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            //redirect halaman
            redirect('mahasiswa/');

        }
    }

}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-09 01:00:06 */
/* http://harviacode.com */