<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

    private $arr;
	public function __construct()
    {
		parent::__construct();
        $this->load->library('Filter');
        $this->load->library('Fungsi');
        $this->arr = array(
			'level' => array(1,2,3,4),
        );
    }
    
	public function beranda($tahun = null)
	{
        $status = $this->filter->cekLogin($this->arr);
		if(!$status){
			redirect(base_url()."login");
		}
        if($tahun == null){
            $tahun = date("Y");
        }

        // $emailStatus = $this->fungsi->kirimEmail("irunwazed@gmail.com", "tes", "tes isi");
        $data['judul'] = "KABUPATEN KOLAKA UTARA";
        if($_SESSION['level'] == 2){
            $this->load->model('pelaporan/DataModel');
            $post['userKode'] = @$this->DataModel->getUserKode($_SESSION['id'], $_SESSION['level']);
            $post['indikator'] = $post['userKode'];
            // print_r($this->DataModel->getIndikator($post));
            $data['judul'] = "BIDANG ".strtoupper(@$this->DataModel->getIndikator($post)[0]['indikator_nama']);

        }else if($_SESSION['level'] == 3){
            $this->load->model('pelaporan/DataModel');
            $post['userKode'] = @$this->DataModel->getUserKode($_SESSION['id'], $_SESSION['level']);
            $post['tahun'] = $tahun;
            $post['id_opd'] = $post['userKode'];
            $dataBidang = $this->DataModel->getBidangFromOpd($post);
            $name = "";
            for($i = 0; $i < count($dataBidang); $i++){
                $name .= " ".strtoupper($dataBidang[$i]['bidang_nama']);
                if($i + 1 < count($dataBidang)){
                    $name .= ",";
                }
            }
            $data['judul'] = "BIDANG ".$name;

        }else if($_SESSION['level'] == 4){
            $this->load->model('pelaporan/DataModel');
            $post['userKode'] = @$this->DataModel->getUserKode($_SESSION['id'], $_SESSION['level']);
            $post['tahun'] = $post['userKode'][0]['tahun'];
            $post['bidang'] = $post['userKode'][0]['bidang_kode'];
            $data['judul'] = "BIDANG ".strtoupper(@$this->DataModel->getBidang($post)[0]['bidang_nama']);
        }

        $data['dataTriwulan'] = $this->getStatus();
        $data['tahun'] = $tahun;
        $foot['script'] = $this->load->view('components/beranda/script', $data, true);

        $this->load->view('include/head');
        $this->load->view('components/beranda/data', $data);
        $this->load->view('include/foot', $foot);
    }

    

    public function getStatus(){

        $this->load->model('pelaporan/DataModel');

        if($_SESSION['level'] == 2){
            $this->load->model('pelaporan/DataModel');
            $post['userKode'] = @$this->DataModel->getUserKode($_SESSION['id'], $_SESSION['level']);
        }else if($_SESSION['level'] == 3){
            $this->load->model('pelaporan/DataModel');
            $post['userKode'] = @$this->DataModel->getUserKode($_SESSION['id'], $_SESSION['level']);
        }else if($_SESSION['level'] == 4){
            $this->load->model('pelaporan/DataModel');
            $post['userKode'] = @$this->DataModel->getUserKode($_SESSION['id'], $_SESSION['level']);
        }

        $post['tahun'] = 2019;
        $data = $this->DataModel->getDataPerTahun($post);

        // $dataPenunjang = $this->DataModel->getDataPenunjangPerTahun($post);
        // echo "<pre>";
        // print_r(($data));

        $bidang_kode = 0;
        $sub_bidang_kode = 0;
        $kegiatan_kode = 0;
        $rincian_kode = 0;

        $arrTemp = array(
            "totalKeuanganTw" => array('', array(), array(), array(), array()),
            "totalFisikTw" => array('', array(), array(), array(), array()),
        );
        $index = 0;
        $dataHitung = array();
        $no = 0;
        for($i = 0; $i < count($data); $i++){

            for($j = 1; $j <=4; $j++){
                $uang[$j] = $data[$i]['detail_rincian_tw'.$j.'_keuangan_rp'];
            }

            $uangSwakelola = $data[$i]['detail_rincian_swakelola_rp'];
            $uangkontraktual = $data[$i]['detail_rincian_konstraktual_rp'];

            if($data[$i]['detail_rincian_pelaksanaan_jenis'] == 1){
                $pagu = $uangSwakelola;
            }else{
                $pagu = $uangkontraktual;
            }

            if($pagu > 0){
                for($j = 1; $j <=4; $j++){
                    $keuanganPersen[$j] = 100*$uang[$j]/$pagu;
                }
                
            }else{
                for($j = 1; $j <=4; $j++){
                    $keuanganPersen[$j] = 0;
                }
            }
            for($j = 1; $j <=4; $j++){
                $fisikPersen[$j] = $data[$i]['detail_rincian_tw'.$j.'_fisik_persen'];
            }
            

            if($bidang_kode != $data[$i]['bidang_kode']){
                $bidang_kode = $data[$i]['bidang_kode'];
                
                $sub_bidang_kode = 0;
                $kegiatan_kode = 0;
                $rincian_kode = 0;
            }

            if($sub_bidang_kode != $data[$i]['sub_bidang_kode']){
                $sub_bidang_kode = $data[$i]['sub_bidang_kode'];
                
                $kegiatan_kode = 0;
                $rincian_kode = 0;
            }

            if($kegiatan_kode != $data[$i]['kegiatan_kode']){
                $kegiatan_kode = $data[$i]['kegiatan_kode'];
                
                $rincian_kode = 0;
            }

            if($rincian_kode != $data[$i]['rincian_kode']){
                $rincian_kode = $data[$i]['rincian_kode'];
                
                $dataHitung[$no] = $data[$i];
                $index = $no;
                $dataHitung[$index] = $dataHitung[$index] + $arrTemp;
                // $dataHitung[$index] = $arrTemp;
                // $dataHitung[$index]['level'] = 3;
                for($j = 1; $j <=4; $j++){
                    array_push($dataHitung[$index]['totalKeuanganTw'][$j], $keuanganPersen[$j]);
                    array_push($dataHitung[$index]['totalFisikTw'][$j], $fisikPersen[$j]);
                }
                $no++;
            }else{
                for($j = 1; $j <=4; $j++){
                    array_push($dataHitung[$index]['totalKeuanganTw'][$j], $keuanganPersen[$j]);
                    array_push($dataHitung[$index]['totalFisikTw'][$j], $fisikPersen[$j]);
                }
            }
        }

        for($i = 0; $i < count($dataHitung); $i++){
            for($j = 1; $j <=4; $j++){
                $totalKeuanganTw = $dataHitung[$i]['totalKeuanganTw'][$j];
                $dataHitung[$i]['totalKeuanganTw'][$j] = array_sum($totalKeuanganTw)/count($totalKeuanganTw);
                $totalFisikTw = $dataHitung[$i]['totalFisikTw'][$j];
                $dataHitung[$i]['totalFisikTw'][$j] = array_sum($totalFisikTw)/count($totalFisikTw);
            }
        }


        $no = 0;
        $bidang_kode = 0;
        $data = $dataHitung;
        $dataHitung = array();
        for($i = 0; $i < count($data); $i++){
            if($bidang_kode != $data[$i]['bidang_kode']){
                $bidang_kode = $data[$i]['bidang_kode'];
                
                $sub_bidang_kode = 0;
                $kegiatan_kode = 0;
            }

            if($sub_bidang_kode != $data[$i]['sub_bidang_kode']){
                $sub_bidang_kode = $data[$i]['sub_bidang_kode'];
                
                $kegiatan_kode = 0;
            }

            if($kegiatan_kode != $data[$i]['kegiatan_kode']){
                $kegiatan_kode = $data[$i]['kegiatan_kode'];
                $dataHitung[$no] = $data[$i];
                $index = $no;
                for($j = 1; $j <=4; $j++){
                    $dataHitung[$index]['totalKeuanganTw'][$j] = array();
                    $dataHitung[$index]['totalFisikTw'][$j] = array();
                    array_push($dataHitung[$index]['totalKeuanganTw'][$j], $data[$i]['totalKeuanganTw'][$j]);
                    array_push($dataHitung[$index]['totalFisikTw'][$j], $data[$i]['totalFisikTw'][$j]);
                }
                $no++;
            }else{
                for($j = 1; $j <=4; $j++){
                    array_push($dataHitung[$index]['totalKeuanganTw'][$j], $data[$i]['totalKeuanganTw'][$j]);
                    array_push($dataHitung[$index]['totalFisikTw'][$j], $data[$i]['totalFisikTw'][$j]);
                }
            }
        }

        for($i = 0; $i < count($dataHitung); $i++){
            for($j = 1; $j <=4; $j++){
                $totalKeuanganTw = $dataHitung[$i]['totalKeuanganTw'][$j];
                $dataHitung[$i]['totalKeuanganTw'][$j] = array_sum($totalKeuanganTw)/count($totalKeuanganTw);
                $totalFisikTw = $dataHitung[$i]['totalFisikTw'][$j];
                $dataHitung[$i]['totalFisikTw'][$j] = array_sum($totalFisikTw)/count($totalFisikTw);
            }
        }
        


        $no = 0;
        $bidang_kode = 0;
        $data = $dataHitung;
        $dataHitung = array();
        for($i = 0; $i < count($data); $i++){
            if($bidang_kode != $data[$i]['bidang_kode']){
                $bidang_kode = $data[$i]['bidang_kode'];
                
                $sub_bidang_kode = 0;
            }


            if($sub_bidang_kode != $data[$i]['sub_bidang_kode']){
                $sub_bidang_kode = $data[$i]['sub_bidang_kode'];
                $dataHitung[$no] = $data[$i];
                $index = $no;

                $post['tahun'] = 2019;
                $post['bidang_kode'] = $data[$i]['bidang_kode'];
                $post['sub_bidang_kode'] = $data[$i]['sub_bidang_kode'];
                $this->load->model('pelaporan/LaporanModel');
                $dataPenunjang = $this->LaporanModel->selectPenunjang($post);
                
                for($j = 1; $j <=4; $j++){
                    $totalKeuanganPenunjangTw[$j] = 0;
                    $totalFisikPenunjangTw[$j] = 0;
                }

                foreach($dataPenunjang as $row){

                    for($j = 1; $j <=4; $j++){
                        $uang[$j] = $row['kegiatan_penunjang_tw'.$j.'_keuangan_rp'];
                    }
        
                    $uangPenunjangSwakelola = $row['kegiatan_penunjang_swakelola_rp'];
                    $uangPenunjangkontraktual = $row['kegiatan_penunjang_konstraktual_rp'];
        
                    if($row['kegiatan_penunjang_jenis'] == 1){
                        $pagu = $uangPenunjangSwakelola;
                    }else{
                        $pagu = $uangPenunjangkontraktual;
                    }

                    if($pagu > 0){
                        for($j = 1; $j <=4; $j++){
                            $keuanganPenunjangPersen[$j] = 100*$uang[$j]/$pagu;
                        }
                    }else{
                        for($j = 1; $j <=4; $j++){
                            $keuanganPenunjangPersen[$j] = 0;
                        }
                    }
                    // echo $keuanganPenunjangPersen[3]."<br>";

                    for($j = 1; $j <=4; $j++){
                        
                        $totalKeuanganPenunjangTw[$j] += $keuanganPenunjangPersen[$j];
                        $totalFisikPenunjangTw[$j] += $row['kegiatan_penunjang_tw'.$j.'_fisik_persen'];
                    }
                }
                $jumPenunjang = count($dataPenunjang);
                // print_r($dataPenunjang);
                if( $jumPenunjang > 0){
                    for($j = 1; $j <=4; $j++){
                        $totalKeuanganPenunjangTw[$j] /= $jumPenunjang;
                        $totalFisikPenunjangTw[$j] /= $jumPenunjang;
                    }
                }

                for($j = 1; $j <=4; $j++){
                    $dataHitung[$index]['totalKeuanganTw'][$j] = array();
                    $dataHitung[$index]['totalFisikTw'][$j] = array();
                    array_push($dataHitung[$index]['totalKeuanganTw'][$j], $data[$i]['totalKeuanganTw'][$j]);
                    array_push($dataHitung[$index]['totalFisikTw'][$j], $data[$i]['totalFisikTw'][$j]);
                    array_push($dataHitung[$index]['totalKeuanganTw'][$j], $totalKeuanganPenunjangTw[$j]);
                    array_push($dataHitung[$index]['totalFisikTw'][$j], $totalFisikPenunjangTw[$j]);
                }
                $no++;
            }else{
                for($j = 1; $j <=4; $j++){
                    array_push($dataHitung[$index]['totalKeuanganTw'][$j], $data[$i]['totalKeuanganTw'][$j]);
                    array_push($dataHitung[$index]['totalFisikTw'][$j], $data[$i]['totalFisikTw'][$j]);
                }
            }
        }

        
        // echo "<pre>";
        // print_r($dataHitung);

        for($i = 0; $i < count($dataHitung); $i++){
            for($j = 1; $j <=4; $j++){
                $totalKeuanganTw = $dataHitung[$i]['totalKeuanganTw'][$j];
                $dataHitung[$i]['totalKeuanganTw'][$j] = array_sum($totalKeuanganTw)/count($totalKeuanganTw);
                $totalFisikTw = $dataHitung[$i]['totalFisikTw'][$j];
                $dataHitung[$i]['totalFisikTw'][$j] = array_sum($totalFisikTw)/count($totalFisikTw);
            }
        }
        

        $no = 0;
        $bidang_kode = 0;
        $data = $dataHitung;
        $dataHitung = array();
        for($i = 0; $i < count($data); $i++){

            if($bidang_kode != $data[$i]['bidang_kode']){
                $bidang_kode = $data[$i]['bidang_kode'];
                $dataHitung[$no] = $data[$i];
                $index = $no;
                for($j = 1; $j <=4; $j++){
                    $dataHitung[$index]['totalKeuanganTw'][$j] = array();
                    $dataHitung[$index]['totalFisikTw'][$j] = array();
                    array_push($dataHitung[$index]['totalKeuanganTw'][$j], $data[$i]['totalKeuanganTw'][$j]);
                    array_push($dataHitung[$index]['totalFisikTw'][$j], $data[$i]['totalFisikTw'][$j]);
                }
                $no++;
            }else{
                for($j = 1; $j <=4; $j++){
                    array_push($dataHitung[$index]['totalKeuanganTw'][$j], $data[$i]['totalKeuanganTw'][$j]);
                    array_push($dataHitung[$index]['totalFisikTw'][$j], $data[$i]['totalFisikTw'][$j]);
                }
            }
        }

        for($i = 0; $i < count($dataHitung); $i++){
            for($j = 1; $j <=4; $j++){
                $totalKeuanganTw = $dataHitung[$i]['totalKeuanganTw'][$j];
                $dataHitung[$i]['totalKeuanganTw'][$j] = array_sum($totalKeuanganTw)/count($totalKeuanganTw);
                $totalFisikTw = $dataHitung[$i]['totalFisikTw'][$j];
                $dataHitung[$i]['totalFisikTw'][$j] = array_sum($totalFisikTw)/count($totalFisikTw);
            }
        }



        $totalKeuanganTw = array('', 0, 0, 0, 0);
        $totalFisikTw = array('', 0, 0, 0, 0);
        foreach($dataHitung as $row){
            for($j = 1; $j <=4; $j++){
                $totalKeuanganTw[$j] += $row['totalKeuanganTw'][$j];
                $totalFisikTw[$j] += $row['totalFisikTw'][$j];
            }
        }
        $jum = count($dataHitung);
        if($jum > 0){
            for($j = 1; $j <=4; $j++){
                $totalKeuanganTw[$j] /= $jum;
                $totalFisikTw[$j] /= $jum;
            }
        }else{
            
            for($j = 1; $j <=4; $j++){
                $totalKeuanganTw[$j] =0;
                $totalFisikTw[$j] =0;
            }
        }
        


        $hasil = array(
            "totalKeuanganTw" => @$totalKeuanganTw,
            "totalFisikTw" => @$totalFisikTw,
            "dataHitung" => $dataHitung,
        );

        return $hasil;



        // print_r($arrFisik);

    }

    
    public function kirimEmail($toEmail, $judul, $isi){


        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '70';
        $config['smtp_user']    = 'simple.email.website@gmail.com';
        $config['smtp_pass']    = 'qwerty123@';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'text'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      

        $this->email->initialize($config);


        $this->email->from('simple.email.website@gmail.com', 'Si PANDAI');
        $this->email->to($toEmail); 

        $this->email->subject($judul);
        $this->email->message($isi);  

        if($this->email->send()){
            // echo "sukses";
        }else{
            show_error($this->email->print_debugger());
        }
    
        
    }
}