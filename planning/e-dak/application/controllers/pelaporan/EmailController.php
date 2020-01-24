<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmailController extends CI_Controller {
    private $arr;
	public function __construct()
    {
		parent::__construct();
        $this->load->model('pelaporan/KegiatanModel');
        $this->load->library('Filter');
        $this->load->library('Fungsi');
        $this->arr = array(
			'level' => array(1,2),
        );
    }

    public function sendEmail(){
        /*
        pengiriman
            1 - 4
            1 - 7
            1 - 10
            1 - 1

        */
        ini_set('max_execution_time', 0); 
        ini_set('memory_limit','2048M');

        $data['triwulan'] = "";

        $bulanEmail = array('',4,7,10,1);

        $triwulan = array_search(date("m"), $bulanEmail);
        $data['triwulan'] = $triwulan;

        $judul = "HIMBAUAN PENYAMPAIAN LAPORAN DAK TRIWULAN ".$triwulan;
        $isi = $this->load->view('email/himbauan', $data, true);
        // echo $isi;
        $this->load->model('pelaporan/DataModel');

        $pegawai = $this->DataModel->selectPpk();
        // echo "<pre>";
        foreach($pegawai as $row){
            if( $row['id_pegawai'] == 15){
                $email = $row['pegawai_email'];
                $nama = $row['pegawai_nama'];
                
                $emailStatus = $this->fungsi->kirimEmail($email, $judul, $isi, true);
                if($emailStatus){
                    echo "Pengiriman ke ".$email." berhasil <br>";
                }

            }
            
        }
        
        
        $this->load->library('Fungsi');
        // $emailStatus = $this->fungsi->kirimEmail("irunwazed@gmail.com", "tes", "tes isi");
    }

    public function coba(){
        $this->load->library('email');

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
        $this->email->to('irunwazed@gmail.com'); 

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');  

        if($this->email->send()){
            echo "sukses";
        }else{
            show_error($this->email->print_debugger());
        }

    }

    public function coba2(){
        $triwulan = array(3,6,8,12);
        $bulan = date('m');
        $tgl = date('d');
        echo array_search(3, $triwulan);
        if(in_array(@$bulan, $triwulan)){
           if($tgl == 1){
            //    echo "re";
           }
        }

        // if(date('m') == 8)
        //     echo date('d');
    }
}