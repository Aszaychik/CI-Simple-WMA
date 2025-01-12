<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	function __construct(){
        parent::__construct();    
        $cek=$this->session->userdata('username');
        if(!isset($cek)){
            redirect('login/index');
        }else{
		}
    }
	public function index()
	{
		$data['title']='Data Penjualan ';
		$this->db->order_by('id_penjualan','DESC');
		$data['bulandepan']=$this->data_model->get_bulandepan('tabel_penjualan');
		$data['penjualan']=$this->db->get('tabel_penjualan')->result();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('penjualan/index',$data);
		$this->load->view('template/footer');
		$this->load->view('template/script');
	}
	public function tambah()
	{
		$bulan=$this->input->post('bulan');
		$jumlah=$this->input->post('jumlah');
		$array=array(
			'tanggal_penjualan'=>$bulan.'-15',
			'jumlah'=>$jumlah,
		);
		$this->db->insert('tabel_penjualan',$array);
		redirect('penjualan/index');
	}
	public function ubah($id)
	{
		$bulan=$this->input->post('bulan');
		$jumlah=$this->input->post('jumlah');
		$array=array(
			'tanggal_penjualan'=>$bulan.'-15',
			'jumlah'=>$jumlah,
		);
		$this->db->update('tabel_penjualan',$array,array('id_penjualan'=>$id));
		redirect('penjualan/index');
	}
	public function hapus($id)
	{
		$this->db->delete('tabel_penjualan',array('id_penjualan'=>$id));
		redirect('penjualan/index');
	}
}
