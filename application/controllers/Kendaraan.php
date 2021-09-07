<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {

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
        $data['content']    = 'kendaraan/v_kendaraan';
        $data['title']      = 'Kendaraan';
        $data['kendaraan']  = $this->m_sekawan->getAll('kendaraan')->result();

        $this->load->view('template/template', $data);
    }

    public function add(){
        $data['content']    = 'kendaraan/v_kendaraan_add';
        $data['title']      = 'Kendaraan';

        $this->load->view('template/template', $data);
    }

    public function doAdd(){
        $data = $_POST;

        $this->m_sekawan->insert('kendaraan', $data);

        logging("Kendaraan", "Insert", $this->input->post('nama_kendaraan'));
		$this->session->set_flashdata('messages', '<div class="alert alert-success " role="alert"><strong>Sukses!</strong> Berhasil tambah kendaraan.	</div>');

		redirect('Kendaraan');
    }

    public function edit($id_Kendaraan){
        $condition = array('id_Kendaraan' => $id_Kendaraan);

        $data['content']    = 'kendaraan/v_kendaraan_edit';
        $data['title']      = 'Kendaraan';
        $data['kendaraan']  = $this->m_sekawan->getWhere('Kendaraan', $condition)->result();

        $this->load->view('template/template', $data);
    }

    public function doEdit(){
        $data       = $_POST;
        $condition  = array('id_kendaraan' => $this->input->post('id_kendaraan'));
        
        $this->m_sekawan->update('kendaraan', $data, $condition);

        if($this->db->affected_rows() >= 0){
            logging("Kendaraan", "Update", $this->input->post('nama_kendaraan'));
            $this->session->set_flashdata('messages', '<div class="alert alert-success " role="alert"><strong>Sukses!</strong> Berhasil update kendaraan.	</div>');

            redirect('Kendaraan');
        }else{
            $this->session->set_flashdata('messages', '<div class="alert alert-warning " role="alert"><strong>Warning!</strong> Tidak ada perubahan data.	</div>');

            redirect('Kendaraan');
        }
    }

    public function delete($id_Kendaraan){
        $condition  = array('id_kendaraan' => $id_Kendaraan);

        $this->m_sekawan->delete('kendaraan', $condition);

        if($this->db->affected_rows() >= 0){
            logging("Kendaraan", "Delete", $id_Kendaraan);
            $this->session->set_flashdata('messages', '<div class="alert alert-success " role="alert"><strong>Sukses!</strong> Berhasil hapus kendaraan.	</div>');

            redirect('Kendaraan');
        }else{
            $this->session->set_flashdata('messages', '<div class="alert alert-warning " role="alert"><strong>Warning!</strong> Tidak ada perubahan data.	</div>');

            redirect('Kendaraan');
        }
    }
}
