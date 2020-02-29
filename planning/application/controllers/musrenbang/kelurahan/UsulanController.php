<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsulanController extends CI_Controller {
    
    private $levelArr;

	public function __construct()
    {
		parent::__construct();
        $this->load->model('musrenbang/kelurahan/UsulanModel');
        $this->load->library('Filter');
        $this->levelArr = array(1,2,3);
    }

    public function view(){
        $this->filter->MuscekLoginOut($this->levelArr);
        
        $data = array();
        $data['judul'] = "Data Satuan";

        $this->load->model('rpjmd/DataModel');
        $data['dataRpjmd'] = $this->DataModel->getRowVisi();

        $file['content'] = $this->load->view('musrenbang/components/kelurahan/usulan/content', $data, true);
        $file['script'] = $this->load->view('musrenbang/components/kelurahan/usulan/script', $data, true);
        $file['mn3'] = true;
        $this->load->view('musrenbang/includes/layout', $file);
	}

    public function getData($page = 1){
        $post = $this->input->post();
        $post['page'] = $page;
        $jumDataAll = 0;
        $jumlahDatainPage = 0;
        $data = array();
        $jumlahPage = 1;
        $status = $this->filter->MuscekLogin($this->levelArr);
        
		if($status){
            $data = $this->UsulanModel->getAll($post);
            $jumDataAll = $this->UsulanModel->getCount($post);
            $jumlahDatainPage = $this->UsulanModel->getJumlahInPage();
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
        $status = $this->filter->MuscekLogin($this->levelArr);
		$result = array(
			'pesan' => 'gagal terhubung server',
			'status' => false,
        );
        if($status){
            $result = $this->UsulanModel->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);

    }

}