<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersController extends CI_Controller {
    private $arr;
	public function __construct()
    {
		parent::__construct();
        $this->load->model('pelaporan/UsersModel');
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
        $data['dataOpd'] = $this->DataModel->selectOpd();
        
        $foot['script'] = $this->load->view('components/user/script', $data, true);

        $this->load->view('include/head');
        $this->load->view('components/user/data', $data);
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
            $data = $this->UsersModel->getAll($page, $search);

            // $dataAll
            $jumDataAll = $this->UsersModel->getCount($search);
            $jumlahDatainPage = $this->UsersModel->getJumlahInPage();
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
        $status = true;
        
		$result = array(
			'pesan' => 'gagal terhubung server',
			'status' => false,
        );
        
        if($status){
			
			if($id != null){
				$post['id_user'] = $id;
			}
            $result = $this->UsersModel->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);

    }
    
}
