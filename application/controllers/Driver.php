<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller {

    public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('m_sekawan');
        
        if($this->session->userdata('role') != 1){
            $this->session->set_flashdata('messages', '<br><div class="alert alert-danger" role="alert"> <strong> Error! </strong>Silahkan login terlebih dahulu </div>');
            redirect(base_url("login"));
        }
    }
    
    public function index(){
        $data['content']    = 'driver/v_driver';
        $data['title']      = 'Driver';
        $data['driver']     = $this->m_sekawan->getWhere('driver', array('status_driver' => 1))->result();

        $this->load->view('template/template', $data);
    }

    public function add(){
        $data['content']    = 'driver/v_driver_add';
        $data['title']      = 'Driver';

        $this->load->view('template/template', $data);
    }

    public function doAdd(){
        $data = $_POST;

        $this->m_sekawan->insert('driver', $data);

		$this->session->set_flashdata('messages', '<div class="alert alert-success " role="alert"><strong>Sukses!</strong> Berhasil tambah driver.	</div>');

		redirect('Driver');
    }

    public function edit($id_driver){
        $condition = array('id_driver' => $id_driver);

        $data['content']    = 'driver/v_driver_edit';
        $data['title']      = 'Driver';
        $data['driver']     = $this->m_sekawan->getWhere('driver', $condition)->result();

        $this->load->view('template/template', $data);
    }

    public function doEdit(){
        $data       = $_POST;
        $condition  = array('id_driver' => $this->input->post('id_driver'));
        
        $this->m_sekawan->update('driver', $data, $condition);

        if($this->db->affected_rows() >= 0){
            $this->session->set_flashdata('messages', '<div class="alert alert-success " role="alert"><strong>Sukses!</strong> Berhasil update driver.	</div>');

            redirect('Driver');
        }else{
            $this->session->set_flashdata('messages', '<div class="alert alert-warning " role="alert"><strong>Warning!</strong> Tidak ada perubahan data.	</div>');

            redirect('Driver');
        }
    }

    public function delete($id_driver){
        $condition  = array('id_driver' => $id_driver);

        $this->m_sekawan->delete('driver', $condition);

        if($this->db->affected_rows() >= 0){
            $this->session->set_flashdata('messages', '<div class="alert alert-success " role="alert"><strong>Sukses!</strong> Berhasil hapus driver.	</div>');

            redirect('Driver');
        }else{
            $this->session->set_flashdata('messages', '<div class="alert alert-warning " role="alert"><strong>Warning!</strong> Tidak ada perubahan data.	</div>');

            redirect('Driver');
        }
    }
}
