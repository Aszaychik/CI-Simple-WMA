<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$data['title']='Dashboard Admin |';
		$data['user']=$this->db->get('tabel_user')->num_rows();
		$data['t_tertinggi']=$this->db->query('SELECT jumlah FROM tabel_penjualan ORDER BY jumlah DESC LIMIT 1')->row();
		$data['t_terendah']=$this->db->query('SELECT jumlah FROM tabel_penjualan ORDER BY jumlah ASC LIMIT 1')->row();
		$data['t_terakhir']=$this->db->query('SELECT jumlah FROM tabel_penjualan ORDER BY id_penjualan DESC LIMIT 1')->row();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('welcome_message',$data);
		$this->load->view('template/footer');
		$this->load->view('template/script');
	}
	
	public function profile()
	{
		$data['title']='Profile ';
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('profile',$data);
		$this->load->view('template/footer');
		$this->load->view('template/script');
	}
	public function updateProfile($id)
	{
		$nama_user =$this->input->post('nama_user');
		$username =$this->input->post('username');
		$password =$this->input->post('password');
		$array=array(
			'username' =>$username,
			'password' =>$password,
			'nama_user' =>$nama_user
		);
		$this->db->update('tabel_user',$array,array('id_user'=>$id));
		$this->session->unset_userdata('username','password','nama_user');
		$this->session->set_userdata($array);
		redirect('welcome/profile');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome/index');
	}
}