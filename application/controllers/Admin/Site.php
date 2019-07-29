<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

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
		$judul['judul'] = 'List data';
		$data['list'] = $this->dbObject->select_general_join_where('tb_tower a join tb_foto b on a.kode_lokasi=b.kode join tb_region c on a.region=c.id_region join tb_branch d on a.branch=d.id_branch join tb_cluster_sales e on a.cluster_sales=e.id_cluster join tb_kabupaten f on a.kabupaten=f.id_kabupaten','hapus',0,'tanggal DESC')->result();
		$this->session->set_userdata('menu','list');
		$this->load->view('template/header');
		$this->load->view('template/sidebar_admin',$judul);
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

	public function export()
	{
		$start = $this->input->post('start');
		$end = $this->input->post('end');

        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	    
	    // Panggil class PHPExcel nya
	    $excel = new PHPExcel();
	    // Settingan awal fil excel
	    $excel->getProperties()->setCreator('Telkomsel')
	                 ->setLastModifiedBy('Telkomsel')
	                 ->setTitle("Data Site")
	                 ->setSubject("Site")
	                 ->setDescription("Laporan Site")
	                 ->setKeywords("Laporan Site Telkomsel");

	    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
	    $style_col = array(
	      'font' => array('bold' => true), // Set font nya jadi bold
	      'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );

	    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
	    $style_row = array(
	      'alignment' => array(
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );

	    $excel->setActiveSheetIndex(0)->setCellValue("A1", "DATA SITE"); // Set kolom A1 dengan tulisan "DATA SISWA"
	    $excel->getActiveSheet()->mergeCells('A1:W1'); // Set Merge Cell pada kolom A1 sampai L1
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
	    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
	    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1


	    /*
	    $excel->setActiveSheetIndex(0)->setCellValue("A3", "SEMESTER $sem T.A. $thn_ajr"); // Set kolom A1 dengan tulisan "DATA SISWA"
	    $excel->getActiveSheet()->mergeCells('A3:M3'); // Set Merge Cell pada kolom A1 sampai L1
	    $excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(TRUE); // Set bold kolom A1
	    $excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
	    $excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		*/
	    

	    // Buat header tabel nya pada baris ke 3
	    $excel->setActiveSheetIndex(0)->setCellValue('A2', "Tanggal Input"); // Set kolom A3 dengan tulisan "NO"
	    $excel->setActiveSheetIndex(0)->setCellValue('B2', "REGION"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('C2', "Branch"); // Set kolom C3 dengan tulisan "NAMA"
	    $excel->setActiveSheetIndex(0)->setCellValue('D2', "Cluster Sales"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
	    $excel->setActiveSheetIndex(0)->setCellValue('E2', "Kabupaten"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('F2', "Kecamatan"); // Set kolom A3 dengan tulisan "NO"
	    $excel->setActiveSheetIndex(0)->setCellValue('G2', "Kelurahan"); // Set kolom B3 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('H2', "Lat"); // Set kolom C3 dengan tulisan "NAMA"
	    $excel->setActiveSheetIndex(0)->setCellValue('I2', "Long"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
	    $excel->setActiveSheetIndex(0)->setCellValue('J2', "Populasi"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
	    $excel->setActiveSheetIndex(0)->setCellValue('K2', "ARPU"); // Set kolom E3 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('L2', "Tower Usulan"); // Set kolom A3 dengan tulisan "NO"
	    $excel->setActiveSheetIndex(0)->setCellValue('M2', "Band Usulan");
	    $excel->setActiveSheetIndex(0)->setCellValue('N2', "Jarak ke Site Existing");
	    $excel->setActiveSheetIndex(0)->setCellValue('O2', "Site Terdekat");
	    $excel->setActiveSheetIndex(0)->setCellValue('P2', "Jumlah Outlet");
	    $excel->setActiveSheetIndex(0)->setCellValue('Q2', "Reg_dev_Prediction");
	    $excel->setActiveSheetIndex(0)->setCellValue('R2', "Kat POI");
	    $excel->setActiveSheetIndex(0)->setCellValue('S2', "Form Survey");
	    $excel->setActiveSheetIndex(0)->setCellValue('T2', "Summary Survey");
	    $excel->setActiveSheetIndex(0)->setCellValue('U2', "Competitor");
	    $excel->setActiveSheetIndex(0)->setCellValue('V2', "Network Competitor");
	    $excel->setActiveSheetIndex(0)->setCellValue('W2', "Remark");
	    $excel->setActiveSheetIndex(0)->setCellValue('X2', "Foto Lokasi");
	    $excel->setActiveSheetIndex(0)->setCellValue('Y2', "Foto Lokasi");
	    $excel->setActiveSheetIndex(0)->setCellValue('Z2', "Foto Lokasi");
	    $excel->setActiveSheetIndex(0)->setCellValue('AA2', "Foto Lokasi");
	    $excel->setActiveSheetIndex(0)->setCellValue('AB2', "Foto Maps");
	    
	    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	    $excel->getActiveSheet()->getStyle('A2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('B2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('C2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('D2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('E2')->applyFromArray($style_col); 
	    $excel->getActiveSheet()->getStyle('F2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('G2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('H2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('I2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('J2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('K2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('L2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('M2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('N2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('O2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('P2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('Q2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('R2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('S2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('T2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('U2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('V2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('W2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('X2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('Y2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('Z2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('AA2')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('AB2')->applyFromArray($style_col);
	    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya

	     $sheet = $this->dbObject->select_general_join_between('tb_tower a join tb_foto b on a.kode_lokasi=b.kode join tb_region c on a.region=c.id_region join tb_branch d on a.branch=d.id_branch join tb_cluster_sales e on a.cluster_sales=e.id_cluster join tb_kabupaten f on a.kabupaten=f.id_kabupaten','hapus',0,'tanggal',$start,$end,'tanggal DESC')->result();

	    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
	    $numrow = 3; // Set baris pertama untuk isi tabel adalah baris ke 4

	    
	    foreach($sheet as $data){ // Lakukan looping pada variabel siswa
	       
	    $date = explode("-",$data->tanggal);
        $tgl = $date[2];
        $bln = $date[1];
        $thn = $date[0];
		switch($bln){
	        case '01': $bul = 'Jan'; break;
	        case '02': $bul = 'Feb'; break;
	        case '03': $bul = 'Mar'; break;
	        case '04': $bul = 'Apr'; break;
	        case '05': $bul = 'Mei'; break;
	        case '06': $bul = 'Jun'; break;
	        case '07': $bul = 'Jul'; break;
	        case '08': $bul = 'Agu'; break;
	        case '09': $bul = 'Sep'; break;
	        case '10': $bul = 'Okt'; break;
	        case '11': $bul = 'Nov'; break;
	        case '12': $bul = 'Des'; break;
      	}
		$tanggal =  $tgl.' '.$bul.' '.$thn;

			$foto_satu = $data->foto_satu;
			$path_satu = "./assets/foto/".$foto_satu;

			$foto_dua = $data->foto_dua;
			$path_dua = "./assets/foto/".$foto_dua;

			$foto_tiga = $data->foto_tiga;
			$path_tiga = "./assets/foto/".$foto_tiga;

			if($data->foto_empat != NULL)
			{
				$foto_empat = $data->foto_empat;
				$path_empat = "./assets/foto/".$foto_empat;
			}

			$foto_lokasi = $data->foto_lokasi;
			$path_lokasi = "./assets/foto/".$foto_lokasi;
		
	      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $tanggal);
	      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, strtoupper($data->nama_region));
	      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, strtoupper($data->nama_branch));
	      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, strtoupper($data->nama_cluster));
	      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, strtoupper($data->nama_kabupaten));
	      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, strtoupper($data->kecamatan));
	      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, strtoupper($data->kelurahan));
	      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->latitude);
	      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->longitude); 
	      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->populasi);
	      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->arpu);
	      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->tower_usulan);
	      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->band_usulan);
	      $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->jarak);
	      $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->site);
	      $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->outlet);
	      $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->reg_dev);
	      $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->kat_poi);
	      $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->form_survey);
	      $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->summary_survey);
	      $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->competitor);
	      $excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->network);
	      $excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data->remark);
	      
			$objDrawing = new PHPExcel_Worksheet_Drawing();
			$objDrawing->setName('Foto satu');
			$objDrawing->setDescription('foto site');
			$objDrawing->setPath($path_satu);
			$objDrawing->setCoordinates('X'.$numrow);                      
			//setOffsetX works properly
			$objDrawing->setOffsetX(5); 
			$objDrawing->setOffsetY(5);                
			//set width, height
			$objDrawing->setWidth(250); 
			$objDrawing->setHeight(110); 
			$objDrawing->setWorksheet($excel->getActiveSheet());

			$objDrawing = new PHPExcel_Worksheet_Drawing();
			$objDrawing->setName('Foto dua');
			$objDrawing->setDescription('foto site');
			$objDrawing->setPath($path_dua);
			$objDrawing->setCoordinates('Y'.$numrow);                      
			//setOffsetX works properly
			$objDrawing->setOffsetX(5); 
			$objDrawing->setOffsetY(5);                
			//set width, height
			$objDrawing->setWidth(250); 
			$objDrawing->setHeight(110); 
			$objDrawing->setWorksheet($excel->getActiveSheet());

			$objDrawing = new PHPExcel_Worksheet_Drawing();
			$objDrawing->setName('foto tiga');
			$objDrawing->setDescription('foto site');
			$objDrawing->setPath($path_tiga);
			$objDrawing->setCoordinates('Z'.$numrow);                      
			//setOffsetX works properly
			$objDrawing->setOffsetX(5); 
			$objDrawing->setOffsetY(5);                
			//set width, height
			$objDrawing->setWidth(250); 
			$objDrawing->setHeight(110); 
			$objDrawing->setWorksheet($excel->getActiveSheet());

			if($data->foto_empat != NULL)
			{
				$objDrawing = new PHPExcel_Worksheet_Drawing();
				$objDrawing->setName('foto empat');
				$objDrawing->setDescription('foto site');
				$objDrawing->setPath($path_empat);
				$objDrawing->setCoordinates('AA'.$numrow);                      
				//setOffsetX works properly
				$objDrawing->setOffsetX(5); 
				$objDrawing->setOffsetY(5);                
				//set width, height
				$objDrawing->setWidth(250); 
				$objDrawing->setHeight(110); 
				$objDrawing->setWorksheet($excel->getActiveSheet());
			}
			

			$objDrawing = new PHPExcel_Worksheet_Drawing();
			$objDrawing->setName('foto lokasi');
			$objDrawing->setDescription('foto site');
			$objDrawing->setPath($path_lokasi);
			$objDrawing->setCoordinates('AB'.$numrow);                      
			//setOffsetX works properly
			$objDrawing->setOffsetX(5); 
			$objDrawing->setOffsetY(5);                
			//set width, height
			$objDrawing->setWidth(250); 
			$objDrawing->setHeight(110); 
			$objDrawing->setWorksheet($excel->getActiveSheet());

	      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('k'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('W'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('X'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('Y'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('Z'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('AA'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('AB'.$numrow)->applyFromArray($style_row);
	      

	       $excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(100);
	      
	      $no++; // Tambah 1 setiap kali looping
	      $numrow++; // Tambah 1 setiap kali looping
	    }

	    // Set width kolom
		    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(18); // Set width kolom A
		    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(21); // Set width kolom B
		    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(21); // Set width kolom C
		    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(21); // Set width kolom D
		    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(21); // Set width kolom E
		    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(21); // Set width kolom A
		    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(21); // Set width kolom B
		    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(21); // Set width kolom C
		    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(21); // Set width kolom D
		    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(20); // Set width kolom E
		    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(20); // Set width kolom E
		    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(22); // Set width kolom E
		    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(22); // Set width kolom E
		    $excel->getActiveSheet()->getColumnDimension('N')->setWidth(22); // Set width kolom E
		    $excel->getActiveSheet()->getColumnDimension('O')->setWidth(22); // Set width kolom E
		    $excel->getActiveSheet()->getColumnDimension('P')->setWidth(22); // Set width kolom E
		    $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(22); // Set width kolom E
		    $excel->getActiveSheet()->getColumnDimension('R')->setWidth(22); // Set width kolom E
		    $excel->getActiveSheet()->getColumnDimension('S')->setWidth(22); // Set width kolom E
		    $excel->getActiveSheet()->getColumnDimension('T')->setWidth(22); // Set width kolom E
		    $excel->getActiveSheet()->getColumnDimension('U')->setWidth(22); // Set width kolom E
		    $excel->getActiveSheet()->getColumnDimension('V')->setWidth(22); // Set width kolom E
		    $excel->getActiveSheet()->getColumnDimension('W')->setWidth(22); // Set width kolom E
		    $excel->getActiveSheet()->getColumnDimension('X')->setWidth(22); // Set width kolom E
		    $excel->getActiveSheet()->getColumnDimension('Y')->setWidth(30); // Set width kolom E
		    $excel->getActiveSheet()->getColumnDimension('Z')->setWidth(30); // Set width kolom E
		    $excel->getActiveSheet()->getColumnDimension('AA')->setWidth(30); // Set width kolom E
		    $excel->getActiveSheet()->getColumnDimension('AB')->setWidth(30); // Set width kolom E
		    
		    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		   
		    // Set orientasi kertas jadi LANDSCAPE
		    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		    // Set judul file excel nya
		    $excel->getActiveSheet(0)->setTitle("Laporan Site");
		    $excel->setActiveSheetIndex(0);
		    // Proses file excel
		    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		    $fn = "Laporan Site ".$start." - ".$end.".xlsx";
		    header("Content-Disposition: attachment; filename=$fn"); // Set nama file excel nya
		    header('Cache-Control: max-age=0');
		    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		    $write->save('php://output');
	}
}
?>