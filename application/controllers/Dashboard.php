<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index(){
        $data['arema']      = array('arema','arema2', 'arema3');
        $data['content']    = 'dashboard/v_dashboard';

        $this->load->view('template/template', $data);
	}
}
