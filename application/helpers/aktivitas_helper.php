<?php

function logging($tipe, $aksi, $item){
    date_default_timezone_set('Asia/Jakarta');

    $CI =& get_instance();

    $param['log_user'] = $CI->session->userdata('username');
    $param['log_tipe'] = $tipe; 
    $param['log_aksi'] = $aksi; 
    $param['log_item'] = $item; 

    $CI->load->model('m_sekawan');

    $CI->m_sekawan->save_log($param);

}
?> 