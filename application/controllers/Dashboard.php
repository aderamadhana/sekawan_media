<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('m_sekawan');
        
        if($this->session->userdata('log') != 'in'){
            $this->session->set_flashdata('messages', '<br><div class="alert alert-danger" role="alert"> <strong> Error! </strong>Silahkan login terlebih dahulu </div>');
            redirect(base_url("login"));
        }
    }
    
    public function admin(){
        $data['content']    = 'dashboard/v_dashboard_admin';
        $data['title']      = 'Dashboard';
        $data['kendaraan']  = $this->m_sekawan->getAll('view_pemakaian_kendaraan')->result();

        $this->load->view('template/template', $data);
    }

    public function pihak_setuju(){
        $data['content']    = 'dashboard/v_dashboard_pihak_setuju';
        $data['title']      = 'Dashboard';
        $data['kendaraan']  = $this->m_sekawan->getAll('view_pemakaian_kendaraan')->result();

        $this->load->view('template/template', $data);
    }
    
    public function pegawai(){
        $data['content']    = 'dashboard/v_dashboard_pegawai';
        $data['title']      = 'Dashboard';

        $this->load->view('template/template', $data);
    }
}
