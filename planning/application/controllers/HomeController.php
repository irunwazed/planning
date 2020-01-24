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

    
	public function arrHakUser(){

        $rpjmd = array(
            'misi' => true,
            'tujuan' => true,
            'sasaran' => true,
            'opd' => true,
            'program' => true,
        );

        $renstra = array(
            'kegiatan' => true,
        );

        $rkpdPenetapan = array(
            'program' => true,
            'kegiatan' => true,
            'tahun' => array(1,2,3,4,5),
        );

        $rkpdPerubahan = array(
            'program' => true,
            'kegiatan' => true,
            'tahun' => array(1,2,3,4,5),
        );

        $lra = array(
            'program' => true,
            'kegiatan' => true,
            'rek3' => true,
            'rek4' => true,
            'rek5' => true,
            'tahun' => array(1,2,3,4,5),
            'bulan' => array(1,2,3,4,5,6,7,8,9,10,11,12),
        );

        $pk = array(
            'sasaran' => true,
            'program' => true,
            'kegiatan' => true,
            'tahun' => array(1,2,3,4,5),
        );
        
		$hak = array(
            'rpjmd' => $rpjmd,
            'renstra' => $renstra,
            'rkpdPenetapan' => $rkpdPenetapan,
            'rkpdPerubahan' => $rkpdPerubahan,
            'lra' => $lra,
            'pk' => $pk,
        );

		$json = json_encode($hak);
		echo $json;	
		echo "<br>";
		$decode = json_decode($json, true);
		echo "<pre>";
		print_r($decode);
    }
    
    
    public function setProgram(){
        $data = $this->db->get("tb_rpjmd_program")->result_array();
        for($i = 0; $i < count($data); $i++){
            $this->db->where("tb_urusan_kode", $data[$i]['tb_urusan_kode']);
            $this->db->where("tb_bidang_kode", $data[$i]['tb_bidang_kode']);
            $this->db->where("tb_program_kode", $data[$i]['tb_program_kode']);
            $prog = $this->db->get("tb_program")->num_rows();
            if($prog == 0){
                print_r($prog);
                $this->db->where("tb_urusan_kode", $data[$i]['tb_urusan_kode']);
                $this->db->where("tb_bidang_kode", $data[$i]['tb_bidang_kode']);
                $this->db->where("tb_program_kode", $data[$i]['tb_program_kode']);
                $prog = $this->db->delete("tb_rpjmd_program");
            }
        }

    }
}
