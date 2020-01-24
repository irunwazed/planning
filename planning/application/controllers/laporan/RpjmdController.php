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
        $data['judul'] = "Laporan RPJMD";
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

        $data = $this->DataModel->getOpdKegiatan($this->session->kodeOpd, 1);
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

                $kode = $dataAll[$index]['tb_rpjmd_misi_kode']
                    ."-".$dataAll[$index]['tb_rpjmd_tujuan_kode']
                    ."-".$dataAll[$index]['tb_rpjmd_sasaran_kode'];
                $dataAll[$index]['indikator'] = $this->DataModel->getDataIndikatorSasaran($kode);
                $dataAll[$index]['indikator_text'] = '';
                $indikatorIndex = 1;
                foreach($dataAll[$index]['indikator'] as $row){
                    if(count($dataAll[$index]['indikator']) > 1){
                        $indikatorNum = '('.$indikatorIndex.') ';
                        $indikatorIndex++;
                    }else{
                        $indikatorNum = '';
                    }
                    $dataAll[$index]['indikator_text'] .= '<div>'.$indikatorNum.$row['tb_rpjmd_sasaran_indikator_nama'].'</div>';
                }

                $indexSasaran = $index;
                $index++;

                $tb_rpjmd_sasaran_kode = $data[$i]['tb_rpjmd_sasaran_kode'];
                $tb_program_kode = 0;
                $tb_kegiatan_kode = 0;
            }
            if($data[$i]['tb_program_kode'] != $tb_program_kode){

                $dataAll[$index] = $data[$i];
                $dataAll[$index]['level'] = 2;
                $kode = $dataAll[$index]['tb_rpjmd_misi_kode']
                    ."-".$dataAll[$index]['tb_rpjmd_tujuan_kode']
                    ."-".$dataAll[$index]['tb_rpjmd_sasaran_kode']
                    ."-".$dataAll[$index]['tb_urusan_kode']
                    ."-".$dataAll[$index]['tb_bidang_kode']
                    ."-".$dataAll[$index]['tb_unit_kode']
                    ."-".$dataAll[$index]['tb_sub_unit_kode']
                    ."-".$dataAll[$index]['tb_program_kode'];
                $dataAll[$index]['indikator'] = $this->DataModel->getDataIndikatorProgram($kode);
                $dataAll[$index]['indikator_text'] = '';
                $indikatorIndex = 1;
                foreach($dataAll[$index]['indikator'] as $row){
                    if(count($dataAll[$index]['indikator']) > 1){
                        $indikatorNum = '('.$indikatorIndex.') ';
                        $indikatorIndex++;
                    }else{
                        $indikatorNum = '';
                    }
                    $dataAll[$index]['indikator_text'] .= '<div>'.$indikatorNum.$row['tb_rpjmd_program_indikator_nama'].'</div>';
                }
                $indexProgram = $index;
                $index++;

                $tb_program_kode = $data[$i]['tb_program_kode'];
                $tb_kegiatan_kode = 0;
            }

            $dataAll[$index] = $data[$i];
            $dataAll[$index]['level'] = 3;

            $kode = $dataAll[$index]['id_tb_rpjmd']
                ."-".$dataAll[$index]['tb_urusan_kode']
                ."-".$dataAll[$index]['tb_bidang_kode']
                ."-".$dataAll[$index]['tb_unit_kode']
                ."-".$dataAll[$index]['tb_sub_unit_kode']
                ."-".$dataAll[$index]['tb_program_kode']
                ."-".$dataAll[$index]['tb_kegiatan_kode'];

            $capaian_semua = 0;
            $jumlah_tahun = 5;
            $capaian_realisasi_semua = 0;
            $target_realisasi_semua = 0;
            for($tahunan = 1; $tahunan <= $jumlah_tahun; $tahunan++){

                //indikator kegiatan
                $kodeIndi = $dataAll[$index]['tb_rpjmd_misi_kode']
                    ."-".$dataAll[$index]['tb_rpjmd_tujuan_kode']
                    ."-".$dataAll[$index]['tb_rpjmd_sasaran_kode']
                    ."-".$dataAll[$index]['tb_urusan_kode']
                    ."-".$dataAll[$index]['tb_bidang_kode']
                    ."-".$dataAll[$index]['tb_unit_kode']
                    ."-".$dataAll[$index]['tb_sub_unit_kode']
                    ."-".$dataAll[$index]['tb_program_kode']
                    ."-".$dataAll[$index]['tb_kegiatan_kode'];
                $dataAll[$index]['indikator'] = $this->DataModel->getDataIndikatorKegiatan($kodeIndi);
                $dataAll[$index]['indikator_text'] = '';
                $indikatorIndex = 1;
                foreach($dataAll[$index]['indikator'] as $row){
                    if(count($dataAll[$index]['indikator']) > 1){
                        $indikatorNum = '('.$indikatorIndex.') ';
                        $indikatorIndex++;
                    }else{
                        $indikatorNum = '';
                    }
                    $dataAll[$index]['indikator_text'] .= '<div>'.$indikatorNum.$row['tb_rpjmd_kegiatan_indikator_nama'].'</div>';
                }


                $dataAll[$index]['dataLra'.$tahunan] = $this->DataModel->getCapaian($kode, $tahunan);
                $capaian_realisasi = 0;
                $capaian_anggaran = 0;
                for($j = 0; $j < count($dataAll[$index]['dataLra'.$tahunan]); $j++){
                    $capaian_realisasi += $dataAll[$index]['dataLra'.$tahunan][$j]['tb_monev_lra_rek5_realisasi'];
                    $capaian_anggaran += $dataAll[$index]['dataLra'.$tahunan][$j]['tb_monev_lra_rek5_anggaran'];
                }
                $target_realisasi = $dataAll[$index]['tb_rpjmd_kegiatan_th'.$tahunan.'_target_realisasi'];
                $tingkat_capaian_realisasi = 100*$capaian_realisasi/$target_realisasi;

                $capaian_realisasi_semua += $capaian_realisasi;
                $target_realisasi_semua += $target_realisasi;
                $dataAll[$index]['tb_rpjmd_kegiatan_th'.$tahunan.'_capaian_realisasi'] = $capaian_realisasi;
                $dataAll[$index]['tb_rpjmd_kegiatan_th'.$tahunan.'_capaian_anggaran'] = $capaian_anggaran;
                $dataAll[$index]['tb_rpjmd_kegiatan_th'.$tahunan.'_tingkat_capaian_realisasi'] = $tingkat_capaian_realisasi;
                
                //program
                $dataAll[$indexProgram]['tb_rpjmd_program_th'.$tahunan.'_capaian_realisasi'] = $capaian_realisasi + @$dataAll[$indexProgram]['tb_rpjmd_program_th'.$tahunan.'_capaian_realisasi'];
            }

            $capaian_realisasi_rasio = 0;
            if($target_realisasi_semua > 0){
                $capaian_realisasi_rasio =  100*$capaian_realisasi_semua/$target_realisasi_semua;
            }

            $dataAll[$index]['tb_rpjmd_kegiatan_th_akhir_target_realisasi'] = $target_realisasi_semua;
            $dataAll[$index]['tb_rpjmd_kegiatan_th_akhir_capaian_realisasi'] = $capaian_realisasi_semua;
            $dataAll[$index]['tb_rpjmd_kegiatan_th_akhir_rasio_capaian_realisasi'] = $capaian_realisasi_rasio;

            //program
            $dataAll[$indexProgram]['tb_rpjmd_program_th_akhir_capaian_realisasi'] = $capaian_realisasi_semua + @$dataAll[$indexProgram]['tb_rpjmd_program_th_akhir_capaian_realisasi'];
            
            $dataAll[$indexProgram]['tb_rpjmd_program_th_akhir_target_realisasi'] = $dataAll[$indexProgram]['tb_rpjmd_program_th1_target_realisasi']
                                                                                    + $dataAll[$indexProgram]['tb_rpjmd_program_th2_target_realisasi']
                                                                                    + $dataAll[$indexProgram]['tb_rpjmd_program_th3_target_realisasi']
                                                                                    + $dataAll[$indexProgram]['tb_rpjmd_program_th4_target_realisasi']
                                                                                    + $dataAll[$indexProgram]['tb_rpjmd_program_th5_target_realisasi'];

            if(@$dataAll[$indexProgram]['tb_rpjmd_program_th_akhir_target_realisasi'] > 0){
                $dataAll[$indexProgram]['tb_rpjmd_program_th_akhir_rasio_capaian_realisasi'] = 100*@$dataAll[$indexProgram]['tb_rpjmd_program_th_akhir_capaian_realisasi']/@$dataAll[$indexProgram]['tb_rpjmd_program_th_akhir_target_realisasi'];
            }else{
                $dataAll[$indexProgram]['tb_rpjmd_program_th_akhir_rasio_capaian_realisasi'] = 0;
            }

            $index++;
        }
        
        return $dataAll;

    }

}