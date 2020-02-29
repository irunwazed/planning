<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubUnitController extends CI_Controller {
    
    private $levelArr;

	public function __construct()
    {
		parent::__construct();
        $this->load->model('data/SubUnitModel');
        $this->load->library('Filter');
        $this->levelArr = array(1);
    }

    public function view($kode){

        $this->filter->cekLoginOut($this->levelArr);

        $data = array();
        $data['judul'] = "Data Sub Unit";
        $data['kode'] = $kode;

        $this->load->model('rpjmd/DataModel');
        $data['dataSotk'] = $this->DataModel->getRowUnit($kode);
        $data['dataRpjmd'] = $this->DataModel->getRowVisi();
        $data['dataFungsi'] = $this->DataModel->getDataFungsi();

        $file['content'] = $this->load->view('components/data-sub-unit/content', $data, true);
        $file['script'] = $this->load->view('components/data-sub-unit/script', $data, true);
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
            $data = $this->SubUnitModel->getAll($post);
            $jumDataAll = $this->SubUnitModel->getCount($post);
            $jumlahDatainPage = $this->SubUnitModel->getJumlahInPage();
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
            $result = $this->SubUnitModel->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);

    }

}