<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatController extends CI_Controller {
    
    private $levelArr;

	public function __construct()
    {
		parent::__construct();
        $this->load->model('status/StatusModel');
        $this->load->library('Filter');
        $this->levelArr = array(1,2);
    }

    public function index(){
        $this->filter->cekLoginOut($this->levelArr);
        
        $data = array();
        $data['judul'] = "Set Status";

        

        $file['content'] = $this->load->view('components/status/content', $data, true);
        $file['script'] = $this->load->view('components/status/script', $data, true);
        $this->load->view('includes/layout', $file);
	}

    public function getData(){
        $thn = $this->input->post('tahun', true);
        $bln = $this->input->post('bulan', true);
        $data = array();
        $status = $this->filter->cekLogin($this->levelArr);
        
		if($status){
            $xx = $this->StatusModel->getAllJson(); 
            $tahun = $xx["tahun$thn"];
            $data['bulan'] = $tahun["bulan$bln"];
		}

        $kirim = array(
			'data' => $data,
			'status' => $status
        );

        echo json_encode($kirim);
    }

    public function update(){
        $data = array();
        $status = $this->filter->cekLogin($this->levelArr);
        
        if($status){
            $xx = $this->StatusModel->update(); 
            $data['hasil'] = $xx;
        }

        $kirim = array(
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
            $result = $this->SatuanModel->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);

    }

}