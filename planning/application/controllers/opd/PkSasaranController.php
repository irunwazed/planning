<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PkSasaranController extends CI_Controller {
    
    private $levelArr;

	public function __construct()
    {
		parent::__construct();
        $this->load->model('opd/PkSasaranModel');
        $this->load->library('Filter');
        $this->load->library('Fungsi');
        $this->levelArr = array(1,3);
    }

    public function view(){
        $this->filter->cekLoginOut($this->levelArr);
        $data = array();
        $data['judul'] = "Perjanjian Kinerja";
        
        $this->load->model('rpjmd/DataModel');
        $data['dataMisi'] = $this->DataModel->getDataMisi();
        $data['dataRpjmd'] = $this->DataModel->getRowVisi();
        $data['dataOpd'] = $this->DataModel->getAllOpd();
        
        $data['dataPkOpd'] = $this->DataModel->getAllPkOpd();

        $data['dataPk'] = $this->setData();

        $file['content'] = $this->load->view('components-opd/pk-sasaran/content', $data, true);
        $file['script'] = $this->load->view('components-opd/pk-sasaran/script', $data, true);
        $this->load->view('includes/layout', $file);
    }

    public function setData(){
        
        $dataPkSasaran = $this->PkSasaranModel->getSasaranOpd();
        $dataPkProgram = $this->PkSasaranModel->getProgramOpd();
        $dataPkKegiatan = $this->PkSasaranModel->getKegiatanOpd();

        $dataAll = array();
        $index = 0;
        for($i = 0; $i < count($dataPkSasaran); $i++){
            $dataAll[$index] = $dataPkSasaran[$i];
            $dataAll[$index]['level'] = 1;
            $index++;

            for($j = 0; $j < count($dataPkProgram); $j++){
                if($dataPkSasaran[$i]['id_tb_rpjmd'] == $dataPkProgram[$j]['id_tb_rpjmd'] 
                && $dataPkSasaran[$i]['tb_rpjmd_misi_kode'] == $dataPkProgram[$j]['tb_rpjmd_misi_kode']
                && $dataPkSasaran[$i]['tb_rpjmd_tujuan_kode'] == $dataPkProgram[$j]['tb_rpjmd_tujuan_kode']
                && $dataPkSasaran[$i]['tb_rpjmd_sasaran_kode'] == $dataPkProgram[$j]['tb_rpjmd_sasaran_kode']){
                    $dataAll[$index] = $dataPkProgram[$j];
                    $dataAll[$index]['level'] = 2;
                    $index++;
                }

                for($k = 0; $k < count($dataPkKegiatan); $k++){
                    if($dataPkProgram[$j]['id_tb_rpjmd'] == $dataPkKegiatan[$k]['id_tb_rpjmd'] 
                    && $dataPkProgram[$j]['tb_rpjmd_misi_kode'] == $dataPkKegiatan[$k]['tb_rpjmd_misi_kode']
                    && $dataPkProgram[$j]['tb_rpjmd_tujuan_kode'] == $dataPkKegiatan[$k]['tb_rpjmd_tujuan_kode']
                    && $dataPkProgram[$j]['tb_rpjmd_sasaran_kode'] == $dataPkKegiatan[$k]['tb_rpjmd_sasaran_kode']
                    && $dataPkProgram[$j]['tb_program_kode'] == $dataPkKegiatan[$k]['tb_program_kode']){
                        $dataAll[$index] = $dataPkKegiatan[$k];
                        $dataAll[$index]['level'] = 3;
                        $index++;
                    }
                }

            }
        }
        print_r(count($dataPkKegiatan));
        return $dataAll;

    }

    public function setKinerja(){
        $pesan = "Gagal Mengubah Kinerja";
        $status = false;
        $post = $this->input->post();

        if($post['jenis'] == 1){
            $status = $this->PkSasaranModel->setSasaran($post);
        }else if($post['jenis'] == 2){
            $status = $this->PkSasaranModel->setProgram($post);
        }else if($post['jenis'] == 3){
            $status = $this->PkSasaranModel->setKegiatan($post);
        }

        if($status){
            $pesan = "Berhasil Mengubah Kinerja";
        }
        $kirim = array(
            'pesan' => $pesan,
            'status' => $status,
        );
        echo json_encode($kirim);
    }

    public function getData($page = 1){
        $post = $this->input->post();
        $post['page'] = $page;
        $jumDataAll = 0;
        $jumlahDatainPage = 0;
        $data = array();
        $jumlahPage = 1;
        $status = $this->filter->cekLogin($this->levelArr);
		if($status){
            $data = $this->PkSasaranModel->getAll($post);
            $jumDataAll = $this->PkSasaranModel->getCount($post);
            $jumlahDatainPage = $this->PkSasaranModel->getJumlahInPage();
            $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
		}
        $kirim = array(
            'jumlahAll' => $jumDataAll,
            'jumlahPage' => $jumlahPage,
			'data' => $data,
			'status' => $status
        );
        echo json_encode($kirim);
    }

	public function action($action = ''){
        $post = $this->input->post();
        $status = $this->filter->cekLogin($this->levelArr);
		$result = array(
			'pesan' => 'gagal terhubung server',
			'status' => false,
        );
        if($status){
            $result = $this->PkSasaranModel->$action($post);
        }
        $kirim = $result;
		echo json_encode($kirim);
    }

}