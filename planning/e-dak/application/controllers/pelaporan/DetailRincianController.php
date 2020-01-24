<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailRincianController extends CI_Controller {
    private $arr;
	public function __construct()
    {
		parent::__construct();
        $this->load->model('pelaporan/DetailRincianModel');
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
        $data['dataPpk'] = $this->DataModel->selectPpk();
        $data['dataSatuan'] = $this->DataModel->selectSatuan();
        $data['dataMasalah'] = $this->DataModel->selectMasalah();
        $data['tahun'] = $tahun;
        $data['kode'] = $kode;
        $foot['script'] = $this->load->view('components/detail-rincian/script', $data, true);
        $this->load->view('include/head');
        $this->load->view('components/detail-rincian/data', $data);
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
            $data = $this->DetailRincianModel->getAll($page, $search, $post);

            // $dataAll
            $jumDataAll = $this->DetailRincianModel->getCount($search, $post);
            $jumlahDatainPage = $this->DetailRincianModel->getJumlahInPage();
            $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
		}else{
            $data = array();
            $jumlahPage = 1;
        }

        $this->load->model('pelaporan/DataModel');
        for($i = 0; $i < count($data); $i++){
            $post['kode'] = $post['tahun'].'-'.$data[$i]['bidang_kode'];
            $data[$i]['jumlah_isi'] = $this->DataModel->jumlah_isi($post);
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
            $result = $this->DetailRincianModel->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);

    }
    
}
