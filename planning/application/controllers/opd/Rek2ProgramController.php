<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rek2ProgramController extends CI_Controller {
    
    private $levelArr;

	public function __construct()
    {
		parent::__construct();
        $this->load->model('opd/Rek2ProgramModel');
        $this->load->library('Filter');
        $this->load->library('Fungsi');
        $this->levelArr = array(1,3);
    }

    public function view($kode){
        $this->filter->cekLoginOut($this->levelArr);
        
        $data = array();
        $data['judul'] = "Data Rek 2 Program";
        $data['kode'] = $kode;
        $this->load->model('rpjmd/DataModel');
        $data['dataProgram'] = $this->DataModel->getProgram($this->session->kodeOpd);
        $data['dataLra'] = $this->DataModel->getLraRek2($kode);
        // $data['dataRpjmd'] = $this->DataModel->getRowVisi();

        $file['content'] = $this->load->view('components-opd/lra-rek2-program/content', $data, true);
        $file['script'] = $this->load->view('components-opd/lra-rek2-program/script', $data, true);
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
            $data = $this->Rek2ProgramModel->getAll($post);
            $jumDataAll = $this->Rek2ProgramModel->getCount($post);
            $jumlahDatainPage = $this->Rek2ProgramModel->getJumlahInPage();
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
            $result = $this->Rek2ProgramModel->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);

    }

}