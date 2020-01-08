<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function index()
	{
		$this->load->view('pages/awal');
	}

	public function login()
	{
		$this->load->view('pages/login');
	}

	public function coba(){
		$tahunan = array(
            'bulan1' => 1,
            'bulan2' => 2,
            'bulan3' => 2,
            'bulan4' => 2,
            'bulan5' => 2,
            'bulan6' => 2,
            'bulan7' => 3,
            'bulan8' => 3,
            'bulan9' => 3,
            'bulan10' => 3,
            'bulan11' => 3,
            'bulan12' => 3,
        );
        $status = array(
            'tahun1' => $tahunan,
            'tahun2' => $tahunan,
            'tahun3' => $tahunan,
            'tahun4' => $tahunan,
            'tahun5' => $tahunan,
        );

		$json = json_encode($status);
		echo $json;	
		echo "<br>";
		$decode = json_decode($json, true);
		echo "<pre>";
		print_r($decode);
		$decode['tahun1']['bulan12'] = 1;
		print_r($decode);
	}
}
