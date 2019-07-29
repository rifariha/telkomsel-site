<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		

		parent::__construct();
		if($this->session->userdata('username')=="")
		{
			redirect('Login');
		}
		
		$this->load->model('Model_login','dbObject');
	}

	public function index()
	{
		$data['judul'] = 'Dashboard';
		$this->session->set_userdata('menu','dashboard');
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin',$data);
		$this->load->view('admin/home');
		$this->load->view('template/footer');
	}
}
?>