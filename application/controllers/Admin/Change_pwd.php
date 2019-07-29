<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_pwd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('username')=="")
		{
			redirect('Login');
		}
		
		$this->load->model('Model_user','dbObject');
	}

	public function index()
	{
		$data['judul'] = 'Ganti Password';
		$this->session->set_userdata('menu','pwd');
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin',$data);
		$this->load->view('admin/pwd');
		$this->load->view('template/footer');
	}

	public function ubah()
	{
			$old_pwd = md5(base64_decode($this->input->post('old_pwd')));
			$new_pwd = md5(base64_decode($this->input->post('new_pwd')));
			$re_new_pwd = md5(base64_decode($this->input->post('re_new_pwd')));
			$user = $this->session->userdata('username');
			$data = $this->dbObject->cek_pwd($user)->result();
			foreach ($data as $row) {
				$user_pwd = $row->password;
			}

			if($user_pwd != $old_pwd)
			{
				$this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Password lama yang anda masukkan salah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('Admin/Change_pwd');
			}
			else if($new_pwd != $re_new_pwd)
			{
				$this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Ulangan password baru anda salah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('Admin/Change_pwd');
			}
			else
			{
				$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Password Berhasil Diganti <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('Admin/Change_pwd');	
			}

	}
}
?>