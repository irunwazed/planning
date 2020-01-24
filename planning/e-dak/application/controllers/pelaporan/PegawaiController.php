<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PegawaiController extends CI_Controller {

	private $arr;
	public function __construct()
    {
		parent::__construct();
        $this->load->model('pelaporan/PegawaiModel');
		$this->load->library('Fungsi');
		$this->load->library('Filter');
		
		$this->arr = array(
			'level' => array(1,2,3,4),
        );
    }

    public function view($tahun = null){
        
        $status = $this->filter->cekLogin($this->arr);
		if(!$status){
			redirect(base_url()."login");
		}
        $data['tahun'] = $tahun;
        $this->load->model('pelaporan/DataModel');
        $data['dataJenis'] = $this->DataModel->selectJenis();
        $foot['script'] = $this->load->view('components/pegawai/script', $data, true);
		
        $this->load->view('include/head');
        $this->load->view('components/pegawai/data', $data);
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
            $data = $this->PegawaiModel->getAll($page, $search);

            // $dataAll
            $jumDataAll = $this->PegawaiModel->getCount($search);
            $jumlahDatainPage = $this->PegawaiModel->getJumlahInPage();
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
        // print_r($post);
		// $session = $this->myconfig->getSession(@$post['session'], True, $this->akun, $this->level);
		// $status = true;
		$status = $this->filter->cekLogin($this->arr);
        
		$result = array(
			'pesan' => 'gagal terhubung server',
			'status' => false,
        );
        
        if($status){
			if($id != null){
				$post['id_user'] = $id;
			}
            $result = $this->PegawaiModel->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);

    }

    public function getDataPpk(){
        $post = $this->input->post();
        $this->load->model('pelaporan/DataModel');
        $data = $this->DataModel->getPpk($post['id_pegawai']);
        $kirim = array(
            'data' => $data,
            'pesan' => "",
            'status' => True,
        );
		echo json_encode($kirim);
    }

}