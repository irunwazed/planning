<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BidangController extends CI_Controller {
    
    private $levelArr;

	public function __construct()
    {
		parent::__construct();
        $this->load->model('data/BidangModel');
        $this->load->library('Filter');
        $this->levelArr = array(1);
    }

    public function view($kode){

        $this->filter->cekLoginOut($this->levelArr);

        $data = array();
        $data['judul'] = "Data Bidang";
        $data['kode'] = $kode;

        $this->load->model('rpjmd/DataModel');
        $data['dataSotk'] = $this->DataModel->getRowUrusan($kode);
        $data['dataRpjmd'] = $this->DataModel->getRowVisi();
        $data['dataFungsi'] = $this->DataModel->getDataFungsi();

        $file['content'] = $this->load->view('components/data-bidang/content', $data, true);
        $file['script'] = $this->load->view('components/data-bidang/script', $data, true);
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
            $data = $this->BidangModel->getAll($post);
            $jumDataAll = $this->BidangModel->getCount($post);
            $jumlahDatainPage = $this->BidangModel->getJumlahInPage();
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
            $result = $this->BidangModel->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);

    }

}