<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SetTahunController extends CI_Controller {
    
    private $levelArr;

	public function __construct()
    {
		parent::__construct();
        $this->load->model('setting/SetTahunModel');
        $this->load->library('Filter');
        $this->levelArr = array(1,2);
    }

    public function view(){
        $this->filter->cekLoginOut($this->levelArr);
        
        $data = array();
        $data['judul'] = "Set Tahun";
        $this->load->model('rpjmd/DataModel');
        $data['dataRpjmd'] = $this->DataModel->getRowVisi();

        $file['content'] = $this->load->view('components/set-tahun/content', $data, true);
        $file['script'] = $this->load->view('components/set-tahun/script', $data, true);
        $this->load->view('includes/layout', $file);
	}
    
	public function action($action = ''){
        $post = $this->input->post();
        $status = $this->filter->cekLogin($this->levelArr);
		$result = array(
			'pesan' => 'gagal terhubung server',
			'status' => false,
        );
        if($status){
            $result = $this->SetTahunModel->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);

    }

}