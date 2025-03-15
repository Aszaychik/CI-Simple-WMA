<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembeli extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('pagination'); // Add this line
		$this->load->helper('url'); // Add this if not already loaded
		$cek = $this->session->userdata('username');
		if (!isset($cek)) {
			redirect('login/index');
		}
	}

	public function index()
	{
		$data['title'] = 'Data Pembeli ';

		// Pagination config
		$config['base_url'] = base_url('pembeli/index');
		$config['total_rows'] = $this->db->count_all('data_penjualan');
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;

		// Bootstrap styling
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = '&raquo;';
		$config['prev_link'] = '&laquo;';
		$config['full_tag_open'] = '<ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '</span></li>';
		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->db->order_by('nama_pembeli');
		$data['pembeli'] = $this->db->get(
			'data_penjualan',
			$config['per_page'],
			$page
		)->result();

		$data['pagination'] = $this->pagination->create_links();

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
