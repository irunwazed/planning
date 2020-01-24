<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LraController extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
        $this->load->library('Filter');
        $this->levelArr = array(1,2,3);
    }

    public function view(){
        $this->filter->cekLoginOut($this->levelArr);
        
        $data = array();
        $data['judul'] = "Laporan Laporan Realisasi Anggaran";
        $this->load->model('rpjmd/DataModel');
        $data['dataRpjmd'] = $this->DataModel->getRowVisi();
        $data['dataOpd'] = $this->DataModel->getAllOpd();

        $file['content'] = $this->load->view('components/laporan-lra/content', $data, true);
        $file['script'] = $this->load->view('components/laporan-lra/script', $data, true);
        $this->load->view('includes/layout', $file);
	}

    public function cetak($save = ''){

        // error_reporting(0);
        $status = false;
        $pesan = "Data Tidak Ditemukan";
        $post = $this->input->post();

        $dataIndikator = array();
        $linkSavePDF = 'pdf/laporan-lra';
        $nameFile = 'laporan';
        $pageStatus = 'miring';
        
        $pesan = "Berhasil Mendapatkan Data";
        $status = true;
        $dataAll = array();

        // $post['']

        if(!@$post['tahun']){
            $post['tahun'] = 1;
        }
        $tahun = $post['tahun'];

        if(!@$post['bulan']){
            $post['bulan'] = 1;
        }
        $bulan = $post['bulan'];

        $this->load->model('rpjmd/DataModel');
        $dataRpjmd = $this->DataModel->getRowVisi();

        $dataAll = $this->setData($post);

        $kirim = array(
            "dataRpjmd" => $dataRpjmd,
            "tahunKe" => $tahun,
            "bulanKe" => $bulan,
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

    public function setData($post){

        $data = $this->DataModel->getOpdKegiatanLra($this->session->kodeOpd, $post['tahun']);

        $tb_urusan_kode = 0;
        $tb_bidang_kode = 0;
        $tb_program_kode = 0;
        $tb_kegiatan_kode = 0;

        $indexProgram = 1;

        $dataAll = array();
        $index = 0;
        for($i = 0; $i < count($data); $i++){

            if($data[$i]['tb_urusan_kode'] != $tb_urusan_kode){

                $dataAll[$index] = $data[$i];
                $dataAll[$index]['level'] = 1;
                $index++;

                $tb_urusan_kode = $data[$i]['tb_urusan_kode'];
                $tb_bidang_kode = 0;
                $tb_program_kode = 0;
                $tb_kegiatan_kode = 0;
            }
            if($data[$i]['tb_bidang_kode'] != $tb_bidang_kode){

                $dataAll[$index] = $data[$i];
                $dataAll[$index]['level'] = 2;
                $index++;

                $tb_bidang_kode = $data[$i]['tb_bidang_kode'];
                $tb_program_kode = 0;
                $tb_kegiatan_kode = 0;
            }
            if($data[$i]['tb_program_kode'] != $tb_program_kode){
                
                $dataAll[$index] = $data[$i];
                $dataAll[$index]['level'] = 3;
                $setKode = $data[$i]['tb_urusan_kode'].'-'.$data[$i]['tb_bidang_kode'].'-'.$data[$i]['tb_unit_kode'].'-'.$data[$i]['tb_sub_unit_kode'].'-'.$data[$i]['tb_program_kode'];
                $statusProgram[0] = $this->DataModel->checkProgram($setKode, 1);
                $statusProgram[1] = $this->DataModel->checkProgram($setKode, 2, $post['tahun']);
                $statusProgram[2] = $this->DataModel->checkProgram($setKode, 3, $post['tahun']);
                $dataAll[$index]['status-rkpd'] =  $statusProgram;


                $indexProgram = $index;
                $index++;

                $tb_program_kode = $data[$i]['tb_program_kode'];
                $tb_kegiatan_kode = 0;
            }

            $dataAll[$index] = $data[$i];
            $dataAll[$index]['level'] = 4;
            $setKode = $data[$i]['tb_urusan_kode'].'-'.$data[$i]['tb_bidang_kode'].'-'.$data[$i]['tb_unit_kode'].'-'.$data[$i]['tb_sub_unit_kode'].'-'.$data[$i]['tb_program_kode'].'-'.$data[$i]['tb_kegiatan_kode'];
            $statusProgram[0] = $this->DataModel->checkKegiatan($setKode, 1);
            $statusProgram[1] = $this->DataModel->checkKegiatan($setKode, 2, $post['tahun']);
            $statusProgram[2] = $this->DataModel->checkKegiatan($setKode, 3, $post['tahun']);
            $dataAll[$index]['status-rkpd'] =  $statusProgram;

            $kode = $dataAll[$index]['id_tb_rpjmd']
                ."-".$dataAll[$index]['tb_urusan_kode']
                ."-".$dataAll[$index]['tb_bidang_kode']
                ."-".$dataAll[$index]['tb_unit_kode']
                ."-".$dataAll[$index]['tb_sub_unit_kode']
                ."-".$dataAll[$index]['tb_program_kode']
                ."-".$dataAll[$index]['tb_kegiatan_kode'];

            $jumAnggaranProgram = 0;
            $jumRealisasiProgram = 0;
            for($tahunan = $post['tahun']; $tahunan <= $post['tahun']; $tahunan++){
                $jumAnggaran = 0;
                $jumRealisasi = 0;
                $dataAll[$index]['dataLra'] = $this->DataModel->getCapaian($kode, $tahunan);
                // echo "<pre>";
                // print_r($dataAll[$index]['dataLra']);
                // echo "</pre>";
                for($j = 0; $j < count($dataAll[$index]['dataLra']); $j++){
                    $jumAnggaran += $dataAll[$index]['dataLra'][$j]['tb_monev_lra_rek5_anggaran'];
                    $jumRealisasi += $dataAll[$index]['dataLra'][$j]['tb_monev_lra_rek5_realisasi'];
                }
                $dataAll[$index]['kegiatan_th'.$tahunan.'_capaian_anggaran'] = $jumAnggaran;
                $dataAll[$index]['kegiatan_th'.$tahunan.'_capaian_realisasi'] = $jumRealisasi;
                $dataAll[$index]['kegiatan_th'.$tahunan.'_capaian_realisasi_anggaran'] = $jumRealisasi - $jumAnggaran;

                // program
                $jumAnggaranProgram += $jumAnggaran;
                $jumRealisasiProgram += $jumRealisasi;
                $dataAll[$indexProgram]['program_th'.$tahunan.'_capaian_anggaran'] = $jumAnggaranProgram;
                $dataAll[$indexProgram]['program_th'.$tahunan.'_capaian_realisasi'] = $jumRealisasiProgram;
                $dataAll[$indexProgram]['program_th'.$tahunan.'_capaian_realisasi_anggaran'] = $jumRealisasiProgram - $jumAnggaranProgram;
            }
            
            $index++;
        }
        return $dataAll;

    }

}