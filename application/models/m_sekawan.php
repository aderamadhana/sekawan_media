<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_sekawan extends CI_Model {
	
	public function getAll($table_name)
	{
		return $this->db->get($table_name);
	}
	
	public function getWhere($table_name, $condition)
	{
		return $this->db->get_where($table_name, $condition);
	}

	public function insert($table_name, $data){
		$this->db->insert($table_name, $data);
	}

	public function update($table_name, $data_update, $condition){
		$this->db->set($data_update)->where($condition)->update($table_name);
	}

	public function delete($table_name, $condition){
		$this->db->delete($table_name, $condition);
	}

	public function getPemesananByPegawai(){
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('driver', 'driver.id_driver = pemesanan.id_driver');
		$this->db->join('kendaraan', 'kendaraan.id_kendaraan = pemesanan.id_kendaraan');
		$this->db->where('id_pegawai', $this->session->userdata('id_user'));
		return $this->db->get();
	}

	public function getPemesananById($table_name, $condition){
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->join('driver', 'driver.id_driver = pemesanan.id_driver');
		$this->db->join('kendaraan', 'kendaraan.id_kendaraan = pemesanan.id_kendaraan');
		$this->db->join('user', 'user.id_user = pemesanan.id_pegawai');
		$this->db->where($condition);
		return $this->db->get();
	}
	
	public function getPemesanan(){
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('driver', 'driver.id_driver = pemesanan.id_driver');
		$this->db->join('kendaraan', 'kendaraan.id_kendaraan = pemesanan.id_kendaraan');
		return $this->db->get();
	}

	public function getPemesananByPihakSetujuPertama(){
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('driver', 'driver.id_driver = pemesanan.id_driver');
		$this->db->join('kendaraan', 'kendaraan.id_kendaraan = pemesanan.id_kendaraan');
		$this->db->where('id_pihak_pertama', $this->session->userdata('id_user'));
		return $this->db->get();
	}

	public function getPemesananByPihakSetujuKedua(){
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('driver', 'driver.id_driver = pemesanan.id_driver');
		$this->db->join('kendaraan', 'kendaraan.id_kendaraan = pemesanan.id_kendaraan');
		$this->db->where('id_pihak_kedua', $this->session->userdata('id_user'));
		return $this->db->get();
	}

	public function getLaporan(){
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('driver', 'driver.id_driver = pemesanan.id_driver');
		$this->db->join('kendaraan', 'kendaraan.id_kendaraan = pemesanan.id_kendaraan');
		$this->db->where('status_konfirmasi_admin', 1);
		$this->db->where('status_konfirmasi_pihak_pertama', 1);
		$this->db->where('status_konfirmasi_pihak_kedua', 1);
		return $this->db->get();
	}

	public function getLaporanByBulan($bulan){
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('driver', 'driver.id_driver = pemesanan.id_driver');
		$this->db->join('kendaraan', 'kendaraan.id_kendaraan = pemesanan.id_kendaraan');
		$this->db->join('user', 'user.id_user = pemesanan.id_pegawai');
		$this->db->where('status_konfirmasi_admin', 1);
		$this->db->where('status_konfirmasi_pihak_pertama', 1);
		$this->db->where('status_konfirmasi_pihak_kedua', 1);
		$this->db->like('tanggal_pemesanan', $bulan);
		return $this->db->get();
	}
}
