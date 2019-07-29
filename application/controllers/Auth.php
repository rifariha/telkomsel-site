<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_login','dbObject');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = md5(base64_decode($this->input->post('password')));
		$data = array(
				'username'=>$username,
				'password'=>$password
			);

		$cek = $this->dbObject->cek_user($data);
		if($cek->num_rows() == 1)
		{
			foreach ($cek->result() as $sess) {
				$sess_data['logged_in'] = 'isLoggedin';
				$sess_data['id'] = $sess->id;
				$sess_data['username'] = $sess->username;
				$sess_data['level'] = $sess->level;
				$this->session->set_userdata($sess_data);
			}

			if($this->session->userdata('level')=='1')
			{
				redirect('User/Home');
			}
			else if($this->session->userdata('level')=='2')
			{
				redirect('Admin/Home');
			}
		}
		else
		{
			$this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Username atau Password anda salah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Login');
		}
		
	}


	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('id');
		session_destroy();
		redirect('Login');
	}

} 
?>