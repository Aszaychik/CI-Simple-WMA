<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wma extends CI_Controller {

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
		$data['title']='Prediksi WMA ';
		$data['forecasting']=$this->data_model->get_noorder('tabel_penjualan');
        $data['bulandepan']=$this->data_model->get_bulandepan('tabel_penjualan');
        $data['jumlahn']=$this->data_model->get_count('tabel_penjualan');
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('wma/index',$data);
		$this->load->view('template/footer');
		$this->load->view('template/script');
	}
	public function wma()
    {
        $data['judul']="Forecasting Single Moving Average | Masla Delivery";
        $data['forecasting']=$this->m_app->get_noorder('tabel_transaksi');
        $data['bulandepan']=$this->m_app->get_bulandepan('tabel_transaksi');
        $data['jumlahn']=$this->m_app->get_count('tabel_transaksi');
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar');
		$this->load->view('forecasting/wma',$data);
		$this->load->view('template/footer');
    }
}