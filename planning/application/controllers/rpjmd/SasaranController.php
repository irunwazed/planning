<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SasaranController extends CI_Controller {
    
    private $levelArr;

	public function __construct()
    {
		parent::__construct();
        $this->load->model('rpjmd/SasaranModel');
        $this->load->library('Filter');
        $this->load->library('Fungsi');
        $this->levelArr = array(1,2);
    }

    public function view($kode){
        $this->filter->cekLoginOut($this->levelArr);
        
        $data = array();
        $data['judul'] = "Data Sasaran";
        $data['kode'] = $kode;

        $this->load->model('rpjmd/DataModel');
        $data['dataRpjmd'] = $this->DataModel->getRowTujuan($kode);

        $file['content'] = $this->load->view('components/sasaran/content', $data, true);
        $file['script'] = $this->load->view('components/sasaran/script', $data, true);
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
            $data = $this->SasaranModel->getAll($post);
            $jumDataAll = $this->SasaranModel->getCount($post);
            $jumlahDatainPage = $this->SasaranModel->getJumlahInPage();
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
            $result = $this->SasaranModel->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);

    }

}