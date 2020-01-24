<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RkpdPerubahanController extends CI_Controller {
    
    private $levelArr;

	public function __construct()
    {
		parent::__construct();
        $this->load->model('rpjmd/RkpdPerubahanModel');
        $this->load->library('Filter');
        $this->load->library('Fungsi');
        $this->levelArr = array(1,2);
    }

    public function view(){
        $this->filter->cekLoginOut($this->levelArr);
        
        $data = array();
        $data['judul'] = "Data Program RKPD Perubahan";
        $this->load->model('rpjmd/DataModel');
        $data['dataRpjmd'] = $this->DataModel->getRowVisi();
        $data['dataSasaran'] = $this->DataModel->getAllSasaran();
        $setKode = explode("-", $this->session->kodeOpd);
        $setKode = $setKode[0].'-'.$setKode[1];
        $data['dataProgram'] = $this->DataModel->getProgram($setKode);
        $data['dataSatuan'] = $this->DataModel->getAllSatuan();
        $data['dataOpd'] = $this->DataModel->getAllOpd();

        $file['content'] = $this->load->view('components/rkpd-perubahan/content', $data, true);
        $file['script'] = $this->load->view('components/rkpd-perubahan/script', $data, true);
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
            $data = $this->RkpdPerubahanModel->getAll($post);
            $jumDataAll = $this->RkpdPerubahanModel->getCount($post);
            $jumlahDatainPage = $this->RkpdPerubahanModel->getJumlahInPage();
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
            $result = $this->RkpdPerubahanModel->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);

    }

}