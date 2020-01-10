<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RpjmdController extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
        $this->load->library('Filter');
        $this->levelArr = array(1,2);
    }

    public function view(){
        $this->filter->cekLoginOut($this->levelArr);
        
        $data = array();
        $data['judul'] = "Laporan RKPD";
        $this->load->model('rpjmd/DataModel');
        $data['dataRpjmd'] = $this->DataModel->getRowVisi();

        $file['content'] = $this->load->view('components/laporan-rpjmd/content', $data, true);
        $file['script'] = $this->load->view('components/laporan-rpjmd/script', $data, true);
        $this->load->view('includes/layout', $file);
	}

    public function cetak($save = ''){
        
        // error_reporting(0);
        $status = false;
        $pesan = "Data Tidak Ditemukan";
        $post = $this->input->post();

        $dataIndikator = array();
        $linkSavePDF = 'pdf/laporan-rpjmd';
        $nameFile = 'laporan';
        $pageStatus = 'miring';
        
        $pesan = "Berhasil Mendapatkan Data";
        $status = true;
        $dataAll = array();

        // print_r($post);

        
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

        $dataAturan = json_decode($dataRpjmd->tb_rpjmd_status_json, true);
        // $post['jenis'] = $dataAturan['tahun'.$tahun]['bulan'.$bulan];

        $post['dataAturan'] = $dataAturan;

        //manual atur jenis
        if(!@$post['jenis']){
            $post['jenis'] = 1;
        }

        $dataAll = $this->setData($post);
        // $dataAll = $this->DataModel->getLraOpd($post['cetakopd'], $post['cetaktahun']);
        // $dataOpd = $this->DataModel->selectOneOpdByKode($post['cetakopd']);

        $kirim = array(
            "dataRpjmd" => $dataRpjmd,
            "tahunKe" => $tahun,
            "bulanKe" => $bulan,
            "jenis" => $post['jenis'],
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

        $data = $this->DataModel->getOpdKegiatan($this->session->kodeOpd, $post['jenis']);
        
        $tb_rpjmd_sasaran_kode = 0;
        $tb_program_kode = 0;
        $tb_kegiatan_kode = 0;

        $indexSasaran = 1;
        $indexProgram = 1;


        $dataAll = array();
        $index = 0;
        for($i = 0; $i < count($data); $i++){

            if($data[$i]['tb_rpjmd_sasaran_kode'] != $tb_rpjmd_sasaran_kode){

                $dataAll[$index] = $data[$i];
                $dataAll[$index]['level'] = 1;
                $indexSasaran = $index;
                $index++;

                $tb_rpjmd_sasaran_kode = $data[$i]['tb_rpjmd_sasaran_kode'];
                $tb_program_kode = 0;
                $tb_kegiatan_kode = 0;
            }
            if($data[$i]['tb_program_kode'] != $tb_program_kode){

                $dataAll[$index] = $data[$i];
                $dataAll[$index]['level'] = 2;
                $indexProgram = $index;
                $index++;

                $tb_program_kode = $data[$i]['tb_program_kode'];
                $tb_kegiatan_kode = 0;
            }

            $dataAll[$index] = $data[$i];
            $dataAll[$index]['level'] = 3;

            $kode = $dataAll[$index]['id_tb_rpjmd']
                ."-".$dataAll[$index]['tb_rpjmd_misi_kode']
                ."-".$dataAll[$index]['tb_rpjmd_tujuan_kode']
                ."-".$dataAll[$index]['tb_rpjmd_sasaran_kode']
                ."-".$dataAll[$index]['tb_urusan_kode']
                ."-".$dataAll[$index]['tb_bidang_kode']
                ."-".$dataAll[$index]['tb_unit_kode']
                ."-".$dataAll[$index]['tb_sub_unit_kode']
                ."-".$dataAll[$index]['tb_program_kode']
                ."-".$dataAll[$index]['tb_kegiatan_kode'];
            $capaian_semua = 0;
            $jumlah_tahun = 5;
            for($i = 1; $i <= $jumlah_tahun; $i++){
                $ulang = 12;
                for($j = 1; $j <= $ulang; $j++){

                    // kegiatan
                    $dataAll[$index]['bulanan_tahun'.$i] = $this->DataModel->getBulanan($kode, $post['jenis'], $i, $j);
                    $dataAll[$index]['tb_rpjmd_kegiatan_th'.$i.'_capaian_kinerja'] = @$dataAll[$index]['bulanan_tahun'.$i][0]['tb_monev_bulanan_kinerja'] + @$dataAll[$index]['tb_rpjmd_kegiatan_th'.$i.'_capaian_kinerja'];
                    $dataAll[$index]['tb_rpjmd_kegiatan_th'.$i.'_capaian_anggaran'] = @$dataAll[$index]['bulanan_tahun'.$i][0]['tb_monev_bulanan_anggaran'] + @$dataAll[$index]['tb_rpjmd_kegiatan_th'.$i.'_capaian_anggaran'];
                    $dataAll[$index]['tb_rpjmd_kegiatan_th'.$i.'_capaian_realisasi'] = @$dataAll[$index]['bulanan_tahun'.$i][0]['tb_monev_bulanan_realisasi'] + @$dataAll[$index]['tb_rpjmd_kegiatan_th'.$i.'_capaian_realisasi'];

                }
                // kegiatan
                $dataAll[$index]['tb_rpjmd_kegiatan_th'.$i.'_tingkat_capaian_realisasi'] = 100*$dataAll[$index]['tb_rpjmd_kegiatan_th'.$i.'_capaian_realisasi']/$dataAll[$index]['tb_rpjmd_kegiatan_th'.$i.'_target_realisasi'];
                $dataAll[$index]['tb_rpjmd_kegiatan_th'.$i.'_tingkat_capaian_kinerja'] = 100*$dataAll[$index]['tb_rpjmd_kegiatan_th'.$i.'_capaian_kinerja']/$dataAll[$index]['tb_rpjmd_kegiatan_th'.$i.'_target_kinerja'];
                $dataAll[$index]['tb_rpjmd_kegiatan_th_akhir2_target_kinerja'] = @$dataAll[$index]['tb_rpjmd_kegiatan_th'.$i.'_target_kinerja'] + @$dataAll[$index]['tb_rpjmd_kegiatan_th_akhir2_target_kinerja'];
                $dataAll[$index]['tb_rpjmd_kegiatan_th_akhir2_target_realisasi'] = @$dataAll[$index]['tb_rpjmd_kegiatan_th'.$i.'_target_realisasi'] + @$dataAll[$index]['tb_rpjmd_kegiatan_th_akhir2_target_realisasi'];
                $dataAll[$index]['tb_rpjmd_kegiatan_th_akhir_capaian_kinerja'] = @$dataAll[$index]['tb_rpjmd_kegiatan_th'.$i.'_capaian_kinerja'] + @$dataAll[$index]['tb_rpjmd_kegiatan_th_akhir_capaian_kinerja'];
                $dataAll[$index]['tb_rpjmd_kegiatan_th_akhir_capaian_realisasi'] = @$dataAll[$index]['tb_rpjmd_kegiatan_th'.$i.'_capaian_realisasi'] + @$dataAll[$index]['tb_rpjmd_kegiatan_th_akhir_capaian_realisasi'];
                
                //program
                $dataAll[$indexProgram]['tb_rpjmd_program_th'.$i.'_capaian_realisasi'] = @$dataAll[$index]['tb_rpjmd_kegiatan_th'.$i.'_capaian_realisasi'] + @$dataAll[$indexProgram]['tb_rpjmd_program_th'.$i.'_capaian_realisasi'];
                $dataAll[$indexProgram]['tb_rpjmd_program_th'.$i.'_capaian_kinerja'] = @$dataAll[$index]['tb_rpjmd_kegiatan_th'.$i.'_capaian_kinerja'] + @$dataAll[$indexProgram]['tb_rpjmd_program_th'.$i.'_capaian_kinerja'];

                $dataAll[$indexProgram]['tb_rpjmd_program_th'.$i.'_tingkat_capaian_realisasi'] = 100*$dataAll[$indexProgram]['tb_rpjmd_program_th'.$i.'_capaian_realisasi']/$dataAll[$indexProgram]['tb_rpjmd_program_th'.$i.'_target_realisasi'];
                $dataAll[$indexProgram]['tb_rpjmd_program_th'.$i.'_tingkat_capaian_kinerja'] = 100*$dataAll[$indexProgram]['tb_rpjmd_program_th'.$i.'_capaian_kinerja']/$dataAll[$indexProgram]['tb_rpjmd_program_th'.$i.'_target_kinerja'];

                $dataAll[$indexProgram]['tb_rpjmd_program_th_akhir2_target_kinerja']  = @$dataAll[$indexProgram]['tb_rpjmd_program_th'.$i.'_target_kinerja'] + @$dataAll[$indexProgram]['tb_rpjmd_program_th_akhir2_target_kinerja'];
                $dataAll[$indexProgram]['tb_rpjmd_program_th_akhir2_target_realisasi'] = @$dataAll[$indexProgram]['tb_rpjmd_program_th'.$i.'_target_realisasi'] + @$dataAll[$indexProgram]['tb_rpjmd_program_th_akhir2_target_realisasi'];


            }
            // kegiatan
            $dataAll[$index]['tb_rpjmd_kegiatan_th_akhir_rasio_capaian_realisasi'] = 100*@$dataAll[$index]['tb_rpjmd_kegiatan_th_akhir_capaian_realisasi']/@$dataAll[$index]['tb_rpjmd_kegiatan_th_akhir2_target_realisasi'];
            $dataAll[$index]['tb_rpjmd_kegiatan_th_akhir_rasio_capaian_kinerja'] = 100*@$dataAll[$index]['tb_rpjmd_kegiatan_th_akhir_capaian_kinerja']/(@$dataAll[$index]['tb_rpjmd_kegiatan_th_akhir2_target_kinerja']/$jumlah_tahun);

            //program
            $dataAll[$indexProgram]['tb_rpjmd_program_th_akhir_capaian_kinerja'] = @$dataAll[$index]['tb_rpjmd_kegiatan_th_akhir_capaian_kinerja'] + @$dataAll[$indexProgram]['tb_rpjmd_program_th_akhir_capaian_kinerja'];
            $dataAll[$indexProgram]['tb_rpjmd_program_th_akhir_capaian_realisasi'] = @$dataAll[$index]['tb_rpjmd_kegiatan_th_akhir_capaian_realisasi'] + @$dataAll[$indexProgram]['tb_rpjmd_program_th_akhir_capaian_realisasi'];

            $dataAll[$indexProgram]['tb_rpjmd_program_th_akhir_rasio_capaian_realisasi'] = 100*@$dataAll[$indexProgram]['tb_rpjmd_program_th_akhir_capaian_realisasi']/@$dataAll[$indexProgram]['tb_rpjmd_program_th_akhir2_target_realisasi'];
            $dataAll[$indexProgram]['tb_rpjmd_program_th_akhir_rasio_capaian_kinerja'] = 100*@$dataAll[$indexProgram]['tb_rpjmd_program_th_akhir_capaian_kinerja']/(@$dataAll[$indexProgram]['tb_rpjmd_program_th_akhir2_target_kinerja']/$jumlah_tahun);


            $index++;
        }
        
        return $dataAll;

    }

}