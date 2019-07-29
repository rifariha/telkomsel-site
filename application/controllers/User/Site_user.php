<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('username')=="")
		{
			redirect('Login');
		}
		
		$this->load->model('Model_admin','dbObject');
	}

	public function index()
	{
		$judul['judul'] = 'List site';
		$data['list'] = $this->dbObject->select_general_join_where('tb_tower a join tb_foto b on a.kode_lokasi=b.kode join tb_region c on a.region=c.id_region join tb_branch d on a.branch=d.id_branch join tb_cluster_sales e on a.cluster_sales=e.id_cluster join tb_kabupaten f on a.kabupaten=f.id_kabupaten','hapus',0,'tanggal DESC')->result();
		$this->session->set_userdata('menu','list');
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$judul);
		$this->load->view('Admin/list',$data);
		$this->load->view('template/footer');
	}

	public function lokasi($param = "")
	{
		$id = $this->uri->segment(4);
		$judul['judul'] = 'Foto Lokasi';
		$data['maps'] = $this->dbObject->select_general_join_where('tb_tower a join tb_foto b on a.kode_lokasi=b.kode','kode_lokasi',$id,'tanggal')->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin',$judul);
		$this->load->view('Admin/maps',$data);
		$this->load->view('template/footer2');
	}

	public function hapus($param = "")
	{
		$this->dbObject->remove_general('tb_tower','hapus',1,'kode_lokasi',$param);

		$this->session->set_flashdata('notif','<div class="alert alert-info" role="alert"> Data berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('Admin/Site');

	}
}
?>