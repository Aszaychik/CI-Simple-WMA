<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function index()
    {
        $this->load->view('login');
    }
    public function aksiLogin()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$dt=array('username'=>$username);
        $pass=array('password'=>$password);

		$query=$this->db->get_where('tabel_user',$dt,$pass)->result();
        foreach ($query as $data) {
            if ($data->username==$username && $data->password==$password ) {
                $this->session->set_userdata('username', "$data->username");
				$this->session->set_userdata('password', "$data->password");
				$this->session->set_userdata('nama_user', "$data->nama_user");
				$this->session->set_userdata('id_user', "$data->id_user");
                redirect('welcome/index');
            }else{
			}
        }
        redirect('login/index');
	}
}