<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProgramController extends CI_Controller {
    
    private $levelArr;

	public function __construct()
    {
		parent::__construct();
        $this->load->model('opd/ProgramModel');
        $this->load->library('Filter');
        $this->load->library('Fungsi');
        $this->levelArr = array(1,3);
    }

    public function view(){
        $this->filter->cekLoginOut($this->levelArr);
        
        $data = array();
        $data['judul'] = "Data Program";
        $this->load->model('rpjmd/DataModel');
        $data['dataRpjmd'] = $this->DataModel->getRowVisi();
        $data['dataSasaran'] = $this->DataModel->getAllSasaran();

        $file['content'] = $this->load->view('components-opd/program/content', $data, true);
        $file['script'] = $this->load->view('components-opd/program/script', $data, true);
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
            $data = $this->ProgramModel->getAll($post);
            $jumDataAll = $this->ProgramModel->getCount($post);
            $jumlahDatainPage = $this->ProgramModel->getJumlahInPage();
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
            $result = $this->ProgramModel->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);

    }

}