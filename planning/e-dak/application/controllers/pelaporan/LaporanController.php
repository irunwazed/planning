<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelaporan/LaporanModel');
        $this->load->model('pelaporan/DataModel');
        $this->load->library('Fungsi');
    }

    public function laporan($tahun = null){

        if($tahun == null){
            $tahun = date("Y");
        }
        $data['tahun'] = $tahun;
        $post = array();
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

        $data['dataJenis'] = $this->DataModel->selectJenis();
        $data['dataBidang'] = $this->DataModel->selectBidang($post);

        $foot['script'] = $this->load->view('components/laporan/pelaporan/script', $data, true);
        $this->load->view('include/head');
        $this->load->view('components/laporan/pelaporan/data', $data);
        $this->load->view('include/foot', $foot);
    }

    public function cetak($save = ''){
        $status = false;
        $pesan = "Data Tidak Ditemukan";
        $post = $this->input->post();
        $dataIndikator = array();
        $linkSavePDF = 'pdf/laporan';
        $nameFile = 'laporan';
        $pageStatus = 'miring';
        
        $data = $this->LaporanModel->selectLaporan($post);
        $dataBidang = $this->DataModel->getBidang($post);
        // $dataPenunjang = $this->LaporanModel->selectPenunjang($post);
        $pesan = "Berhasil Mendapatkan Data";
        $status = true;
        $dataAll = array();

        
        $sub_bidang_kode = 0;
        $kegiatan_kode = 0;
        $rincian_kode = 0;
        $no = 0;

        $index_sub_bidang = 0;
        $index_kegiatan_kode = 0;
        $index_rincian_kode = 0;
        
        $triwulan = @$post['triwulan']?$post['triwulan']:1;
        $arrPersen = array();
        $totalFisikPersen = array();
        $row = 0;
        for($row = 0; $row < count($data); $row++){
            $uang = $data[$row]['detail_rincian_tw'.$triwulan.'_keuangan_rp'];
            if($data[$row]['detail_rincian_pelaksanaan_jenis'] == 1){
                $pagu = $data[$row]['detail_rincian_swakelola_rp'];
            }else{
                $pagu = $data[$row]['detail_rincian_konstraktual_rp'];
            }
            $paguAll = $data[$row]['detail_rincian_pagu'];
            // $pagu = $row['detail_rincian_pagu'];
            $fisikPersen = $data[$row]['detail_rincian_tw'.$triwulan.'_fisik_persen'];
            array_push($totalFisikPersen, $fisikPersen);
            // $persen = 100*($uang/$pagu); 
            if($sub_bidang_kode != $data[$row]['sub_bidang_kode']){
                $sub_bidang_kode = $data[$row]['sub_bidang_kode'];
                $dataAll[$no] = $data[$row];
                $dataAll[$no]['level'] = 1;
                $index_sub_bidang = $no;
                $dataAll[$index_sub_bidang]['persen_jumlah'] = array();
                array_push($dataAll[$index_sub_bidang]['persen_jumlah'], $fisikPersen);
                $dataAll[$index_sub_bidang]['pagu_all_jumlah'] = $paguAll;
                $dataAll[$index_sub_bidang]['pagu_jumlah'] = $pagu;
                $dataAll[$index_sub_bidang]['swakelola_jumlah'] = $data[$row]['detail_rincian_swakelola_rp'];
                $dataAll[$index_sub_bidang]['konstraktual_jumlah'] = $data[$row]['detail_rincian_konstraktual_rp'];
                $dataAll[$index_sub_bidang]['keuangan_jumlah'] = $uang;
                
                $dataAll[$index_sub_bidang]['keuangan_persen'] = array();
                if($pagu > 0){
                    array_push($dataAll[$index_sub_bidang]['keuangan_persen'], 100*($uang/$pagu));
                }else{
                    array_push($dataAll[$index_sub_bidang]['keuangan_persen'], 0);
                    // echo $data[$row]['detail_rincian_swakelola_rp']."<br>";
                    // echo $data[$row]['detail_rincian_pelaksanaan_jenis']."<br>";
                }
                $no++;
                $kegiatan_kode = 0;
            }else{
                array_push($dataAll[$index_sub_bidang]['persen_jumlah'], $fisikPersen);
                $dataAll[$index_sub_bidang]['pagu_all_jumlah'] += $paguAll;
                $dataAll[$index_sub_bidang]['pagu_jumlah'] += $pagu;
                $dataAll[$index_sub_bidang]['swakelola_jumlah'] += $data[$row]['detail_rincian_swakelola_rp'];
                $dataAll[$index_sub_bidang]['konstraktual_jumlah'] += $data[$row]['detail_rincian_konstraktual_rp'];
                $dataAll[$index_sub_bidang]['keuangan_jumlah'] += $uang;
                
                
                if($pagu > 0){
                    array_push($dataAll[$index_sub_bidang]['keuangan_persen'], 100*($uang/$pagu));
                }else{
                    array_push($dataAll[$index_sub_bidang]['keuangan_persen'], 0);
                }
            }

            if($kegiatan_kode != $data[$row]['kegiatan_kode']){
                $kegiatan_kode = $data[$row]['kegiatan_kode'];
                $dataAll[$no] = $data[$row];
                $dataAll[$no]['level'] = 2;
                $index_kegiatan_kode = $no;
                $dataAll[$index_kegiatan_kode]['persen_jumlah'] = array();
                array_push($dataAll[$index_kegiatan_kode]['persen_jumlah'], $fisikPersen);
                $dataAll[$index_kegiatan_kode]['pagu_all_jumlah'] = $paguAll;
                $dataAll[$index_kegiatan_kode]['pagu_jumlah'] = $pagu;
                $dataAll[$index_kegiatan_kode]['swakelola_jumlah'] = $data[$row]['detail_rincian_swakelola_rp'];
                $dataAll[$index_kegiatan_kode]['konstraktual_jumlah'] = $data[$row]['detail_rincian_konstraktual_rp'];
                $dataAll[$index_kegiatan_kode]['keuangan_jumlah'] = $uang;
                $dataAll[$index_kegiatan_kode]['keuangan_persen'] = array();
                if($pagu > 0){
                    array_push($dataAll[$index_kegiatan_kode]['keuangan_persen'], 100*($uang/$pagu));
                }else{
                    array_push($dataAll[$index_kegiatan_kode]['keuangan_persen'], 0);
                }

                $no++;
                $rincian_kode = 0;
            }else{
                array_push($dataAll[$index_kegiatan_kode]['persen_jumlah'], $fisikPersen);
                $dataAll[$index_kegiatan_kode]['pagu_all_jumlah'] += $paguAll;
                $dataAll[$index_kegiatan_kode]['pagu_jumlah'] += $pagu;
                $dataAll[$index_kegiatan_kode]['swakelola_jumlah'] += $data[$row]['detail_rincian_swakelola_rp'];
                $dataAll[$index_kegiatan_kode]['konstraktual_jumlah'] += $data[$row]['detail_rincian_konstraktual_rp'];
                $dataAll[$index_kegiatan_kode]['keuangan_jumlah'] += $uang;
                if($pagu> 0){
                    array_push($dataAll[$index_kegiatan_kode]['keuangan_persen'], 100*($uang/$pagu));
                }else{
                    array_push($dataAll[$index_kegiatan_kode]['keuangan_persen'], 0);
                }
            }

            if($rincian_kode != $data[$row]['rincian_kode']){
                $rincian_kode = $data[$row]['rincian_kode'];
                $dataAll[$no] = $data[$row];
                $dataAll[$no]['level'] = 3;
                $index_rincian_kode = $no;
                $dataAll[$index_rincian_kode]['persen_jumlah'] = array();
                array_push($dataAll[$index_rincian_kode]['persen_jumlah'], $fisikPersen);
                $dataAll[$index_rincian_kode]['pagu_all_jumlah'] = $paguAll;
                $dataAll[$index_rincian_kode]['pagu_jumlah'] = $pagu;
                $dataAll[$index_rincian_kode]['swakelola_jumlah'] = $data[$row]['detail_rincian_swakelola_rp'];
                $dataAll[$index_rincian_kode]['konstraktual_jumlah'] = $data[$row]['detail_rincian_konstraktual_rp'];
                $dataAll[$index_rincian_kode]['keuangan_jumlah'] = $uang;
                $dataAll[$index_rincian_kode]['keuangan_persen'] = array();
                if($pagu > 0){
                    array_push($dataAll[$index_rincian_kode]['keuangan_persen'], 100*($uang/$pagu));
                }else{
                    array_push($dataAll[$index_rincian_kode]['keuangan_persen'], 0);
                }
                
                $no++;
            }else{
                array_push($dataAll[$index_rincian_kode]['persen_jumlah'], $fisikPersen);
                $dataAll[$index_rincian_kode]['pagu_all_jumlah'] += $paguAll;
                $dataAll[$index_rincian_kode]['pagu_jumlah'] += $pagu;
                $dataAll[$index_rincian_kode]['swakelola_jumlah'] += $data[$row]['detail_rincian_swakelola_rp'];
                $dataAll[$index_rincian_kode]['konstraktual_jumlah'] += $data[$row]['detail_rincian_konstraktual_rp'];
                $dataAll[$index_rincian_kode]['keuangan_jumlah'] += $uang;
                
                if($pagu > 0){
                    array_push($dataAll[$index_rincian_kode]['keuangan_persen'], 100*($uang/$pagu));
                }else{
                    array_push($dataAll[$index_rincian_kode]['keuangan_persen'], 0);
                }
            }
            $dataAll[$no] = $data[$row];
            $dataAll[$no]['level'] = 4;
            $no++;

            if(!@$data[$row+1]['sub_bidang_kode'] || (@$data[$row+1]['sub_bidang_kode'] > 0 && @$data[$row+1]['sub_bidang_kode'] != $sub_bidang_kode)){
                
                $post['bidang_kode'] = $data[$row]['bidang_kode'];
                $post['sub_bidang_kode'] = $data[$row]['sub_bidang_kode'];
                $dataPenunjang = $this->LaporanModel->selectPenunjang($post);

                $dataAll[$no-1]['dataPenunjang'][0]['pagu_all_jumlah'] = 0;
                $dataAll[$no-1]['dataPenunjang'][0]['pagu_jumlah'] = 0;
                $dataAll[$no-1]['dataPenunjang'][0]['swakelola_jumlah'] = 0;
                $dataAll[$no-1]['dataPenunjang'][0]['konstraktual_jumlah'] = 0;
                $dataAll[$no-1]['dataPenunjang'][0]['keuangan_jumlah'] = 0;
                $dataAll[$no-1]['dataPenunjang'][0]['keuangan_persen'] = array();
                
                for($l = 1; $l <= count($dataPenunjang); $l++){
                    $uang = $dataPenunjang[$l-1]['kegiatan_penunjang_tw'.$triwulan.'_keuangan_rp'];
                    $paguAll = $dataPenunjang[$l-1]['kegiatan_penunjang_pagu'];
                    
                    $fisikPersen = $dataPenunjang[$l-1]['kegiatan_penunjang_tw'.$triwulan.'_fisik_persen'];
                    if($row['kegiatan_penunjang_jenis'] == 1){
                        $pagu = $dataPenunjang[$l-1]['kegiatan_penunjang_swakelola_rp'];
                    }else{
                        $pagu = $dataPenunjang[$l-1]['kegiatan_penunjang_konstraktual_rp'];
                    }
                    $dataAll[$no-1]['dataPenunjang'][$l] = $dataPenunjang[$l-1];
                    $dataAll[$no-1]['dataPenunjang'][0]['pagu_all_jumlah'] += $paguAll;
                    $dataAll[$no-1]['dataPenunjang'][0]['pagu_jumlah'] += $pagu;
                    $dataAll[$no-1]['dataPenunjang'][0]['swakelola_jumlah'] += $dataPenunjang[$l-1]['kegiatan_penunjang_swakelola_rp'];
                    $dataAll[$no-1]['dataPenunjang'][0]['konstraktual_jumlah'] += $dataPenunjang[$l-1]['kegiatan_penunjang_konstraktual_rp'];
                    $dataAll[$no-1]['dataPenunjang'][0]['keuangan_jumlah'] += $uang;
                    array_push($dataAll[$no-1]['dataPenunjang'][0]['keuangan_persen'],  $pagu>0?100*$uang/$pagu:0);
                    
                    //sub bidang
                    array_push($dataAll[$index_sub_bidang]['persen_jumlah'], $fisikPersen);
                    $dataAll[$index_sub_bidang]['pagu_all_jumlah'] += $paguAll;
                    $dataAll[$index_sub_bidang]['pagu_jumlah'] += $pagu;
                    $dataAll[$index_sub_bidang]['swakelola_jumlah'] += $dataPenunjang[$l-1]['kegiatan_penunjang_swakelola_rp'];
                    $dataAll[$index_sub_bidang]['konstraktual_jumlah'] += $dataPenunjang[$l-1]['kegiatan_penunjang_konstraktual_rp'];
                    $dataAll[$index_sub_bidang]['keuangan_jumlah'] += $uang;
                    
                    
                    if($pagu > 0){
                        array_push($dataAll[$index_sub_bidang]['keuangan_persen'], 100*($uang/$pagu));
                    }else{
                        array_push($dataAll[$index_sub_bidang]['keuangan_persen'], 0);
                    }
                }
            }
        }
        

        $dataTotal = array(
            "fisikPersen" => $totalFisikPersen,
        );

        $dataTambahan = array(
            'dataBidang' => $dataBidang,
        );

        $kirim = array(
            "data" => $dataAll,
            "dataTotal" => $dataTotal,
            'dataTambahan' => $dataTambahan,
            "status" => $status,
            "post" => $post,
            "pesan" => $pesan,
        );
        // echo "<pre>";
        // print_r($dataAll);

        if($save == 'pdf'){
            $this->load->library('M_pdf');
            $this->m_pdf->getPdf($nameFile, $linkSavePDF, $kirim, $pageStatus);
        }else if($save == 'print'){
            $kirim['print'] = true;
            $this->load->view($linkSavePDF, $kirim);
        }else if($save == 'excel'){
            $this->exportExcelIndikator($dataType, $nameFile, $kirim, $kirim);
        }else{
            echo json_encode($kirim);
        }
    }

    public function cetak2($save = ''){
        $status = false;
        $pesan = "Data Tidak Ditemukan";
        $post = $this->input->post();
        $dataIndikator = array();
        $linkSavePDF = 'pdf/laporan2';
        $nameFile = 'laporan';
        $pageStatus = 'miring';
        
        $data = $this->LaporanModel->selectLaporan($post);
        $dataBidang = $this->DataModel->getBidang($post);
        // $dataPenunjang = $this->LaporanModel->selectPenunjang($post);
        $pesan = "Berhasil Mendapatkan Data";
        $status = true;
        $dataAll = array();

        $bidang_kode = 0;
        $sub_bidang_kode = 0;
        $kegiatan_kode = 0;
        $rincian_kode = 0;
        $no = 0;

        $index_sub_bidang = 0;
        $index_kegiatan_kode = 0;
        $index_rincian_kode = 0;
        
        $triwulan = @$post['triwulan']?$post['triwulan']:1;
        $arrPersen = array();
        $totalFisikPersen = array();
        $row = 0;

        $arrTemp = array(
            'pagu_jumlah' => 0,
            'swakelola_jumlah' => 0,
            'konstraktual_jumlah' => 0,
            'keuangan_persen' => array(),
            'keuangan_jumlah' => 0,
            'fisik_persen' => array(),
        );

        $arrTempPenunjang = array(
            'pagu_jumlah' => 0,
            'swakelola_jumlah' => 0,
            'konstraktual_jumlah' => 0,
            'keuangan_persen' => 0,
            'keuangan_jumlah' => 0,
            'fisik_persen' => 0,
        );
        
        for($i = 0; $i < count($data); $i++){

            $uang = $data[$i]['detail_rincian_tw'.$triwulan.'_keuangan_rp'];
            $uangSwakelola = $data[$i]['detail_rincian_swakelola_rp'];
            $uangkontraktual = $data[$i]['detail_rincian_konstraktual_rp'];

            if($data[$i]['detail_rincian_pelaksanaan_jenis'] == 1){
                $pagu = $uangSwakelola;
            }else{
                $pagu = $uangkontraktual;
            }
            $paguAll = $data[$i]['detail_rincian_pagu'];

            if($pagu > 0){
                $keuanganPersen = 100*$uang/$pagu;
            }else{
                $keuanganPersen = 0;
            }
            $fisikPersen = $data[$i]['detail_rincian_tw'.$triwulan.'_fisik_persen'];

            
            if($sub_bidang_kode != $data[$i]['sub_bidang_kode']){
                $sub_bidang_kode = $data[$i]['sub_bidang_kode'];
                $dataAll[$no] = $arrTemp;
                $dataAll[$no] = $dataAll[$no]+ $data[$i];
                $dataAll[$no]['level'] = 1;
                $no++;

                
                $kegiatan_kode = 0;
                $rincian_kode = 0;
            }

            if($kegiatan_kode != $data[$i]['kegiatan_kode']){
                $kegiatan_kode = $data[$i]['kegiatan_kode'];
                $dataAll[$no] = $arrTemp;
                $dataAll[$no] = $dataAll[$no]+ $data[$i];
                $dataAll[$no]['level'] = 2;
                $no++;

                
                $rincian_kode = 0;
            }

            if($rincian_kode != $data[$i]['rincian_kode']){
                $rincian_kode = $data[$i]['rincian_kode'];
                $dataAll[$no] = $data[$i];
                $dataAll[$no]['level'] = 3;
                $index_rincian_kode = $no;
                $dataAll[$index_rincian_kode]['pagu_jumlah'] = $paguAll;
                $dataAll[$index_rincian_kode]['swakelola_jumlah'] = $uangSwakelola;
                $dataAll[$index_rincian_kode]['konstraktual_jumlah'] = $uangkontraktual;
                $dataAll[$index_rincian_kode]['keuangan_jumlah'] = $uang;

                $dataAll[$index_rincian_kode]['keuangan_persen'] = array();
                array_push($dataAll[$index_rincian_kode]['keuangan_persen'], $keuanganPersen);
                $dataAll[$index_rincian_kode]['fisik_persen'] = array();
                array_push($dataAll[$index_rincian_kode]['fisik_persen'], $fisikPersen);
                $no++;
            }else{
                $dataAll[$index_rincian_kode]['pagu_jumlah'] += $paguAll;
                $dataAll[$index_rincian_kode]['swakelola_jumlah'] += $uangSwakelola;
                $dataAll[$index_rincian_kode]['konstraktual_jumlah'] += $uangkontraktual;
                $dataAll[$index_rincian_kode]['keuangan_jumlah'] += $uang;
                array_push($dataAll[$index_rincian_kode]['keuangan_persen'], $keuanganPersen);
                array_push($dataAll[$index_rincian_kode]['fisik_persen'], $fisikPersen);
            }

            $dataAll[$no] = $data[$i];
            // $dataAll[$no] = $dataAll[$no]+ $data[$i];
            
            $dataAll[$no]['keuangan_jumlah'] = $uang;
            $dataAll[$no]['keuangan_persen'] = $keuanganPersen;
            $dataAll[$no]['level'] = 4;

            $no++;

            if(!@$data[$i+1]['sub_bidang_kode'] || (@$data[$i+1]['sub_bidang_kode'] > 0 && @$data[$i+1]['sub_bidang_kode'] != $sub_bidang_kode)){
                $post['tahun'] = 2019;
                $post['bidang_kode'] = $data[$i]['bidang_kode'];
                $post['sub_bidang_kode'] = $data[$i]['sub_bidang_kode'];
                $dataPenunjang = $this->LaporanModel->selectPenunjang($post);

                $dataAll[$no-1]['dataPenunjang'][0] = $arrTemp;
                $dataAll[$no-1]['dataPenunjang'][0]['jumlah'] = count($dataPenunjang);
                
                for($j = 1; $j <= count($dataPenunjang); $j++){
                    $uang = $dataPenunjang[$j-1]['kegiatan_penunjang_tw'.$triwulan.'_keuangan_rp'];
                    $uangSwakelola = $dataPenunjang[$j-1]['kegiatan_penunjang_swakelola_rp'];
                    $uangkontraktual = $dataPenunjang[$j-1]['kegiatan_penunjang_konstraktual_rp'];

                    if($dataPenunjang[$j-1]['kegiatan_penunjang_jenis'] == 1){
                        $pagu = $uangSwakelola;
                    }else{
                        $pagu = $uangkontraktual;
                    }
                    $paguAll = $dataPenunjang[$j-1]['kegiatan_penunjang_pagu'];

                    if($pagu > 0){
                        $keuanganPersen = 100*$uang/$pagu;
                    }else{
                        $keuanganPersen = 0;
                    }
                    $fisikPersen = $dataPenunjang[$j-1]['kegiatan_penunjang_tw'.$triwulan.'_fisik_persen'];

                    
                    $dataAll[$no-1]['dataPenunjang'][$j] = $dataPenunjang[$j-1];
                    $dataAll[$no-1]['dataPenunjang'][$j]['pagu_jumlah'] = $paguAll;
                    $dataAll[$no-1]['dataPenunjang'][$j]['swakelola_jumlah'] = $uangSwakelola;
                    $dataAll[$no-1]['dataPenunjang'][$j]['konstraktual_jumlah'] = $uangkontraktual;
                    $dataAll[$no-1]['dataPenunjang'][$j]['keuangan_jumlah'] = $uang;


                    $dataAll[$no-1]['dataPenunjang'][$j]['keuangan_persen'] = $keuanganPersen;
                    $dataAll[$no-1]['dataPenunjang'][$j]['fisik_persen'] = $fisikPersen;
                    
                    $dataAll[$no-1]['dataPenunjang'][0]['pagu_jumlah'] += $paguAll;
                    $dataAll[$no-1]['dataPenunjang'][0]['swakelola_jumlah'] += $uangSwakelola;
                    $dataAll[$no-1]['dataPenunjang'][0]['konstraktual_jumlah'] += $uangkontraktual;
                    $dataAll[$no-1]['dataPenunjang'][0]['keuangan_jumlah'] += $uang;

                    array_push($dataAll[$no-1]['dataPenunjang'][0]['keuangan_persen'], $keuanganPersen);
                    array_push($dataAll[$no-1]['dataPenunjang'][0]['fisik_persen'], $fisikPersen);

                }
                $keuangan_persen = $dataAll[$no-1]['dataPenunjang'][0]['keuangan_persen'];
                if(count($keuangan_persen) > 0){
                    $dataAll[$no-1]['dataPenunjang'][0]['keuangan_persen'] = array_sum($keuangan_persen)/count($keuangan_persen);
                }else{
                    $dataAll[$no-1]['dataPenunjang'][0]['keuangan_persen'] = 0;
                }
                $fisik_persen = $dataAll[$no-1]['dataPenunjang'][0]['fisik_persen'];
                if(count($fisik_persen) > 0){
                    $dataAll[$no-1]['dataPenunjang'][0]['fisik_persen'] = array_sum($fisik_persen)/count($fisik_persen);
                }else{
                    $dataAll[$no-1]['dataPenunjang'][0]['fisik_persen'] = 0;
                }
            }

        }
        
        for($i = 0; $i < count($dataAll); $i++){
            if($dataAll[$i]['level'] == 3){
                $keuangan_persen = $dataAll[$i]['keuangan_persen'];
                $fisik_persen = $dataAll[$i]['fisik_persen'];
                if(count($keuangan_persen) > 0){
                    $dataAll[$i]['keuangan_persen'] = array_sum($keuangan_persen)/count($keuangan_persen);
                }else{
                    $dataAll[$i]['keuangan_persen'] = 0;
                }
                if(count($fisik_persen) > 0){
                    $dataAll[$i]['fisik_persen'] = array_sum($fisik_persen)/count($fisik_persen);
                }else{
                    $dataAll[$i]['fisik_persen'] = 0;
                }
            }
        }

        $bidang_kode = 0;
        $sub_bidang_kode = 0;
        $kegiatan_kode = 0;
        $rincian_kode = 0;

        $index = 0;

        for($i = 0; $i < count($dataAll); $i++){
            if($dataAll[$i]['level'] == 1){
                $sub_bidang_kode = $dataAll[$i]['sub_bidang_kode'];
                $kegiatan_kode = 0;
            }
            if($dataAll[$i]['level'] == 2){
                $kegiatan_kode = $dataAll[$i]['kegiatan_kode'];
                $index = $i;
            }
            if($dataAll[$i]['level'] == 3){
                // echo $index;
                $dataAll[$index]['pagu_jumlah'] += $dataAll[$i]['pagu_jumlah'];
                $dataAll[$index]['swakelola_jumlah'] += $dataAll[$i]['swakelola_jumlah'] ;
                $dataAll[$index]['konstraktual_jumlah'] += $dataAll[$i]['konstraktual_jumlah'];
                $dataAll[$index]['keuangan_jumlah'] += $dataAll[$i]['keuangan_jumlah'];
                array_push($dataAll[$index]['keuangan_persen'], $dataAll[$i]['keuangan_persen']);
                array_push($dataAll[$index]['fisik_persen'], $dataAll[$i]['fisik_persen']);
            }
        }

        for($i = 0; $i < count($dataAll); $i++){
            if($dataAll[$i]['level'] == 2){
                $keuangan_persen = $dataAll[$i]['keuangan_persen'];
                $fisik_persen = $dataAll[$i]['fisik_persen'];
                if(count($keuangan_persen) > 0){
                    $dataAll[$i]['keuangan_persen'] = array_sum($keuangan_persen)/count($keuangan_persen);
                }else{
                    $dataAll[$i]['keuangan_persen'] = 0;
                }
                if(count($fisik_persen) > 0){
                    $dataAll[$i]['fisik_persen'] = array_sum($fisik_persen)/count($fisik_persen);
                }else{
                    $dataAll[$i]['fisik_persen'] = 0;
                }
            }
        }

        for($i = 0; $i < count($dataAll); $i++){
            if($dataAll[$i]['level'] == 1){
                $sub_bidang_kode = $dataAll[$i]['sub_bidang_kode'];
                $index = $i;
            }
            if($dataAll[$i]['level'] == 2){
                // echo $index;
                $dataAll[$index]['pagu_jumlah'] += $dataAll[$i]['pagu_jumlah'];
                $dataAll[$index]['swakelola_jumlah'] += $dataAll[$i]['swakelola_jumlah'] ;
                $dataAll[$index]['konstraktual_jumlah'] += $dataAll[$i]['konstraktual_jumlah'];
                $dataAll[$index]['keuangan_jumlah'] += $dataAll[$i]['keuangan_jumlah'];
                array_push($dataAll[$index]['keuangan_persen'], $dataAll[$i]['keuangan_persen']);
                array_push($dataAll[$index]['fisik_persen'], $dataAll[$i]['fisik_persen']);
            }
            if(@$dataAll[$i]['dataPenunjang']){
                if($dataAll[$i]['dataPenunjang'][0]['jumlah'] > 0){
                    $dataAll[$index]['pagu_jumlah'] += $dataAll[$i]['dataPenunjang'][0]['pagu_jumlah'];
                    $dataAll[$index]['swakelola_jumlah'] += $dataAll[$i]['dataPenunjang'][0]['swakelola_jumlah'] ;
                    $dataAll[$index]['konstraktual_jumlah'] += $dataAll[$i]['dataPenunjang'][0]['konstraktual_jumlah'];
                    $dataAll[$index]['keuangan_jumlah'] += $dataAll[$i]['dataPenunjang'][0]['keuangan_jumlah'];
                    array_push($dataAll[$index]['keuangan_persen'], $dataAll[$i]['dataPenunjang'][0]['keuangan_persen']);
                    array_push($dataAll[$index]['fisik_persen'], $dataAll[$i]['dataPenunjang'][0]['fisik_persen']);
                }
            }
        }

        for($i = 0; $i < count($dataAll); $i++){
            if($dataAll[$i]['level'] == 1){
                $keuangan_persen = $dataAll[$i]['keuangan_persen'];
                $fisik_persen = $dataAll[$i]['fisik_persen'];
                if(count($keuangan_persen) > 0){
                    $dataAll[$i]['keuangan_persen'] = array_sum($keuangan_persen)/count($keuangan_persen);
                }else{
                    $dataAll[$i]['keuangan_persen'] = 0;
                }
                if(count($fisik_persen) > 0){
                    $dataAll[$i]['fisik_persen'] = array_sum($fisik_persen)/count($fisik_persen);
                }else{
                    $dataAll[$i]['fisik_persen'] = 0;
                }
            }
        }

        $bidang[0] = $arrTemp;

        for($i = 0; $i < count($dataAll); $i++){
            if($dataAll[$i]['level'] == 1){
                $bidang[0]['pagu_jumlah'] += $dataAll[$i]['pagu_jumlah'];
                $bidang[0]['swakelola_jumlah'] += $dataAll[$i]['swakelola_jumlah'] ;
                $bidang[0]['konstraktual_jumlah'] += $dataAll[$i]['konstraktual_jumlah'];
                $bidang[0]['keuangan_jumlah'] += $dataAll[$i]['keuangan_jumlah'];
                array_push($bidang[0]['keuangan_persen'], $dataAll[$i]['keuangan_persen']);
                array_push($bidang[0]['fisik_persen'], $dataAll[$i]['fisik_persen']);
            }
        }
        if(count($bidang[0]['keuangan_persen']) > 0){
            $bidang[0]['keuangan_persen'] = array_sum($bidang[0]['keuangan_persen'])/count($bidang[0]['keuangan_persen']);
        }else{
            $bidang[0]['keuangan_persen'] = 0;
        }
        if(count($bidang[0]['fisik_persen']) > 0){
            $bidang[0]['fisik_persen'] = array_sum($bidang[0]['fisik_persen'])/count($bidang[0]['fisik_persen']);
        }else{
            $bidang[0]['fisik_persen'] = 0;
        }
        
        $dataTambahan = array(
            'dataBidang' => $dataBidang,
        );

        $kirim = array(
            "totalBidang"=> $bidang,
            'dataTambahan' => $dataTambahan,
            "data" => $dataAll,
            "status" => $status,
            "post" => $post,
            "pesan" => $pesan,
        );

        if($save == 'pdf'){
            $this->load->library('M_pdf');
            $this->m_pdf->getPdf($nameFile, $linkSavePDF, $kirim, $pageStatus);
        }else if($save == 'print'){
            $kirim['print'] = true;
            $this->load->view($linkSavePDF, $kirim);
        }else if($save == 'excel'){
            $this->exportExcelIndikator($dataType, $nameFile, $kirim, $kirim);
        }else{
            echo json_encode($kirim);
        }
    }

}