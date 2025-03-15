<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembeli extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$cek = $this->session->userdata('username');
		if (!isset($cek)) {
			redirect('login/index');
		} else {
		}
	}

	public function index()
	{
		$data['title'] = 'Data Pembeli ';
		$data['pembeli'] = $this->db->get('data_penjualan')->result();
		$this->db->order_by('nama_pembeli');
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('pembeli/index', $data);
		$this->load->view('template/footer');
		$this->load->view('template/script');
	}
	public function tambah()
	{
		$nama = $this->input->post('nama_pembeli');
		$penghasilan = $this->input->post('gaji_penghasilan');
		$tanggungan = $this->input->post('jumlah_tanggungan');
		$usia = $this->input->post('usia');
		$array = array(
			'nama_pembeli' => $nama,
			'gaji_penghasilan' => $penghasilan,
			'jumlah_tanggungan' => $tanggungan,
			'usia' => $usia,
		);
		$this->db->insert('data_penjualan', $array);
		redirect('penjualan/index');
	}
	public function ubah($id)
	{
		$nama = $this->input->post('nama_pembeli');
		$penghasilan = $this->input->post('gaji_penghasilan');
		$tanggungan = $this->input->post('jumlah_tanggungan');
		$usia = $this->input->post('usia');
		$array = array(
			'nama_pembeli' => $nama,
			'gaji_penghasilan' => $penghasilan,
			'jumlah_tanggungan' => $tanggungan,
			'usia' => $usia,
		);
		$this->db->update('data_penjualan', $array, array('id' => $id));
		redirect('penjualan/index');
	}
	public function hapus($id)
	{
		$this->db->delete('data_penjualan', array('id' => $id));
		redirect('penjualan/index');
	}
}
