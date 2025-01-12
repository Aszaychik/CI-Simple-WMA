<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
		$data['title']='Data Users ';
		$this->db->order_by('id_user','DESC');
		$data['users']=$this->db->get('tabel_user')->result();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('user/index',$data);
		$this->load->view('template/footer');
		$this->load->view('template/script');
	}
	public function add()
	{
		$nama_user=$this->input->post('nama_user');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$telp=$this->input->post('telp');
		$alamat=$this->input->post('alamat');
		$array=array(
			'nama_user'=>$nama_user,
			'username'=>$username,
			'password'=>$password,
			'telp'=>$telp,
			'alamat'=>$alamat,
		);
		$this->db->insert('tabel_user', $array);
		redirect('users/index');
	}
    public function delete($id)
    {
        $this->db->query("DELETE FROM tabel_user WHERE id_user='$id'");
        redirect('users');
    }
	public function update($id_user)
	{
		$nama_user=$this->input->post('nama_user');
		$telp=$this->input->post('telp');
		$alamat=$this->input->post('alamat');
		$array=array(
			'nama_user'=>$nama_user,
			'telp'=>$telp,
			'alamat'=>$alamat,
		);
		$where=array(
			'id_user'=>$id_user
		);
		$this->db->where($where);
		$this->db->update('tabel_user',$array);
		redirect('users');
	}
}