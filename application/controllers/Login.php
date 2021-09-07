<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
		
		$this->load->model('m_sekawan');
	}

    public function index(){
        $this->load->view('login');
    }

    public function doLogin(){
        $username 		= $this->input->post('username');
		$password 		= $this->input->post('password');
		$id_user		= null;
		$role			= null;

		$dataUser = array(
			'username' 	=> $username,
			'password' 	=> $password
		);

		$dataLogin = $this->m_sekawan->getWhere('user', $dataUser)->result();

		foreach($dataLogin as $data){
			$id_user 			= $data->id_user;
			$role 				= $data->role;
			$nama_lengkap 		= $data->nama_lengkap;
		}

		$data_session = array(
			'username' 		=> $username,
			'id_user' 		=> $id_user,
			'role' 			=> $role,
			'nama_lengkap' 	=> $nama_lengkap,
			'log' 			=> 'in'
		);
 
		$this->session->set_userdata($data_session);

		if($dataLogin != null){
			logging("Login", "Login", "");

			$this->session->set_flashdata('messages', '<br><div class="alert alert-success" role="alert"> Berhasil Login </div>');
			if($role == 1){
				redirect('Dashboard/admin');
			}else if($role == 2){
				redirect('Dashboard/pihak_setuju');
			}else if($role == 3){
				redirect('Dashboard/pegawai');
			}

		}else{
			$this->session->set_flashdata('messages', '<br><div class="alert alert-danger" role="alert"> Username/ Password Salah! </div>');
			redirect('Login');
		}
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('Login');
    }
}
