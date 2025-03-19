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
		}
	}

	public function index()
	{
		$data['title'] = 'Data Pembeli ';
		$data['pembeli'] = $this->db->get('data_penjualan')->result();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('pembeli/index', $data);
		$this->load->view('template/footer');
		$this->load->view('template/script');
	}

	// randomly generate purchase counts for each buyer per month, based on the existing data
	public function month_pembeli()
	{
		$data['title'] = 'Data Pembeli Bulanan';

		// Get all buyers
		$data['pembeli'] = $this->db->get('data_penjualan')->result();

		// Create month range (Jan 2023 - Nov 2023)
		$months = array();
		$start = new DateTime('2023-01-01');
		$end = new DateTime('2023-11-01');

		while ($start <= $end) {
			$months[] = $start->format('Y-m');
			$start->modify('+1 month');
		}

		// Generate random purchase counts for each buyer
		foreach ($data['pembeli'] as &$buyer) {
			$purchases = array();
			foreach ($months as $month) {
				// Generate random number based on buyer's profile
				$base = rand(5, 15);

				// Adjust purchases based on income (higher income = more purchases)
				$income = (float) str_replace(',', '', $buyer->gaji_penghasilan);
				if ($income > 1000000) $base += rand(0, 5);

				// Adjust based on dependents (more dependents = fewer purchases)
				if ($buyer->jumlah_tanggungan > 3) $base -= rand(0, 3);

				// Ensure minimum 0 purchases
				$purchases[$month] = max(0, $base);
			}
			$buyer->purchases = $purchases;
		}

		$data['months'] = $months;

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('pembeli/month', $data);
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
