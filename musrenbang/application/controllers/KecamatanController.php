<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KecamatanController extends CI_Controller {

    private $level;
	public function __construct()
    {
		parent::__construct();
		$this->load->library('MyConfig');
        $this->load->model('KecamatanModel');
        $this->level = 2;
    }

    public function getData($page = 1, $api = true){
        $post = $this->input->post();
        $jumDataAll = 0;
        $mySession = $this->myconfig->getSession($this->input->post('session'), $this->level);
        $status = $mySession['status'];
        
		if($status){
            $search = '';
            if(@$this->input->post('search')){
                $search = $this->input->post('search');
            }
            $this->load->model('DataModel');

            $post['page'] = $page;
            $post['search'] = $search;
            $post['session'] = $mySession;

            $kategori = $this->DataModel->getKategori();
            $data = $this->KecamatanModel->getAll($post);
            $jumDataAll = $this->KecamatanModel->getCount($post);
            $jumlahDatainPage = $this->KecamatanModel->getJumlahInPage();
            $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
            $dataKelurahan = $this->KecamatanModel->getMyKelurahan($post);
		}else{
            $dataKelurahan = array();
            $data = array();
            $jumlahPage = 1;
            $kategori = array();
        }
        
		$kirim = array(
            'dataKelurahan' => $dataKelurahan,
            'jumlahAll' => $jumDataAll,
            'jumlahPage' => $jumlahPage,
			'data' => $data,
            'status' => $status,
            'kategori' => $kategori,
        );
        if($api)
            echo json_encode($kirim);
        else
            return json_encode($kirim);
    }

    public function getKiriman($page = 1){
        $post = $this->input->post();
        $jumDataAll = 0;
        $status = $this->myconfig->check($this->input->post('session'), $this->level);
        $session = $this->myconfig->getSession($this->input->post('session'), $this->level);
        
        if(!@$session['status'] || !$session['status'] ){
            $status = false;
        }
        
		if($status){
            $search = '';
            if(@$this->input->post('search')){
                $search = $this->input->post('search');
            }

            $post['session'] = $session;
            $post['search'] = $search;
            $post['page'] = $page;


            $data = $this->KecamatanModel->getAllKiriman($post);
            $jumDataAll = $this->KecamatanModel->getCountKiriman($post);
            $jumlahDatainPage = $this->KecamatanModel->getJumlahInPage();
            $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
		}else{
            $data = array();
            $jumlahPage = 1;
        }
        
		$kirim = array(
            'jumlahAll' => $jumDataAll,
            'jumlahPage' => $jumlahPage,
			'data' => $data,
			'status' => $status
        );

        echo json_encode($kirim);
    }
    
    public function create(){
        $post = $this->input->post();
        $mySession = $this->myconfig->getSession($this->input->post('session'), $this->level);
        $status = $mySession['status'];
        $pesan = "Gagal Memasukkan data";

        if($status){
            if(@$_FILES['file']){
                $post['foto'] = $this->myconfig->imageUpload("file", "foto_", "foto-kecamatan");
            }else{
                $post['foto'] = 'no-image.png';
            }

            $post['session'] = $mySession;
            
            $status = $this->KecamatanModel->create($post);
            if($status)
                $pesan = "Berhasil Memasukkan Data";
        }
        $kirim = array(
            'pesan' => $pesan,
			'status' => $status
		);
		echo json_encode($kirim);

    }

    public function update(){
        $post = $this->input->post();
        $mySession = $this->myconfig->getSession($this->input->post('session'), $this->level);
        $status = $mySession['status'];
        $pesan = "Gagal Mengubah data";
        if($status){
            $post = $this->input->post();
            // print_r($_FILES);
            if(@$_FILES['file']){
                $post['foto'] = $this->myconfig->imageUpload("file", "foto_", "foto-kecamatan");
            }else{
                $post['foto'] = '';
            }

            $post['session'] = $mySession;

            $status = $this->KecamatanModel->update($post);
            if($status)
                $pesan = "Berhasil Mengubah Data";
        }

        $kirim = array(
            'pesan' => $pesan,
			'status' => $status
		);
		echo json_encode($kirim);

    }

    public function delete(){
        $post = $this->input->post();
        $mySession = $this->myconfig->getSession($this->input->post('session'), $this->level);
        $status = $mySession['status'];
        $pesan = "Gagal Menghapus data";
        if($status){
            $post = $this->input->post();
            $post['session'] = $mySession;
            $status = $this->KecamatanModel->delete($post);
            if($status)
                $pesan = "Berhasil Menghapus Data";
        }

        $kirim = array(
            'pesan' => $pesan,
			'status' => $status
		);
		echo json_encode($kirim);

    }

    public function getGrup(){
        $session = $this->myconfig->getSession($this->input->post('session'), $this->level);
        $grup = $this->KecamatanModel->getGrup($this->input->post(), $session['id']);
        // $token =  $this->KecamatanModel->createGrubToken($session['id'], $grup->id);
        // $getToken = $this->KelurahanModel->getGrupToken($token);
        // print_r($getToken['user_id']);

        $kirim = array(
            'token' => @$token,
            'status' => true
        );

        echo json_encode($kirim);
    }

    public function createGrup(){
        $session = $this->myconfig->getSession($this->input->post('session'), $this->level);
        $date = date("Y-m-d H:i:s");
        $grup = $this->KecamatanModel->createGrup($date, $session['id']);
        $token =  $this->KecamatanModel->createGrubToken($session['id'], $grup->id);

        // $statusGrup = $this->KecamatanModel->ubahGrupPosisi($getToken['grup_id'], 3, array(5));
        
        // $getToken = $this->KelurahanModel->getGrupToken($token);
        // print_r($getToken['user_id']);

        $kirim = array(
            'token' => $token,
            'status' => true
        );

        echo json_encode($kirim);
    }

    public function uploadBerkas(){
        $status = $this->myconfig->check($this->input->post('session'), $this->level);
        $getToken = $this->KecamatanModel->getGrupToken($this->input->post('token'));
        if(@$getToken['user_id']){
            $user_id = $getToken['user_id'];
            $grup_id = $getToken['grup_id'];
        }else{
            $status = false;
        }
        $pesan = "Gagal Memasukkan data";
        $statusGrup = $this->KecamatanModel->ubahGrupPosisi($getToken['grup_id'], 8, array(5,6,9));
        if(!$statusGrup['status']){
            $pesan = $statusGrup['pesan'];
            $status = $statusGrup['status'];
        }
        // print_r($_FILES);
        if($status){
            $post = $this->input->post();
            if(@$_FILES['ba']){
                $post['ba'] = $this->myconfig->imageUpload("ba", "berita-acara_", "berita-acara-kecamatan", true);
            }else{
                $post['ba'] = 'no-image.png';
            }

            // echo "ba =>".$post['ba'];

            if(@$_FILES['usulan']){
                $post['usulan'] = $this->myconfig->imageUpload("usulan", "usulan_", "usulan-kecamatan", true);
            }else{
                $post['usulan'] = 'no-image.png';
            }
            // echo "usulan =>".$post['usulan'];
            
            if($post['usulan'] == 'no-image.png' || $post['ba'] == 'no-image.png' ){
                $status = false;
            }

            $post['grup_id'] = $getToken['grup_id'];
            $post['user_id'] = $getToken['user_id'];
            if($status)
                $status = $this->KecamatanModel->uploadBerkas($post);
            if($status)
                $pesan = "Berhasil Memasukkan Data";
        }
        // print_r($post['foto']);
        $kirim = array(
            'pesan' => $pesan,
			'status' => $status
		);
		echo json_encode($kirim);
    }

    public function kirimBerkas(){
        $post = $this->input->post();
        $mySession = $this->myconfig->getSession($this->input->post('session'), $this->level);
        $status = $mySession['status'];
        
        
        $pesan = "Gagal Mengirim Data";
        
        // print_r($_FILES);
        if($status){

            $post['session'] = $mySession;
            $status = $this->KecamatanModel->kirimBerkas($post);
                
            
            if($status)
                $pesan = "Berhasil Mengirim Data";
        }
        // print_r($post['foto']);
        $kirim = array(
            'pesan' => $pesan,
			'status' => $status
		);
		echo json_encode($kirim);
    }

    public function createSkor(){
        
        $mySession = $this->myconfig->getSession($this->input->post('session'), $this->level);
        $status = $mySession['status'];
        
        $pesan = "Gagal Membuat Skor";
        if($status){
            $post = $this->input->post();
            $post['session'] = $mySession;
            $status = $this->KecamatanModel->createSkor($post);
            if($status)
                $pesan = "Berhasil Membuat Skor";
        }

        $kirim = array(
            'pesan' => $pesan,
			'status' => $status
		);
		echo json_encode($kirim);
    }
    
    public function getPdf($name = 'asb')
  	{
        $post = $this->input->post();
        $mySession = $this->myconfig->getSession($this->input->post('session'), $this->level);
        $status = $mySession['status'];
        if($status){
            ini_set('max_execution_time', 0); 
            ini_set('memory_limit','2048M');
            //load mPDF library
            $this->load->library('M_pdf');

            $data['orang'] = 50;
            if(@$this->input->post('orang')){
                $data['orang'] = $this->input->post('orang');
            }

            $jenis = $this->input->post('jenis');
            $post['session'] = $mySession;
            #load data

            $data['asal'] = $this->KecamatanModel->getAsal($post);

            $post['page'] = 1;

            if($jenis == "usulan"){
                $data['data'] = $this->KecamatanModel->getAll($post, true, true);
                $paran = "miring";
            }else{
                $paran = NULL;
            }

            $paran = NULL;
            $html = $this->load->view('kecamatan/'.$jenis,$data, true); 
            // $this->load->view('kelurahan/'.$jenis,$data); 
           

            $pdfFilePath =$name."-".$post['session']['id']."-".time()."-download.pdf";
         
            
            //actually, you can pass mPDF parameter on this load() function
            $pdf = $this->m_pdf->load($paran);
    
    
            $pdf->mirrorMargins = 1; // Use different Odd/Even headers and footers and mirror margins
    
            $pdf->defaultheaderfontsize = 10; /* in pts */
            $pdf->defaultheaderfontstyle = B; /* blank, B, I, or BI */
        //    $pdf->defaultheaderline = 1;  /* 1 to include line below header/above footer */

            $pdf->defaultfooterfontsize = 9; /* in pts */
            $pdf->defaultfooterfontstyle = I; /* blank, B, I, or BI */
            //$pdf->defaultfooterline = 1;  /* 1 to include line below header/above footer */

            $pdf->SetHeader('Dicetak dari: e-Musrenbang Kab. Morowali pada '.date("d").'-'.date("m").'-'.date("Y"));
            $pdf->SetFooter('Halaman {PAGENO}'); /* defines footer for Odd and Even Pages - placed at Outer margin */
            
            $pdf->AddPage('', // L - landscape, P - portrait 
                '', '', '', '',
                10, // margin_left
                10, // margin right
               20, // margin top
               20, // margin bottom
                0, // margin header
                0
            );
    
            //generate the PDF!
            $pdf->WriteHTML($html,2);
    
            //offer it to user via browser download! (The PDF won't be saved on your server HDD)
            $pdf->Output($pdfFilePath, "D");
        }else{
            echo "Download Gagal";
        }
      }
      
      public function usulanTerima(){
        $post = $this->input->post();
        $mySession = $this->myconfig->getSession($this->input->post('session'), $this->level);
        $status = $mySession['status'];
        $pesan = "Gagal Perubahan Penerimaan data";

        if(@$status){
            $post['session'] = $mySession;
            $status = $this->KecamatanModel->usulanTerima($post);
            if($status)
                $pesan = "Berhasil Perubahan Penerimaan Data";
        }
        $kirim = array(
            'pesan' => $pesan,
			'status' => @$status
		);
		echo json_encode($kirim);
      }
}



