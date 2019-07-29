<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_user','dbObject');
	}

	public function index()
	{
		$judul['judul'] = 'Input Data';
		$data['region'] = $this->dbObject->select_general('tb_region')->result();
		$this->session->set_userdata('menu','form');
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$judul);
		$this->load->view('user/form',$data);
		$this->load->view('template/footer');
	}

	function Add_ajax_branch($id)
	{
		$col = "region='$id'";
		$tbl = "tb_branch";
		$query = $this->dbObject->select_general_where($tbl,$col);
		$data = "<option value=''> - Pilih Branch - </option>";
		foreach ($query->result() as $value) {

			$data .= "<option value='".$value->id_branch."'>".strtoupper($value->nama_branch)."</option>";
		}
		echo $data;
	}

	function Add_ajax_cluster($id)
	{
		$col = "branch='$id'";
		$tbl = "tb_cluster_sales";
		$query = $this->dbObject->select_general_where($tbl,$col);
		$data = "<option value=''> - Pilih Cluster Sales - </option>";
		foreach ($query->result() as $value) {

			$data .= "<option value='".$value->id_cluster."'>".strtoupper($value->nama_cluster)."</option>";
		}
		echo $data;
	}

	function Add_ajax_kabupaten($id)
	{
		$col = "cluster='$id'";
		$tbl = "tb_kabupaten";
		$query = $this->dbObject->select_general_where($tbl,$col);
		$data = "<option value=''> - Pilih Kabupaten - </option>";
		foreach ($query->result() as $value) {

			$data .= "<option value='".$value->id_kabupaten."'>".strtoupper($value->nama_kabupaten)."</option>";
		}
		echo $data;
	}

	function input_data()
	{
		$region = $this->input->post('region');
		$branch = $this->input->post('branch');
		$cluster = $this->input->post('cluster');
		if($region == "1")
		{
			$reg = 'SBS';
		}
		else if($region == "2")
		{
			$reg = 'SBT';
		}
		else
		{
			$reg = 'SBG';
		}

		$temp = $reg.'-'.$branch.'-'.$cluster;

		
		$hit = $this->dbObject->count_code('tb_tower','kode_lokasi','jum',$reg)->result();
		foreach ($hit as $s ) {
			$jum = $s->jum;
		}

		if($jum == 0)
		{
			$kode = $temp.'-0001';
		}
		else if($jum != 0)
		{
			$maxid = $this->dbObject->search_code('tb_tower','kode_lokasi','max_id',$temp)->result();
		
			foreach($maxid as $row)
		    {
		       $id_number = $row->max_id;
		    }
		    $split = explode("-", $id_number);

	        $kode = $temp.'-'.sprintf("%04s", $split[1]+1);
			
		}
	
		$competitor = (count($this->input->post('competitor')) > 0) ? implode('|', $this->input->post('competitor')) : "";
		$network_competitor = (count($this->input->post('network_competitor')) > 0) ? implode('|', $this->input->post('network_competitor')) : ""; 
		
		$data = array(
			'kode_lokasi' => $kode,
			'region' => $this->input->post('region'),
			'branch' => $this->input->post('branch'),
			'cluster_sales' => $this->input->post('cluster'),
			'kabupaten' => $this->input->post('kabupaten'),
			'kecamatan' => $this->input->post('kecamatan'),
			'kelurahan' => $this->input->post('kelurahan'),
			'latitude' => $this->input->post('latitude'),
			'longitude' => $this->input->post('longitude'),
			'populasi' => $this->input->post('populasi'),
			'arpu' => $this->input->post('arpu'),
			'tower_usulan' => $this->input->post('tower_usulan'),
			'band_usulan' => $this->input->post('band_usulan'),
			'jarak' => $this->input->post('jarak'),
			'site' =>$this->input->post('site'),
			'outlet'=>$this->input->post('outlet'),
			'reg_dev' =>$this->input->post('reg_dev'),
			'kat_poi'=>$this->input->post('kat_poi'),
			'form'=>$this->input->post('form_survey'),
			'summary_survey'=>$this->input->post('summary_survey'),
			'competitor'=>$competitor,
			'network'=>$network_competitor,
			'remark'=>$this->input->post('remark'),
			'tanggal'=>date("Y-m-d")
			);

		$this->db->insert('tb_tower',$data);
		redirect("User/Form/upload/$kode");
		
	}

	function upload($param1='')
	{
		$this->session->set_userdata('menu','form');
		$judul['judul'] = 'Input Data';
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$judul);
		$this->load->view('user/upload');
		$this->load->view('template/footer');

		if($param1=='insert')
		{
			$kode = $this->input->post('kode');
			$this->load->library('upload');
	        
	        $config['upload_path']          = './assets/foto/';
	        $config['allowed_types']        = 'jpg|jpeg|png|bmp';
	        $config['max_size']             = '20480';
	        $config['file_name']            = 'Foto_Satu_'.$kode;  
	        
	        $this->upload->initialize($config);

	        $this->upload->do_upload('foto_satu');
	        
	        $gbr = $this->upload->data();
	        $dataga = array(
	           'namafile' => $gbr['file_name'],
	        );

	        $foto_satu = implode(" ",$dataga);

	        $this->load->library('upload');
	        
	        $config['upload_path']          = './assets/foto/';
	        $config['allowed_types']        = 'jpg|jpeg|png|bmp';
	        $config['max_size']             = '20480';
	        $config['file_name']            = 'Foto_Dua_'.$kode;  
	        
	        $this->upload->initialize($config);

	        $this->upload->do_upload('foto_dua');
	        
	        $gbr = $this->upload->data();
	        $dataga = array(
	           'namafile' => $gbr['file_name'],
	        );

	        $foto_dua = implode(" ",$dataga);

	        $this->load->library('upload');
	        
	        $config['upload_path']          = './assets/foto/';
	        $config['allowed_types']        = 'jpg|jpeg|png|bmp';
	        $config['max_size']             = '10240';
	        $config['file_name']            = 'Foto_Tiga_'.$kode;  
	        
	        $this->upload->initialize($config);

	        $this->upload->do_upload('foto_tiga');
	        

	        $gbr = $this->upload->data();
	        $dataga = array(
	           'namafile' => $gbr['file_name'],
	        );

	        $foto_tiga = implode(" ",$dataga);

	        //foto empat
	        $this->load->library('upload');
	        
	        $config['upload_path']          = './assets/foto/';
	        $config['allowed_types']        = 'jpg|jpeg|png|bmp';
	        $config['max_size']             = '10240';
	        $config['file_name']            = 'Foto_Empat_'.$kode;  
	        
	        $this->upload->initialize($config);

	        if($this->upload->do_upload('foto_empat') == NULL)
	        {
	        	$foto_empat = NULL;
	        }
	        else
	        {
	        	$gbr = $this->upload->data();
		        $dataga = array(
		           'namafile' => $gbr['file_name'],
	    	    );

	        	$foto_empat = implode(" ",$dataga);

	        }
	        
	        $this->load->library('upload');
	        
	        $config['upload_path']          = './assets/pdf/';
	        $config['allowed_types']        = 'pdf';
	        $config['max_size']             = '10240';
	        $config['file_name']            = 'File_Surrounding_'.$kode;  
	        
	        $this->upload->initialize($config);

	        $this->upload->do_upload('lokasi');
	        
	        $gbr = $this->upload->data();
	        $dataga = array(
	           'namafile' => $gbr['file_name'],
	        );

	        $lokasi = implode(" ",$dataga);

	        $this->load->library('upload');
	        
	        $config['upload_path']          = './assets/pdf/';
	        $config['allowed_types']        = 'pdf';
	        $config['max_size']             = '10240';
	        $config['file_name']            = 'Form_survey_'.$kode;  
	        
	        $this->upload->initialize($config);

	        $this->upload->do_upload('form_survey');
	        
	        $gbr = $this->upload->data();
	        $dataga = array(
	           'namafile' => $gbr['file_name'],
	        );

	        $form_survey = implode(" ",$dataga);

	        $video = $this->input->post('link_video');

	        $data = array(
	        	'foto_satu' => $foto_satu,
	        	'foto_dua' => $foto_dua,
	        	'foto_tiga' => $foto_satu,
	        	'foto_empat' => $foto_empat,
	        	'file_lokasi' => $lokasi,
	        	'form_survey' => $form_survey,
	        	'kode' => $this->input->post('kode'),
	        	'video' => $video
	        	);
	        $sql = $this->db->insert('tb_foto',$data);
	        
	        if($sql)
	        {
	        	$data2 = array(
	        	'user' => $this->session->userdata('username'),
	        	'input' => $this->input->post('kode'),
	        	'aksi' => 'tambah'
	        	);

		        $this->db->insert('tb_log',$data2);	
	        	$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data berhasil disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	        }
	        else
	        {
	        	$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> File/Foto yang anda upload tidak sesuai persyaratan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	        	redirect('User/Form/upload/$kode');
	        }
	        
			redirect("User/home");
		}
	}

	function delete_data()
	{
		$kode = $this->uri->segment(4);
		$this->dbObject->delete_general('tb_tower','kode_lokasi',$kode);
		$this->session->set_flashdata('notif','<div class="alert alert-info" role="alert"> Data berhasil terhapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('User/home');
	}
}
?>