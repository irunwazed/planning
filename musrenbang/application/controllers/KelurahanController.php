<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelurahanController extends CI_Controller {

    private $level;
	public function __construct()
    {
		parent::__construct();
		$this->load->library('MyConfig');
        $this->load->model('KelurahanModel');
        $this->level = 1;
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

            $post['session'] = $mySession;
            $post['search'] = $search;
            $post['page'] = $page;

            $kategori = $this->DataModel->getKategori();
            $data = $this->KelurahanModel->getAll($post);
            $jumDataAll = $this->KelurahanModel->getCount($post);
            $jumlahDatainPage = $this->KelurahanModel->getJumlahInPage();
            $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
		}else{
            $data = array();
            $jumlahPage = 1;
            $kategori = array();
        }
        
		$kirim = array(
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
    
    public function create(){
        $mySession = $this->myconfig->getSession($this->input->post('session'), $this->level);
        $status = $mySession['status'];
        
        $pesan = "Gagal Memasukkan data";

        if($status){
            $post = $this->input->post();
            if(@$_FILES['file']){
                $post['foto'] = $this->myconfig->imageUpload("file", "foto_", "foto-kelurahan");
            }else{
                $post['foto'] = 'no-image.png';
            }
            
            $post['session'] = $mySession;

            $status = $this->KelurahanModel->create($post);
            if($status)
                $pesan = "Berhasil Memasukkan Data";
        }
        
        $kirim = array(
            'pesan' => $pesan,
			'status' => $status
		);
		echo json_encode($kirim);
    }

    public function createGrup(){
        $session = $this->myconfig->getSession($this->input->post('session'), $this->level);
        $date = date("Y-m-d H:i:s");
        $grup = $this->KelurahanModel->createGrup($date, $session['id']);
        $token =  $this->KelurahanModel->createGrubToken($session['id'], $grup->id);
        // $getToken = $this->KelurahanModel->getGrupToken($token);
        // print_r($getToken['user_id']);

        $kirim = array(
            'token' => $token,
            'status' => true
        );

        echo json_encode($kirim);
    }

    public function update(){
        $status = $this->myconfig->check($this->input->post('session'), $this->level);
        
        $pesan = "Gagal Mengubah data";

        if($status){
            $post = $this->input->post();
            if(@$_FILES['file']){
                $post['foto'] = $this->myconfig->imageUpload("file", "foto_", "foto-kelurahan");
            }else{
                $post['foto'] = '';
            }

            $status = $this->KelurahanModel->update($post);
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
        $status = $this->myconfig->check($this->input->post('session'), $this->level);
        $pesan = "Gagal Menghapus data";
        if($status){
            $post = $this->input->post();
            $status = $this->KelurahanModel->delete($post);
            if($status)
                $pesan = "Berhasil Menghapus Data";
        }
        $kirim = array(
            'pesan' => $pesan,
			'status' => $status
		);
		echo json_encode($kirim);
    }

    public function uploadBerkas(){

        $mySession = $this->myconfig->getSession($this->input->post('session'), $this->level);
        $status = $mySession['status'];

        $pesan = "Gagal Memasukkan data";
        // print_r($_FILES);
        if($status){
            $post = $this->input->post();

            $post['session'] = $mySession;

            if(@$_FILES['ba']){
                $post['ba'] = $this->myconfig->imageUpload("ba", "berita-acara_", "berita-acara-kelurahan", true);
            }else{
                $post['ba'] = 'no-image.png';
            }

            if(@$_FILES['usulan']){
                $post['usulan'] = $this->myconfig->imageUpload("usulan", "usulan_", "usulan-kelurahan", true);
            }else{
                $post['usulan'] = 'no-image.png';
            }
            
            if($post['usulan'] == 'no-image.png' || $post['ba'] == 'no-image.png' ){
                $status = false;
            }

            if($status)
                $status = $this->KelurahanModel->uploadBerkas($post);
            if($status)
                $pesan = "Berhasil Memasukkan Data";
        }
        
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
        
        $pesan = "Gagal Memasukkan data";
        
        if($status){
            
            $post['session'] = $mySession;

            if($status)
                $status = $this->KelurahanModel->kirimBerkas($post);
            // print_r($status);
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

    public function getKiriman($page = 1){

        $post = $this->input->post();
        $jumDataAll = 0;
        $status = $this->myconfig->check($this->input->post('session'), $this->level);
        $session = $this->myconfig->getSession($this->input->post('session'), $this->level);
        
        $data = array();
        if(!@$session['status'] || !$session['status'] ){
            $status = false;
        }
        // $status = false;
		if($status){
            $search = '';
            if(@$this->input->post('search')){
                $search = $this->input->post('search');
            }
            
            $post['page'] = $page;
            $post['search'] = $search;
            $post['session'] = $session;

            $data = $this->KelurahanModel->getAllKiriman($post);
		}else{
            $data = array();
            $jumlahPage = 1;
        }
        
		$kirim = array(
            // 'jumlahAll' => $jumDataAll,
            // 'jumlahPage' => $jumlahPage,
			'data' => $data,
			'status' => $status
        );

        echo json_encode($kirim);
    }

    public function getGrup(){
        $session = $this->myconfig->getSession($this->input->post('session'), $this->level);
        $post = $this->input->post();
        $post['session'] = $session;
        $grup = $this->KelurahanModel->getGrup($post, $session['id']);
        $token =  $this->KelurahanModel->createGrubToken($session['id'], $grup->id);
        // $getToken = $this->KelurahanModel->getGrupToken($token);
        // print_r($getToken['user_id']);

        $kirim = array(
            'token' => $token,
            'status' => true
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
            $post['jenis'] = $jenis;
            $post['search'] = '';
            $post['session'] = $mySession;

            #load data
            // $getToken = $this->KelurahanModel->getGrupToken($this->input->post('token'));

            $data['asal'] = $this->KelurahanModel->getAsal($post['session']['id']);

            if($jenis == "usulan"){
                $data['data'] = $this->KelurahanModel->getAll($post, true);
                $paran = "miring";
            }else{
                $paran = NULL;
            }
            
            $html = $this->load->view('kelurahan/'.$jenis,$data, true); 
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
      
      public function export(){
        $session = $this->myconfig->getSession($this->input->post('session'), $this->level);
      }
}



