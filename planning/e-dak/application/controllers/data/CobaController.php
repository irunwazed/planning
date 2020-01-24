<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class CobaController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    } 

    public function qrCodeScan(){
        $this->load->view("pages/scan-qrcode.php");
    }

    public function qrCode(){
        
        $nim = "sdf";

        $this->load->library('ciqrcode'); //pemanggilan library QR CODE

		$config['cacheable']	= true; //boolean, the default is true
		$config['cachedir']		= './public/'; //string, the default is application/cache/
		$config['errorlog']		= './public/'; //string, the default is application/logs/
		$config['imagedir']		= './public/qrcode/img/'; //direktori penyimpanan qr code
		$config['quality']		= true; //boolean, the default is true
		$config['size']			= '1024'; //interger, the default is 1024
		$config['black']		= array(224,255,255); // array, default is array(255,255,255)
		$config['white']		= array(70,130,180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$image_name=$nim.'.png'; //buat name dari qr code sesuai dengan nim

		$params['data'] = $nim; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
	}
	
	public function setTgl(){

		// $tahun = date("Y");
		// echo $tahun;
		// $tahun = date("m");
		// echo $tahun;
		// $tahun = date("d");
		// echo $tahun;
		// APPPATH . "/third_par22ty/PHPExcel222.php";
		//unlink(APPPATH ."/controllers/data/TesController.php");
		$fileContents = "tes";
		$this->load->library('encrypt');
		// echo $this->encrypt->encode($fileContents);
		// echo $this->encrypt->decode($this->encrypt->encode($fileContents));

		$file_name="tesModel";
		$folder= APPPATH ."/models/pelaporan/";
		$ext=".php";
		
		$file_name=$folder."".$file_name."".$ext;
		$text = readfile($file_name);

		$write_text=$text;
		$write_text = str_replace('true','false',$write_text);
		echo $write_text;
		// $write_text=$this->encrypt->decode($write_text);

		$edit_file = fopen($file_name, 'w');
			
		fwrite($edit_file, $write_text);
		fclose($edit_file);


	}


	public function insertData(){
		$triwulan = @$_GET['triwulan']?$_GET['triwulan']:1;
		$bidang = @$_GET['bidang']?$_GET['bidang']:1;

		$rand = array(
			'',
			array(0,25),
			array(25,50),
			array(50,75),
			array(75,100),
		);

		$this->db->where("bidang_kode", $bidang);
		$this->db->where("tahun", 2019);
		$dataAll = $this->db->get('detail_rincian')->result_array();

		foreach($dataAll as $row){
			$data = array(
				'detail_rincian_tw'.$triwulan.'_fisik_volume' => 0,
				'detail_rincian_tw'.$triwulan.'_fisik_persen' => rand($rand[$triwulan][0],$rand[$triwulan][1]),
			);
			if($row['detail_rincian_pelaksanaan_jenis'] == 1){
				$data['detail_rincian_tw'.$triwulan.'_keuangan_rp'] = $row['detail_rincian_swakelola_rp']*rand($rand[$triwulan][0],$rand[$triwulan][1])/100;
			}else{
				$data['detail_rincian_tw'.$triwulan.'_keuangan_rp'] = $row['detail_rincian_konstraktual_rp']*rand($rand[$triwulan][0],$rand[$triwulan][1])/100;
			}

			$this->db->where("tahun", $row['tahun']);
			$this->db->where("bidang_kode", $row['bidang_kode']);
			$this->db->where("sub_bidang_kode", $row['sub_bidang_kode']);
			$this->db->where("kegiatan_kode", $row['kegiatan_kode']);
			$this->db->where("rincian_kode", $row['rincian_kode']);
			$this->db->where("detail_rincian_kode", $row['detail_rincian_kode']);

			$this->db->update('detail_rincian', $data);
		}
		
		$this->db->where("bidang_kode", $bidang);
		$this->db->where("tahun", 2019);
		$dataAll = $this->db->get('kegiatan_penunjang')->result_array();

		foreach($dataAll as $row){
			$data = array(
				'kegiatan_penunjang_tw'.$triwulan.'_fisik_volume' => 0,
				'kegiatan_penunjang_tw'.$triwulan.'_fisik_persen' => rand($rand[$triwulan][0],$rand[$triwulan][1]),
			);
			if($row['kegiatan_penunjang_pelaksanaan_jenis'] == 1){
				$data['kegiatan_penunjang_tw'.$triwulan.'_keuangan_rp'] = $row['kegiatan_penunjang_swakelola_rp']*rand($rand[$triwulan][0],$rand[$triwulan][1])/100;
			}else{
				$data['kegiatan_penunjang_tw'.$triwulan.'_keuangan_rp'] = $row['kegiatan_penunjang_konstraktual_rp']*rand($rand[$triwulan][0],$rand[$triwulan][1])/100;
			}
			
			$this->db->where("tahun", $row['tahun']);
			$this->db->where("bidang_kode", $row['bidang_kode']);
			$this->db->where("sub_bidang_kode", $row['sub_bidang_kode']);
			$this->db->where("kegiatan_penunjang_kode", $row['kegiatan_penunjang_kode']);
			$this->db->update('kegiatan_penunjang', $data);
		}
		
	}

	public function emptyData(){
		print_r($_GET);
		$triwulan = @$_GET['triwulan']?$_GET['triwulan']:1;
		$bidang = @$_GET['bidang']?$_GET['bidang']:1;
		$this->db->where("bidang_kode", $bidang);
		$this->db->where("tahun", 2019);
		$dataAll = $this->db->get('detail_rincian')->result_array();

		foreach($dataAll as $row){
			$data = array(
				'detail_rincian_tw'.$triwulan.'_fisik_volume' => 0,
				'detail_rincian_tw'.$triwulan.'_fisik_persen' => 0,
				'detail_rincian_tw'.$triwulan.'_keuangan_rp' => 0,
			);
			
			$this->db->where("tahun", $row['tahun']);
			$this->db->where("bidang_kode", $row['bidang_kode']);
			$this->db->where("sub_bidang_kode", $row['sub_bidang_kode']);
			$this->db->where("kegiatan_kode", $row['kegiatan_kode']);
			$this->db->where("rincian_kode", $row['rincian_kode']);
			$this->db->where("detail_rincian_kode", $row['detail_rincian_kode']);

			$this->db->update('detail_rincian', $data);
		}

		$this->db->where("bidang_kode", $bidang);
		$this->db->where("tahun", 2019);
		$dataAll = $this->db->get('kegiatan_penunjang')->result_array();


		foreach($dataAll as $row){
			$data = array(
				'kegiatan_penunjang_tw'.$triwulan.'_fisik_volume' => 0,
				'kegiatan_penunjang_tw'.$triwulan.'_fisik_persen' => 0,
				'kegiatan_penunjang_tw'.$triwulan.'_keuangan_rp' => 0,
			);

			$this->db->where("tahun", $row['tahun']);
			$this->db->where("bidang_kode", $row['bidang_kode']);
			$this->db->where("sub_bidang_kode", $row['sub_bidang_kode']);
			$this->db->where("kegiatan_penunjang_kode", $row['kegiatan_penunjang_kode']);
			$this->db->update('kegiatan_penunjang', $data);
		}
		
	}


}
