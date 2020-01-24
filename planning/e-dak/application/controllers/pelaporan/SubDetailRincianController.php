<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubDetailRincianController extends CI_Controller {
    private $arr;
	public function __construct()
    {
		parent::__construct();
        $this->load->model('pelaporan/SubDetailRincianModel');
        $this->load->library('Fungsi');
        $this->load->library('Filter');
        $this->arr = array(
			'level' => array(1,2,3,4),
        );
    }

    public function view($tahun = null, $kode = null){
        $status = $this->filter->cekLogin($this->arr);
		if(!$status){
			redirect(base_url()."login");
		}
        $this->load->model('pelaporan/DataModel');
        $data['dataSatuan'] = $this->DataModel->selectSatuan();
        $data['dataMasalah'] = $this->DataModel->selectMasalah();
        $data['tahun'] = $tahun;
        $data['kode'] = $kode;
        $foot['script'] = $this->load->view('components/sub-detail-rincian/script', $data, true);
        $this->load->view('include/head');
        $this->load->view('components/sub-detail-rincian/data', $data);
        $this->load->view('include/foot', $foot);
    }

    public function getData($page = 1, $api = true){
        $jumDataAll = 0;
        $post = $this->input->post();
		$status = $this->filter->cekLogin($this->arr);
		if($status){
            $search = '';
            if(@$this->input->post('search')){
                $search = $this->input->post('search');
            }
            $data = $this->SubDetailRincianModel->getAll($page, $search, $post);

            // $dataAll
            $jumDataAll = $this->SubDetailRincianModel->getCount($search, $post);
            $jumlahDatainPage = $this->SubDetailRincianModel->getJumlahInPage();
            $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
		}else{
            $data = array();
            $jumlahPage = 1;
        }
        
		$kirim = array(
            'jumlahAll' => $jumDataAll,
            'jumlahPage' => $jumlahPage,
			'data' => $data,
			'status' => $status
        );
        if($api)
            echo json_encode($kirim);
        else
            return json_encode($kirim);
	}
	
	public function action($action = '', $id = null){
        $post = $this->input->post();
        $status = $this->filter->cekLogin($this->arr);
		$result = array(
			'pesan' => 'gagal terhubung server',
			'status' => false,
        );
        if($status){
			
			if($id != null){
				$post['id_user'] = $id;
			}
            $result = $this->SubDetailRincianModel->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);

    }
    
}
