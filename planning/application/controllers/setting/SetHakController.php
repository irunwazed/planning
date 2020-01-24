<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SetHakController extends CI_Controller {
    
    private $levelArr;

	public function __construct()
    {
		parent::__construct();
        $this->load->model('setting/SetHakModel');
        $this->load->library('Filter');
        $this->levelArr = array(1,2);
    }

    public function view($id = null){
        $this->filter->cekLoginOut($this->levelArr);
        
        if($id == null){
            $id = $this->session->id;
        }

        $data = array();
        $data['judul'] = "Set Hak User";
        $this->load->model('rpjmd/DataModel');
        $data['dataRpjmd'] = $this->DataModel->getRowVisi();
        $data['dataHak'] = $this->DataModel->getHak($id);
        $data['dataUser'] = $this->DataModel->getDataUser();

        $data['id'] = $id;

        $file['content'] = $this->load->view('components/set-hak/content', $data, true);
        $file['script'] = $this->load->view('components/set-hak/script', $data, true);
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
            $result = $this->SetHakModel->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);

    }

}