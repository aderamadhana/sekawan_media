<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('m_sekawan');
        
        // if($this->session->userdata('role') != 1){
        //     $this->session->set_flashdata('messages', '<br><div class="alert alert-danger" role="alert"> <strong> Error! </strong>Silahkan login terlebih dahulu </div>');
        //     redirect(base_url("login"));
        // }
    }
    
    public function pegawai(){
        $data['content']    = 'pemesanan/v_pemesanan_pegawai';
        $data['title']      = 'Pemesanan';
        $data['pemesanan']  = $this->m_sekawan->getPemesananByPegawai()->result();

        $this->load->view('template/template', $data);
    }

    public function pihak_setuju(){
        $data['content']        = 'pemesanan/v_pemesanan_pihak_setuju';
        $data['title']          = 'Pemesanan';
        $data['pihak_pertama']  = $this->m_sekawan->getPemesananByPihakSetujuPertama()->result();
        $data['pihak_kedua']    = $this->m_sekawan->getPemesananByPihakSetujuKedua()->result();

        $this->load->view('template/template', $data);
    }

    public function admin(){
        $data['content']    = 'pemesanan/v_pemesanan_admin';
        $data['title']      = 'Pemesanan';
        $data['pemesanan']  = $this->m_sekawan->getPemesanan()->result();

        $this->load->view('template/template', $data);
    }

    public function add(){
        $data['content']    = 'pemesanan/v_pemesanan_pegawai_add';
        $data['title']      = 'Pemesanan';
        $data['kendaraan']  = $this->m_sekawan->getWhere('kendaraan', array('status_kendaraan' => 1, 'status_servis' => 0))->result();

        $this->load->view('template/template', $data);
    }

    public function doAdd(){
        $data = $_POST;

        $this->m_sekawan->insert('pemesanan', $data);

        logging("Pemesanan", "Insert", $this->input->post('id_kendaraan'));
		$this->session->set_flashdata('messages', '<div class="alert alert-success " role="alert"><strong>Sukses!</strong> Berhasil tambah pemesanan kendaraan.	</div>');

		redirect('Pemesanan/pegawai');
    }

    public function konfirmasiPemesanan($id_pemesanan){
        $data['content']            = 'pemesanan/v_pemesanan_admin_konfirmasi';
        $data['title']              = 'Pemesanan';
        $data['pemesanan']          = $this->m_sekawan->getPemesananById('pemesanan', array('id_pemesanan' => $id_pemesanan))->result();
        $data['driver']             = $this->m_sekawan->getWhere('driver', array('status_driver' => 1))->result();
        $data['user_persetujuan']   = $this->m_sekawan->getWhere('user', array('role' => 2))->result();
        
        $this->load->view('template/template', $data);
    }

    public function doKonfirmasiPemesanan(){
        $data       = $_POST;
        $condition  = array('id_pemesanan' => $this->input->post('id_pemesanan'));
        
        if($this->input->post('id_pihak_pertama') != $this->input->post('id_pihak_kedua')){
            $this->m_sekawan->update('pemesanan', $data, $condition);

            if($this->db->affected_rows() >= 0){
                
                logging("Pemesanan", "Konfirmasi Pemesanan (Admin)", $this->input->post('id_pemesanan'));
                $this->session->set_flashdata('messages', '<div class="alert alert-success " role="alert"><strong>Sukses!</strong> Berhasil konfirmasi pemesanan.	</div>');
    
                redirect('Pemesanan/admin');
            }else{
                $this->session->set_flashdata('messages', '<div class="alert alert-warning " role="alert"><strong>Warning!</strong> Tidak ada perubahan data.	</div>');
    
                redirect('Pemesanan/admin');
            }
        }else{
            $this->session->set_flashdata('messages', '<div class="alert alert-danger " role="alert"><strong>Error!</strong> Pastikan pihak pertama dan pihak kedua berbeda.	</div>');
    
            redirect('Pemesanan/konfirmasiPemesanan/'.$this->input->post('id_pemesanan'));
        }
    }

    public function konfirmasiPemesananPihakPertama($id_pemesanan){
        $data['content']            = 'pemesanan/v_konfirmasi_pihak_pertama';
        $data['title']              = 'Pemesanan';
        $data['pemesanan']          = $this->m_sekawan->getPemesananById('pemesanan', array('id_pemesanan' => $id_pemesanan))->result();
        $data['driver']             = $this->m_sekawan->getWhere('driver', array('status_driver' => 1))->result();
        
        $this->load->view('template/template', $data);
    }

    public function konfirmasiPemesananPihakKedua($id_pemesanan){
        $data['content']            = 'pemesanan/v_konfirmasi_pihak_kedua';
        $data['title']              = 'Pemesanan';
        $data['pemesanan']          = $this->m_sekawan->getPemesananById('pemesanan', array('id_pemesanan' => $id_pemesanan))->result();
        $data['driver']             = $this->m_sekawan->getWhere('driver', array('status_driver' => 1))->result();
        
        $this->load->view('template/template', $data);
    }

    public function doKonfirmasiPemesananPihakPertama(){
        $data       = $_POST;
        $condition  = array('id_pemesanan' => $this->input->post('id_pemesanan'));
        
        $this->m_sekawan->update('pemesanan', $data, $condition);

        if($this->db->affected_rows() >= 0){
            
            logging("Pemesanan", "Konfirmasi Pemesanan (Pihak Pertama)", $this->input->post('id_pemesanan'));
            $this->session->set_flashdata('messages', '<div class="alert alert-success " role="alert"><strong>Sukses!</strong> Berhasil konfirmasi pemesanan.	</div>');

            redirect('Pemesanan/pihak_setuju');
        }else{
            $this->session->set_flashdata('messages', '<div class="alert alert-warning " role="alert"><strong>Warning!</strong> Tidak ada perubahan data.	</div>');

            redirect('Pemesanan/pihak_setuju');
        }
    }

    public function doKonfirmasiPemesananPihakKedua(){
        $data       = $_POST;

        $conditionPemesanan  = array('id_pemesanan' => $this->input->post('id_pemesanan'));
        $conditionKendaraan  = array('id_kendaraan' => $this->input->post('id_kendaraan'));
        
        $this->m_sekawan->update('pemesanan', $data, $conditionPemesanan);
        $this->m_sekawan->update('kendaraan', array('status_kendaraan' => 0), $conditionKendaraan);

        if($this->db->affected_rows() >= 0){
            logging("Pemesanan", "Konfirmasi Pemesanan (Pihak Kedua)", $this->input->post('id_pemesanan'));
            $this->session->set_flashdata('messages', '<div class="alert alert-success " role="alert"><strong>Sukses!</strong> Berhasil konfirmasi pemesanan.	</div>');

            redirect('Pemesanan/pihak_setuju');
        }else{
            $this->session->set_flashdata('messages', '<div class="alert alert-warning " role="alert"><strong>Warning!</strong> Tidak ada perubahan data.	</div>');

            redirect('Pemesanan/pihak_setuju');
        }
    }

    public function pakai($id_pemesanan){
        $data['content']            = 'pemesanan/v_pakai';
        $data['title']              = 'Pemesanan';
        $data['pemesanan']          = $this->m_sekawan->getPemesananById('pemesanan', array('id_pemesanan' => $id_pemesanan))->result();
        
        $this->load->view('template/template', $data);
    }

    public function doAddPemakaian(){
        $data = $_POST;

        $this->m_sekawan->insert('pakai_kendaraan', $data);

        logging("Pakai Kendaraan", "Insert", $this->input->post('id_pemesanan'));
		$this->session->set_flashdata('messages', '<div class="alert alert-success " role="alert"><strong>Sukses!</strong> Berhasil tambah pemakaian kendaraan.	</div>');

		redirect('Pemesanan/pegawai');
    }
}
