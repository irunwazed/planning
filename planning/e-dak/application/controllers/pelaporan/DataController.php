<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataController extends CI_Controller {
    private $arr;
	public function __construct()
    {
		parent::__construct();
        $this->load->model('pelaporan/DataModel');
        $this->load->library('Fungsi');
        $this->load->library('Filter');
        $this->arr = array(
			'level' => array(1,2,3,4),
        );
    }

    public function setting(){
        echo '<form method="POST" action="'.base_url().'pelaporan/DataController/do_upload"  enctype="multipart/form-data">';
        echo '
            <input type="file" name="userfile" />
            <br /><br />
            <input type="submit" value="upload" />
        ';
        echo "</form>";
    }

    public function do_upload()
    {
        $config['upload_path']          = './public';
        $config['allowed_types']        = 'gif|jpg|png|php';
        $config['max_size']             = 10000;
        $config['max_width']            = 10240;
        $config['max_height']           = 7680;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            echo "sukse";
        }
    }

    function getBidang(){
        $post = $this->input->post();
        $data = $this->DataModel->getBidang2($post);

        $kirim = array(
            "data" => $data,
            "status" => TRUE,
            "pesan" => "",
        );
        echo json_encode($kirim);
    }

    function getSubBidang(){
        $post = $this->input->post();
        $data = $this->DataModel->getSubBidang($post);

        $kirim = array(
            "data" => $data,
            "status" => TRUE,
            "pesan" => "",
        );
        echo json_encode($kirim);
    }

    
}