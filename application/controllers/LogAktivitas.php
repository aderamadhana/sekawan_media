<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogAktivitas extends CI_Controller {

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
        $data['content']    = 'log/v_log_aktivitas';
        $data['title']      = 'Log Aktivitas';
        $data['log']     = $this->m_sekawan->getAll('log_aktivitas')->result();

        $this->load->view('template/template', $data);
    }

}
