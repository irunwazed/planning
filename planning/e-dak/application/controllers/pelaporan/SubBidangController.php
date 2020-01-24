<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubBidangController extends CI_Controller {
    private $arr;
	public function __construct()
    {
		parent::__construct();
        $this->load->model('pelaporan/SubBidangModel');
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
        $data['tahun'] = $tahun;
        $data['kode'] = $kode;
        $foot['script'] = $this->load->view('components/sub-bidang/script', $data, true);
        $this->load->view('include/head');
        $this->load->view('components/sub-bidang/data', $data);
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
            if($_SESSION['level'] == 4){
                $this->load->model('pelaporan/DataModel');
                $post['userKode'] = @$this->DataModel->getUserKode($_SESSION['id'], $_SESSION['level']);
            }
            $data = $this->SubBidangModel->getAll($page, $search, $post);

            // $dataAll
            $jumDataAll = $this->SubBidangModel->getCount($search, $post);
            $jumlahDatainPage = $this->SubBidangModel->getJumlahInPage();
            $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
		}else{
            $data = array();
            $jumlahPage = 1;
        }

        $this->load->model('pelaporan/DataModel');
        for($i = 0; $i < count($data); $i++){
            $post['kode'] = $post['tahun'].'-'.$data[$i]['bidang_kode'].'-'.$data[$i]['sub_bidang_kode'];
            $data[$i]['jumlah_isi'] = $this->DataModel->jumlah_isi($post);
            $data[$i]['jumlah_isi'] += $this->DataModel->jumlah_isi_penunjang($post);
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
            $result = $this->SubBidangModel->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);

    }
    
}
