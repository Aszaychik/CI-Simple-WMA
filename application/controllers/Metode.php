<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metode extends CI_Controller {

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
		$data['title']='Data Prediksi Kerusakan ';
		$data['selects'] = $this->input->post('id_motor');
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('metode/index',$data);
		$this->load->view('template/footer');
		$this->load->view('template/script');
	}
	public function hitung()
	{
		$data['title']='Data Prediksi Kerusakan ';
		$data['selects'] = $this->input->post('selected_gejala');
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('metode/hasil',$data);
		$this->load->view('template/footer');
		$this->load->view('template/script');
	}
}