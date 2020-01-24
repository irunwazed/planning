<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KegiatanController extends CI_Controller {
    private $arr;
	public function __construct()
    {
		parent::__construct();
        $this->load->model('pelaporan/KegiatanModel');
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
        $data['dataJenis'] = $this->DataModel->selectJenis();
        $data['dataMasalah'] = $this->DataModel->selectMasalah();
        $data['dataOpd'] = $this->DataModel->selectOpd();
        $data['tahun'] = $tahun;
        $data['kode'] = $kode;
        $foot['script'] = $this->load->view('components/kegiatan/script', $data, true);
        $this->load->view('include/head');
        $this->load->view('components/kegiatan/data', $data);
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
            
            $data = $this->KegiatanModel->getAll($page, $search, $post);
            
            if($_SESSION['level'] == 4){
                $this->load->model('pelaporan/DataModel');
                $post['userKode'] = @$this->DataModel->getUserKode($_SESSION['id'], $_SESSION['level']);
                $dataAll = array();
                $index = 0;
                foreach($data  as $row){
                    foreach($post['userKode'] as $userKode){
                        if($row['tahun'] == $userKode['tahun']
                            && $row['bidang_kode'] == $userKode['bidang_kode']
                            && $row['sub_bidang_kode'] == $userKode['sub_bidang_kode']
                            && $row['id_jenis'] == $userKode['id_jenis']){
                            $dataAll[$index] = $row;
                            $index++;
                        }
                    }
                }

                $data =  $dataAll;
            }
            

            
            // $dataAll
            $jumDataAll = $this->KegiatanModel->getCount($search, $post);
            $jumlahDatainPage = $this->KegiatanModel->getJumlahInPage();
            $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
		}else{
            $data = array();
            $jumlahPage = 1;
        }

        $this->load->model('pelaporan/DataModel');
        for($i = 0; $i < count($data); $i++){
            $post['kode'] = $post['tahun'].'-'.$data[$i]['bidang_kode'].'-'.$data[$i]['sub_bidang_kode'].'-'.$data[$i]['kegiatan_kode'];
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
            $result = $this->KegiatanModel->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);

    }
    
}
