<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataTransaksi extends CI_Controller {

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
		$data['title']='Data Transaksi ';
		$id_motor=$this->input->post('id_motor');
		// $data['pemilik']=$this->input->post('pemilik');
		$data['motor']=$this->db->get_where('tabel_kode',array('id_motor' => $id_motor))->result();
		$data['keranjang']=$this->db->get('keranjang')->result();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('transaksi/index',$data);
		$this->load->view('template/footer');
		$this->load->view('template/script');
	}
	public function tambah($id_kode,$id_motor)
	{
		$data['title']='Data Transaksi ';
		$this->db->insert('keranjang',array('id_kode'=>$id_kode));
		$data['keranjang']=$this->db->get('keranjang')->result();
		$data['motor']=$this->db->get_where('tabel_kode',array('id_motor' => $id_motor))->result();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('transaksi/index',$data);
		$this->load->view('template/footer');
		$this->load->view('template/script');
	}
	public function hapus($id,$id_motor)
	{
		$this->db->delete('keranjang',array('id_keranjang' => $id));
		$data['title']='Data Transaksi ';
		$data['keranjang']=$this->db->get('keranjang')->result();
		$data['motor']=$this->db->get_where('tabel_kode',array('id_motor' => $id_motor))->result();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('transaksi/index',$data);
		$this->load->view('template/footer');
		$this->load->view('template/script');
	}
}