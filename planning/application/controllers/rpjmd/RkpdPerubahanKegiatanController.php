<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RkpdPerubahanKegiatanController extends CI_Controller {
    
    private $levelArr;

	public function __construct()
    {
		parent::__construct();
        $this->load->model('rpjmd/RkpdPerubahanKegiatanModel');
        $this->load->library('Filter');
        $this->load->library('Fungsi');
        $this->levelArr = array(1,2);
    }

    public function view($kode){
        $this->filter->cekLoginOut($this->levelArr);
        
        $data = array();
        $data['judul'] = "Data Kegiatan RKPD Perubahan";
        $data['kode'] = $kode;
        $this->load->model('rpjmd/DataModel');
        $data['dataRpjmd'] = $this->DataModel->getRowProgram($kode, 3);
        
        $setKode = explode("-", $kode);
        $setKode = $setKode[3].'-'.$setKode[4].'-'.$setKode[7];
        $data['dataKegiatan'] = $this->DataModel->getKegiatan($setKode);
        $data['dataSatuan'] = $this->DataModel->getAllSatuan();

        $file['content'] = $this->load->view('components/rkpd-perubahan-kegiatan/content', $data, true);
        $file['script'] = $this->load->view('components/rkpd-perubahan-kegiatan/script', $data, true);
        $this->load->view('includes/layout', $file);
	}

    public function getData($page = 1){
        $post = $this->input->post();
        $post['page'] = $page;
        $jumDataAll = 0;
        $jumlahDatainPage = 0;
        $data = array();
        $jumlahPage = 1;
        $status = $this->filter->cekLogin($this->levelArr);
        
		if($status){
            $data = $this->RkpdPerubahanKegiatanModel->getAll($post);
            $jumDataAll = $this->RkpdPerubahanKegiatanModel->getCount($post);
            $jumlahDatainPage = $this->RkpdPerubahanKegiatanModel->getJumlahInPage();
            $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
		}

        $kirim = array(
            'jumlahAll' => $jumDataAll,
            'jumlahPage' => $jumlahPage,
			'data' => $data,
			'status' => $status
        );

        echo json_encode($kirim);
    }
    
	public function action($action = ''){
        $post = $this->input->post();
        $status = $this->filter->cekLogin($this->levelArr);
		$result = array(
			'pesan' => 'gagal terhubung server',
			'status' => false,
        );
        if($status){
            $result = $this->RkpdPerubahanKegiatanModel->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);

    }

}