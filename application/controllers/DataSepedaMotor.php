<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataSepedaMotor extends CI_Controller {

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
		$data['title']='Data Sepeda Motor ';
		$data['sepeda_motor']=$this->db->get('sepeda_motor')->result();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('sepeda/index',$data);
		$this->load->view('template/footer');
		$this->load->view('template/script');
	}
	public function tambah()
	{
		$nama_sepeda=$this->input->post('nama_sepeda');
		$this->db->insert('sepeda_motor',array('nama_motor'=>$nama_sepeda));
		redirect('dataSepedaMotor/index');
	}
	public function ubah($id)
	{
		$nama_sepeda=$this->input->post('nama_sepeda');
		$this->db->update('sepeda_motor',array('nama_motor'=>$nama_sepeda),array('id_motor'=>$id));
		redirect('dataSepedaMotor/index');
	}
	public function hapus($id)
	{
		$this->db->delete('sepeda_motor',array('id_motor'=>$id));
		redirect('dataSepedaMotor/index');
	}
}