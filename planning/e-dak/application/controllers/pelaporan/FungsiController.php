<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FungsiController extends CI_Controller {
    private $arr;
	public function __construct()
    {
		parent::__construct();
        $this->load->model('pelaporan/DataModel');
        $this->load->model('pelaporan/FungsiModel');
        $this->load->library('Fungsi');
        $this->load->library('Filter');
        $this->arr = array(
			'level' => array(1,2,3,4),
        );
    }
    
	public function setPpk(){
        $post = $this->input->post();
        $status = $this->filter->cekLogin($this->arr);
        
		$result = array(
			'pesan' => 'gagal terhubung server',
			'status' => false,
        );
        
        if($status){
			
            $status = $this->FungsiModel->setPpk($post);
            if($status){
                $pesan = 'Berhasil Menentukan PPK';
                
            }else{
                $pesan = 'Gagal Mentukan PPK';
            }
            $result = array(
                'pesan' => $pesan,
                'status' => $status,
            );
                
        }
        $kirim = $result;
		echo json_encode($kirim);

    }
    
}