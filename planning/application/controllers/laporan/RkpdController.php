<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RkpdController extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
        $this->load->library('Filter');
        $this->levelArr = array(1,2,3);
    }

    public function view(){
        $this->filter->cekLoginOut($this->levelArr);
        
        $data = array();
        $data['judul'] = "Laporan RKPD";
        $this->load->model('rpjmd/DataModel');
        $data['dataRpjmd'] = $this->DataModel->getRowVisi();
        $data['dataOpd'] = $this->DataModel->getAllOpd();

        $file['content'] = $this->load->view('components/laporan-rkpd/content', $data, true);
        $file['script'] = $this->load->view('components/laporan-rkpd/script', $data, true);
        $this->load->view('includes/layout', $file);
	}

    public function cetak($save = ''){
        // error_reporting(0);
        $status = false;
        $pesan = "Data Tidak Ditemukan";
        $post = $this->input->post();

        $dataIndikator = array();
        $linkSavePDF = 'pdf/laporan-rkpd';
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
            $dataAll[$index]['level'] = 4;

            
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

            $kode = $dataAll[$index]['id_tb_rpjmd']
                ."-".$dataAll[$index]['tb_urusan_kode']
                ."-".$dataAll[$index]['tb_bidang_kode']
                ."-".$dataAll[$index]['tb_unit_kode']
                ."-".$dataAll[$index]['tb_sub_unit_kode']
                ."-".$dataAll[$index]['tb_program_kode']
                ."-".$dataAll[$index]['tb_kegiatan_kode'];

            // kegiatan
            $dataAll[$index]['dataRkpdAwal'] = $this->DataModel->getRkpdAwalKegiatan($kode);
            $targetAkhirRealisasi = @$dataAll[$index]['dataRkpdAwal'][0]['tb_rpjmd_kegiatan_th1_target_realisasi']
                                    +@$dataAll[$index]['dataRkpdAwal'][0]['tb_rpjmd_kegiatan_th2_target_realisasi']
                                    +@$dataAll[$index]['dataRkpdAwal'][0]['tb_rpjmd_kegiatan_th3_target_realisasi']
                                    +@$dataAll[$index]['dataRkpdAwal'][0]['tb_rpjmd_kegiatan_th4_target_realisasi']
                                    +@$dataAll[$index]['dataRkpdAwal'][0]['tb_rpjmd_kegiatan_th5_target_realisasi'];
            
            $jumlahAllRealisasi = 0;
            for($tahunan = 1; $tahunan <= $post['tahun']; $tahunan++){
                $jumAnggaran = 0;
                $jumRealisasi = 0;
                $dataAll[$index]['dataLra'] = $this->DataModel->getCapaian($kode, $tahunan);

                for($j = 0; $j < count($dataAll[$index]['dataLra']); $j++){
                    $jumAnggaran += $dataAll[$index]['dataLra'][$j]['tb_monev_lra_rek5_anggaran'];
                    $jumRealisasi += $dataAll[$index]['dataLra'][$j]['tb_monev_lra_rek5_realisasi'];
                }
                $dataAll[$index]['tb_rpjmd_kegiatan_th'.$tahunan.'_capaian_anggaran'] = $jumAnggaran;
                $dataAll[$index]['tb_rpjmd_kegiatan_th'.$tahunan.'_capaian_realisasi'] = $jumRealisasi;
                $dataAll[$index]['tb_rpjmd_kegiatan_th'.$tahunan.'_capaian_realisasi_anggaran'] = $jumRealisasi - $jumAnggaran;
                $jumlahAllRealisasi += $jumRealisasi;
            }

            $capaian_realisasi_persen = 0;
            if($targetAkhirRealisasi > 0){
                $capaian_realisasi_persen = 100*$jumlahAllRealisasi/$targetAkhirRealisasi;
            }
            $dataAll[$index]['tb_rpjmd_kegiatan_th_akhir_target_realisasi'] = $targetAkhirRealisasi;
            $dataAll[$index]['tb_rpjmd_kegiatan_th'.($post['tahun']).'_capaian_realisasi_semua'] = $jumlahAllRealisasi;
            $dataAll[$index]['tb_rpjmd_kegiatan_th'.($post['tahun']).'_capaian_realisasi_persen'] = $capaian_realisasi_persen;


            //program
            $dataAll[$indexProgram]['dataRkpdAwalProgram'] = $this->DataModel->getRkpdAwalProgram($kode);
            $targetAkhirRealisasiProgram = @$dataAll[$indexProgram]['dataRkpdAwalProgram'][0]['tb_rpjmd_program_th1_target_realisasi']
                                    +@$dataAll[$indexProgram]['dataRkpdAwalProgram'][0]['tb_rpjmd_program_th2_target_realisasi']
                                    +@$dataAll[$indexProgram]['dataRkpdAwalProgram'][0]['tb_rpjmd_program_th3_target_realisasi']
                                    +@$dataAll[$indexProgram]['dataRkpdAwalProgram'][0]['tb_rpjmd_program_th4_target_realisasi']
                                    +@$dataAll[$indexProgram]['dataRkpdAwalProgram'][0]['tb_rpjmd_program_th5_target_realisasi'];
            $dataAll[$indexProgram]['tb_rpjmd_program_th_akhir_target_realisasi'] = $targetAkhirRealisasiProgram;
            $dataAll[$indexProgram]['tb_rpjmd_program_th'.$post['tahun'].'_capaian_anggaran'] = @$dataAll[$index]['tb_rpjmd_kegiatan_th'.$post['tahun'].'_capaian_anggaran'] 
                                                                                        + @$dataAll[$indexProgram]['tb_rpjmd_program_th'.$post['tahun'].'_capaian_anggaran'];
            $dataAll[$indexProgram]['tb_rpjmd_program_th'.$post['tahun'].'_capaian_realisasi'] = @$dataAll[$index]['tb_rpjmd_kegiatan_th'.$post['tahun'].'_capaian_realisasi'] 
                                                                                        + @$dataAll[$indexProgram]['tb_rpjmd_program_th'.$post['tahun'].'_capaian_realisasi'];
            $dataAll[$indexProgram]['tb_rpjmd_program_th'.$post['tahun'].'_capaian_realisasi_persen'] = @$dataAll[$index]['tb_rpjmd_kegiatan_th'.$post['tahun'].'_capaian_realisasi_persen'] 
                                                                                        + @$dataAll[$indexProgram]['tb_rpjmd_program_th'.$post['tahun'].'_capaian_realisasi_persen'];
            

            $index++;
        }
        return $dataAll;

    }

}